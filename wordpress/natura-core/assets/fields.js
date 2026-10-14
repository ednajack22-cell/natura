/**
 * Natura fields: repeating rows and image pickers.
 * Plain DOM, no build step, nothing loaded outside the Natura edit screens.
 */
(() => {
  document.querySelectorAll("[data-natura-list]").forEach((list) => {
    const rows = list.querySelector(".natura-list-rows");
    const template = list.querySelector("template");

    // Field names carry the row position; rewrite them after every change so
    // the saved order is the order on screen.
    const renumber = () => {
      rows.querySelectorAll(".natura-list-row").forEach((row, index) => {
        row.querySelectorAll("[name]").forEach((field) => {
          field.name = field.name.replace(/\]\[(\d+|__INDEX__)\]\[/, `][${index}][`);
        });
      });
    };

    list.querySelector("[data-natura-add]").addEventListener("click", () => {
      rows.append(template.content.cloneNode(true));
      renumber();
      rows.lastElementChild?.querySelector("input, textarea")?.focus();
    });

    rows.addEventListener("click", (event) => {
      const row = event.target.closest(".natura-list-row");
      if (!row) return;
      if (event.target.matches("[data-natura-remove]")) row.remove();
      if (event.target.matches("[data-natura-up]") && row.previousElementSibling) row.previousElementSibling.before(row);
      if (event.target.matches("[data-natura-down]") && row.nextElementSibling) row.nextElementSibling.after(row);
      renumber();
    });
  });

  // Image pickers, including those in rows added after the page loaded.
  let frame;
  document.addEventListener("click", (event) => {
    const field = event.target.closest("[data-natura-image]");
    if (!field) return;
    const input = field.querySelector("input[type=hidden]");
    const preview = field.querySelector(".natura-image-preview");
    const remove = field.querySelector("[data-natura-image-remove]");

    if (event.target.matches("[data-natura-image-choose]")) {
      frame ??= wp.media({ title: "Choose an image", library: { type: "image" }, multiple: false });
      frame.off("select").on("select", () => {
        const image = frame.state().get("selection").first().toJSON();
        input.value = image.id;
        const img = document.createElement("img");
        img.src = image.sizes?.thumbnail?.url ?? image.sizes?.medium?.url ?? image.url;
        img.alt = "";
        preview.replaceChildren(img);
        remove.hidden = false;
      });
      frame.open();
    }

    if (event.target.matches("[data-natura-image-remove]")) {
      input.value = "";
      preview.replaceChildren();
      remove.hidden = true;
    }
  });
})();
