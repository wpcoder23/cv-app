<?php
/**
 * Template: Classic – warm brown/gold scheme inspired by original CV.
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
<div class="cvt cvt-classic">
    <header class="cvt-classic__header">
        <?php if ( ! empty( $p['photo_url'] ) ) : ?>
            <div class="cvt-classic__avatar">
                <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="<?php echo esc_attr( $p['first_name'] ); ?>" />
            </div>
        <?php endif; ?>
        <div class="cvt-classic__info">
            <h1 class="cvt-classic__name"><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
            <?php if ( ! empty( $p['job_title'] ) ) : ?>
                <p class="cvt-classic__title"><?php echo esc_html( $p['job_title'] ); ?></p>
            <?php endif; ?>
            <div class="cvt-classic__contact">
                <?php if ( ! empty( $p['email'] ) ) : ?>
                    <span><?php echo esc_html( $p['email'] ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $p['phone'] ) ) : ?>
                    <span><?php echo esc_html( $p['phone'] ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $p['address'] ) ) : ?>
                    <span><?php echo esc_html( $p['address'] ); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <?php if ( ! empty( $p['summary'] ) ) : ?>
        <section class="cvt-classic__section">
            <h2 class="cvt-classic__section-title">O mnie</h2>
            <p><?php echo esc_html( $p['summary'] ); ?></p>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $exp ) ) : ?>
        <section class="cvt-classic__section">
            <h2 class="cvt-classic__section-title">Doświadczenie zawodowe</h2>
            <?php foreach ( $exp as $e ) : ?>
                <div class="cvt-classic__entry">
                    <div class="cvt-classic__date">
                        <?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?>
                    </div>
                    <div class="cvt-classic__details">
                        <h4><?php echo esc_html( $e['company'] ); ?></h4>
                        <span class="cvt-classic__role"><?php echo esc_html( $e['position'] ); ?></span>
                        <?php if ( ! empty( $e['description'] ) ) : ?>
                            <p><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $edu ) ) : ?>
        <section class="cvt-classic__section">
            <h2 class="cvt-classic__section-title">Wykształcenie</h2>
            <?php foreach ( $edu as $e ) : ?>
                <div class="cvt-classic__entry">
                    <div class="cvt-classic__date">
                        <?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?>
                    </div>
                    <div class="cvt-classic__details">
                        <h4><?php echo esc_html( $e['school'] ); ?></h4>
                        <?php if ( ! empty( $e['degree'] ) || ! empty( $e['field'] ) ) : ?>
                            <p><?php echo esc_html( trim( $e['degree'] . ' – ' . $e['field'], ' –' ) ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $sk['hard'] ) || ! empty( $sk['soft'] ) || ! empty( $sk['languages'] ) ) : ?>
        <section class="cvt-classic__section">
            <h2 class="cvt-classic__section-title">Umiejętności</h2>
            <div class="cvt-classic__skills-grid">
                <?php if ( ! empty( $sk['hard'] ) ) : ?>
                    <div>
                        <h5>Techniczne</h5>
                        <ul>
                            <?php foreach ( $sk['hard'] as $s ) : ?>
                                <li><?php echo esc_html( $s ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if ( ! empty( $sk['soft'] ) ) : ?>
                    <div>
                        <h5>Miękkie</h5>
                        <ul>
                            <?php foreach ( $sk['soft'] as $s ) : ?>
                                <li><?php echo esc_html( $s ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if ( ! empty( $sk['languages'] ) ) : ?>
                    <div>
                        <h5>Języki</h5>
                        <ul>
                            <?php foreach ( $sk['languages'] as $l ) : ?>
                                <li><?php echo esc_html( $l['name'] ); ?> – <?php echo esc_html( $l['level'] ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $int ) ) : ?>
        <section class="cvt-classic__section">
            <h2 class="cvt-classic__section-title">Zainteresowania</h2>
            <p><?php echo esc_html( implode( ', ', $int ) ); ?></p>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $data['rodo'] ) ) : ?>
        <footer class="cvt-classic__footer">
            <small>Wyrażam zgodę na przetwarzanie moich danych osobowych w celu rekrutacji zgodnie z art. 6 ust. 1 lit. a RODO.</small>
        </footer>
    <?php endif; ?>
</div>
