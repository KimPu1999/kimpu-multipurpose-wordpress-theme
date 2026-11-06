(function () {
    'use strict';
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.woocommerce-cart-form .qty').forEach(function (input) {
            input.setAttribute('inputmode', 'numeric');
        });
    });
}());
