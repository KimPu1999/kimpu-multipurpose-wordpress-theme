# KimPu Multipurpose — Phase 4

KimPu Multipurpose is a classic PHP WordPress theme for professional personal, business, editorial, and content-led sites. Version 1.3.0 adds a native editorial blog and content-management presentation system while preserving the Phase 1 homepage, Phase 2 header/footer/navigation, and Phase 3 Homepage Builder.

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

## Developer checks

```sh
find . -type f -name '*.php' -print0 | xargs -0 -n1 php -l
find assets/js -type f -name '*.js' -print0 | xargs -0 -n1 node --check
```

## Changelog

See [CHANGELOG.md](CHANGELOG.md).

GPL v2 or later. No third-party assets are bundled.
