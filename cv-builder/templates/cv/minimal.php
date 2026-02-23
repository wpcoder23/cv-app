<?php
/**
 * Template: Minimal – ultra clean, maximum whitespace, single column, thin gray borders.
 *
 * @var array $data Sanitized CV data.
 */
defined( 'ABSPATH' ) || exit;

$p   = $data['personal'] ?? [];
$exp = $data['experience'] ?? [];
$edu = $data['education'] ?? [];
$sk  = $data['skills'] ?? [];
$int = $data['interests'] ?? [];
?>
<div class="cvt cvt-minimal">
    <header class="cvt-minimal__header">
        <?php if ( ! empty( $p['photo_url'] ) ) : ?>
            <div class="cvt-minimal__avatar">
                <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="<?php echo esc_attr( $p['first_name'] ); ?>" />
            </div>
        <?php endif; ?>
        <h1 class="cvt-minimal__name"><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
        <?php if ( ! empty( $p['job_title'] ) ) : ?>
            <p class="cvt-minimal__title"><?php echo esc_html( $p['job_title'] ); ?></p>
        <?php endif; ?>
        <div class="cvt-minimal__contact">
            <?php if ( ! empty( $p['email'] ) ) : ?>
                <span class="cvt-minimal__contact-item"><?php echo esc_html( $p['email'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['phone'] ) ) : ?>
                <span class="cvt-minimal__contact-item"><?php echo esc_html( $p['phone'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['address'] ) ) : ?>
                <span class="cvt-minimal__contact-item"><?php echo esc_html( $p['address'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['linkedin'] ) ) : ?>
                <span class="cvt-minimal__contact-item"><?php echo esc_html( $p['linkedin'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['website'] ) ) : ?>
                <span class="cvt-minimal__contact-item"><?php echo esc_html( $p['website'] ); ?></span>
            <?php endif; ?>
        </div>
    </header>

    <?php if ( ! empty( $p['summary'] ) ) : ?>
        <section class="cvt-minimal__section">
            <h2 class="cvt-minimal__section-title">O mnie</h2>
            <p class="cvt-minimal__text"><?php echo nl2br( esc_html( $p['summary'] ) ); ?></p>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $exp ) ) : ?>
        <section class="cvt-minimal__section">
            <h2 class="cvt-minimal__section-title">Doświadczenie zawodowe</h2>
            <?php foreach ( $exp as $e ) : ?>
                <div class="cvt-minimal__entry">
                    <p class="cvt-minimal__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?></p>
                    <h3 class="cvt-minimal__position"><?php echo esc_html( $e['position'] ); ?></h3>
                    <p class="cvt-minimal__company"><?php echo esc_html( $e['company'] ); ?></p>
                    <?php if ( ! empty( $e['description'] ) ) : ?>
                        <p class="cvt-minimal__desc"><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $edu ) ) : ?>
        <section class="cvt-minimal__section">
            <h2 class="cvt-minimal__section-title">Wykształcenie</h2>
            <?php foreach ( $edu as $e ) : ?>
                <div class="cvt-minimal__entry">
                    <p class="cvt-minimal__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></p>
                    <h3 class="cvt-minimal__position"><?php echo esc_html( $e['school'] ); ?></h3>
                    <?php if ( ! empty( $e['degree'] ) || ! empty( $e['field'] ) ) : ?>
                        <p class="cvt-minimal__company"><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $sk['hard'] ) || ! empty( $sk['soft'] ) || ! empty( $sk['languages'] ) ) : ?>
        <section class="cvt-minimal__section">
            <h2 class="cvt-minimal__section-title">Umiejętności</h2>
            <?php if ( ! empty( $sk['hard'] ) ) : ?>
                <div class="cvt-minimal__skill-group">
                    <h4 class="cvt-minimal__skill-label">Techniczne</h4>
                    <p class="cvt-minimal__skill-list"><?php echo esc_html( implode( ', ', $sk['hard'] ) ); ?></p>
                </div>
            <?php endif; ?>
            <?php if ( ! empty( $sk['soft'] ) ) : ?>
                <div class="cvt-minimal__skill-group">
                    <h4 class="cvt-minimal__skill-label">Miękkie</h4>
                    <p class="cvt-minimal__skill-list"><?php echo esc_html( implode( ', ', $sk['soft'] ) ); ?></p>
                </div>
            <?php endif; ?>
            <?php if ( ! empty( $sk['languages'] ) ) : ?>
                <div class="cvt-minimal__skill-group">
                    <h4 class="cvt-minimal__skill-label">Języki</h4>
                    <p class="cvt-minimal__skill-list">
                        <?php
                        $langs = array_map( function ( $l ) {
                            return esc_html( $l['name'] ) . ' – ' . esc_html( $l['level'] );
                        }, $sk['languages'] );
                        echo implode( ', ', $langs );
                        ?>
                    </p>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $int ) ) : ?>
        <section class="cvt-minimal__section">
            <h2 class="cvt-minimal__section-title">Zainteresowania</h2>
            <p class="cvt-minimal__text"><?php echo esc_html( implode( ', ', $int ) ); ?></p>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $data['rodo'] ) ) : ?>
        <footer class="cvt-minimal__footer">
            <small>Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
        </footer>
    <?php endif; ?>
</div>
