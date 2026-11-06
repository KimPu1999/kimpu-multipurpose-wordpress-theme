# Security

The theme uses WordPress escaping and sanitization APIs, validated Customizer allowlists, native WordPress/WooCommerce queries, capability checks for diagnostics, and no custom public AJAX or REST endpoints. WooCommerce order data is accessed through WooCommerce APIs when available; the theme does not query order tables directly.

The administrator-only diagnostics page is read-only and does not expose customer data or performance scores. The theme does not process payments, store card data, install plugins, or modify WordPress core.

Run WordPress core, plugin, PHP, and server security updates through the site’s normal maintenance process. Review third-party plugins and server configuration separately; theme-level checks cannot prove whole-site security.
