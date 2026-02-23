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
                <div class="ai-format">
                    <div class="ai-format__icon">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </div>
                    <h4>LinkedIn</h4>
                    <p>Zaloguj się, dane się ściągną same.</p>
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
            <?php
            $templates = [
                [ 'id' => 'classic', 'name' => 'Klasyczny', 'color' => '#3b2a1a', 'accent' => '#f0b527', 'desc' => 'Ciepłe brązy i złoto. Pasuje wszędzie.' ],
                [ 'id' => 'modern', 'name' => 'Nowoczesny', 'color' => '#1e40af', 'accent' => '#3b82f6', 'desc' => 'Dwie kolumny, niebieski akcent.' ],
                [ 'id' => 'creative', 'name' => 'Kreatywny', 'color' => '#7c3aed', 'accent' => '#a78bfa', 'desc' => 'Dla designerów i marketerów.' ],
                [ 'id' => 'minimal', 'name' => 'Minimalistyczny', 'color' => '#f9fafb', 'accent' => '#374151', 'desc' => 'Dużo bieli, zero bałaganu.' ],
                [ 'id' => 'professional', 'name' => 'Profesjonalny', 'color' => '#1f2937', 'accent' => '#6b7280', 'desc' => 'Ciemny sidebar. Korporacyjny styl.' ],
                [ 'id' => 'executive', 'name' => 'Elegancki', 'color' => '#44403c', 'accent' => '#a8a29e', 'desc' => 'Seryfowe fonty. Dla kadry zarządzającej.' ],
                [ 'id' => 'tech', 'name' => 'Techniczny', 'color' => '#0f172a', 'accent' => '#38bdf8', 'desc' => 'Dark mode, monospace. Dla programistów.' ],
                [ 'id' => 'academic', 'name' => 'Akademicki', 'color' => '#1e3a5f', 'accent' => '#60a5fa', 'desc' => 'Tradycyjny układ. Dla naukowców.' ],
                [ 'id' => 'bold', 'name' => 'Odważny', 'color' => '#dc2626', 'accent' => '#fca5a5', 'desc' => 'Duża typografia, czerwone akcenty.' ],
                [ 'id' => 'nordic', 'name' => 'Skandynawski', 'color' => '#f0fdf4', 'accent' => '#22c55e', 'desc' => 'Zielone akcenty, spokojny styl.' ],
            ];
            foreach ( $templates as $t ) :
            ?>
                <div class="template-preview-card">
                    <div class="template-preview-card__thumb">
                        <div style="width:100%;height:100%;display:flex;flex-direction:column;">
                            <div style="background:<?php echo esc_attr( $t['color'] ); ?>;height:35%;padding:10px;display:flex;align-items:center;gap:8px;">
                                <div style="width:28px;height:28px;border-radius:50%;background:<?php echo esc_attr( $t['accent'] ); ?>;"></div>
                                <div>
                                    <div style="width:60px;height:6px;background:rgba(255,255,255,.7);border-radius:3px;margin-bottom:4px;"></div>
                                    <div style="width:40px;height:4px;background:rgba(255,255,255,.4);border-radius:2px;"></div>
                                </div>
                            </div>
                            <div style="flex:1;padding:10px;background:#fff;">
                                <div style="width:70%;height:5px;background:#d1d5db;border-radius:2px;margin-bottom:8px;"></div>
                                <div style="width:90%;height:4px;background:#e5e7eb;border-radius:2px;margin-bottom:4px;"></div>
                                <div style="width:80%;height:4px;background:#e5e7eb;border-radius:2px;margin-bottom:8px;"></div>
                                <div style="width:50%;height:5px;background:<?php echo esc_attr( $t['accent'] ); ?>;border-radius:2px;margin-bottom:6px;"></div>
                                <div style="width:85%;height:4px;background:#e5e7eb;border-radius:2px;margin-bottom:4px;"></div>
                                <div style="width:75%;height:4px;background:#e5e7eb;border-radius:2px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="template-preview-card__info">
                        <h4><?php echo esc_html( $t['name'] ); ?></h4>
                        <p><?php echo esc_html( $t['desc'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
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
                <p class="pricing-card__note">BLIK &bull; Karta &bull; Przelewy24 &bull; Bezpiecznie przez Stripe</p>
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
