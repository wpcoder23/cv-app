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
                    <span class="payment-badge">BLIK</span>
                    <span class="payment-badge">Visa</span>
                    <span class="payment-badge">Mastercard</span>
                    <span class="payment-badge">Przelewy24</span>
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
