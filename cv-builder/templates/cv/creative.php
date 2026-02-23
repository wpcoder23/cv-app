<?php
/**
 * Template: Creative – vibrant purple, bold layout.
 */
defined( 'ABSPATH' ) || exit;

$p   = $data['personal'] ?? [];
$exp = $data['experience'] ?? [];
$edu = $data['education'] ?? [];
$sk  = $data['skills'] ?? [];
$int = $data['interests'] ?? [];
?>
<div class="cvt cvt-creative">
    <header class="cvt-creative__header">
        <div class="cvt-creative__header-bg"></div>
        <div class="cvt-creative__header-content">
            <?php if ( ! empty( $p['photo_url'] ) ) : ?>
                <div class="cvt-creative__avatar">
                    <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="" />
                </div>
            <?php endif; ?>
            <h1><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
            <?php if ( ! empty( $p['job_title'] ) ) : ?>
                <p class="cvt-creative__subtitle"><?php echo esc_html( $p['job_title'] ); ?></p>
            <?php endif; ?>
            <div class="cvt-creative__contact">
                <?php foreach ( [ 'email', 'phone', 'address', 'linkedin' ] as $field ) : ?>
                    <?php if ( ! empty( $p[ $field ] ) ) : ?>
                        <span><?php echo esc_html( $p[ $field ] ); ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </header>

    <div class="cvt-creative__body">
        <?php if ( ! empty( $p['summary'] ) ) : ?>
            <section class="cvt-creative__section">
                <h2>O mnie</h2>
                <p><?php echo esc_html( $p['summary'] ); ?></p>
            </section>
        <?php endif; ?>

        <div class="cvt-creative__columns">
            <div class="cvt-creative__col-main">
                <?php if ( ! empty( $exp ) ) : ?>
                    <section class="cvt-creative__section">
                        <h2>Doświadczenie</h2>
                        <?php foreach ( $exp as $e ) : ?>
                            <div class="cvt-creative__entry">
                                <span class="cvt-creative__badge"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'teraz' : esc_html( $e['end_date'] ); ?></span>
                                <h4><?php echo esc_html( $e['position'] ); ?></h4>
                                <p class="cvt-creative__company"><?php echo esc_html( $e['company'] ); ?></p>
                                <?php if ( ! empty( $e['description'] ) ) : ?>
                                    <p><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </section>
                <?php endif; ?>

                <?php if ( ! empty( $edu ) ) : ?>
                    <section class="cvt-creative__section">
                        <h2>Wykształcenie</h2>
                        <?php foreach ( $edu as $e ) : ?>
                            <div class="cvt-creative__entry">
                                <span class="cvt-creative__badge"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></span>
                                <h4><?php echo esc_html( $e['school'] ); ?></h4>
                                <p><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </section>
                <?php endif; ?>
            </div>

            <div class="cvt-creative__col-side">
                <?php if ( ! empty( $sk['hard'] ) ) : ?>
                    <section class="cvt-creative__section">
                        <h2>Skills</h2>
                        <div class="cvt-creative__tags">
                            <?php foreach ( $sk['hard'] as $s ) : ?>
                                <span class="cvt-creative__tag"><?php echo esc_html( $s ); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if ( ! empty( $sk['languages'] ) ) : ?>
                    <section class="cvt-creative__section">
                        <h2>Języki</h2>
                        <?php foreach ( $sk['languages'] as $l ) : ?>
                            <p><?php echo esc_html( $l['name'] ); ?> – <?php echo esc_html( $l['level'] ); ?></p>
                        <?php endforeach; ?>
                    </section>
                <?php endif; ?>

                <?php if ( ! empty( $int ) ) : ?>
                    <section class="cvt-creative__section">
                        <h2>Zainteresowania</h2>
                        <p><?php echo esc_html( implode( ', ', $int ) ); ?></p>
                    </section>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ( ! empty( $data['rodo'] ) ) : ?>
        <footer class="cvt-creative__footer">
            <small>Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
        </footer>
    <?php endif; ?>
</div>
