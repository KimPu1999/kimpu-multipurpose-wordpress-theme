(function () {
  'use strict';
  document.addEventListener('keydown', function (event) {
    if (event.key === 'Tab') { document.documentElement.classList.add('kimpu-keyboard-user'); }
  }, { once: true });
}());
