# Testing

Available local checks:

```sh
find . -type f -name '*.php' -print0 | xargs -0 -n1 php -l
find assets/js -type f -name '*.js' -print0 | xargs -0 -n1 node --check
git diff --check
```

The Phase 8 audit also checks include references, asset references, duplicate function names, Customizer registration through the repository harness, JSON validity, and security-sensitive primitive usage.

PHPCS/WordPress Coding Standards, WP-CLI, PHPUnit, browser/axe, Playwright, Lighthouse, and a live WooCommerce installation were unavailable in the current environment. No Lighthouse, Core Web Vitals, browser, or WooCommerce result is claimed here.
