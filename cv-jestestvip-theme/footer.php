</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="footer-brand">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                    </svg>
                    <span>CV Builder</span>
                </div>
                <p class="footer-desc">Profesjonalne CV w kilka minut. Stwórz, edytuj i pobierz w PDF, JPG lub PNG.</p>
            </div>

            <div class="footer-col">
                <h4>Produkt</h4>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/#jak-to-dziala' ) ); ?>">Jak to działa</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#szablony' ) ); ?>">Szablony</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#cennik' ) ); ?>">Cennik</a></li>
                    <li><a href="<?php echo esc_url( cvl_get_app_url() ); ?>">Stwórz CV</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Informacje</h4>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">FAQ</a></li>
                    <li><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Polityka prywatności</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/regulamin/' ) ); ?>">Regulamin</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Płatności</h4>
                <div class="footer-payments">
                    <span class="payment-badge payment-badge--blik">
                        <svg viewBox="0 0 62 32" width="46" height="24" xmlns="http://www.w3.org/2000/svg">
                            <rect width="62" height="32" rx="4" fill="#000"/>
                            <circle cx="12" cy="16" r="5.5" fill="#E6186C"/>
                            <circle cx="12" cy="16" r="2.5" fill="#fff"/>
                            <text x="22" y="21" fill="#fff" font-family="Arial,sans-serif" font-weight="700" font-size="14" letter-spacing="0.5">BLIK</text>
                        </svg>
                    </span>
                    <span class="payment-badge payment-badge--visa">
                        <svg viewBox="0 0 48 32" width="36" height="24" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="32" rx="4" fill="#1A1F71"/>
                            <text x="24" y="21" fill="#fff" font-family="Arial,sans-serif" font-weight="700" font-size="13" text-anchor="middle" font-style="italic">VISA</text>
                        </svg>
                    </span>
                    <span class="payment-badge payment-badge--mc">
                        <svg viewBox="0 0 48 32" width="36" height="24" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="32" rx="4" fill="#fff" stroke="#e5e7eb"/>
                            <circle cx="19" cy="16" r="9" fill="#EB001B" opacity="0.9"/>
                            <circle cx="29" cy="16" r="9" fill="#F79E1B" opacity="0.9"/>
                            <path d="M24 9.2a9 9 0 000 13.6 9 9 0 000-13.6z" fill="#FF5F00"/>
                        </svg>
                    </span>
                    <span class="payment-badge payment-badge--p24">
                        <svg viewBox="0 0 48 32" width="36" height="24" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="32" rx="4" fill="#fff" stroke="#e5e7eb"/>
                            <text x="24" y="20" fill="#D40E2F" font-family="Arial,sans-serif" font-weight="700" font-size="9" text-anchor="middle">P24</text>
                        </svg>
                    </span>
                </div>
                <p class="footer-secure">Bezpieczne płatności przez Stripe</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> CV Builder. Wszelkie prawa zastrzeżone.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
