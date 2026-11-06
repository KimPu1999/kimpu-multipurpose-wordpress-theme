(() => {
  const drawer = document.querySelector('#mobile-drawer');
  const menuButtons = document.querySelectorAll('.menu-toggle');
  const closeButton = drawer && drawer.querySelector('.mobile-drawer-close');
  let lastFocus = null;
  const setSubmenus = (root) => root.querySelectorAll('.menu-item-has-children').forEach((item) => {
    const toggle = item.querySelector(':scope > .submenu-toggle'); if (!toggle) return;
    toggle.addEventListener('click', () => { const open = item.classList.toggle('is-submenu-open'); toggle.setAttribute('aria-expanded', String(open)); });
  });
  const closeDrawer = () => { if (!drawer) return; drawer.classList.remove('is-open'); drawer.setAttribute('aria-hidden', 'true'); document.body.classList.remove('menu-is-open'); if (lastFocus) lastFocus.focus(); };
  const openDrawer = (button) => { if (!drawer) return; lastFocus = button; drawer.classList.add('is-open'); drawer.setAttribute('aria-hidden', 'false'); document.body.classList.add('menu-is-open'); closeButton && closeButton.focus(); };
  menuButtons.forEach((button) => button.addEventListener('click', () => drawer && drawer.classList.contains('is-open') ? closeDrawer() : openDrawer(button)));
  closeButton && closeButton.addEventListener('click', closeDrawer);
  drawer && drawer.addEventListener('click', (event) => { if (event.target === drawer) closeDrawer(); if (event.target.closest('a')) closeDrawer(); });
  document.querySelectorAll('.primary-nav, .mobile-drawer nav').forEach(setSubmenus);
  document.addEventListener('keydown', (event) => { if (event.key === 'Escape') closeDrawer(); });
  window.addEventListener('resize', () => { if (window.innerWidth > 900) closeDrawer(); });
})();
