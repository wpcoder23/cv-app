<?php
/**
 * Template: Academic – traditional academic CV, left-aligned dates column,
 *                      right content column, serif section headers with underlines.
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
<div class="cvt cvt-academic">
    <header class="cvt-academic__header">
        <div class="cvt-academic__header-top">
            <?php if ( ! empty( $p['photo_url'] ) ) : ?>
                <div class="cvt-academic__avatar">
                    <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="<?php echo esc_attr( $p['first_name'] ); ?>" />
                </div>
            <?php endif; ?>
            <div class="cvt-academic__header-info">
                <h1 class="cvt-academic__name"><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
                <?php if ( ! empty( $p['job_title'] ) ) : ?>
                    <p class="cvt-academic__title"><?php echo esc_html( $p['job_title'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="cvt-academic__contact">
            <?php if ( ! empty( $p['email'] ) ) : ?>
                <span class="cvt-academic__contact-item"><?php echo esc_html( $p['email'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['phone'] ) ) : ?>
                <span class="cvt-academic__contact-item"><?php echo esc_html( $p['phone'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['address'] ) ) : ?>
                <span class="cvt-academic__contact-item"><?php echo esc_html( $p['address'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['date_of_birth'] ) ) : ?>
                <span class="cvt-academic__contact-item">ur. <?php echo esc_html( $p['date_of_birth'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['linkedin'] ) ) : ?>
                <span class="cvt-academic__contact-item">
                    <a href="<?php echo esc_url( $p['linkedin'] ); ?>"><?php echo esc_html( $p['linkedin'] ); ?></a>
                </span>
            <?php endif; ?>
            <?php if ( ! empty( $p['website'] ) ) : ?>
                <span class="cvt-academic__contact-item">
                    <a href="<?php echo esc_url( $p['website'] ); ?>"><?php echo esc_html( $p['website'] ); ?></a>
                </span>
            <?php endif; ?>
        </div>
    </header>

    <?php if ( ! empty( $p['summary'] ) ) : ?>
        <section class="cvt-academic__section">
            <h2 class="cvt-academic__section-title">O mnie</h2>
            <div class="cvt-academic__row">
                <div class="cvt-academic__col-date"></div>
                <div class="cvt-academic__col-content">
                    <p><?php echo nl2br( esc_html( $p['summary'] ) ); ?></p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $edu ) ) : ?>
        <section class="cvt-academic__section">
            <h2 class="cvt-academic__section-title">Wykształcenie</h2>
            <?php foreach ( $edu as $e ) : ?>
                <div class="cvt-academic__row">
                    <div class="cvt-academic__col-date">
                        <span class="cvt-academic__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></span>
                    </div>
                    <div class="cvt-academic__col-content">
                        <h3 class="cvt-academic__entry-title"><?php echo esc_html( $e['school'] ); ?></h3>
                        <?php if ( ! empty( $e['degree'] ) || ! empty( $e['field'] ) ) : ?>
                            <p class="cvt-academic__entry-sub"><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $exp ) ) : ?>
        <section class="cvt-academic__section">
            <h2 class="cvt-academic__section-title">Doświadczenie zawodowe</h2>
            <?php foreach ( $exp as $e ) : ?>
                <div class="cvt-academic__row">
                    <div class="cvt-academic__col-date">
                        <span class="cvt-academic__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?></span>
                    </div>
                    <div class="cvt-academic__col-content">
                        <h3 class="cvt-academic__entry-title"><?php echo esc_html( $e['position'] ); ?></h3>
                        <p class="cvt-academic__entry-sub"><?php echo esc_html( $e['company'] ); ?></p>
                        <?php if ( ! empty( $e['description'] ) ) : ?>
                            <p class="cvt-academic__desc"><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $sk['hard'] ) || ! empty( $sk['soft'] ) || ! empty( $sk['languages'] ) ) : ?>
        <section class="cvt-academic__section">
            <h2 class="cvt-academic__section-title">Umiejętności</h2>
            <?php if ( ! empty( $sk['hard'] ) ) : ?>
                <div class="cvt-academic__row">
                    <div class="cvt-academic__col-date">
                        <span class="cvt-academic__label">Techniczne</span>
                    </div>
                    <div class="cvt-academic__col-content">
                        <p><?php echo esc_html( implode( ', ', $sk['hard'] ) ); ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( ! empty( $sk['soft'] ) ) : ?>
                <div class="cvt-academic__row">
                    <div class="cvt-academic__col-date">
                        <span class="cvt-academic__label">Miękkie</span>
                    </div>
                    <div class="cvt-academic__col-content">
                        <p><?php echo esc_html( implode( ', ', $sk['soft'] ) ); ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( ! empty( $sk['languages'] ) ) : ?>
                <div class="cvt-academic__row">
                    <div class="cvt-academic__col-date">
                        <span class="cvt-academic__label">Języki</span>
                    </div>
                    <div class="cvt-academic__col-content">
                        <ul class="cvt-academic__inline-list">
                            <?php foreach ( $sk['languages'] as $l ) : ?>
                                <li><?php echo esc_html( $l['name'] ); ?> – <?php echo esc_html( $l['level'] ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $int ) ) : ?>
        <section class="cvt-academic__section">
            <h2 class="cvt-academic__section-title">Zainteresowania</h2>
            <div class="cvt-academic__row">
                <div class="cvt-academic__col-date"></div>
                <div class="cvt-academic__col-content">
                    <p><?php echo esc_html( implode( ', ', $int ) ); ?></p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $data['rodo'] ) ) : ?>
        <footer class="cvt-academic__footer">
            <small>Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
        </footer>
    <?php endif; ?>
</div>
