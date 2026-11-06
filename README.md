# KimPu Multipurpose — Phase 2

KimPu Multipurpose is a classic PHP WordPress theme for professional personal, business, and editorial sites. Version 1.1.0 adds a customizable header and footer builder while preserving the Phase 1 homepage, blog, search, archive, comments, and editor features.

## System requirements

- WordPress 6.6 or newer
- PHP 7.4 or newer
- A modern browser with JavaScript enabled for the mobile drawer and interactive dropdown controls

## Installation

1. In WordPress, open **Appearance → Themes → Add New → Upload Theme**.
2. Upload `kimpu-multipurpose-phase2.zip`, install it, and activate it.
3. Set the site logo under **Appearance → Customize → Site Identity**.
4. Create menus under **Appearance → Menus** and assign Primary Navigation and Footer Navigation.
5. Configure the builder under **Appearance → Customize**.

## Header Builder

**Header Builder** provides Default, Centered, and Minimal layouts; header colors; height; container width; border and shadow; sticky behavior; CTA label/URL; search; and the Drawer or Dropdown mobile menu style. Nested menu items receive accessible submenu buttons and work with mouse, touch, keyboard focus, and Escape.

## Footer Builder

**Footer Builder** provides Default four-column, Centered, and Minimal layouts; description, copyright text, colors, border, logo visibility, social visibility, and contact fields. Footer widget areas are available as Footer Column 1 through Footer Column 4 under **Appearance → Widgets**. Footer Navigation can be used for quick links, legal links, privacy, and terms.

## Social Links

Enter URLs under **Appearance → Customize → Social Links** for Facebook, Instagram, YouTube, LinkedIn, X, TikTok, GitHub, and WhatsApp. Empty URLs are not rendered. Links use inline SVG icons, accessible labels, and safe external-link attributes.

## Responsive behavior

The theme uses responsive containers and a slide-in mobile navigation drawer at widths below 900px. The drawer supports nested menu expansion, overlay closing, Escape, focus restoration, scroll locking, reduced motion, and the optional dropdown mobile style. The layout is designed for 320px through wide desktop screens.

## Troubleshooting

- If menus do not appear, assign a menu to the correct theme location under **Appearance → Menus**.
- If a footer column is empty, add a widget or assign the Footer Navigation menu.
- If Customizer changes do not appear, clear any page/cache plugin cache and reload the page.
- Sticky headers account for the WordPress admin bar when it is visible.

## Developer checks

```sh
find . -type f -name '*.php' -print0 | xargs -0 -n1 php -l
find assets/js -type f -name '*.js' -print0 | xargs -0 -n1 node --check
```

## Changelog

### 1.1.0

- Added selectable header and footer layouts.
- Added Customizer sections for Header Builder, Footer Builder, Social Links, and Global Design.
- Added nested accessible navigation, mobile drawer/dropdown behavior, sticky header support, footer widgets, inline social icons, and expanded design tokens.
- Preserved Phase 1 templates, homepage settings, menus, editor styles, and content cards.

GPL v2 or later. No third-party assets are bundled.
