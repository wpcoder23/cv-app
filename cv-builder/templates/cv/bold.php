<?php
/**
 * Template: Bold – large bold typography, red (#dc2626) accent header,
 *                  card-style sections with shadows, badges for skills.
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
<div class="cvt cvt-bold">
    <header class="cvt-bold__header">
        <div class="cvt-bold__header-inner">
            <?php if ( ! empty( $p['photo_url'] ) ) : ?>
                <div class="cvt-bold__avatar">
                    <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="<?php echo esc_attr( $p['first_name'] ); ?>" />
                </div>
            <?php endif; ?>
            <div class="cvt-bold__header-text">
                <h1 class="cvt-bold__name"><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
                <?php if ( ! empty( $p['job_title'] ) ) : ?>
                    <p class="cvt-bold__title"><?php echo esc_html( $p['job_title'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="cvt-bold__contact-row">
            <?php if ( ! empty( $p['email'] ) ) : ?>
                <span class="cvt-bold__contact-item"><?php echo esc_html( $p['email'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['phone'] ) ) : ?>
                <span class="cvt-bold__contact-item"><?php echo esc_html( $p['phone'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['address'] ) ) : ?>
                <span class="cvt-bold__contact-item"><?php echo esc_html( $p['address'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['linkedin'] ) ) : ?>
                <span class="cvt-bold__contact-item">
                    <a href="<?php echo esc_url( $p['linkedin'] ); ?>"><?php echo esc_html( $p['linkedin'] ); ?></a>
                </span>
            <?php endif; ?>
            <?php if ( ! empty( $p['website'] ) ) : ?>
                <span class="cvt-bold__contact-item">
                    <a href="<?php echo esc_url( $p['website'] ); ?>"><?php echo esc_html( $p['website'] ); ?></a>
                </span>
            <?php endif; ?>
        </div>
    </header>

    <div class="cvt-bold__body">
        <?php if ( ! empty( $p['summary'] ) ) : ?>
            <div class="cvt-bold__card">
                <h2 class="cvt-bold__section-title">O mnie</h2>
                <p class="cvt-bold__text"><?php echo nl2br( esc_html( $p['summary'] ) ); ?></p>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $exp ) ) : ?>
            <div class="cvt-bold__card">
                <h2 class="cvt-bold__section-title">Doświadczenie zawodowe</h2>
                <?php foreach ( $exp as $e ) : ?>
                    <div class="cvt-bold__entry">
                        <div class="cvt-bold__entry-head">
                            <h3 class="cvt-bold__position"><?php echo esc_html( $e['position'] ); ?></h3>
                            <span class="cvt-bold__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?></span>
                        </div>
                        <p class="cvt-bold__company"><?php echo esc_html( $e['company'] ); ?></p>
                        <?php if ( ! empty( $e['description'] ) ) : ?>
                            <p class="cvt-bold__desc"><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $edu ) ) : ?>
            <div class="cvt-bold__card">
                <h2 class="cvt-bold__section-title">Wykształcenie</h2>
                <?php foreach ( $edu as $e ) : ?>
                    <div class="cvt-bold__entry">
                        <div class="cvt-bold__entry-head">
                            <h3 class="cvt-bold__position"><?php echo esc_html( $e['school'] ); ?></h3>
                            <span class="cvt-bold__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></span>
                        </div>
                        <?php if ( ! empty( $e['degree'] ) || ! empty( $e['field'] ) ) : ?>
                            <p class="cvt-bold__company"><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $sk['hard'] ) || ! empty( $sk['soft'] ) || ! empty( $sk['languages'] ) ) : ?>
            <div class="cvt-bold__card">
                <h2 class="cvt-bold__section-title">Umiejętności</h2>
                <?php if ( ! empty( $sk['hard'] ) ) : ?>
                    <div class="cvt-bold__skill-group">
                        <h4 class="cvt-bold__skill-heading">Techniczne</h4>
                        <div class="cvt-bold__badges">
                            <?php foreach ( $sk['hard'] as $s ) : ?>
                                <span class="cvt-bold__badge"><?php echo esc_html( $s ); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( ! empty( $sk['soft'] ) ) : ?>
                    <div class="cvt-bold__skill-group">
                        <h4 class="cvt-bold__skill-heading">Miękkie</h4>
                        <div class="cvt-bold__badges">
                            <?php foreach ( $sk['soft'] as $s ) : ?>
                                <span class="cvt-bold__badge cvt-bold__badge--soft"><?php echo esc_html( $s ); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( ! empty( $sk['languages'] ) ) : ?>
                    <div class="cvt-bold__skill-group">
                        <h4 class="cvt-bold__skill-heading">Języki</h4>
                        <div class="cvt-bold__badges">
                            <?php foreach ( $sk['languages'] as $l ) : ?>
                                <span class="cvt-bold__badge cvt-bold__badge--lang"><?php echo esc_html( $l['name'] ); ?> – <?php echo esc_html( $l['level'] ); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $int ) ) : ?>
            <div class="cvt-bold__card">
                <h2 class="cvt-bold__section-title">Zainteresowania</h2>
                <div class="cvt-bold__badges">
                    <?php foreach ( $int as $i ) : ?>
                        <span class="cvt-bold__badge cvt-bold__badge--interest"><?php echo esc_html( $i ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if ( ! empty( $data['rodo'] ) ) : ?>
        <footer class="cvt-bold__footer">
            <small>Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
        </footer>
    <?php endif; ?>
</div>
