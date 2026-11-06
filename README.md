# KimPu Multipurpose — Phase 3

KimPu Multipurpose is a classic PHP WordPress theme for professional personal, business, and editorial sites. Version 1.2.0 adds a native homepage builder and reusable page templates while preserving the Phase 1 content templates and Phase 2 header, footer, navigation, Customizer, and responsive systems.

## Requirements and installation

- WordPress 6.6 or newer
- PHP 7.4 or newer

Upload `kimpu-multipurpose-phase3.zip` under **Appearance → Themes → Add New → Upload Theme**, activate it, assign Primary and Footer Navigation menus, and configure the theme under **Appearance → Customize**.

## Homepage Builder

The **KimPu Homepage Builder** panel contains separate General Homepage, Hero, About, Services, Features, Portfolio, Statistics, Testimonials, Team, FAQ, Blog, CTA, and Contact sections. It configures twelve native theme sections:

- Hero
- About
- Services
- Features
- Portfolio
- Statistics
- Testimonials
- Team
- FAQ
- Latest Blog
- Call To Action
- Contact

Each section has visibility, title, subtitle, description, layout, background, and spacing controls. Section order accepts a validated comma-separated list of section slugs; missing or invalid values are safely appended. This is an ordered selector, not an unimplemented drag-and-drop control.

Homepage-specific styles are loaded from `assets/css/homepage.css` and `assets/css/page-templates.css`; the FAQ single-open option is handled by the dependency-free `assets/js/homepage.js` script.

The builder does not create demo records. About and Contact can read published Pages and Block Editor content. Services, Testimonials, and Team use published child Pages beneath a selected parent Page. Portfolio and Latest Blog use existing Posts. Features, Statistics, and FAQ use compact line-based settings with safe text/SVG registries and native `<details>` accordions.

## Hero and section content

Hero settings include split, centered, and full-width layouts; eyebrow, heading, description, buttons, colors, background/featured images, alt text, overlay opacity, alignment, and vertical spacing. The remaining sections support their documented layout variants, responsive grids, empty states, native responsive images, and reduced-motion-friendly presentation.

## Page templates

Available under the Page editor’s **Template** selector:

- Full Width Page
- No Sidebar Page
- Landing Page
- Blank Canvas Page
- About Page Layout
- Services Page Layout
- Portfolio Page Layout
- Contact Page Layout

The normal `page.php` remains the Default Page template. Landing pages can use independent header/footer layout selections. Blank Canvas pages retain WordPress head/footer hooks but intentionally omit theme navigation and footer chrome.

## Phase 2 compatibility

Header Builder, Footer Builder, Social Links, navigation menus, sticky headers, mobile navigation, footer widgets, existing hero setting IDs, blog templates, comments, and editor styles remain available. The homepage renderer reuses the existing header and footer automatically.

## Troubleshooting

- Assign a menu to Primary Navigation and Footer Navigation under **Appearance → Menus**.
- For Services, Testimonials, or Team, select a published parent Page and create published child Pages beneath it.
- For Portfolio, publish Posts and optionally assign the selected category.
- If Customizer changes are not visible, clear site/page-cache plugins and reload.
- Theme forms are not implemented; add a trusted form plugin/block in a Contact Page or Contact source Page. The theme does not include an insecure mail handler.

## Developer checks

```sh
find . -type f -name '*.php' -print0 | xargs -0 -n1 php -l
find assets/js -type f -name '*.js' -print0 | xargs -0 -n1 node --check
```

## Changelog

See [CHANGELOG.md](CHANGELOG.md).

GPL v2 or later. No third-party assets are bundled.
