/**
 * Natura fields: repeating rows and the Pinterest image picker.
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

  document.querySelectorAll("[data-natura-image]").forEach((field) => {
    const input = field.querySelector("input[type=hidden]");
    const preview = field.querySelector(".natura-image-preview");
    const remove = field.querySelector("[data-natura-image-remove]");
    let frame;

    field.querySelector("[data-natura-image-choose]").addEventListener("click", () => {
      frame ??= wp.media({ title: "Pinterest image", library: { type: "image" }, multiple: false });
      frame.off("select").on("select", () => {
        const image = frame.state().get("selection").first().toJSON();
        input.value = image.id;
        const url = image.sizes?.medium?.url ?? image.url;
        preview.innerHTML = "";
        const img = document.createElement("img");
        img.src = url;
        img.alt = "";
        preview.append(img);
        remove.hidden = false;
      });
      frame.open();
    });

    remove.addEventListener("click", () => {
      input.value = "";
      preview.innerHTML = "";
      remove.hidden = true;
    });
  });
})();
