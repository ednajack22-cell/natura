"""Builds the glyph sheets the plugin draws cover text with.

GD can only write with a font file when PHP was built with FreeType, which
some servers (WordPress Playground among them) lack. So the letters are drawn
once here, from the site's fonts (Newsreader and Inter, SIL Open Font
License), into a PNG sheet per face, with their positions, widths and kerning
in includes/cover-glyphs.php. Run again after changing a font or the letters:

    python3 wordpress/tools/make-cover-glyphs.py
"""

from pathlib import Path

from PIL import Image, ImageDraw, ImageFont, features

HERE = Path(__file__).resolve().parent
PLUGIN = HERE.parent / "natura-core"
FACES = {
    "serif": (HERE / "cover-fonts" / "natura-cover-serif.ttf", 128),
    "sans": (HERE / "cover-fonts" / "natura-cover-sans.ttf", 48),
}
CHARS = (
    [chr(c) for c in range(0x20, 0x7F)]
    + [chr(c) for c in range(0xA0, 0x100)]
    + list("–—‘’“”…•")
)
PAIR_CHARS = [chr(c) for c in range(0x21, 0x7F)] + list("’“”")
LAYOUT = ImageFont.Layout.RAQM if features.check("raqm") else ImageFont.Layout.BASIC


def php(value):
    if isinstance(value, dict):
        return "array(" + ", ".join(f"{php(k)} => {php(v)}" for k, v in value.items()) + ")"
    if isinstance(value, (list, tuple)):
        return "array(" + ", ".join(php(v) for v in value) + ")"
    if isinstance(value, str):
        return "'" + value.replace("\\", "\\\\").replace("'", "\\'") + "'"
    return repr(value)


def build(face, path, size):
    font = ImageFont.truetype(str(path), size, layout_engine=LAYOUT)
    pad = 4
    cells = []
    for ch in CHARS:
        box = font.getbbox(ch, anchor="ls")
        cells.append((ch, box, font.getlength(ch)))

    width = 2048
    x = y = row = 0
    places = []
    for ch, box, adv in cells:
        w = max(1, box[2] - box[0]) + 2 * pad
        h = max(1, box[3] - box[1]) + 2 * pad
        if x + w > width:
            x, y, row = 0, y + row, 0
        places.append((ch, box, adv, x, y, w, h))
        x += w
        row = max(row, h)

    sheet = Image.new("LA", (width, y + row), (0, 0))
    draw = ImageDraw.Draw(sheet)
    glyphs = {}
    for ch, box, adv, gx, gy, w, h in places:
        if ch.strip():
            draw.text((gx + pad - box[0], gy + pad - box[1]), ch, font=font, fill=(0, 255), anchor="ls")
        glyphs[ch] = [gx, gy, w, h, box[0] - pad, box[1] - pad, round(adv, 2)]
    sheet.save(PLUGIN / "assets" / "covers" / f"glyphs-{face}.png", optimize=True)

    kerning = {}
    for a in PAIR_CHARS:
        for b in PAIR_CHARS:
            k = font.getlength(a + b) - font.getlength(a) - font.getlength(b)
            if abs(k) >= 0.5:
                kerning[a + b] = round(k, 1)

    return {"size": size, "ascent": font.getmetrics()[0], "glyphs": glyphs, "kerning": kerning}


(PLUGIN / "assets" / "covers").mkdir(parents=True, exist_ok=True)
data = {face: build(face, path, size) for face, (path, size) in FACES.items()}
(PLUGIN / "includes" / "cover-glyphs.php").write_text(
    "<?php\n/**\n * Letter positions, widths and kerning on the cover glyph sheets.\n"
    " * Made by wordpress/tools/make-cover-glyphs.py: do not edit by hand.\n *\n"
    " * @package NaturaCore\n */\n\ndefined( 'ABSPATH' ) || exit;\n\nreturn "
    + php(data)
    + ";\n",
    encoding="utf-8",
)
print({face: (len(d["glyphs"]), len(d["kerning"])) for face, d in data.items()})
