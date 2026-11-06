(function (api) {
  'use strict';
  if (!api) { return; }
  document.addEventListener('click', function (event) {
    var button = event.target.closest('[data-kimpu-reset-design]');
    if (!button || !window.confirm('Reset KimPu design values to the safe defaults?')) { return; }
    if (api.settings && api.settings.capabilities && api.settings.capabilities.publish === false) { return; }
    var values;
    try { values = JSON.parse(button.getAttribute('data-kimpu-reset-values') || '{}'); } catch (error) { return; }
    Object.keys(values).forEach(function (settingId) {
      var setting = api(settingId);
      if (setting) { setting.set(values[settingId]); }
    });
  });
}(window.wp && window.wp.customize));
