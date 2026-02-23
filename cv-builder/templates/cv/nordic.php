<?php
/**
 * Template: Nordic – light green/nature palette (#f0fdf4 background, #22c55e accents),
 *                    rounded cards, clean Scandinavian design, lots of padding.
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
<div class="cvt cvt-nordic">
    <header class="cvt-nordic__header">
        <?php if ( ! empty( $p['photo_url'] ) ) : ?>
            <div class="cvt-nordic__avatar">
                <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="<?php echo esc_attr( $p['first_name'] ); ?>" />
            </div>
        <?php endif; ?>
        <h1 class="cvt-nordic__name"><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
        <?php if ( ! empty( $p['job_title'] ) ) : ?>
            <p class="cvt-nordic__title"><?php echo esc_html( $p['job_title'] ); ?></p>
        <?php endif; ?>
        <div class="cvt-nordic__contact">
            <?php if ( ! empty( $p['email'] ) ) : ?>
                <span class="cvt-nordic__contact-item"><?php echo esc_html( $p['email'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['phone'] ) ) : ?>
                <span class="cvt-nordic__contact-item"><?php echo esc_html( $p['phone'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['address'] ) ) : ?>
                <span class="cvt-nordic__contact-item"><?php echo esc_html( $p['address'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['linkedin'] ) ) : ?>
                <span class="cvt-nordic__contact-item">
                    <a href="<?php echo esc_url( $p['linkedin'] ); ?>"><?php echo esc_html( $p['linkedin'] ); ?></a>
                </span>
            <?php endif; ?>
            <?php if ( ! empty( $p['website'] ) ) : ?>
                <span class="cvt-nordic__contact-item">
                    <a href="<?php echo esc_url( $p['website'] ); ?>"><?php echo esc_html( $p['website'] ); ?></a>
                </span>
            <?php endif; ?>
        </div>
    </header>

    <div class="cvt-nordic__grid">
        <div class="cvt-nordic__col-main">
            <?php if ( ! empty( $p['summary'] ) ) : ?>
                <div class="cvt-nordic__card">
                    <h2 class="cvt-nordic__section-title">O mnie</h2>
                    <p class="cvt-nordic__text"><?php echo nl2br( esc_html( $p['summary'] ) ); ?></p>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $exp ) ) : ?>
                <div class="cvt-nordic__card">
                    <h2 class="cvt-nordic__section-title">Doświadczenie zawodowe</h2>
                    <?php foreach ( $exp as $e ) : ?>
                        <div class="cvt-nordic__entry">
                            <div class="cvt-nordic__entry-header">
                                <h3 class="cvt-nordic__position"><?php echo esc_html( $e['position'] ); ?></h3>
                                <span class="cvt-nordic__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?></span>
                            </div>
                            <p class="cvt-nordic__company"><?php echo esc_html( $e['company'] ); ?></p>
                            <?php if ( ! empty( $e['description'] ) ) : ?>
                                <p class="cvt-nordic__desc"><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $edu ) ) : ?>
                <div class="cvt-nordic__card">
                    <h2 class="cvt-nordic__section-title">Wykształcenie</h2>
                    <?php foreach ( $edu as $e ) : ?>
                        <div class="cvt-nordic__entry">
                            <div class="cvt-nordic__entry-header">
                                <h3 class="cvt-nordic__position"><?php echo esc_html( $e['school'] ); ?></h3>
                                <span class="cvt-nordic__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></span>
                            </div>
                            <?php if ( ! empty( $e['degree'] ) || ! empty( $e['field'] ) ) : ?>
                                <p class="cvt-nordic__company"><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="cvt-nordic__col-side">
            <?php if ( ! empty( $sk['hard'] ) ) : ?>
                <div class="cvt-nordic__card">
                    <h2 class="cvt-nordic__section-title">Umiejętności techniczne</h2>
                    <div class="cvt-nordic__pills">
                        <?php foreach ( $sk['hard'] as $s ) : ?>
                            <span class="cvt-nordic__pill"><?php echo esc_html( $s ); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $sk['soft'] ) ) : ?>
                <div class="cvt-nordic__card">
                    <h2 class="cvt-nordic__section-title">Umiejętności miękkie</h2>
                    <ul class="cvt-nordic__list">
                        <?php foreach ( $sk['soft'] as $s ) : ?>
                            <li class="cvt-nordic__list-item"><?php echo esc_html( $s ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $sk['languages'] ) ) : ?>
                <div class="cvt-nordic__card">
                    <h2 class="cvt-nordic__section-title">Języki</h2>
                    <?php foreach ( $sk['languages'] as $l ) : ?>
                        <div class="cvt-nordic__lang">
                            <span class="cvt-nordic__lang-name"><?php echo esc_html( $l['name'] ); ?></span>
                            <span class="cvt-nordic__lang-level"><?php echo esc_html( $l['level'] ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $int ) ) : ?>
                <div class="cvt-nordic__card">
                    <h2 class="cvt-nordic__section-title">Zainteresowania</h2>
                    <div class="cvt-nordic__pills">
                        <?php foreach ( $int as $i ) : ?>
                            <span class="cvt-nordic__pill cvt-nordic__pill--interest"><?php echo esc_html( $i ); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ( ! empty( $data['rodo'] ) ) : ?>
        <footer class="cvt-nordic__footer">
            <small>Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
        </footer>
    <?php endif; ?>
</div>
