# Concevoir les pages avec Google Stitch

Stitch (https://stitch.withgoogle.com) génère des maquettes d'écran à partir
d'une description ou d'une image. Il exporte vers Figma ou en HTML/CSS. Ce
HTML est une maquette, pas un thème WordPress : il n'a ni menus, ni contenu
dynamique, ni gestion des publicités. Le bon partage des rôles :

1. **Stitch** : explorer des idées de mise en page, vite, surtout sur mobile.
2. **Vous** : choisir la version qui vous plaît.
3. **Claude** : la transformer en gabarit WordPress qui respecte le design du
   site, l'accessibilité, la vitesse, le SEO et les emplacements AdSense,
   affiliation et Pinterest.

## Comment me transmettre une maquette

Le plus simple, par ordre de préférence :

- **Le code HTML** : dans Stitch, *Export → Code to clipboard*, puis collez-le
  dans la conversation. Pour plusieurs écrans, *Export → .zip* et déposez le
  zip dans le dépôt, dans `wordpress/design/stitch/`.
- **Une capture d'écran** : glissez l'image dans la conversation.
- **Un lien Figma** si vous passez par Figma.

Dites-moi ce que vous aimez dans la maquette (« la carte résumé en haut »,
« les photos en grand ») : je reprends ces idées sans casser le reste.

## À coller au début de chaque prompt

Pour que chaque écran reste cohérent avec le site :

```text
Design system for "Natura", an English gardening site for balconies, patios
and containers. Mobile first (390px wide), then desktop (1440px).
Colours: paper background #FFFDF8, ink text #173126, forest green #1F5A3F
(primary buttons, links), dark forest #102F23 (footer), sage #EEF3EB (soft
panels), clay #A45132 (small accents), sun yellow #E4B94F (highlights only).
Type: headings in Georgia serif, bold; body in Inter, 17-18px, line height 1.65.
No text under 14px. Rounded corners 12-16px, pill-shaped buttons, generous white
space, real photos of plants in pots. Calm, trustworthy, editorial; no clutter,
no stock-style icons everywhere, no fake statistics.
The header already exists: logo "Natura" left; menu Plants, Plant Problems,
DIY Projects, Articles, Tools, Gear; search. Do not redesign it.
```

## Prompts par page

**Fiche plante** (page d'arrivée principale depuis Pinterest)

```text
A plant growing guide page, e.g. "How to grow cherry tomatoes in pots".
Top: large vertical photo of the plant, title, one-sentence summary.
Directly under it: a "Quick facts" card (sun, pot size, watering, days to
harvest, difficulty) readable in 5 seconds. A "Save to Pinterest" button on
the photo. Then a short table of contents. Then sections: planting, watering,
feeding, support/pruning, harvest, common mistakes, FAQ. Include a "What you
need" box listing 4-5 products with small images and a "See price" button
(affiliate). Leave 2 clearly separated ad spaces between sections (never above
the title). End with related problems and related plants as cards.
```

**Problème** (ex. feuilles jaunes)

```text
A plant problem page, e.g. "Why are my plant's leaves turning yellow?".
Top: title, photo of the symptom, a 3-line "Most likely causes" answer box.
Then a visual symptom checker: 3-4 cards "If you see X → likely cause Y".
Then for each cause: how to confirm it, what to do, how long recovery takes.
A small "Useful kit" box (moisture meter, etc.) with "See price" buttons.
One ad space after the answer box, one before related pages.
```

**Projet** (pas à pas)

```text
A step-by-step DIY project page, e.g. "Build a balcony herb trough".
Top: finished-project photo (vertical, Pinterest style), title, time, cost,
difficulty as three chips. A "You will need" checklist with product links.
Numbered steps, each with a photo and 2-3 short sentences. Tips box.
One ad space after the materials, one after step 4.
```

**Liste d'articles / catégorie** (ex. Herbs)

```text
A category page listing plant guides, e.g. "Herbs you can grow on a balcony".
Short intro (2 sentences), filter chips (easy, shade, sun, indoor),
a grid of cards: vertical photo, title, 2 key facts. Two columns on mobile,
four on desktop. One ad space after the first 6 cards.
```

**Accueil**

```text
A home page for the gardening site. Short hero (title + search field, no big
slogan). "What to plant this month" strip. Popular plant guides as photo cards.
Plant problems as 4 large tappable tiles. Latest projects and articles.
Email signup "Monthly planting reminder". Maximum 5 screens on mobile.
```

**Outil** (ex. calculateur de taille de pot)

```text
A calculator page: "Pot size calculator". Simple form (plant, number of
plants, location) with large inputs, a clear result card with the answer in
big text and a short explanation, then "Recommended pots" with "See price"
buttons, then a short guide below. One ad space under the result.
```
