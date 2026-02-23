<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Stwórz profesjonalne CV w kilka minut. 10 szablonów, export PDF/JPG/PNG. Jednorazowa płatność 29 zł." />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <div class="container">
        <nav class="site-nav">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                </svg>
                <span>CV Builder</span>
            </a>

            <ul class="site-nav__links" id="nav-links">
                <li><a href="<?php echo esc_url( home_url( '/#jak-to-dziala' ) ); ?>">Jak to działa</a></li>
                <li><a href="<?php echo esc_url( home_url( '/#szablony' ) ); ?>">Szablony</a></li>
                <li><a href="<?php echo esc_url( home_url( '/#cennik' ) ); ?>">Cennik</a></li>
                <li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">FAQ</a></li>
            </ul>

            <div class="site-nav__actions">
                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( cvl_get_app_url() ); ?>" class="btn btn--primary">Moje CV</a>
                <?php else : ?>
                    <a href="<?php echo esc_url( cvl_get_app_url() ); ?>" class="btn btn--primary">Stwórz CV za darmo</a>
                <?php endif; ?>
            </div>

            <button class="site-nav__burger" id="nav-burger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </nav>
    </div>
</header>

<main class="site-main">
