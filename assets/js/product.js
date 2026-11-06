(function () {
    'use strict';
    var i18n = window.kimpuProductI18n || { increase: 'Increase quantity', decrease: 'Decrease quantity' };
    document.querySelectorAll('form.cart .quantity').forEach(function (quantity) {
        var input = quantity.querySelector('.qty');
        if (!input || quantity.querySelector('.km-quantity-button')) { return; }
        ['minus', 'plus'].forEach(function (direction) {
            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'km-quantity-button km-quantity-button--' + direction;
            button.setAttribute('aria-label', direction === 'plus' ? i18n.increase : i18n.decrease);
            button.textContent = direction === 'plus' ? '+' : '−';
            button.addEventListener('click', function () {
                var step = parseFloat(input.step) || 1;
                var min = input.min === '' ? 1 : parseFloat(input.min);
                var max = input.max === '' ? Infinity : parseFloat(input.max);
                var current = parseFloat(input.value) || min;
                input.value = String(Math.min(max, Math.max(min, current + (direction === 'plus' ? step : -step))));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            });
            quantity.insertBefore(button, direction === 'plus' ? null : input);
        });
    });
}());
