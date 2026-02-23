<?php
/**
 * Template: Tech – dark background (#0f172a), cyan/blue accents (#38bdf8),
 *                  monospace-style section headers, code-block look for skills.
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
<div class="cvt cvt-tech">
    <header class="cvt-tech__header">
        <div class="cvt-tech__header-row">
            <?php if ( ! empty( $p['photo_url'] ) ) : ?>
                <div class="cvt-tech__avatar">
                    <img src="<?php echo esc_url( $p['photo_url'] ); ?>" alt="<?php echo esc_attr( $p['first_name'] ); ?>" />
                </div>
            <?php endif; ?>
            <div class="cvt-tech__header-text">
                <h1 class="cvt-tech__name">
                    <span class="cvt-tech__accent">&gt;</span> <?php echo esc_html( $p['first_name'] . ' ' . $p['last_name'] ); ?>
                </h1>
                <?php if ( ! empty( $p['job_title'] ) ) : ?>
                    <p class="cvt-tech__title">// <?php echo esc_html( $p['job_title'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="cvt-tech__contact-bar">
            <?php if ( ! empty( $p['email'] ) ) : ?>
                <span class="cvt-tech__contact-item"><?php echo esc_html( $p['email'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['phone'] ) ) : ?>
                <span class="cvt-tech__contact-item"><?php echo esc_html( $p['phone'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['address'] ) ) : ?>
                <span class="cvt-tech__contact-item"><?php echo esc_html( $p['address'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $p['linkedin'] ) ) : ?>
                <span class="cvt-tech__contact-item">
                    <a href="<?php echo esc_url( $p['linkedin'] ); ?>"><?php echo esc_html( $p['linkedin'] ); ?></a>
                </span>
            <?php endif; ?>
            <?php if ( ! empty( $p['website'] ) ) : ?>
                <span class="cvt-tech__contact-item">
                    <a href="<?php echo esc_url( $p['website'] ); ?>"><?php echo esc_html( $p['website'] ); ?></a>
                </span>
            <?php endif; ?>
        </div>
    </header>

    <?php if ( ! empty( $p['summary'] ) ) : ?>
        <section class="cvt-tech__section">
            <h2 class="cvt-tech__section-title"><span class="cvt-tech__accent">#</span> O mnie</h2>
            <p class="cvt-tech__text"><?php echo nl2br( esc_html( $p['summary'] ) ); ?></p>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $sk['hard'] ) || ! empty( $sk['soft'] ) || ! empty( $sk['languages'] ) ) : ?>
        <section class="cvt-tech__section">
            <h2 class="cvt-tech__section-title"><span class="cvt-tech__accent">#</span> Umiejętności</h2>
            <?php if ( ! empty( $sk['hard'] ) ) : ?>
                <div class="cvt-tech__code-block">
                    <div class="cvt-tech__code-header">techniczne</div>
                    <div class="cvt-tech__code-body">
                        <?php foreach ( $sk['hard'] as $s ) : ?>
                            <span class="cvt-tech__tag"><?php echo esc_html( $s ); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( ! empty( $sk['soft'] ) ) : ?>
                <div class="cvt-tech__code-block">
                    <div class="cvt-tech__code-header">miękkie</div>
                    <div class="cvt-tech__code-body">
                        <?php foreach ( $sk['soft'] as $s ) : ?>
                            <span class="cvt-tech__tag cvt-tech__tag--soft"><?php echo esc_html( $s ); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( ! empty( $sk['languages'] ) ) : ?>
                <div class="cvt-tech__code-block">
                    <div class="cvt-tech__code-header">języki</div>
                    <div class="cvt-tech__code-body">
                        <?php foreach ( $sk['languages'] as $l ) : ?>
                            <span class="cvt-tech__tag cvt-tech__tag--lang"><?php echo esc_html( $l['name'] ); ?> <small>(<?php echo esc_html( $l['level'] ); ?>)</small></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $exp ) ) : ?>
        <section class="cvt-tech__section">
            <h2 class="cvt-tech__section-title"><span class="cvt-tech__accent">#</span> Doświadczenie zawodowe</h2>
            <?php foreach ( $exp as $e ) : ?>
                <div class="cvt-tech__entry">
                    <div class="cvt-tech__entry-header">
                        <h3 class="cvt-tech__position"><?php echo esc_html( $e['position'] ); ?></h3>
                        <span class="cvt-tech__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo $e['current'] ? 'obecnie' : esc_html( $e['end_date'] ); ?></span>
                    </div>
                    <p class="cvt-tech__company"><?php echo esc_html( $e['company'] ); ?></p>
                    <?php if ( ! empty( $e['description'] ) ) : ?>
                        <p class="cvt-tech__desc"><?php echo nl2br( esc_html( $e['description'] ) ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $edu ) ) : ?>
        <section class="cvt-tech__section">
            <h2 class="cvt-tech__section-title"><span class="cvt-tech__accent">#</span> Wykształcenie</h2>
            <?php foreach ( $edu as $e ) : ?>
                <div class="cvt-tech__entry">
                    <div class="cvt-tech__entry-header">
                        <h3 class="cvt-tech__position"><?php echo esc_html( $e['school'] ); ?></h3>
                        <span class="cvt-tech__date"><?php echo esc_html( $e['start_date'] ); ?> – <?php echo esc_html( $e['end_date'] ); ?></span>
                    </div>
                    <?php if ( ! empty( $e['degree'] ) || ! empty( $e['field'] ) ) : ?>
                        <p class="cvt-tech__company"><?php echo esc_html( trim( ( $e['degree'] ?? '' ) . ' – ' . ( $e['field'] ?? '' ), ' –' ) ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $int ) ) : ?>
        <section class="cvt-tech__section">
            <h2 class="cvt-tech__section-title"><span class="cvt-tech__accent">#</span> Zainteresowania</h2>
            <div class="cvt-tech__code-body">
                <?php foreach ( $int as $i ) : ?>
                    <span class="cvt-tech__tag cvt-tech__tag--interest"><?php echo esc_html( $i ); ?></span>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( ! empty( $data['rodo'] ) ) : ?>
        <footer class="cvt-tech__footer">
            <small>// Wyrażam zgodę na przetwarzanie danych osobowych na potrzeby rekrutacji (RODO).</small>
        </footer>
    <?php endif; ?>
</div>
