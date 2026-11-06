# Deployment

Deploy only after staging verification. Confirm a backup, PHP/WordPress requirements, HTTPS, file permissions, active plugins, cache exclusions for cart/checkout/account pages, and debug settings before activation.

For rollback, disable the theme and restore the previously tested theme files. Do not reset the database or remove Customizer, post, media, WooCommerce, or customer data. Clear page/CDN caches after a successful theme update.

Do not enable `WP_DEBUG_DISPLAY` on production. Review server and WordPress logs privately during staging tests, then return production logging to the site’s approved operational policy.
