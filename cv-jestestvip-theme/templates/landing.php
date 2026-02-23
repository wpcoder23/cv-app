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
            <span class="hero__badge">Nowe narzędzie 2026</span>
            <h1 class="hero__title">Stwórz profesjonalne CV<br /><span class="hero__highlight">w 5 minut</span></h1>
            <p class="hero__desc">Wybierz jeden z 10 szablonów, wypełnij dane i pobierz gotowe CV w PDF, JPG lub PNG. Bez rejestracji. Zaczynasz od razu.</p>

            <div class="hero__actions">
                <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--primary btn--lg">
                    Stwórz CV za darmo
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="#jak-to-dziala" class="btn btn--ghost btn--lg">Zobacz jak to działa</a>
            </div>

            <div class="hero__stats">
                <div class="hero__stat">
                    <strong>10</strong>
                    <span>szablonów CV</span>
                </div>
                <div class="hero__stat">
                    <strong>3</strong>
                    <span>formaty eksportu</span>
                </div>
                <div class="hero__stat">
                    <strong>29 zł</strong>
                    <span>jednorazowo</span>
                </div>
            </div>
        </div>

        <div class="hero__visual">
            <div class="hero__mockup">
                <div class="hero__screen">
                    <!-- Placeholder for app screenshot -->
                    <div class="placeholder-screen">
                        <div class="placeholder-screen__header"></div>
                        <div class="placeholder-screen__sidebar">
                            <div class="ph-circle"></div>
                            <div class="ph-line w70"></div>
                            <div class="ph-line w50"></div>
                            <div class="ph-line w80"></div>
                            <div class="ph-line w60"></div>
                        </div>
                        <div class="placeholder-screen__main">
                            <div class="ph-line w90"></div>
                            <div class="ph-line w70"></div>
                            <div class="ph-line w80"></div>
                            <div class="ph-block"></div>
                            <div class="ph-line w60"></div>
                            <div class="ph-line w90"></div>
                        </div>
                    </div>
                </div>
                <div class="hero__glow"></div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SOCIAL PROOF ===== -->
<section class="social-proof">
    <div class="container">
        <div class="social-proof__inner">
            <span>Zaufali nam:</span>
            <div class="social-proof__logos">
                <span class="logo-placeholder">Freelancerzy</span>
                <span class="logo-placeholder">Studenci</span>
                <span class="logo-placeholder">Specjaliści IT</span>
                <span class="logo-placeholder">Kierownicy</span>
                <span class="logo-placeholder">Menedżerowie</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== BENEFITS ===== -->
<section class="benefits" id="zalety">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Dlaczego my</span>
            <h2 class="section-title">Wszystko, czego potrzebujesz do stworzenia idealnego CV</h2>
            <p class="section-desc">Bez skomplikowanych edytorów, bez subskrypcji, bez ukrytych kosztów.</p>
        </div>

        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--blue">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </div>
                <h3>10 profesjonalnych szablonów</h3>
                <p>Od klasycznego po nowoczesny, techniczny czy kreatywny. Każdy zaprojektowany pod ATS i rekruterów.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--green">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Bez rejestracji na start</h3>
                <p>Zacznij tworzyć CV od razu. Konto tworzymy automatycznie dopiero przy płatności. Zero barier.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--purple">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                </div>
                <h3>Eksport PDF, JPG, PNG</h3>
                <p>Pobierz CV w formacie, który potrzebujesz. PDF do rekrutera, JPG na LinkedIn, PNG na portfolio.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--amber">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <h3>Jednorazowa płatność</h3>
                <p>29 zł za 30 dni. Bez subskrypcji, bez automatycznego odnawiania. Płacisz kiedy chcesz.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--rose">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h3>Import z LinkedIn i Google</h3>
                <p>Zaloguj się przez Google, LinkedIn lub Facebook i automatycznie wypełnij dane w CV.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-card__icon benefit-card__icon--teal">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                </div>
                <h3>BLIK, karta, przelew</h3>
                <p>Płać jak chcesz – BLIK, Visa, Mastercard, Przelewy24. Bezpieczne płatności przez Stripe.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== HOW IT WORKS (SLIDER) ===== -->
<section class="how-it-works" id="jak-to-dziala">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Jak to działa</span>
            <h2 class="section-title">Stwórz CV w 4 prostych krokach</h2>
            <p class="section-desc">Cały proces zajmuje kilka minut. Bez instalowania czegokolwiek.</p>
        </div>

        <!-- Steps -->
        <div class="steps-nav" id="steps-nav">
            <button class="step-tab is-active" data-step="0">
                <span class="step-tab__num">1</span>
                <span class="step-tab__text">Wybierz szablon</span>
            </button>
            <button class="step-tab" data-step="1">
                <span class="step-tab__num">2</span>
                <span class="step-tab__text">Wypełnij dane</span>
            </button>
            <button class="step-tab" data-step="2">
                <span class="step-tab__num">3</span>
                <span class="step-tab__text">Podgląd na żywo</span>
            </button>
            <button class="step-tab" data-step="3">
                <span class="step-tab__num">4</span>
                <span class="step-tab__text">Pobierz CV</span>
            </button>
        </div>

        <!-- Slider -->
        <div class="slider" id="how-slider">
            <div class="slider__track">
                <!-- Slide 1: Choose template -->
                <div class="slider__slide is-active">
                    <div class="slide-content">
                        <div class="slide-content__text">
                            <h3>Wybierz szablon, który pasuje do Twojej branży</h3>
                            <p>Mamy 10 szablonów – od klasycznego po kreatywny i techniczny. Każdy jest zoptymalizowany pod systemy ATS używane przez rekruterów.</p>
                            <ul class="slide-features">
                                <li>Klasyczny, Nowoczesny, Kreatywny</li>
                                <li>Minimalistyczny, Profesjonalny, Elegancki</li>
                                <li>Techniczny, Akademicki, Odważny, Skandynawski</li>
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

                <!-- Slide 2: Fill data -->
                <div class="slider__slide">
                    <div class="slide-content">
                        <div class="slide-content__text">
                            <h3>Wypełnij dane krok po kroku</h3>
                            <p>Intuicyjny formularz prowadzi Cię przez wszystkie sekcje: dane osobowe, doświadczenie, wykształcenie, umiejętności.</p>
                            <ul class="slide-features">
                                <li>Importuj dane z Google lub LinkedIn jednym klikiem</li>
                                <li>Dodawaj doświadczenie i wykształcenie dynamicznie</li>
                                <li>Tagi dla umiejętności i zainteresowań</li>
                            </ul>
                        </div>
                        <div class="slide-content__image">
                            <div class="placeholder-slide">
                                <div class="ph-form">
                                    <div class="ph-form-row"><div class="ph-input"></div><div class="ph-input"></div></div>
                                    <div class="ph-form-row"><div class="ph-input"></div><div class="ph-input"></div></div>
                                    <div class="ph-textarea"></div>
                                    <div class="ph-btn-row"><div class="ph-btn"></div></div>
                                </div>
                                <p class="ph-caption">Formularz z danymi osobowymi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Live preview -->
                <div class="slider__slide">
                    <div class="slide-content">
                        <div class="slide-content__text">
                            <h3>Zobacz podgląd CV na żywo</h3>
                            <p>Każda zmiana natychmiast widoczna w podglądzie. Zmień szablon w dowolnym momencie i porównaj wygląd.</p>
                            <ul class="slide-features">
                                <li>Podgląd w formacie A4, gotowy do druku</li>
                                <li>Zmiana szablonu jednym klikiem</li>
                                <li>Automatyczny zapis w chmurze</li>
                            </ul>
                        </div>
                        <div class="slide-content__image">
                            <div class="placeholder-slide">
                                <div class="ph-preview">
                                    <div class="ph-preview-header"></div>
                                    <div class="ph-preview-body">
                                        <div class="ph-line w80"></div>
                                        <div class="ph-line w60"></div>
                                        <div class="ph-line w90"></div>
                                        <div class="ph-line w70"></div>
                                        <div class="ph-line w50"></div>
                                    </div>
                                </div>
                                <p class="ph-caption">Podgląd CV w formacie A4</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 4: Download -->
                <div class="slider__slide">
                    <div class="slide-content">
                        <div class="slide-content__text">
                            <h3>Pobierz CV w wybranym formacie</h3>
                            <p>PDF do wysłania rekruterowi, JPG na LinkedIn, PNG do portfolio online. Jeden klik – plik na dysku.</p>
                            <ul class="slide-features">
                                <li>PDF – idealny do wysyłki mailem</li>
                                <li>JPG – zoptymalizowany rozmiar</li>
                                <li>PNG – najwyższa jakość obrazu</li>
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
                    <button class="slider__dot" data-index="3"></button>
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
            <h2 class="section-title">10 szablonów na każdą okazję</h2>
            <p class="section-desc">Każdy szablon zaprojektowany z myślą o czytelności i profesjonalnym wyglądzie.</p>
        </div>

        <div class="templates-grid">
            <?php
            $templates = [
                [ 'id' => 'classic', 'name' => 'Klasyczny', 'color' => '#3b2a1a', 'accent' => '#f0b527', 'desc' => 'Ciepłe brązy i złoto. Idealny do każdej branży.' ],
                [ 'id' => 'modern', 'name' => 'Nowoczesny', 'color' => '#1e40af', 'accent' => '#3b82f6', 'desc' => 'Dwukolumnowy layout z niebieskim akcentem.' ],
                [ 'id' => 'creative', 'name' => 'Kreatywny', 'color' => '#7c3aed', 'accent' => '#a78bfa', 'desc' => 'Fioletowy gradient. Dla designerów i marketerów.' ],
                [ 'id' => 'minimal', 'name' => 'Minimalistyczny', 'color' => '#f9fafb', 'accent' => '#374151', 'desc' => 'Maksimum bieli i przestrzeni. Elegancka prostota.' ],
                [ 'id' => 'professional', 'name' => 'Profesjonalny', 'color' => '#1f2937', 'accent' => '#6b7280', 'desc' => 'Ciemny sidebar. Korporacyjny styl.' ],
                [ 'id' => 'executive', 'name' => 'Elegancki', 'color' => '#44403c', 'accent' => '#a8a29e', 'desc' => 'Seryfowe fonty i subtelne tło. Dla kadry zarządzającej.' ],
                [ 'id' => 'tech', 'name' => 'Techniczny', 'color' => '#0f172a', 'accent' => '#38bdf8', 'desc' => 'Ciemny motyw, monospace. Dla programistów.' ],
                [ 'id' => 'academic', 'name' => 'Akademicki', 'color' => '#1e3a5f', 'accent' => '#60a5fa', 'desc' => 'Tradycyjny układ dat i treści. Dla naukowców.' ],
                [ 'id' => 'bold', 'name' => 'Odważny', 'color' => '#dc2626', 'accent' => '#fca5a5', 'desc' => 'Duża typografia, czerwone akcenty, karty.' ],
                [ 'id' => 'nordic', 'name' => 'Skandynawski', 'color' => '#f0fdf4', 'accent' => '#22c55e', 'desc' => 'Zielona natura, zaokrąglone karty. Spokojny styl.' ],
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
            <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--primary btn--lg">Wypróbuj wszystkie szablony</a>
        </div>
    </div>
</section>

<!-- ===== PRICING ===== -->
<section class="pricing" id="cennik">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Cennik</span>
            <h2 class="section-title">Prosta, uczciwa cena</h2>
            <p class="section-desc">Bez subskrypcji. Bez ukrytych opłat. Płacisz raz, korzystasz 30 dni.</p>
        </div>

        <div class="pricing-cards">
            <!-- Free tier -->
            <div class="pricing-card">
                <div class="pricing-card__header">
                    <h3>Darmowy</h3>
                    <div class="pricing-card__price">
                        <span class="price-amount">0 zł</span>
                        <span class="price-period">na zawsze</span>
                    </div>
                </div>
                <ul class="pricing-card__features">
                    <li class="is-included">Tworzenie CV bez ograniczeń</li>
                    <li class="is-included">10 szablonów do podglądu</li>
                    <li class="is-included">Edycja na żywo</li>
                    <li class="is-included">Import danych z Google/LinkedIn</li>
                    <li class="is-excluded">Pobieranie PDF</li>
                    <li class="is-excluded">Pobieranie JPG / PNG</li>
                    <li class="is-excluded">Zapis w chmurze</li>
                </ul>
                <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--outline btn--full">Zacznij za darmo</a>
            </div>

            <!-- Paid tier -->
            <div class="pricing-card pricing-card--featured">
                <div class="pricing-card__badge">Najpopularniejszy</div>
                <div class="pricing-card__header">
                    <h3>Pełny dostęp</h3>
                    <div class="pricing-card__price">
                        <span class="price-amount">29 zł</span>
                        <span class="price-period">jednorazowo / 30 dni</span>
                    </div>
                </div>
                <ul class="pricing-card__features">
                    <li class="is-included">Wszystko z darmowego planu</li>
                    <li class="is-included"><strong>Pobieranie PDF bez limitu</strong></li>
                    <li class="is-included"><strong>Pobieranie JPG i PNG</strong></li>
                    <li class="is-included"><strong>Zapis CV w chmurze</strong></li>
                    <li class="is-included">Konto użytkownika</li>
                    <li class="is-included">Nieograniczona liczba CV</li>
                    <li class="is-included">Wsparcie e-mail</li>
                </ul>
                <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--primary btn--full btn--lg">Kup dostęp – 29 zł</a>
                <p class="pricing-card__note">BLIK &bull; Karta &bull; Przelewy24 &bull; Bezpiecznie przez Stripe</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== TESTIMONIALS ===== -->
<section class="testimonials">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Opinie</span>
            <h2 class="section-title">Co mówią nasi użytkownicy</h2>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-card__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>"Szukałem prostego narzędzia do CV bez miesięcznych opłat. To jest dokładnie to – 29 zł i mam piękne CV w 10 minut."</p>
                <div class="testimonial-card__author">
                    <strong>Marek K.</strong>
                    <span>Frontend Developer</span>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-card__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>"Import z LinkedIn zaoszczędził mi masę czasu. Kliknęłam, dane się wczytały, wybrałam szablon i gotowe. Polecam!"</p>
                <div class="testimonial-card__author">
                    <strong>Anna W.</strong>
                    <span>Project Manager</span>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-card__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>"Nareszcie CV builder, który nie zmusza do zakładania konta i wykupienia rocznej subskrypcji. Zapłaciłem BLIKiem w 3 sekundy."</p>
                <div class="testimonial-card__author">
                    <strong>Tomasz R.</strong>
                    <span>Data Analyst</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== FAQ ===== -->
<section class="faq" id="faq">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">FAQ</span>
            <h2 class="section-title">Często zadawane pytania</h2>
        </div>

        <div class="faq-list">
            <details class="faq-item">
                <summary class="faq-item__question">Czy muszę się rejestrować, żeby stworzyć CV?</summary>
                <div class="faq-item__answer">
                    <p>Nie. Możesz od razu zacząć tworzyć CV bez zakładania konta. Konto tworzymy automatycznie dopiero w momencie płatności, abyś mógł wrócić do swoich CV.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Co dostaję za 29 zł?</summary>
                <div class="faq-item__answer">
                    <p>30 dni pełnego dostępu: pobieranie CV w PDF, JPG i PNG bez ograniczeń, zapis CV w chmurze, konto użytkownika z historią. Możesz tworzyć dowolną liczbę CV.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Czy to subskrypcja?</summary>
                <div class="faq-item__answer">
                    <p>Nie. To jednorazowa płatność. Po 30 dniach dostęp wygasa, ale Twoje CV pozostają zapisane. Możesz wykupić dostęp ponownie kiedy potrzebujesz.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Jakie metody płatności akceptujecie?</summary>
                <div class="faq-item__answer">
                    <p>BLIK, karty Visa i Mastercard, oraz Przelewy24 (przelew bankowy). Płatności obsługuje Stripe – nie przechowujemy danych Twojej karty.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Co się stanie z moim CV po wygaśnięciu dostępu?</summary>
                <div class="faq-item__answer">
                    <p>Twoje CV pozostaje zapisane na Twoim koncie. Możesz je przeglądać i edytować. Jedynie funkcja pobierania (eksportu) wymaga aktywnego dostępu.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Czy moje dane są bezpieczne?</summary>
                <div class="faq-item__answer">
                    <p>Tak. Stosujemy szyfrowanie SSL, nie przechowujemy danych płatniczych, a Twoje dane CV są przypisane tylko do Twojego konta. Działamy zgodnie z RODO.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Czy mogę zmienić szablon po stworzeniu CV?</summary>
                <div class="faq-item__answer">
                    <p>Tak, w dowolnym momencie. Twoje dane pozostają te same – zmienia się tylko wygląd. Możesz przełączać między 10 szablonami jednym klikiem.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-item__question">Mogę stworzyć więcej niż jedno CV?</summary>
                <div class="faq-item__answer">
                    <p>Tak, z pełnym dostępem możesz tworzyć nieograniczoną liczbę CV – np. osobne CV dla różnych stanowisk czy branż.</p>
                </div>
            </details>
        </div>
    </div>
</section>

<!-- ===== FINAL CTA ===== -->
<section class="final-cta">
    <div class="container">
        <div class="final-cta__inner">
            <h2>Gotowy na nowe CV?</h2>
            <p>Dołącz do tysięcy osób, które stworzyły profesjonalne CV w kilka minut.</p>
            <a href="<?php echo esc_url( $app_url ); ?>" class="btn btn--white btn--lg">
                Stwórz CV za darmo
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <p class="final-cta__sub">Bez rejestracji. Tworzenie CV jest darmowe. Płacisz tylko za eksport.</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
