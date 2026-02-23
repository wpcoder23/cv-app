<?php
/**
 * Template Name: Landing Page
 * Full landing page for CV Builder SaaS.
 */

defined( 'ABSPATH' ) || exit;

get_header();

$app_url = cvl_get_app_url();
?>

<!-- ===== HERO ===== -->
<section class="hero" id="hero">
    <div class="container">
        <div class="hero__content">
            <span class="hero__badge">Nowe narzędzie &bull; Cena na start</span>
            <h1 class="hero__title">Nie rób CV od zera.<br /><span class="hero__highlight">Wrzuć stare, dostaniesz nowe.</span></h1>
            <p class="hero__desc">Masz CV w Wordzie, PDF albo nawet zdjęcie? Wrzuć to tutaj. AI wyciągnie dane i zrobi z tego profesjonalne CV. Albo zacznij od pustego szablonu &ndash; jak wolisz.</p>

            <div class="hero__actions">
                <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--primary btn--lg">
                    Zrób mi CV
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="#jak-to-dziala" class="btn btn--ghost btn--lg">Jak to działa?</a>
            </div>

            <ul class="hero__perks">
                <li>
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    Bez rejestracji
                </li>
                <li>
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    29 zł jednorazowo
                </li>
                <li>
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    Gotowe w 3 minuty
                </li>
            </ul>
        </div>

        <div class="hero__visual">
            <div class="hero__mockup">
                <div class="hero__screen">
                    <!-- Before / After visual -->
                    <div class="hero__before-after">
                        <div class="hero__ba-side hero__ba-before">
                            <div class="ba-label">Twoje stare CV</div>
                            <div class="ba-doc ba-doc--ugly">
                                <div class="ba-doc__line w100" style="background:#000;height:6px;margin-bottom:12px;"></div>
                                <div class="ba-doc__line w80"></div>
                                <div class="ba-doc__line w90"></div>
                                <div class="ba-doc__line w60"></div>
                                <div class="ba-doc__line w100" style="background:#000;height:6px;margin:12px 0 8px;"></div>
                                <div class="ba-doc__line w90"></div>
                                <div class="ba-doc__line w70"></div>
                                <div class="ba-doc__line w80"></div>
                            </div>
                        </div>
                        <div class="hero__ba-arrow">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </div>
                        <div class="hero__ba-side hero__ba-after">
                            <div class="ba-label">Nowe CV</div>
                            <div class="ba-doc ba-doc--pretty">
                                <div class="ba-doc__header"></div>
                                <div class="ba-doc__body">
                                    <div class="ba-doc__line w70"></div>
                                    <div class="ba-doc__line w50"></div>
                                    <div class="ba-doc__accent"></div>
                                    <div class="ba-doc__line w90"></div>
                                    <div class="ba-doc__line w60"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__glow"></div>
            </div>
        </div>
    </div>
</section>

<!-- ===== AI IMPORT (KEY DIFFERENTIATOR) ===== -->
<section class="ai-import" id="ai-import">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Nowość</span>
            <h2 class="section-title">Wrzuć cokolwiek &ndash; AI zrobi resztę</h2>
            <p class="section-desc">Nie przepisuj danych ręcznie. Wrzuć stare CV, a AI wyciągnie z niego wszystko i ułoży w nowym szablonie.</p>
        </div>

        <div class="ai-import__grid">
            <!-- Social import - highlighted -->
            <div class="ai-import__social">
                <h3 class="ai-import__social-title">Najszybciej? Zaloguj się i gotowe.</h3>
                <p class="ai-import__social-desc">Kliknij przycisk, dane ściągną się automatycznie: imię, nazwisko, stanowisko, doświadczenie, wykształcenie. Zero przepisywania.</p>
                <div class="ai-import__social-buttons">
                    <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--social btn--social-linkedin btn--lg">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="#fff"><path d="M20.5 2h-17A1.5 1.5 0 002 3.5v17A1.5 1.5 0 003.5 22h17a1.5 1.5 0 001.5-1.5v-17A1.5 1.5 0 0020.5 2zM8 19H5v-9h3zM6.5 8.25A1.75 1.75 0 118.3 6.5a1.78 1.78 0 01-1.8 1.75zM19 19h-3v-4.74c0-1.42-.6-1.93-1.38-1.93A1.74 1.74 0 0013 14.19a.66.66 0 000 .14V19h-3v-9h2.9v1.3a3.11 3.11 0 012.7-1.4c1.55 0 3.36.86 3.36 3.66z"/></svg>
                        Importuj z LinkedIn
                    </a>
                    <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--social btn--social-google btn--lg">
                        <svg viewBox="0 0 24 24" width="22" height="22"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                        Importuj z Google
                    </a>
                    <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--social btn--social-facebook btn--lg">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="#fff"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        Importuj z Facebook
                    </a>
                </div>
            </div>

            <div class="ai-import__divider">
                <span>albo wrzuć plik</span>
            </div>

            <div class="ai-import__formats">
                <div class="ai-format">
                    <div class="ai-format__icon">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    </div>
                    <h4>PDF</h4>
                    <p>Stare CV w PDF? Wrzuć, AI odczyta.</p>
                </div>
                <div class="ai-format">
                    <div class="ai-format__icon">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    </div>
                    <h4>Zdjęcie / JPG</h4>
                    <p>Zrobiłeś fotkę CV? To wystarczy.</p>
                </div>
                <div class="ai-format">
                    <div class="ai-format__icon">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    </div>
                    <h4>Word / tekst</h4>
                    <p>Skopiuj tekst albo wrzuć .docx.</p>
                </div>
            </div>

            <div class="ai-import__cta">
                <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--primary btn--lg">Wrzuć swoje stare CV</a>
                <p class="ai-import__note">albo <a href="<?php echo esc_url( $app_url ); ?>">zacznij od pustego szablonu</a></p>
            </div>
        </div>
    </div>
</section>

<!-- ===== BENEFITS (rewritten as outcomes) ===== -->
<section class="benefits" id="zalety">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Po co to komu</span>
            <h2 class="section-title">Bo robienie CV to strata czasu</h2>
            <p class="section-desc">Chcesz mieć ładne CV i wysłać je dziś. Nie chcesz spędzić godziny w Wordzie.</p>
        </div>

        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--blue">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <h3>Gotowe w 3 minuty, nie w 3 godziny</h3>
                <p>Wrzuć stare CV albo wypełnij formularz. AI dopasuje dane do szablonu. Ty tylko klikasz &bdquo;pobierz.&rdquo;</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--green">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <h3>Wygląda profesjonalnie (bez designera)</h3>
                <p>10 szablonów zaprojektowanych tak, żeby rekruter chciał czytać dalej. Nie musisz nic ustawiać.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--purple">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                </div>
                <h3>PDF na maila, JPG na LinkedIn</h3>
                <p>Pobierz w formacie, który potrzebujesz. Jedno kliknięcie &ndash; plik na dysku. Koniec.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--amber">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <h3>29 zł. Raz. Bez subskrypcji.</h3>
                <p>Tańsze niż kawa w Starbucksie. Żadnego &bdquo;49$/mies&rdquo; jak w innych narzędziach. Płacisz kiedy chcesz, nie co miesiąc.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--rose">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Bez zakładania konta na start</h3>
                <p>Otwierasz stronę i robisz CV. Konto? Tworzymy je automatycznie przy płatności. Zero formularzy rejestracji.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--teal">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                </div>
                <h3>BLIK i masz dostęp</h3>
                <p>Płatność BLIKiem, kartą albo przelewem. 5 sekund i gotowe. Bez wpisywania danych karty jeśli nie chcesz.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== HOW IT WORKS (SLIDER) ===== -->
<section class="how-it-works" id="jak-to-dziala">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Jak to działa</span>
            <h2 class="section-title">3 kroki. Bez czytania instrukcji.</h2>
            <p class="section-desc">Otwierasz, wrzucasz, pobierasz. Tyle.</p>
        </div>

        <!-- Steps -->
        <div class="steps-nav" id="steps-nav">
            <button class="step-tab is-active" data-step="0">
                <span class="step-tab__num">1</span>
                <span class="step-tab__text">Wrzuć lub wypełnij</span>
            </button>
            <button class="step-tab" data-step="1">
                <span class="step-tab__num">2</span>
                <span class="step-tab__text">Wybierz szablon</span>
            </button>
            <button class="step-tab" data-step="2">
                <span class="step-tab__num">3</span>
                <span class="step-tab__text">Pobierz CV</span>
            </button>
        </div>

        <!-- Slider -->
        <div class="slider" id="how-slider">
            <div class="slider__track">
                <!-- Slide 1: Upload or fill -->
                <div class="slider__slide is-active">
                    <div class="slide-content">
                        <div class="slide-content__text">
                            <h3>Wrzuć stare CV albo zacznij od zera</h3>
                            <p>Masz CV w PDF, Wordzie albo nawet jako zdjęcie? Wrzuć to. AI wyciągnie dane: imię, doświadczenie, umiejętności. Albo wypełnij formularz ręcznie &ndash; zajmuje kilka minut.</p>
                            <ul class="slide-features">
                                <li>AI import z PDF, JPG, DOCX, tekstu</li>
                                <li>Import jednym klikiem z LinkedIn lub Google</li>
                                <li>Albo klasyczny formularz krok po kroku</li>
                            </ul>
                        </div>
                        <div class="slide-content__image">
                            <div class="placeholder-slide">
                                <div class="ph-upload-zone">
                                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="#2563eb" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                    <p style="font-size:0.8125rem;color:var(--gray-500);margin-top:0.5rem;">Wrzuć plik lub kliknij</p>
                                </div>
                                <p class="ph-caption">Strefa uploadu pliku</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Choose template -->
                <div class="slider__slide">
                    <div class="slide-content">
                        <div class="slide-content__text">
                            <h3>Wybierz szablon &ndash; dane się podstawią</h3>
                            <p>10 szablonów. Od klasycznego po nowoczesny, techniczny i kreatywny. Klikasz, dane się wstawiają, widzisz podgląd na żywo. Nie pasuje? Zmień szablon jednym klikiem.</p>
                            <ul class="slide-features">
                                <li>10 szablonów zoptymalizowanych pod ATS</li>
                                <li>Podgląd na żywo &ndash; widzisz zmiany natychmiast</li>
                                <li>Zmiana szablonu nie kasuje danych</li>
                            </ul>
                        </div>
                        <div class="slide-content__image">
                            <div class="placeholder-slide">
                                <div class="ph-grid-3">
                                    <div class="ph-card"><div class="ph-card-top bg-brown"></div><div class="ph-card-body"></div></div>
                                    <div class="ph-card"><div class="ph-card-top bg-blue"></div><div class="ph-card-body"></div></div>
                                    <div class="ph-card"><div class="ph-card-top bg-purple"></div><div class="ph-card-body"></div></div>
                                </div>
                                <p class="ph-caption">Siatka szablonów do wyboru</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Download -->
                <div class="slider__slide">
                    <div class="slide-content">
                        <div class="slide-content__text">
                            <h3>Pobierz i wyślij rekruterowi</h3>
                            <p>PDF na maila, JPG na LinkedIn, PNG do portfolio. Jedno kliknięcie. Plik na dysku. Możesz wysłać CV jeszcze dziś.</p>
                            <ul class="slide-features">
                                <li>PDF &ndash; standard do wysyłki mailem</li>
                                <li>JPG &ndash; do wrzucenia na LinkedIn</li>
                                <li>PNG &ndash; najwyższa jakość do portfolio</li>
                            </ul>
                        </div>
                        <div class="slide-content__image">
                            <div class="placeholder-slide">
                                <div class="ph-download">
                                    <div class="ph-file-icon">
                                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="#2563eb" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                                    </div>
                                    <div class="ph-download-btns">
                                        <div class="ph-dbtn">PDF</div>
                                        <div class="ph-dbtn">JPG</div>
                                        <div class="ph-dbtn">PNG</div>
                                    </div>
                                </div>
                                <p class="ph-caption">Wybór formatu do pobrania</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider arrows -->
            <div class="slider__controls">
                <button class="slider__arrow slider__arrow--prev" id="slider-prev" aria-label="Poprzedni">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <div class="slider__dots" id="slider-dots">
                    <button class="slider__dot is-active" data-index="0"></button>
                    <button class="slider__dot" data-index="1"></button>
                    <button class="slider__dot" data-index="2"></button>
                </div>
                <button class="slider__arrow slider__arrow--next" id="slider-next" aria-label="Następny">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ===== TEMPLATES SHOWCASE ===== -->
<section class="templates-showcase" id="szablony">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Szablony</span>
            <h2 class="section-title">10 szablonów. Każdy wygląda dobrze.</h2>
            <p class="section-desc">Nie musisz być grafikiem. Wybierz szablon, dane się wstawią, wygląda profesjonalnie.</p>
        </div>

        <div class="templates-grid">

            <!-- 1. Classic: Left sidebar with circle photo + name, right content -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;display:flex;flex-direction:row;">
                        <!-- Left sidebar 35% -->
                        <div style="width:35%;background:#3b2a1a;padding:10px 6px;display:flex;flex-direction:column;align-items:center;gap:6px;">
                            <div style="width:28px;height:28px;border-radius:50%;background:#f0b527;margin-top:6px;"></div>
                            <div style="width:80%;height:5px;background:rgba(255,255,255,.7);border-radius:2px;"></div>
                            <div style="width:60%;height:3px;background:rgba(255,255,255,.4);border-radius:2px;"></div>
                            <div style="width:70%;height:1px;background:rgba(240,181,39,.3);margin:4px 0;"></div>
                            <div style="width:75%;height:3px;background:rgba(255,255,255,.35);border-radius:2px;"></div>
                            <div style="width:65%;height:3px;background:rgba(255,255,255,.35);border-radius:2px;"></div>
                            <div style="width:70%;height:3px;background:rgba(255,255,255,.35);border-radius:2px;"></div>
                            <div style="width:70%;height:1px;background:rgba(240,181,39,.3);margin:4px 0;"></div>
                            <div style="width:60%;height:3px;background:rgba(255,255,255,.35);border-radius:2px;"></div>
                            <div style="width:75%;height:3px;background:rgba(255,255,255,.35);border-radius:2px;"></div>
                        </div>
                        <!-- Right content 65% -->
                        <div style="flex:1;padding:12px 8px;background:#fff;display:flex;flex-direction:column;gap:4px;">
                            <div style="width:60%;height:5px;background:#3b2a1a;border-radius:2px;margin-bottom:2px;"></div>
                            <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:80%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:85%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:50%;height:5px;background:#f0b527;border-radius:2px;margin-top:6px;"></div>
                            <div style="width:95%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:75%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:88%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:45%;height:5px;background:#f0b527;border-radius:2px;margin-top:6px;"></div>
                            <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:70%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Klasyczny</h4>
                    <p>Ciep&#322;e br&#261;zy i z&#322;oto. Pasuje wsz&#281;dzie.</p>
                </div>
            </div>

            <!-- 2. Modern: Full-width blue header, two 50/50 columns below -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;display:flex;flex-direction:column;">
                        <!-- Full-width header bar -->
                        <div style="background:#1e40af;padding:10px 8px;">
                            <div style="width:55%;height:6px;background:rgba(255,255,255,.8);border-radius:2px;margin-bottom:4px;"></div>
                            <div style="width:80%;height:3px;background:rgba(255,255,255,.35);border-radius:2px;"></div>
                        </div>
                        <!-- Two columns 50/50 -->
                        <div style="flex:1;display:flex;flex-direction:row;background:#fff;">
                            <div style="width:50%;padding:8px 6px;border-right:1px solid #e5e7eb;display:flex;flex-direction:column;gap:4px;">
                                <div style="width:70%;height:4px;background:#3b82f6;border-radius:2px;"></div>
                                <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                                <div style="width:75%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                                <div style="width:85%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                                <div style="width:65%;height:4px;background:#3b82f6;border-radius:2px;margin-top:4px;"></div>
                                <div style="width:80%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                                <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            </div>
                            <div style="width:50%;padding:8px 6px;display:flex;flex-direction:column;gap:4px;">
                                <div style="width:75%;height:4px;background:#3b82f6;border-radius:2px;"></div>
                                <div style="width:85%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                                <div style="width:70%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                                <div style="width:60%;height:4px;background:#3b82f6;border-radius:2px;margin-top:4px;"></div>
                                <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                                <div style="width:80%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                                <div style="width:75%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Nowoczesny</h4>
                    <p>Dwie kolumny, niebieski akcent.</p>
                </div>
            </div>

            <!-- 3. Creative: Gradient header, centered circle overlapping boundary, centered content -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;display:flex;flex-direction:column;position:relative;background:#fff;">
                        <!-- Gradient header -->
                        <div style="background:linear-gradient(135deg,#7c3aed,#a78bfa);height:30%;"></div>
                        <!-- Circle photo overlapping -->
                        <div style="position:absolute;top:22%;left:50%;transform:translateX(-50%);width:30px;height:30px;border-radius:50%;background:#e9d5ff;border:3px solid #fff;z-index:2;box-shadow:0 2px 6px rgba(0,0,0,.15);"></div>
                        <!-- Content below, centered -->
                        <div style="flex:1;padding:22px 10px 8px;display:flex;flex-direction:column;align-items:center;gap:4px;">
                            <div style="width:50%;height:5px;background:#7c3aed;border-radius:2px;"></div>
                            <div style="width:65%;height:3px;background:#d1d5db;border-radius:2px;"></div>
                            <div style="width:40%;height:1px;background:#a78bfa;margin:4px 0;"></div>
                            <div style="width:80%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:70%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:75%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:40%;height:1px;background:#a78bfa;margin:4px 0;"></div>
                            <div style="width:85%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:65%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Kreatywny</h4>
                    <p>Dla designer&#243;w i marketer&#243;w.</p>
                </div>
            </div>

            <!-- 4. Minimal: No colored header, thin lines, lots of white space -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;background:#f9fafb;padding:14px 10px;display:flex;flex-direction:column;gap:6px;">
                        <!-- Name area -->
                        <div style="width:45%;height:5px;background:#374151;border-radius:1px;"></div>
                        <div style="width:65%;height:3px;background:#9ca3af;border-radius:1px;"></div>
                        <div style="width:100%;height:1px;background:#d1d5db;margin:4px 0;"></div>
                        <!-- Section 1 -->
                        <div style="width:35%;height:4px;background:#374151;border-radius:1px;"></div>
                        <div style="width:85%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                        <div style="width:75%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                        <div style="width:100%;height:1px;background:#d1d5db;margin:4px 0;"></div>
                        <!-- Section 2 -->
                        <div style="width:30%;height:4px;background:#374151;border-radius:1px;"></div>
                        <div style="width:90%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                        <div style="width:70%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                        <div style="width:100%;height:1px;background:#d1d5db;margin:4px 0;"></div>
                        <!-- Section 3 -->
                        <div style="width:40%;height:4px;background:#374151;border-radius:1px;"></div>
                        <div style="width:80%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                        <div style="width:60%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Minimalistyczny</h4>
                    <p>Du&#380;o bieli, zero ba&#322;aganu.</p>
                </div>
            </div>

            <!-- 5. Professional: Wide dark sidebar left (45%), narrow content right -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;display:flex;flex-direction:row;">
                        <!-- Wide dark sidebar 45% -->
                        <div style="width:45%;background:#1f2937;padding:12px 6px;display:flex;flex-direction:column;align-items:center;gap:5px;">
                            <div style="width:32px;height:32px;border-radius:50%;background:#4b5563;margin-bottom:2px;"></div>
                            <div style="width:75%;height:5px;background:rgba(255,255,255,.6);border-radius:2px;"></div>
                            <div style="width:55%;height:3px;background:rgba(255,255,255,.3);border-radius:2px;"></div>
                            <div style="width:80%;height:1px;background:#6b7280;margin:2px 0;"></div>
                            <div style="width:70%;height:3px;background:rgba(255,255,255,.3);border-radius:2px;"></div>
                            <div style="width:60%;height:3px;background:rgba(255,255,255,.3);border-radius:2px;"></div>
                            <div style="width:80%;height:1px;background:#6b7280;margin:2px 0;"></div>
                            <div style="width:65%;height:3px;background:rgba(255,255,255,.3);border-radius:2px;"></div>
                            <div style="width:75%;height:3px;background:rgba(255,255,255,.3);border-radius:2px;"></div>
                            <div style="width:55%;height:3px;background:rgba(255,255,255,.3);border-radius:2px;"></div>
                        </div>
                        <!-- Narrow content right -->
                        <div style="flex:1;padding:12px 6px;background:#fff;display:flex;flex-direction:column;gap:4px;">
                            <div style="width:65%;height:4px;background:#1f2937;border-radius:2px;"></div>
                            <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:80%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:55%;height:4px;background:#6b7280;border-radius:2px;margin-top:4px;"></div>
                            <div style="width:85%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:70%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:50%;height:4px;background:#6b7280;border-radius:2px;margin-top:4px;"></div>
                            <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:75%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Profesjonalny</h4>
                    <p>Ciemny sidebar. Korporacyjny styl.</p>
                </div>
            </div>

            <!-- 6. Executive: Thin line at top, large centered name block, horizontal rule, content -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;background:#fff;display:flex;flex-direction:column;">
                        <!-- Thin colored line at very top -->
                        <div style="width:100%;height:3px;background:#44403c;"></div>
                        <!-- Large centered name block -->
                        <div style="padding:14px 10px 8px;display:flex;flex-direction:column;align-items:center;gap:4px;">
                            <div style="width:55%;height:7px;background:#44403c;border-radius:1px;"></div>
                            <div style="width:70%;height:3px;background:#a8a29e;border-radius:1px;"></div>
                        </div>
                        <!-- Horizontal rule -->
                        <div style="width:80%;height:1px;background:#a8a29e;align-self:center;margin:2px auto;"></div>
                        <!-- Content below -->
                        <div style="flex:1;padding:8px 10px;display:flex;flex-direction:column;gap:4px;">
                            <div style="width:35%;height:4px;background:#44403c;border-radius:1px;"></div>
                            <div style="width:90%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                            <div style="width:80%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                            <div style="width:85%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                            <div style="width:30%;height:4px;background:#44403c;border-radius:1px;margin-top:4px;"></div>
                            <div style="width:75%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                            <div style="width:90%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                            <div style="width:35%;height:4px;background:#44403c;border-radius:1px;margin-top:4px;"></div>
                            <div style="width:85%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                            <div style="width:70%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Elegancki</h4>
                    <p>Seryfowe fonty. Dla kadry zarz&#261;dzaj&#261;cej.</p>
                </div>
            </div>

            <!-- 7. Tech: Full dark background, cyan accent lines, terminal feel -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;background:#0f172a;padding:10px 8px;display:flex;flex-direction:column;gap:5px;">
                        <!-- Terminal-style header -->
                        <div style="display:flex;gap:3px;margin-bottom:2px;">
                            <div style="width:6px;height:6px;border-radius:50%;background:#ef4444;"></div>
                            <div style="width:6px;height:6px;border-radius:50%;background:#eab308;"></div>
                            <div style="width:6px;height:6px;border-radius:50%;background:#22c55e;"></div>
                        </div>
                        <!-- Cursor / name line -->
                        <div style="display:flex;align-items:center;gap:4px;">
                            <div style="width:8px;height:5px;background:#38bdf8;border-radius:1px;"></div>
                            <div style="width:55%;height:5px;background:rgba(255,255,255,.7);border-radius:1px;"></div>
                        </div>
                        <div style="width:70%;height:3px;background:rgba(56,189,248,.3);border-radius:1px;"></div>
                        <!-- Content lines -->
                        <div style="width:45%;height:4px;background:#38bdf8;border-radius:1px;margin-top:4px;"></div>
                        <div style="width:85%;height:3px;background:rgba(255,255,255,.2);border-radius:1px;"></div>
                        <div style="width:75%;height:3px;background:rgba(255,255,255,.2);border-radius:1px;"></div>
                        <div style="width:40%;height:4px;background:#38bdf8;border-radius:1px;margin-top:4px;"></div>
                        <div style="width:90%;height:3px;background:rgba(255,255,255,.2);border-radius:1px;"></div>
                        <div style="width:65%;height:3px;background:rgba(255,255,255,.2);border-radius:1px;"></div>
                        <div style="width:80%;height:3px;background:rgba(255,255,255,.2);border-radius:1px;"></div>
                        <!-- Blinking cursor line -->
                        <div style="display:flex;align-items:center;gap:3px;margin-top:auto;">
                            <div style="width:8px;height:5px;background:#38bdf8;border-radius:1px;"></div>
                            <div style="width:2px;height:8px;background:#38bdf8;animation:none;"></div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Techniczny</h4>
                    <p>Dark mode, monospace. Dla programist&#243;w.</p>
                </div>
            </div>

            <!-- 8. Academic: No sidebar, date column left (narrow), content right -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;background:#fff;display:flex;flex-direction:column;">
                        <!-- Top name area -->
                        <div style="padding:10px 8px 6px;border-bottom:2px solid #1e3a5f;">
                            <div style="width:50%;height:6px;background:#1e3a5f;border-radius:1px;margin-bottom:3px;"></div>
                            <div style="width:75%;height:3px;background:#9ca3af;border-radius:1px;"></div>
                        </div>
                        <!-- Date-column | content layout -->
                        <div style="flex:1;padding:6px 8px;display:flex;flex-direction:column;gap:6px;">
                            <!-- Section heading -->
                            <div style="width:40%;height:4px;background:#1e3a5f;border-radius:1px;"></div>
                            <!-- Row 1: date | desc -->
                            <div style="display:flex;gap:6px;align-items:flex-start;">
                                <div style="width:25%;display:flex;flex-direction:column;gap:2px;flex-shrink:0;">
                                    <div style="width:100%;height:3px;background:#60a5fa;border-radius:1px;"></div>
                                </div>
                                <div style="flex:1;display:flex;flex-direction:column;gap:2px;">
                                    <div style="width:90%;height:3px;background:#d1d5db;border-radius:1px;"></div>
                                    <div style="width:75%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                                </div>
                            </div>
                            <!-- Row 2: date | desc -->
                            <div style="display:flex;gap:6px;align-items:flex-start;">
                                <div style="width:25%;display:flex;flex-direction:column;gap:2px;flex-shrink:0;">
                                    <div style="width:100%;height:3px;background:#60a5fa;border-radius:1px;"></div>
                                </div>
                                <div style="flex:1;display:flex;flex-direction:column;gap:2px;">
                                    <div style="width:85%;height:3px;background:#d1d5db;border-radius:1px;"></div>
                                    <div style="width:70%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                                </div>
                            </div>
                            <!-- Section 2 heading -->
                            <div style="width:35%;height:4px;background:#1e3a5f;border-radius:1px;margin-top:2px;"></div>
                            <!-- Row 3: date | desc -->
                            <div style="display:flex;gap:6px;align-items:flex-start;">
                                <div style="width:25%;display:flex;flex-direction:column;gap:2px;flex-shrink:0;">
                                    <div style="width:100%;height:3px;background:#60a5fa;border-radius:1px;"></div>
                                </div>
                                <div style="flex:1;display:flex;flex-direction:column;gap:2px;">
                                    <div style="width:80%;height:3px;background:#d1d5db;border-radius:1px;"></div>
                                    <div style="width:65%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                                </div>
                            </div>
                            <!-- Row 4: date | desc -->
                            <div style="display:flex;gap:6px;align-items:flex-start;">
                                <div style="width:25%;display:flex;flex-direction:column;gap:2px;flex-shrink:0;">
                                    <div style="width:100%;height:3px;background:#60a5fa;border-radius:1px;"></div>
                                </div>
                                <div style="flex:1;display:flex;flex-direction:column;gap:2px;">
                                    <div style="width:90%;height:3px;background:#d1d5db;border-radius:1px;"></div>
                                    <div style="width:60%;height:3px;background:#e5e7eb;border-radius:1px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Akademicki</h4>
                    <p>Tradycyjny uk&#322;ad. Dla naukowc&#243;w.</p>
                </div>
            </div>

            <!-- 9. Bold: Big red block header 40%, large white circle, card-style sections -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;display:flex;flex-direction:column;position:relative;background:#fef2f2;">
                        <!-- Big red header 40% -->
                        <div style="background:#dc2626;height:40%;display:flex;align-items:center;justify-content:center;">
                            <div style="width:36px;height:36px;border-radius:50%;background:#fff;box-shadow:0 2px 8px rgba(0,0,0,.2);"></div>
                        </div>
                        <!-- Card-style sections below -->
                        <div style="flex:1;padding:8px 6px;display:flex;flex-direction:column;gap:5px;">
                            <!-- Card 1 -->
                            <div style="background:#fff;border-radius:4px;padding:5px 6px;box-shadow:0 1px 3px rgba(0,0,0,.08);">
                                <div style="width:50%;height:4px;background:#dc2626;border-radius:2px;margin-bottom:3px;"></div>
                                <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;margin-bottom:2px;"></div>
                                <div style="width:75%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            </div>
                            <!-- Card 2 -->
                            <div style="background:#fff;border-radius:4px;padding:5px 6px;box-shadow:0 1px 3px rgba(0,0,0,.08);">
                                <div style="width:45%;height:4px;background:#dc2626;border-radius:2px;margin-bottom:3px;"></div>
                                <div style="width:85%;height:3px;background:#e5e7eb;border-radius:2px;margin-bottom:2px;"></div>
                                <div style="width:70%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            </div>
                            <!-- Card 3 -->
                            <div style="background:#fff;border-radius:4px;padding:5px 6px;box-shadow:0 1px 3px rgba(0,0,0,.08);">
                                <div style="width:55%;height:4px;background:#fca5a5;border-radius:2px;margin-bottom:3px;"></div>
                                <div style="width:80%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Odwa&#380;ny</h4>
                    <p>Du&#380;a typografia, czerwone akcenty.</p>
                </div>
            </div>

            <!-- 10. Nordic: Light green bg, rounded cards for sections, circular photo with green border -->
            <div class="template-preview-card">
                <div class="template-preview-card__thumb">
                    <div style="width:100%;height:100%;background:#f0fdf4;padding:10px 6px;display:flex;flex-direction:column;align-items:center;gap:5px;">
                        <!-- Circular photo with green border -->
                        <div style="width:30px;height:30px;border-radius:50%;background:#dcfce7;border:3px solid #22c55e;margin-bottom:2px;"></div>
                        <div style="width:50%;height:5px;background:#16a34a;border-radius:2px;"></div>
                        <div style="width:65%;height:3px;background:#86efac;border-radius:2px;"></div>
                        <!-- Section card 1 -->
                        <div style="width:92%;background:#fff;border-radius:6px;padding:5px 6px;display:flex;flex-direction:column;gap:2px;box-shadow:0 1px 3px rgba(0,0,0,.05);">
                            <div style="width:40%;height:4px;background:#22c55e;border-radius:2px;"></div>
                            <div style="width:85%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:70%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                        </div>
                        <!-- Section card 2 -->
                        <div style="width:92%;background:#fff;border-radius:6px;padding:5px 6px;display:flex;flex-direction:column;gap:2px;box-shadow:0 1px 3px rgba(0,0,0,.05);">
                            <div style="width:35%;height:4px;background:#22c55e;border-radius:2px;"></div>
                            <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:75%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                        </div>
                        <!-- Section card 3 -->
                        <div style="width:92%;background:#fff;border-radius:6px;padding:5px 6px;display:flex;flex-direction:column;gap:2px;box-shadow:0 1px 3px rgba(0,0,0,.05);">
                            <div style="width:45%;height:4px;background:#22c55e;border-radius:2px;"></div>
                            <div style="width:80%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                            <div style="width:65%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                        </div>
                    </div>
                </div>
                <div class="template-preview-card__info">
                    <h4>Skandynawski</h4>
                    <p>Zielone akcenty, spokojny styl.</p>
                </div>
            </div>
        </div>

        <div class="section-cta">
            <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--primary btn--lg">Wypróbuj szablony</a>
        </div>
    </div>
</section>

<!-- ===== PRICING ===== -->
<section class="pricing" id="cennik">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Cennik</span>
            <h2 class="section-title">29 zł. I tyle.</h2>
            <p class="section-desc">Nie ma subskrypcji. Nie ma ukrytych opłat. Płacisz raz, korzystasz 30 dni.</p>
        </div>

        <div class="pricing-cards">
            <!-- Free tier -->
            <div class="pricing-card">
                <div class="pricing-card__header">
                    <h3>Za darmo</h3>
                    <div class="pricing-card__price">
                        <span class="price-amount">0 zł</span>
                    </div>
                </div>
                <ul class="pricing-card__features">
                    <li class="is-included">Tworzenie i edycja CV</li>
                    <li class="is-included">10 szablonów do przeglądania</li>
                    <li class="is-included">Podgląd na żywo</li>
                    <li class="is-included">AI import z pliku</li>
                    <li class="is-excluded">Pobieranie PDF / JPG / PNG</li>
                    <li class="is-excluded">Zapis w chmurze</li>
                </ul>
                <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--outline btn--full">Zacznij za darmo</a>
            </div>

            <!-- Paid tier -->
            <div class="pricing-card pricing-card--featured">
                <div class="pricing-card__badge">Cena na start</div>
                <div class="pricing-card__header">
                    <h3>Pełny dostęp</h3>
                    <div class="pricing-card__price">
                        <span class="price-amount">29 zł</span>
                        <span class="price-period">jednorazowo &bull; 30 dni</span>
                    </div>
                </div>
                <ul class="pricing-card__features">
                    <li class="is-included">Wszystko z darmowego planu</li>
                    <li class="is-included"><strong>Pobieranie PDF bez limitu</strong></li>
                    <li class="is-included"><strong>Pobieranie JPG i PNG</strong></li>
                    <li class="is-included"><strong>Zapis CV w chmurze</strong></li>
                    <li class="is-included">Nieograniczona liczba CV</li>
                    <li class="is-included">Wsparcie e-mail</li>
                </ul>
                <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--primary btn--full btn--lg">Kup dostęp &ndash; 29 zł</a>
                <div class="pricing-card__payments">
                    <svg viewBox="0 0 62 32" width="52" height="27" xmlns="http://www.w3.org/2000/svg" class="payment-logo">
                        <rect width="62" height="32" rx="4" fill="#000"/>
                        <circle cx="12" cy="16" r="5.5" fill="#E6186C"/>
                        <circle cx="12" cy="16" r="2.5" fill="#fff"/>
                        <text x="22" y="21" fill="#fff" font-family="Arial,sans-serif" font-weight="700" font-size="14" letter-spacing="0.5">BLIK</text>
                    </svg>
                    <svg viewBox="0 0 48 32" width="40" height="27" xmlns="http://www.w3.org/2000/svg" class="payment-logo">
                        <rect width="48" height="32" rx="4" fill="#1A1F71"/>
                        <text x="24" y="21" fill="#fff" font-family="Arial,sans-serif" font-weight="700" font-size="13" text-anchor="middle" font-style="italic">VISA</text>
                    </svg>
                    <svg viewBox="0 0 48 32" width="40" height="27" xmlns="http://www.w3.org/2000/svg" class="payment-logo">
                        <rect width="48" height="32" rx="4" fill="#fff" stroke="#e5e7eb"/>
                        <circle cx="19" cy="16" r="9" fill="#EB001B" opacity="0.9"/>
                        <circle cx="29" cy="16" r="9" fill="#F79E1B" opacity="0.9"/>
                        <path d="M24 9.2a9 9 0 000 13.6 9 9 0 000-13.6z" fill="#FF5F00"/>
                    </svg>
                    <svg viewBox="0 0 48 32" width="40" height="27" xmlns="http://www.w3.org/2000/svg" class="payment-logo">
                        <rect width="48" height="32" rx="4" fill="#fff" stroke="#e5e7eb"/>
                        <text x="24" y="20" fill="#D40E2F" font-family="Arial,sans-serif" font-weight="700" font-size="9" text-anchor="middle">P24</text>
                    </svg>
                </div>
                <p class="pricing-card__note">Bezpiecznie przez Stripe</p>
            </div>
        </div>

        <div class="pricing-context">
            <p>Dla porównania: Canva Pro to 55 zł/mies. Zety to 90 zł/mies. U nas płacisz <strong>29 zł raz</strong> i nie musisz pamiętać o anulowaniu subskrypcji.</p>
        </div>
    </div>
</section>

<!-- ===== HONEST STORY (instead of fake testimonials) ===== -->
<section class="story">
    <div class="container container--narrow">
        <div class="story__inner">
            <h2>Dlaczego to zbudowaliśmy?</h2>
            <p>Bo sami nienawidzimy robić CV. Ostatni raz kiedy musieliśmy zaktualizować CV, spędziliśmy godzinę walcząc z Wordem, żeby tabelka się nie rozjechała. Potem sprawdziliśmy Canvę &ndash; fajne szablony, ale 55 zł miesięcznie za CV, którego potrzebujesz raz na rok? Bez sensu.</p>
            <p>Więc zrobiliśmy narzędzie, które sami chcielibyśmy mieć: <strong>wrzuć stare CV, wybierz szablon, pobierz nowe.</strong> Koniec. 29 zł jednorazowo, bez subskrypcji.</p>
        </div>
    </div>
</section>

<!-- ===== FAQ ===== -->
<section class="faq" id="faq">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">FAQ</span>
            <h2 class="section-title">Pytania, które pewnie masz</h2>
        </div>

        <div class="faq-list">
            <details class="faq-item">
                <summary class="faq-item__question">Muszę się rejestrować?</summary>
                <div class="faq-item__answer">
                    <p>Nie. Otwierasz stronę i od razu tworzysz CV. Konto zakładamy automatycznie dopiero przy płatności, żebyś mógł wrócić do swoich CV później.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Co dostaję za 29 zł?</summary>
                <div class="faq-item__answer">
                    <p>30 dni pełnego dostępu: pobieranie CV w PDF, JPG i PNG bez ograniczeń, zapis w chmurze, dowolna liczba CV. Po 30 dniach dostęp wygasa, ale Twoje CV zostają na koncie.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">To nie jest subskrypcja?</summary>
                <div class="faq-item__answer">
                    <p>Nie. Płacisz raz, korzystasz 30 dni. Nic się samo nie odnowi, nic nie trzeba anulować. Potrzebujesz znowu? Kupujesz ponownie.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Jak działa import z AI?</summary>
                <div class="faq-item__answer">
                    <p>Wrzucasz plik (PDF, zdjęcie, DOCX) albo wklejasz tekst. AI rozpoznaje sekcje: dane osobowe, doświadczenie, wykształcenie, umiejętności. Podstawia je do wybranego szablonu. Ty tylko sprawdzasz i poprawiasz jeśli trzeba.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Czym płacę?</summary>
                <div class="faq-item__answer">
                    <p>BLIK, Visa, Mastercard, Przelewy24. Płatności obsługuje Stripe &ndash; nie przechowujemy danych Twojej karty.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Mogę zmienić szablon po stworzeniu CV?</summary>
                <div class="faq-item__answer">
                    <p>Tak. Dane zostają te same, zmienia się tylko wygląd. Możesz przełączać między 10 szablonami w dowolnym momencie.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Czy moje dane są bezpieczne?</summary>
                <div class="faq-item__answer">
                    <p>Tak. SSL, brak przechowywania danych płatniczych, dane CV przypisane do Twojego konta. Działamy zgodnie z RODO.</p>
                </div>
            </details>
        </div>
    </div>
</section>

<!-- ===== FINAL CTA ===== -->
<section class="final-cta">
    <div class="container">
        <div class="final-cta__inner">
            <h2>Masz 3 minuty?</h2>
            <p>Tyle wystarczy, żeby mieć nowe, profesjonalne CV.</p>
            <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--white btn--lg">
                Zrób mi CV
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <p class="final-cta__sub">Bez rejestracji. Tworzenie jest darmowe. Płacisz tylko za pobranie.</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
