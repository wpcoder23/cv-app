<?php
/**
 * Main frontend template for the CV Builder app.
 * Rendered via [cv_builder] shortcode.
 */

defined( 'ABSPATH' ) || exit;

$is_logged_in = is_user_logged_in();
$user_id      = get_current_user_id();
$has_access   = $user_id ? \CvBuilder\Access\AccessManager::has_active_access( $user_id ) : false;
$price        = \CvBuilder\Plugin::get_price_display();
$templates    = \CvBuilder\CV\Generator::TEMPLATES;
?>

<div id="cvb-app" class="cvb-app" data-logged-in="<?php echo $is_logged_in ? '1' : '0'; ?>" data-has-access="<?php echo $has_access ? '1' : '0'; ?>">

    <!-- ===== HEADER ===== -->
    <header class="cvb-header">
        <div class="cvb-header__inner">
            <div class="cvb-header__brand">
                <svg class="cvb-header__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                <span class="cvb-header__title">CV Builder</span>
            </div>
            <div class="cvb-header__actions">
                <?php if ( $is_logged_in ) : ?>
                    <?php if ( $has_access ) : ?>
                        <span class="cvb-badge cvb-badge--success">Dostęp aktywny – <?php echo esc_html( \CvBuilder\Access\AccessManager::get_remaining_time( $user_id ) ); ?></span>
                    <?php else : ?>
                        <span class="cvb-badge cvb-badge--warning">Brak dostępu</span>
                    <?php endif; ?>
                    <span class="cvb-header__user"><?php echo esc_html( wp_get_current_user()->display_name ); ?></span>
                    <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="cvb-btn cvb-btn--ghost cvb-btn--sm">Wyloguj</a>
                <?php else : ?>
                    <button type="button" class="cvb-btn cvb-btn--ghost cvb-btn--sm" data-action="show-login">Zaloguj się</button>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- ===== INTRO: CHOOSE YOUR PATH ===== -->
    <section class="cvb-intro" id="cvb-intro">
        <h2 class="cvb-intro__title">Jak chcesz zacząć?</h2>
        <p class="cvb-intro__desc">Możesz wrzucić stare CV i pozwolić AI przerobić je na nowe, albo wypełnić dane sam.</p>

        <div class="cvb-intro__cards">
            <!-- AI PATH -->
            <div class="cvb-intro__card cvb-intro__card--ai" data-action="choose-ai">
                <div class="cvb-intro__card-icon">
                    <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                </div>
                <h3>AI zrobi to za mnie</h3>
                <p>Wrzuć stare CV (PDF, zdjęcie, Word) albo wklej tekst. AI wyciągnie dane i ułoży je w nowym szablonie.</p>

                <div class="cvb-intro__upload-zone" id="cvb-ai-drop-zone">
                    <input type="file" id="cvb-ai-file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.txt" class="cvb-input--file" />
                    <label for="cvb-ai-file" class="cvb-intro__upload-label">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                        <span>Przeciągnij plik tutaj lub kliknij</span>
                        <small>PDF, JPG, Word, tekst</small>
                    </label>
                </div>

                <div class="cvb-intro__or">lub zaimportuj z</div>

                <div class="cvb-intro__social-btns">
                    <button type="button" class="cvb-btn cvb-btn--social cvb-btn--linkedin" data-action="social-auth" data-provider="linkedin">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="#0A66C2"><path d="M20.5 2h-17A1.5 1.5 0 002 3.5v17A1.5 1.5 0 003.5 22h17a1.5 1.5 0 001.5-1.5v-17A1.5 1.5 0 0020.5 2zM8 19H5v-9h3zM6.5 8.25A1.75 1.75 0 118.3 6.5a1.78 1.78 0 01-1.8 1.75zM19 19h-3v-4.74c0-1.42-.6-1.93-1.38-1.93A1.74 1.74 0 0013 14.19a.66.66 0 000 .14V19h-3v-9h2.9v1.3a3.11 3.11 0 012.7-1.4c1.55 0 3.36.86 3.36 3.66z"/></svg>
                        LinkedIn
                    </button>
                    <button type="button" class="cvb-btn cvb-btn--social cvb-btn--google" data-action="social-auth" data-provider="google">
                        <svg viewBox="0 0 24 24" width="18" height="18"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                        Google
                    </button>
                    <button type="button" class="cvb-btn cvb-btn--social cvb-btn--facebook" data-action="social-auth" data-provider="facebook">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        Facebook
                    </button>
                </div>
            </div>

            <!-- MANUAL PATH -->
            <div class="cvb-intro__card cvb-intro__card--manual" data-action="choose-manual">
                <div class="cvb-intro__card-icon">
                    <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                </div>
                <h3>Sam wypełnię dane</h3>
                <p>Wybierz szablon, wypełnij formularz krok po kroku. Klasyczna droga, pełna kontrola.</p>
                <button type="button" class="cvb-btn cvb-btn--outline cvb-btn--lg cvb-btn--full" data-action="start-manual">
                    Zacznij wypełniać
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- ===== STEPS INDICATOR ===== -->
    <nav class="cvb-steps" aria-label="Kroki tworzenia CV" style="display:none;">
        <ol class="cvb-steps__list">
            <li class="cvb-steps__item is-active" data-step="1">
                <span class="cvb-steps__number">1</span>
                <span class="cvb-steps__label">Szablon</span>
            </li>
            <li class="cvb-steps__item" data-step="2">
                <span class="cvb-steps__number">2</span>
                <span class="cvb-steps__label">Dane osobowe</span>
            </li>
            <li class="cvb-steps__item" data-step="3">
                <span class="cvb-steps__number">3</span>
                <span class="cvb-steps__label">Doświadczenie</span>
            </li>
            <li class="cvb-steps__item" data-step="4">
                <span class="cvb-steps__number">4</span>
                <span class="cvb-steps__label">Wykształcenie</span>
            </li>
            <li class="cvb-steps__item" data-step="5">
                <span class="cvb-steps__number">5</span>
                <span class="cvb-steps__label">Umiejętności</span>
            </li>
            <li class="cvb-steps__item" data-step="6">
                <span class="cvb-steps__number">6</span>
                <span class="cvb-steps__label">Podgląd i pobieranie</span>
            </li>
        </ol>
    </nav>

    <!-- ===== STEP 1: TEMPLATE SELECTION ===== -->
    <section class="cvb-section" data-step-content="1">
        <h2 class="cvb-section__title">Wybierz szablon CV</h2>
        <p class="cvb-section__desc">Wybierz jeden z 10 profesjonalnych szablonów. Możesz go zmienić później.</p>

        <!-- Social import buttons -->
        <div class="cvb-import-bar">
            <span class="cvb-import-bar__label">Zaimportuj dane z:</span>
            <button type="button" class="cvb-btn cvb-btn--social cvb-btn--google" data-action="social-auth" data-provider="google">
                <svg viewBox="0 0 24 24" width="18" height="18"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                Google
            </button>
            <button type="button" class="cvb-btn cvb-btn--social cvb-btn--linkedin" data-action="social-auth" data-provider="linkedin">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="#0A66C2"><path d="M20.5 2h-17A1.5 1.5 0 002 3.5v17A1.5 1.5 0 003.5 22h17a1.5 1.5 0 001.5-1.5v-17A1.5 1.5 0 0020.5 2zM8 19H5v-9h3zM6.5 8.25A1.75 1.75 0 118.3 6.5a1.78 1.78 0 01-1.8 1.75zM19 19h-3v-4.74c0-1.42-.6-1.93-1.38-1.93A1.74 1.74 0 0013 14.19a.66.66 0 000 .14V19h-3v-9h2.9v1.3a3.11 3.11 0 012.7-1.4c1.55 0 3.36.86 3.36 3.66z"/></svg>
                LinkedIn
            </button>
            <button type="button" class="cvb-btn cvb-btn--social cvb-btn--facebook" data-action="social-auth" data-provider="facebook">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                Facebook
            </button>
        </div>

        <div class="cvb-templates-grid">
            <?php foreach ( $templates as $id => $name ) : ?>
                <label class="cvb-template-card" data-template="<?php echo esc_attr( $id ); ?>">
                    <input type="radio" name="cvb_template" value="<?php echo esc_attr( $id ); ?>" <?php echo 'classic' === $id ? 'checked' : ''; ?> />
                    <div class="cvb-template-card__preview">
                        <div class="cvb-template-card__thumb" data-template-preview="<?php echo esc_attr( $id ); ?>"></div>
                    </div>
                    <span class="cvb-template-card__name"><?php echo esc_html( $name ); ?></span>
                    <span class="cvb-template-card__check">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    </span>
                </label>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ===== STEP 2: PERSONAL DATA ===== -->
    <section class="cvb-section" data-step-content="2" style="display:none;">
        <h2 class="cvb-section__title">Dane osobowe</h2>

        <form class="cvb-form" id="cvb-form-personal" autocomplete="off">
            <div class="cvb-form__row">
                <div class="cvb-form__group">
                    <label class="cvb-label" for="cvb-first-name">Imię *</label>
                    <input type="text" id="cvb-first-name" name="first_name" class="cvb-input" required placeholder="Jan" />
                </div>
                <div class="cvb-form__group">
                    <label class="cvb-label" for="cvb-last-name">Nazwisko *</label>
                    <input type="text" id="cvb-last-name" name="last_name" class="cvb-input" required placeholder="Kowalski" />
                </div>
            </div>

            <div class="cvb-form__row">
                <div class="cvb-form__group">
                    <label class="cvb-label" for="cvb-email">E-mail *</label>
                    <input type="email" id="cvb-email" name="email" class="cvb-input" required placeholder="jan@example.com" />
                </div>
                <div class="cvb-form__group">
                    <label class="cvb-label" for="cvb-phone">Telefon</label>
                    <input type="tel" id="cvb-phone" name="phone" class="cvb-input" placeholder="+48 123 456 789" />
                </div>
            </div>

            <div class="cvb-form__row">
                <div class="cvb-form__group">
                    <label class="cvb-label" for="cvb-job-title">Stanowisko</label>
                    <input type="text" id="cvb-job-title" name="job_title" class="cvb-input" placeholder="Frontend Developer" />
                </div>
                <div class="cvb-form__group">
                    <label class="cvb-label" for="cvb-dob">Data urodzenia</label>
                    <input type="date" id="cvb-dob" name="date_of_birth" class="cvb-input" />
                </div>
            </div>

            <div class="cvb-form__group">
                <label class="cvb-label" for="cvb-address">Adres</label>
                <input type="text" id="cvb-address" name="address" class="cvb-input" placeholder="Warszawa, Polska" />
            </div>

            <div class="cvb-form__row">
                <div class="cvb-form__group">
                    <label class="cvb-label" for="cvb-linkedin">LinkedIn</label>
                    <input type="url" id="cvb-linkedin" name="linkedin" class="cvb-input" placeholder="https://linkedin.com/in/..." />
                </div>
                <div class="cvb-form__group">
                    <label class="cvb-label" for="cvb-website">Strona www</label>
                    <input type="url" id="cvb-website" name="website" class="cvb-input" placeholder="https://..." />
                </div>
            </div>

            <div class="cvb-form__group">
                <label class="cvb-label" for="cvb-photo">Zdjęcie profilowe</label>
                <div class="cvb-photo-upload">
                    <div class="cvb-photo-upload__preview" id="cvb-photo-preview">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="#9ca3af" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 1 0-16 0"/></svg>
                    </div>
                    <input type="file" id="cvb-photo" name="photo" accept="image/*" class="cvb-input--file" />
                    <label for="cvb-photo" class="cvb-btn cvb-btn--outline cvb-btn--sm">Wybierz zdjęcie</label>
                </div>
            </div>

            <div class="cvb-form__group">
                <label class="cvb-label" for="cvb-summary">O mnie</label>
                <textarea id="cvb-summary" name="summary" class="cvb-textarea" rows="4" placeholder="Krótki opis Twojego doświadczenia, celów zawodowych..."></textarea>
            </div>
        </form>
    </section>

    <!-- ===== STEP 3: EXPERIENCE ===== -->
    <section class="cvb-section" data-step-content="3" style="display:none;">
        <h2 class="cvb-section__title">Doświadczenie zawodowe</h2>
        <p class="cvb-section__desc">Dodaj swoje doświadczenie, zaczynając od najnowszego.</p>

        <div id="cvb-experience-list" class="cvb-repeater"></div>

        <button type="button" class="cvb-btn cvb-btn--outline" data-action="add-experience">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Dodaj doświadczenie
        </button>
    </section>

    <!-- ===== STEP 4: EDUCATION ===== -->
    <section class="cvb-section" data-step-content="4" style="display:none;">
        <h2 class="cvb-section__title">Wykształcenie</h2>
        <p class="cvb-section__desc">Dodaj swoje wykształcenie.</p>

        <div id="cvb-education-list" class="cvb-repeater"></div>

        <button type="button" class="cvb-btn cvb-btn--outline" data-action="add-education">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Dodaj wykształcenie
        </button>
    </section>

    <!-- ===== STEP 5: SKILLS ===== -->
    <section class="cvb-section" data-step-content="5" style="display:none;">
        <h2 class="cvb-section__title">Umiejętności</h2>

        <div class="cvb-skills-grid">
            <div class="cvb-form__group">
                <label class="cvb-label">Umiejętności techniczne (hard skills)</label>
                <div class="cvb-tags-input" id="cvb-hard-skills">
                    <input type="text" class="cvb-input cvb-tags-input__field" placeholder="Wpisz i naciśnij Enter..." data-tags-for="hard" />
                    <div class="cvb-tags-input__tags"></div>
                </div>
            </div>

            <div class="cvb-form__group">
                <label class="cvb-label">Umiejętności miękkie (soft skills)</label>
                <div class="cvb-tags-input" id="cvb-soft-skills">
                    <input type="text" class="cvb-input cvb-tags-input__field" placeholder="Wpisz i naciśnij Enter..." data-tags-for="soft" />
                    <div class="cvb-tags-input__tags"></div>
                </div>
            </div>
        </div>

        <div class="cvb-form__group" style="margin-top:1.5rem;">
            <label class="cvb-label">Języki</label>
            <div id="cvb-languages-list" class="cvb-repeater"></div>
            <button type="button" class="cvb-btn cvb-btn--outline cvb-btn--sm" data-action="add-language">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Dodaj język
            </button>
        </div>

        <div class="cvb-form__group" style="margin-top:1.5rem;">
            <label class="cvb-label">Zainteresowania</label>
            <div class="cvb-tags-input" id="cvb-interests">
                <input type="text" class="cvb-input cvb-tags-input__field" placeholder="Wpisz i naciśnij Enter..." data-tags-for="interests" />
                <div class="cvb-tags-input__tags"></div>
            </div>
        </div>
    </section>

    <!-- ===== STEP 6: PREVIEW & DOWNLOAD ===== -->
    <section class="cvb-section" data-step-content="6" style="display:none;">
        <h2 class="cvb-section__title">Podgląd i pobieranie</h2>

        <div class="cvb-preview-actions">
            <div class="cvb-preview-actions__left">
                <label class="cvb-label" for="cvb-template-switch">Szablon:</label>
                <select id="cvb-template-switch" class="cvb-select">
                    <?php foreach ( $templates as $id => $name ) : ?>
                        <option value="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $name ); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="cvb-preview-actions__right">
                <button type="button" class="cvb-btn cvb-btn--primary" data-action="download" data-format="pdf">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    Pobierz PDF
                </button>
                <button type="button" class="cvb-btn cvb-btn--outline" data-action="download" data-format="jpg">Pobierz JPG</button>
                <button type="button" class="cvb-btn cvb-btn--outline" data-action="download" data-format="png">Pobierz PNG</button>
            </div>
        </div>

        <div class="cvb-preview-container" id="cvb-preview-container">
            <div class="cvb-preview__cv" id="cvb-preview-cv">
                <!-- CV HTML rendered here -->
            </div>
        </div>
    </section>

    <!-- ===== NAVIGATION BUTTONS ===== -->
    <div class="cvb-nav-buttons" style="display:none;">
        <button type="button" class="cvb-btn cvb-btn--ghost" data-action="prev-step" style="display:none;">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Wstecz
        </button>
        <button type="button" class="cvb-btn cvb-btn--primary" data-action="next-step">
            Dalej
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </button>
    </div>

    <!-- ===== PAYWALL MODAL ===== -->
    <div class="cvb-modal" id="cvb-paywall-modal" style="display:none;">
        <div class="cvb-modal__backdrop" data-action="close-modal"></div>
        <div class="cvb-modal__content">
            <button type="button" class="cvb-modal__close" data-action="close-modal">&times;</button>
            <div class="cvb-modal__icon">
                <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="#f59e0b" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            </div>
            <h3 class="cvb-modal__title">Kup dostęp do CV Builder</h3>
            <p class="cvb-modal__desc">Jednorazowa płatność – <?php echo esc_html( $price ); ?> za 30 dni dostępu. Pobieraj CV w PDF, JPG i PNG bez ograniczeń.</p>

            <div class="cvb-modal__price"><?php echo esc_html( $price ); ?></div>
            <p class="cvb-modal__price-note">jednorazowo / 30 dni</p>

            <div class="cvb-modal__payment-methods">
                <span class="cvb-payment-badge">BLIK</span>
                <span class="cvb-payment-badge">Karta</span>
                <span class="cvb-payment-badge">Przelew (P24)</span>
            </div>

            <form id="cvb-payment-form" class="cvb-modal__form">
                <?php if ( ! $is_logged_in ) : ?>
                    <div class="cvb-form__group">
                        <label class="cvb-label" for="cvb-payment-email">Twój e-mail</label>
                        <input type="email" id="cvb-payment-email" class="cvb-input" required placeholder="jan@example.com" />
                    </div>
                <?php endif; ?>
                <button type="submit" class="cvb-btn cvb-btn--primary cvb-btn--lg cvb-btn--full">
                    Zapłać <?php echo esc_html( $price ); ?>
                </button>
            </form>

            <p class="cvb-modal__footer-text">
                Bezpieczna płatność przez <strong>Stripe</strong>. Nie przechowujemy danych karty.
            </p>
        </div>
    </div>

    <!-- ===== LOGIN MODAL ===== -->
    <div class="cvb-modal" id="cvb-login-modal" style="display:none;">
        <div class="cvb-modal__backdrop" data-action="close-modal"></div>
        <div class="cvb-modal__content">
            <button type="button" class="cvb-modal__close" data-action="close-modal">&times;</button>
            <h3 class="cvb-modal__title">Zaloguj się</h3>
            <p class="cvb-modal__desc">Zaloguj się, aby zapisać i zarządzać swoimi CV.</p>

            <div class="cvb-social-login">
                <button type="button" class="cvb-btn cvb-btn--social cvb-btn--google cvb-btn--full" data-action="social-auth" data-provider="google">
                    <svg viewBox="0 0 24 24" width="20" height="20"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    Kontynuuj z Google
                </button>
                <button type="button" class="cvb-btn cvb-btn--social cvb-btn--linkedin cvb-btn--full" data-action="social-auth" data-provider="linkedin">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="#0A66C2"><path d="M20.5 2h-17A1.5 1.5 0 002 3.5v17A1.5 1.5 0 003.5 22h17a1.5 1.5 0 001.5-1.5v-17A1.5 1.5 0 0020.5 2zM8 19H5v-9h3zM6.5 8.25A1.75 1.75 0 118.3 6.5a1.78 1.78 0 01-1.8 1.75zM19 19h-3v-4.74c0-1.42-.6-1.93-1.38-1.93A1.74 1.74 0 0013 14.19a.66.66 0 000 .14V19h-3v-9h2.9v1.3a3.11 3.11 0 012.7-1.4c1.55 0 3.36.86 3.36 3.66z"/></svg>
                    Kontynuuj z LinkedIn
                </button>
                <button type="button" class="cvb-btn cvb-btn--social cvb-btn--facebook cvb-btn--full" data-action="social-auth" data-provider="facebook">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    Kontynuuj z Facebook
                </button>
            </div>
        </div>
    </div>

    <!-- ===== TOAST NOTIFICATIONS ===== -->
    <div class="cvb-toasts" id="cvb-toasts"></div>

    <!-- ===== RODO FOOTER ===== -->
    <footer class="cvb-footer">
        <label class="cvb-checkbox">
            <input type="checkbox" id="cvb-rodo" checked />
            <span>Wyrażam zgodę na przetwarzanie moich danych osobowych zawartych w CV na potrzeby rekrutacji, zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. (RODO).</span>
        </label>
    </footer>
</div>
