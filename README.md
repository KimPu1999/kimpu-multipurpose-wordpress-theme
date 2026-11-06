# KimPu Multipurpose — Phase 5

KimPu Multipurpose is a classic PHP WordPress theme for professional personal, business, editorial, content-led, and WooCommerce storefront sites. Version 1.6.0 adds conservative SEO fallbacks, performance-aware asset and image loading, accessibility improvements, and administrator-only diagnostics while preserving the Phase 1 homepage, Phase 2 header/footer/navigation, Phase 3 Homepage Builder, Phase 4 editorial blog, Phase 5 design system, and Phase 6 WooCommerce layer.

## SEO, performance, and accessibility

The theme uses native document titles and does not replace SEO plugins. When Yoast SEO, Rank Math, or All in One SEO is detected, the theme suppresses its fallback description, Open Graph, Twitter, schema, and breadcrumb output to avoid competing metadata. Without an SEO plugin, it provides conservative fallback metadata, Organization/WebSite/BlogPosting schema where appropriate, and optional accessible breadcrumbs.

Theme scripts are loaded in the footer and receive a deferred loading strategy where safe. Page-specific blog, homepage, WooCommerce, and template assets remain conditional. The configured hero image may be preloaded as the likely LCP candidate; below-the-fold sections use progressive rendering hints where supported. WordPress remains responsible for responsive image `srcset`, media sizes, lazy loading, and image alt text.

Use Tools → KimPu Diagnostics as an administrator for read-only environment checks including WordPress/PHP/theme versions, WooCommerce availability, object-cache detection, debug mode, and missing core theme assets. The diagnostics page does not expose customer data or fabricate performance scores.

## WooCommerce integration

WooCommerce is optional. When active, the theme adds responsive shop, category, product, cart, checkout, and account styling without replacing WooCommerce's commerce engine. Product prices, variations, stock, taxes, shipping, coupons, payments, and orders remain authoritative in WooCommerce.

Use Appearance → Customize → KimPu WooCommerce Design to choose shop layouts, product card presentation, single-product layout, account styling, header cart visibility, and optional homepage product sections. The homepage product sections use real published WooCommerce products and remain hidden unless enabled and populated.

The theme supports native WooCommerce product queries, classic templates, WooCommerce Blocks styling, variable products, product filters, the native cart fragment mechanism, and optional wishlist presentation only when a supported wishlist plugin is already active. No plugin is installed or activated by the theme.

If WooCommerce is inactive, all WooCommerce PHP, assets, templates, and homepage sections safely become no-ops and the rest of the theme remains available.

## Global Design Builder

The **KimPu Global Design** panel provides validated design presets, global color tokens, system-safe typography, layout widths, button and form styling, spacing and radius controls, responsive values, and Light/Dark/System color modes. The five presets are Premium Emerald, Corporate Blue, Elegant Purple, Warm Orange, and Minimal Neutral. Choose **Custom values** when individual controls should take precedence over a preset.

The frontend mode switcher is available in the desktop header and mobile navigation. It follows the configured System Preference by default, stores a visitor’s explicit light/dark choice in browser storage when available, and falls back cleanly when storage is blocked. It does not alter images or inject arbitrary CSS.

Global settings compile into safe CSS custom properties shared by the Header Builder, Footer Builder, Homepage Builder, Blog, archives, page templates, forms, cards, buttons, and Gutenberg-aligned content. Header/Footer component colors remain explicit overrides. The editor palette and content widths in `theme.json` are aligned with the default frontend tokens; Customizer-only values update the editor after an editor refresh.

## Requirements and installation

- WordPress 6.6 or newer
- PHP 7.4 or newer

Use the existing theme directory or your normal WordPress theme deployment process, activate the theme, assign Primary and Footer Navigation menus, and configure it under **Appearance → Customize**. No ZIP or separate plugin is required for Phase 4.

## Blog and content system

The **KimPu Blog Settings** panel provides Grid, List, and Magazine listing layouts; featured article presentation; configurable card metadata; sidebar position and width; single-post layout options; table of contents; reading progress; author box; social sharing; related posts; archive presentation; and reading-speed settings.

Blog pages use native WordPress Posts, Categories, Tags, Authors, Search, Excerpts, Featured Images, Gutenberg content, revisions, scheduling, sticky posts, and comments. Category, tag, author, and search archives use the WordPress main query with reusable pagination. No custom SQL, editorial CPT, role changes, or private user metadata are introduced.

Single posts support full-width, content-plus-sidebar, and narrow-reading layouts, updated dates, reading time, responsive featured images, optional H2/H3 TOC, progress bar, copy-link sharing, author box, related posts, adjacent navigation, tags, and comments.

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

## Phase 1–3 compatibility

Header Builder, Footer Builder, Social Links, navigation menus, sticky headers, mobile navigation, footer widgets, existing hero setting IDs, Homepage Builder sections, page templates, comments, and editor styles remain available. The blog renderer reuses the existing header and footer automatically.

## Troubleshooting

- Assign a menu to Primary Navigation and Footer Navigation under **Appearance → Menus**.
- For Services, Testimonials, or Team, select a published parent Page and create published child Pages beneath it.
- For Portfolio, publish Posts and optionally assign the selected category.
- If Customizer changes are not visible, clear site/page-cache plugins and reload.
- Add widgets to **Appearance → Widgets → Blog Sidebar** and enable the sidebar in **KimPu Blog Settings** to display it.
- Theme forms are not implemented; add a trusted form plugin/block in a Contact Page or Contact source Page. The theme does not include an insecure mail handler.
- If a preset appears to ignore an individual color, switch **Design Preset** to **Custom values**; preset mode intentionally provides the active palette as an explicit visual choice.
- If a saved mode does not appear, check browser storage permissions. The site still follows the administrator’s configured Light/Dark/System default without storage.

## Developer checks

```sh
find . -type f -name '*.php' -print0 | xargs -0 -n1 php -l
find assets/js -type f -name '*.js' -print0 | xargs -0 -n1 node --check
```

## Changelog

See [CHANGELOG.md](CHANGELOG.md).

GPL v2 or later. No third-party assets are bundled.
