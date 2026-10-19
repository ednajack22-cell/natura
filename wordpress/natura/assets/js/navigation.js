/**
 * Natura menus, plus a few small page behaviours (see the end of the file).
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

  // The plant guide's table of contents starts closed, so on a phone it does
  // not push the guide a whole screen down. On wide screens it sits in the
  // sidebar, where there is room to show it open.
  if (window.matchMedia("(min-width: 1024px)").matches) {
    document.querySelectorAll(".plant-toc").forEach((toc) => { toc.open = true; });
  }

  // Below 1024px the header slides away while the reader scrolls down and
  // comes back on the way up (Natura Options → General). It never hides near
  // the top of the page, while the menu sheet is open, or while it holds the
  // keyboard focus. The CSS keeps it sticky, so nothing moves under it.
  const header = document.querySelector(".site-header[data-autohide]");
  if (header) {
    const narrow = window.matchMedia("(max-width: 1023.98px)");
    const threshold = 8;
    let lastY = window.scrollY;
    let queued = false;
    const show = () => header.classList.remove("is-hidden");
    const update = () => {
      queued = false;
      const y = Math.max(0, window.scrollY);
      const pinned = !narrow.matches || mobileMenu?.open || header.contains(document.activeElement);
      if (pinned || y <= header.offsetHeight) {
        show();
        lastY = y;
        return;
      }
      // Small moves add up until they pass the threshold: no flicker.
      if (Math.abs(y - lastY) < threshold) return;
      header.classList.toggle("is-hidden", y > lastY);
      lastY = y;
    };
    window.addEventListener("scroll", () => {
      if (!queued) {
        queued = true;
        window.requestAnimationFrame(update);
      }
    }, { passive: true });
    header.addEventListener("focusin", show);
    mobileMenu?.addEventListener("toggle", show);
    narrow.addEventListener("change", show);
  }

  // Reading progress of guides: how far the reader is through the article
  // itself, not the whole page with its footer. Decorative, so it is
  // aria-hidden in the markup; it stays hidden when this script does not run.
  const bar = document.querySelector(".reading-progress");
  const article = document.querySelector(".guide-main");
  if (bar && article) {
    let queued = false;
    const draw = () => {
      queued = false;
      const box = article.getBoundingClientRect();
      const span = box.height - window.innerHeight;
      const done = span > 0 ? -box.top / span : (box.bottom <= window.innerHeight ? 1 : 0);
      bar.style.setProperty("--progress", Math.min(1, Math.max(0, done)).toFixed(4));
    };
    const queue = () => {
      if (!queued) {
        queued = true;
        window.requestAnimationFrame(draw);
      }
    };
    bar.hidden = false;
    draw();
    window.addEventListener("scroll", queue, { passive: true });
    window.addEventListener("resize", queue, { passive: true });
  }
})();
