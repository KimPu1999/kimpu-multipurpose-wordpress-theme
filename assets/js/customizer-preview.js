(function (api) {
  'use strict';
  if (!api) { return; }
  var variables = {
    kimpu_primary_color: '--km-primary', kimpu_text_color: '--km-text', kimpu_background_color: '--km-background', kimpu_design_primary_hover: '--km-primary-hover', kimpu_design_secondary: '--km-secondary', kimpu_design_accent: '--km-accent', kimpu_design_heading: '--km-heading', kimpu_design_muted: '--km-muted', kimpu_design_link: '--km-link', kimpu_design_link_hover: '--km-link-hover', kimpu_design_surface: '--km-surface', kimpu_design_card: '--km-card', kimpu_design_border: '--km-border', kimpu_design_focus_ring: '--km-focus-ring', kimpu_design_button_radius: '--km-button-radius', kimpu_button_radius: '--km-button-radius', kimpu_container_width: '--km-container', kimpu_design_section_spacing: '--km-section-spacing', kimpu_design_card_padding: '--km-card-padding', kimpu_design_grid_gap: '--km-grid-gap', kimpu_design_body_size: '--km-body-size', kimpu_design_h1: '--km-h1', kimpu_design_h2: '--km-h2', kimpu_design_h3: '--km-h3', kimpu_design_h4: '--km-h4', kimpu_design_h5: '--km-h5', kimpu_design_h6: '--km-h6'
  };
  Object.keys(variables).forEach(function (settingId) {
    if (!api(settingId)) { return; }
    api(settingId, function (setting) {
      setting.bind(function (value) {
        var property = variables[settingId];
        var numeric = ['kimpu_button_radius', 'kimpu_container_width', 'kimpu_design_section_spacing', 'kimpu_design_card_padding', 'kimpu_design_grid_gap', 'kimpu_design_body_size', 'kimpu_design_h1', 'kimpu_design_h2', 'kimpu_design_h3', 'kimpu_design_h4', 'kimpu_design_h5', 'kimpu_design_h6'];
        document.documentElement.style.setProperty(property, numeric.indexOf(settingId) !== -1 ? value + 'px' : value);
      });
    });
  });
}(window.wp && window.wp.customize));
