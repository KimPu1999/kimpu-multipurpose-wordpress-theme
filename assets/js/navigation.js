(function () {
  'use strict';

  var drawer = document.querySelector('#mobile-drawer');
  var panel = drawer ? drawer.querySelector('.mobile-drawer-panel') : null;
  var menuButtons = document.querySelectorAll('.menu-toggle');
  var closeButton = drawer ? drawer.querySelector('.mobile-drawer-close') : null;
  var lastFocus = null;
  var focusableSelector = 'a[href],button:not([disabled]),input:not([disabled]),select:not([disabled]),textarea:not([disabled]),[tabindex]:not([tabindex="-1"])';

  function setSubmenuState(item, open) {
    var toggle = item.querySelector(':scope > .submenu-toggle');
    item.classList.toggle('is-submenu-open', open);
    if (toggle) {
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', (open ? 'Collapse ' : 'Expand ') + ((item.querySelector(':scope > a') || {}).textContent || '') + ' submenu');
    }
  }

  document.querySelectorAll('.primary-nav, .mobile-drawer nav').forEach(function (root) {
    root.addEventListener('click', function (event) {
      var toggle = event.target.closest('.submenu-toggle');
      if (!toggle || !root.contains(toggle)) { return; }
      var item = toggle.closest('.menu-item-has-children');
      if (!item) { return; }
      event.preventDefault();
      event.stopPropagation();
      setSubmenuState(item, !item.classList.contains('is-submenu-open'));
    });
  });

  function closeDrawer() {
    if (!drawer) { return; }
    drawer.classList.remove('is-open');
    drawer.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('menu-is-open');
    drawer.querySelectorAll('.menu-item-has-children.is-submenu-open').forEach(function (item) {
      setSubmenuState(item, false);
    });
    if (lastFocus) { lastFocus.focus(); }
  }

  function openDrawer(button) {
    if (!drawer) { return; }
    lastFocus = button;
    drawer.classList.add('is-open');
    drawer.setAttribute('aria-hidden', 'false');
    document.body.classList.add('menu-is-open');
    if (closeButton) { closeButton.focus(); }
  }

  menuButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      if (!drawer) { return; }
      var isOpen = drawer.classList.contains('is-open');
      button.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
      if (isOpen) { closeDrawer(); } else { openDrawer(button); }
    });
  });

  if (closeButton) { closeButton.addEventListener('click', closeDrawer); }
  if (drawer) {
    drawer.addEventListener('click', function (event) {
      if (event.target === drawer) { closeDrawer(); }
      if (event.target.closest('a') && !event.target.closest('.submenu-toggle')) { closeDrawer(); }
    });
  }

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      if (drawer && drawer.classList.contains('is-open')) { closeDrawer(); return; }
      document.querySelectorAll('.primary-nav .menu-item-has-children.is-submenu-open').forEach(function (item) {
        setSubmenuState(item, false);
      });
    }

    if (event.key !== 'Tab' || !drawer || !drawer.classList.contains('is-open') || !panel) { return; }
    var focusable = Array.prototype.slice.call(panel.querySelectorAll(focusableSelector));
    if (!focusable.length) { return; }
    var first = focusable[0];
    var last = focusable[focusable.length - 1];
    if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
    else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
  });

  window.addEventListener('resize', function () {
    if (window.innerWidth > 900 && drawer && drawer.classList.contains('is-open')) { closeDrawer(); }
  }, { passive: true });
}());
