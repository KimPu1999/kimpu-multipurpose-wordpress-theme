# KimPu Multipurpose — Phase 1

A working **classic PHP WordPress theme starter** with header/footer, responsive menu, home hero, blog listing, posts, pages, archives, search, 404, comments, palette, and a few Customizer options.

## Install
1. In WordPress Dashboard open **Appearance → Themes → Add New Theme → Upload Theme**.
2. Upload `kimpu-multipurpose-phase1.zip`, click Install and Activate.
3. Set logo via **Appearance → Customize → Site Identity** (if Customizer available).
4. Create menu via **Appearance → Menus** and assign it to **Primary Navigation**.
5. Visit **Appearance → Customize → Theme Design** to change the accent color and homepage hero content.
6. Optionally create Home and Blog pages, then go to **Settings → Reading** and assign a static homepage and a posts page.
7. Add some Posts, set featured images, and check desktop/mobile view.

## Files
- `style.css`: WordPress theme metadata
- `functions.php` and `inc/`: theme supports, assets, Customizer
- `theme.json`: editor color/typography presets
- `header.php`, `footer.php`: shared chrome
- `front-page.php`: hero, features, latest posts, optional static page content
- `index.php`, `home.php`, `single.php`, `page.php`, `archive.php`, `search.php`, `404.php`, `comments.php`: classic templates
- `assets/css/main.css`: responsive design system
- `assets/js/navigation.js`: mobile menu

## Phase 1 boundaries
Phase 1 is an installable foundation, **not** a finished general-purpose premium commercial theme. Additional layouts, full theme settings, complete localization, RTL support, WooCommerce styling, deeper accessibility audits, and multi-browser/integration tests are future phases.

## Developer checks
`find kimpu-multipurpose -name '*.php' -exec php -l {} \;`

GPL v2 or later. Third-party assets are intentionally not bundled.
