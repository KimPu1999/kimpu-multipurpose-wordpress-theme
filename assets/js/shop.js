(function () {
    'use strict';
    document.querySelectorAll('.km-wc-product-filter details').forEach(function (details) {
        details.addEventListener('toggle', function () {
            details.closest('.km-wc-product-filter').classList.toggle('is-open', details.open);
        });
    });
}());
