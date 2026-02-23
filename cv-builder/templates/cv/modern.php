<?php
/**
 * Template: Modern – clean blue accent, two-column layout.
 */
defined( 'ABSPATH' ) || exit;

$p   = $data['personal'] ?? [];
$exp = $data['experience'] ?? [];
$edu = $data['education'] ?? [];
$sk  = $data['skills'] ?? [];
$int = $data['interests'] ?? [];
?>
<div class="cvt cvt-modern">
    <div class="cvt-modern__sidebar">
        <?php if ( ! empty( $p['photo_url'] ) ) : ?>
            <div class="cvt-modern__avatar">
                <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="" />
            </div>
        <?php endif; ?>

        <div class="cvt-modern__sidebar-section">
            <h3>Kontakt</h3>
            <?php if ( ! empty( $p['email'] ) ) : ?>
                <p class="cvt-modern__contact-item"><?php echo esc_html( $p['email'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $p['phone'] ) ) : ?>
                <p class="cvt-modern__contact-item"><?php echo esc_html( $p['phone'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $p['address'] ) ) : ?>
                <p class="cvt-modern__contact-item"><?php echo esc_html( $p['address'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $p['linkedin'] ) ) : ?>
                <p class="cvt-modern__contact-item"><?php echo esc_html( $p['linkedin'] ); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $sk['hard'] ) ) : ?>
            <div class="cvt-modern__sidebar-section">
                <h3>Umiejętności</h3>
                <div class="cvt-modern__tags">
                    <?php foreach ( $sk['hard'] as $s ) : ?>
                        <span class="cvt-modern__tag"><?php echo esc_html( $s ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $sk['languages'] ) ) : ?>
            <div class="cvt-modern__sidebar-section">
                <h3>Języki</h3>
                <?php foreach ( $sk['languages'] as $l ) : ?>
                    <p class="cvt-modern__lang"><?php echo esc_html( $l['name'] ); ?> <span><?php echo esc_html( $l['level'] ); ?></span></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $sk['soft'] ) ) : ?>
            <div class="cvt-modern__sidebar-section">
                <h3>Soft skills</h3>
                <ul class="cvt-modern__list">
                    <?php foreach ( $sk['soft'] as $s ) : ?>
                        <li><?php echo esc_html( $s ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <div class="cvt-modern__main">
        <header class="cvt-modern__header">
            <h1><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
            <?php if ( ! empty( $p['job_title'] ) ) : ?>
                <p class="cvt-modern__subtitle"><?php echo esc_html( $p['job_title'] ); ?></p>
            <?php endif; ?>
        </header>

        <?php if ( ! empty( $p['summary'] ) ) : ?>
            <section class="cvt-modern__section">
                <h2>Profil zawodowy</h2>
                <p><?php echo esc_html( $p['summary'] ); ?></p>
            </section>
        <?php endif; ?>

        <?php if ( ! empty( $exp ) ) : ?>
            <section class="cvt-modern__section">
                <h2>Doświadczenie</h2>
                <?php foreach ( $exp as $e ) : ?>
                    <div class="cvt-modern__entry">
                        <div class="cvt-modern__entry-header">
                            <strong><?php echo esc_html( $e['position'] ); ?></strong>
                            <span class="cvt-modern__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?></span>
                        </div>
                        <p class="cvt-modern__company"><?php echo esc_html( $e['company'] ); ?></p>
                        <?php if ( ! empty( $e['description'] ) ) : ?>
                            <p class="cvt-modern__desc"><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <?php if ( ! empty( $edu ) ) : ?>
            <section class="cvt-modern__section">
                <h2>Wykształcenie</h2>
                <?php foreach ( $edu as $e ) : ?>
                    <div class="cvt-modern__entry">
                        <div class="cvt-modern__entry-header">
                            <strong><?php echo esc_html( $e['school'] ); ?></strong>
                            <span class="cvt-modern__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></span>
                        </div>
                        <p><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <?php if ( ! empty( $int ) ) : ?>
            <section class="cvt-modern__section">
                <h2>Zainteresowania</h2>
                <p><?php echo esc_html( implode( ', ', $int ) ); ?></p>
            </section>
        <?php endif; ?>

        <?php if ( ! empty( $data['rodo'] ) ) : ?>
            <footer class="cvt-modern__footer">
                <small>Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
            </footer>
        <?php endif; ?>
    </div>
</div>
