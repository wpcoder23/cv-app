<?php
/**
 * Template: Professional – dark sidebar with personal info/skills, white main area. Corporate look.
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
<div class="cvt cvt-professional">
    <aside class="cvt-professional__sidebar">
        <?php if ( ! empty( $p['photo_url'] ) ) : ?>
            <div class="cvt-professional__avatar">
                <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="<?php echo esc_attr( $p['first_name'] ); ?>" />
            </div>
        <?php endif; ?>

        <div class="cvt-professional__sidebar-block">
            <h3 class="cvt-professional__sidebar-title">Kontakt</h3>
            <?php if ( ! empty( $p['email'] ) ) : ?>
                <p class="cvt-professional__contact-item"><?php echo esc_html( $p['email'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $p['phone'] ) ) : ?>
                <p class="cvt-professional__contact-item"><?php echo esc_html( $p['phone'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $p['address'] ) ) : ?>
                <p class="cvt-professional__contact-item"><?php echo esc_html( $p['address'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $p['date_of_birth'] ) ) : ?>
                <p class="cvt-professional__contact-item"><?php echo esc_html( $p['date_of_birth'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $p['linkedin'] ) ) : ?>
                <p class="cvt-professional__contact-item">
                    <a href="<?php echo esc_url( $p['linkedin'] ); ?>"><?php echo esc_html( $p['linkedin'] ); ?></a>
                </p>
            <?php endif; ?>
            <?php if ( ! empty( $p['website'] ) ) : ?>
                <p class="cvt-professional__contact-item">
                    <a href="<?php echo esc_url( $p['website'] ); ?>"><?php echo esc_html( $p['website'] ); ?></a>
                </p>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $sk['hard'] ) ) : ?>
            <div class="cvt-professional__sidebar-block">
                <h3 class="cvt-professional__sidebar-title">Umiejętności techniczne</h3>
                <ul class="cvt-professional__skill-list">
                    <?php foreach ( $sk['hard'] as $s ) : ?>
                        <li class="cvt-professional__skill-item"><?php echo esc_html( $s ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $sk['soft'] ) ) : ?>
            <div class="cvt-professional__sidebar-block">
                <h3 class="cvt-professional__sidebar-title">Umiejętności miękkie</h3>
                <ul class="cvt-professional__skill-list">
                    <?php foreach ( $sk['soft'] as $s ) : ?>
                        <li class="cvt-professional__skill-item"><?php echo esc_html( $s ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $sk['languages'] ) ) : ?>
            <div class="cvt-professional__sidebar-block">
                <h3 class="cvt-professional__sidebar-title">Języki</h3>
                <?php foreach ( $sk['languages'] as $l ) : ?>
                    <div class="cvt-professional__lang">
                        <span class="cvt-professional__lang-name"><?php echo esc_html( $l['name'] ); ?></span>
                        <span class="cvt-professional__lang-level"><?php echo esc_html( $l['level'] ); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $int ) ) : ?>
            <div class="cvt-professional__sidebar-block">
                <h3 class="cvt-professional__sidebar-title">Zainteresowania</h3>
                <p class="cvt-professional__interests"><?php echo esc_html( implode( ', ', $int ) ); ?></p>
            </div>
        <?php endif; ?>
    </aside>

    <main class="cvt-professional__main">
        <header class="cvt-professional__header">
            <h1 class="cvt-professional__name"><?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?></h1>
            <?php if ( ! empty( $p['job_title'] ) ) : ?>
                <p class="cvt-professional__title"><?php echo esc_html( $p['job_title'] ); ?></p>
            <?php endif; ?>
        </header>

        <?php if ( ! empty( $p['summary'] ) ) : ?>
            <section class="cvt-professional__section">
                <h2 class="cvt-professional__section-title">O mnie</h2>
                <p class="cvt-professional__text"><?php echo nl2br( esc_html( $p['summary'] ) ); ?></p>
            </section>
        <?php endif; ?>

        <?php if ( ! empty( $exp ) ) : ?>
            <section class="cvt-professional__section">
                <h2 class="cvt-professional__section-title">Doświadczenie zawodowe</h2>
                <?php foreach ( $exp as $e ) : ?>
                    <div class="cvt-professional__entry">
                        <div class="cvt-professional__entry-head">
                            <h3 class="cvt-professional__position"><?php echo esc_html( $e['position'] ); ?></h3>
                            <span class="cvt-professional__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?></span>
                        </div>
                        <p class="cvt-professional__company"><?php echo esc_html( $e['company'] ); ?></p>
                        <?php if ( ! empty( $e['description'] ) ) : ?>
                            <p class="cvt-professional__desc"><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <?php if ( ! empty( $edu ) ) : ?>
            <section class="cvt-professional__section">
                <h2 class="cvt-professional__section-title">Wykształcenie</h2>
                <?php foreach ( $edu as $e ) : ?>
                    <div class="cvt-professional__entry">
                        <div class="cvt-professional__entry-head">
                            <h3 class="cvt-professional__position"><?php echo esc_html( $e['school'] ); ?></h3>
                            <span class="cvt-professional__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></span>
                        </div>
                        <?php if ( ! empty( $e['degree'] ) || ! empty( $e['field'] ) ) : ?>
                            <p class="cvt-professional__company"><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <?php if ( ! empty( $data['rodo'] ) ) : ?>
            <footer class="cvt-professional__footer">
                <small>Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
            </footer>
        <?php endif; ?>
    </main>
</div>
