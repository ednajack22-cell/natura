/**
 * Natura menus.
 *
 * Everything works without this file: dropdowns open on hover and keyboard
 * focus through CSS, and the mobile sheet is a native <details>. This adds what
 * CSS cannot do:
 *
 *  - the chevron buttons open a dropdown by tap or click (touch screens have
 *    no hover), and report their state to screen readers;
 *  - Escape closes whatever is open and returns focus to its control;
 *  - a click outside closes an open dropdown.
 */
(() => {
  const items = Array.from(document.querySelectorAll(".nav-item.has-menu"));
  const mobileMenu = document.querySelector(".mobile-menu");

  const setOpen = (item, open) => {
    item.classList.toggle("is-open", open);
    item.querySelector(".nav-toggle")?.setAttribute("aria-expanded", String(open));
  };
  const closeAll = (except) => items.forEach((item) => item !== except && setOpen(item, false));

  items.forEach((item) => {
    const toggle = item.querySelector(".nav-toggle");
    toggle?.addEventListener("click", () => {
      const open = !item.classList.contains("is-open");
      closeAll(item);
      setOpen(item, open);
      item.classList.remove("is-dismissed");
    });
    // A dismissed dropdown may open again once the pointer or focus has left.
    item.addEventListener("mouseleave", () => item.classList.remove("is-dismissed"));
    item.addEventListener("focusout", (event) => {
      if (!item.contains(event.relatedTarget)) {
        item.classList.remove("is-dismissed");
        setOpen(item, false);
      }
    });
  });

  document.addEventListener("click", (event) => {
    if (!event.target.closest(".nav-item.has-menu")) closeAll();
  });

  document.addEventListener("keydown", (event) => {
    if (event.key !== "Escape") return;

    if (mobileMenu?.open) {
      mobileMenu.open = false;
      mobileMenu.querySelector("summary")?.focus();
      return;
    }

    items.forEach((item) => {
      const active = item.classList.contains("is-open") || item.matches(":hover") || item.contains(document.activeElement);
      if (!active) return;
      setOpen(item, false);
      item.classList.add("is-dismissed");
      if (item.contains(document.activeElement)) item.querySelector(".nav-toggle")?.focus();
    });
  });
})();
