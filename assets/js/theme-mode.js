(function () {
  'use strict';
  var root = document.documentElement;
  var i18n = window.kimpuThemeModeI18n || { dark: 'Use dark color theme', light: 'Use light color theme' };
  var storageKey = 'kimpu-theme-mode';
  var buttons = function () { return document.querySelectorAll('[data-kimpu-theme-toggle]'); };
  var saved = function () { try { return window.localStorage.getItem(storageKey); } catch (error) { return null; } };
  var store = function (value) { try { window.localStorage.setItem(storageKey, value); } catch (error) {} };
  var update = function (value, remember) {
    if (value !== 'light' && value !== 'dark' && value !== 'system') { value = root.getAttribute('data-theme') || 'system'; }
    root.setAttribute('data-theme', value);
    if (remember) { store(value); }
    buttons().forEach(function (button) {
      var next = value === 'dark' ? 'light' : 'dark';
      button.setAttribute('aria-pressed', value === 'dark' ? 'true' : 'false');
      button.setAttribute('aria-label', next === 'dark' ? i18n.dark : i18n.light);
      var label = button.querySelector('[data-kimpu-theme-label]');
      if (label) { label.textContent = next === 'dark' ? i18n.dark : i18n.light; }
    });
  };
  update(saved() || root.getAttribute('data-theme') || 'system', false);
  document.addEventListener('click', function (event) {
    var button = event.target.closest('[data-kimpu-theme-toggle]');
    if (!button) { return; }
    var current = root.getAttribute('data-theme') || 'system';
    update(current === 'dark' ? 'light' : 'dark', true);
  });
  var media = window.matchMedia ? window.matchMedia('(prefers-color-scheme: dark)') : null;
  if (media) {
    var follow = function () { if (!saved() && root.getAttribute('data-kimpu-theme-default') === 'system') { update('system', false); } };
    if (media.addEventListener) { media.addEventListener('change', follow); } else if (media.addListener) { media.addListener(follow); }
  }
}());
