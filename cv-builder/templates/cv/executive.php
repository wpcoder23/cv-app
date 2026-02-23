<?php
/**
 * Template: Executive – elegant serif-inspired layout, centered header, subtle gray backgrounds,
 *                       horizontal rules between sections.
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
<div class="cvt cvt-executive">
    <header class="cvt-executive__header">
        <?php if ( ! empty( $p['photo_url'] ) ) : ?>
            <div class="cvt-executive__avatar">
                <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="<?php echo esc_attr( $p['first_name'] ); ?>" />
            </div>
        <?php endif; ?>
        <h1 class="cvt-executive__name"><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
        <?php if ( ! empty( $p['job_title'] ) ) : ?>
            <p class="cvt-executive__title"><?php echo esc_html( $p['job_title'] ); ?></p>
        <?php endif; ?>
        <div class="cvt-executive__contact">
            <?php if ( ! empty( $p['email'] ) ) : ?>
                <span class="cvt-executive__contact-item"><?php echo esc_html( $p['email'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['phone'] ) ) : ?>
                <span class="cvt-executive__contact-item"><?php echo esc_html( $p['phone'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['address'] ) ) : ?>
                <span class="cvt-executive__contact-item"><?php echo esc_html( $p['address'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['linkedin'] ) ) : ?>
                <span class="cvt-executive__contact-item">
                    <a href="<?php echo esc_url( $p['linkedin'] ); ?>"><?php echo esc_html( $p['linkedin'] ); ?></a>
                </span>
            <?php endif; ?>
            <?php if ( ! empty( $p['website'] ) ) : ?>
                <span class="cvt-executive__contact-item">
                    <a href="<?php echo esc_url( $p['website'] ); ?>"><?php echo esc_html( $p['website'] ); ?></a>
                </span>
            <?php endif; ?>
        </div>
    </header>

    <hr class="cvt-executive__divider" />

    <?php if ( ! empty( $p['summary'] ) ) : ?>
        <section class="cvt-executive__section">
            <h2 class="cvt-executive__section-title">O mnie</h2>
            <p class="cvt-executive__text"><?php echo nl2br( esc_html( $p['summary'] ) ); ?></p>
        </section>
        <hr class="cvt-executive__divider" />
    <?php endif; ?>

    <?php if ( ! empty( $exp ) ) : ?>
        <section class="cvt-executive__section">
            <h2 class="cvt-executive__section-title">Doświadczenie zawodowe</h2>
            <?php foreach ( $exp as $idx => $e ) : ?>
                <div class="cvt-executive__entry">
                    <div class="cvt-executive__entry-head">
                        <h3 class="cvt-executive__position"><?php echo esc_html( $e['position'] ); ?></h3>
                        <span class="cvt-executive__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?></span>
                    </div>
                    <p class="cvt-executive__company"><?php echo esc_html( $e['company'] ); ?></p>
                    <?php if ( ! empty( $e['description'] ) ) : ?>
                        <p class="cvt-executive__desc"><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                    <?php endif; ?>
                </div>
                <?php if ( $idx < count( $exp ) - 1 ) : ?>
                    <hr class="cvt-executive__divider cvt-executive__divider--light" />
                <?php endif; ?>
            <?php endforeach; ?>
        </section>
        <hr class="cvt-executive__divider" />
    <?php endif; ?>

    <?php if ( ! empty( $edu ) ) : ?>
        <section class="cvt-executive__section">
            <h2 class="cvt-executive__section-title">Wykształcenie</h2>
            <?php foreach ( $edu as $idx => $e ) : ?>
                <div class="cvt-executive__entry">
                    <div class="cvt-executive__entry-head">
                        <h3 class="cvt-executive__position"><?php echo esc_html( $e['school'] ); ?></h3>
                        <span class="cvt-executive__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></span>
                    </div>
                    <?php if ( ! empty( $e['degree'] ) || ! empty( $e['field'] ) ) : ?>
                        <p class="cvt-executive__company"><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                    <?php endif; ?>
                </div>
                <?php if ( $idx < count( $edu ) - 1 ) : ?>
                    <hr class="cvt-executive__divider cvt-executive__divider--light" />
                <?php endif; ?>
            <?php endforeach; ?>
        </section>
        <hr class="cvt-executive__divider" />
    <?php endif; ?>

    <?php if ( ! empty( $sk['hard'] ) || ! empty( $sk['soft'] ) || ! empty( $sk['languages'] ) ) : ?>
        <section class="cvt-executive__section">
            <h2 class="cvt-executive__section-title">Umiejętności</h2>
            <div class="cvt-executive__skills-columns">
                <?php if ( ! empty( $sk['hard'] ) ) : ?>
                    <div class="cvt-executive__skills-col">
                        <h4 class="cvt-executive__skills-heading">Techniczne</h4>
                        <ul class="cvt-executive__skills-list">
                            <?php foreach ( $sk['hard'] as $s ) : ?>
                                <li><?php echo esc_html( $s ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if ( ! empty( $sk['soft'] ) ) : ?>
                    <div class="cvt-executive__skills-col">
                        <h4 class="cvt-executive__skills-heading">Miękkie</h4>
                        <ul class="cvt-executive__skills-list">
                            <?php foreach ( $sk['soft'] as $s ) : ?>
                                <li><?php echo esc_html( $s ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if ( ! empty( $sk['languages'] ) ) : ?>
                    <div class="cvt-executive__skills-col">
                        <h4 class="cvt-executive__skills-heading">Języki</h4>
                        <ul class="cvt-executive__skills-list">
                            <?php foreach ( $sk['languages'] as $l ) : ?>
                                <li><?php echo esc_html( $l['name'] ); ?> – <?php echo esc_html( $l['level'] ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <hr class="cvt-executive__divider" />
    <?php endif; ?>

    <?php if ( ! empty( $int ) ) : ?>
        <section class="cvt-executive__section">
            <h2 class="cvt-executive__section-title">Zainteresowania</h2>
            <p class="cvt-executive__text"><?php echo esc_html( implode( ', ', $int ) ); ?></p>
        </section>
        <hr class="cvt-executive__divider" />
    <?php endif; ?>

    <?php if ( ! empty( $data['rodo'] ) ) : ?>
        <footer class="cvt-executive__footer">
            <small>Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
        </footer>
    <?php endif; ?>
</div>
