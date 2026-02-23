# CV Builder – WordPress Plugin SaaS

Professional CV Builder as a WordPress plugin with one-time payment via Stripe (BLIK, card, P24 transfer).

## Features

- **10 CV Templates** – Classic, Modern, Creative, Minimal, Professional, Executive, Tech, Academic, Bold, Nordic
- **Live CV Editor** – Multi-step form with real-time preview
- **Export** – PDF, JPG, PNG downloads
- **Stripe Payments** – BLIK, card, Przelewy24, one-time payment for 30-day access
- **Social Login** – Google, Facebook, LinkedIn (OAuth 2.0)
- **Data Import** – Auto-fill CV from social profiles
- **GDPR/RODO** – Compliant data handling, consent checkbox
- **REST API** – Full WP REST API integration, no admin-ajax
- **Security** – Token-based anonymous sessions, webhook signature verification, nonce validation
- **No WooCommerce** – Standalone payment system
- **No subscriptions** – One-time payment model

## Installation

1. Upload `cv-builder/` folder to `/wp-content/plugins/`
2. Activate the plugin in WordPress admin
3. Go to **CV Builder → Settings** and configure:
   - Stripe API keys (test/live)
   - Stripe webhook secret
   - Price and access duration
   - Social auth credentials (optional)
4. Create a page with the shortcode: `[cv_builder]`
5. Set up Stripe webhook pointing to: `https://yourdomain.com/cvb-stripe-webhook`

## Stripe Webhook Events

Subscribe to these events in Stripe dashboard:
- `checkout.session.completed`
- `checkout.session.expired`

## Requirements

- WordPress 6.0+
- PHP 8.0+
- Stripe account
- SSL certificate (required for Stripe)

## Tech Stack

- PHP 8+ OOP
- WordPress REST API
- Stripe Checkout Sessions
- html2canvas + jsPDF (client-side export)
- Vanilla JS (no frameworks)
- Custom CSS (no Tailwind build step needed)

## Price

Default: **29,00 zł** for 30 days of access. Configurable in admin panel.

## License

GPL v2 or later
