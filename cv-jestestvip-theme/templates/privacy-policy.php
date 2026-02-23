<?php
/**
 * Template Name: Polityka prywatności
 * Description: Full Polish privacy policy for CV Builder SaaS.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<article class="page-content">
<div class="container container--narrow">
<h1 class="page-content__title">Polityka prywatności</h1>
<div class="page-content__body prose">

<p><strong>Ostatnia aktualizacja:</strong> 23 lutego 2026 r.</p>

<p>Niniejsza Polityka prywatności okresla zasady przetwarzania i ochrony danych osobowych Uzytkownikow serwisu CV Builder, dostepnego pod adresem <?php echo esc_url( home_url( '/' ) ); ?> (dalej: <strong>Serwis</strong>). Prosimy o uwaznie zapoznanie sie z jej trescia.</p>

<!-- ============================================================ -->
<h2>&sect;1. Administrator danych osobowych</h2>
<!-- ============================================================ -->

<ol>
    <li>Administratorem danych osobowych zbieranych za posrednictwem Serwisu jest <strong>CV Builder</strong> (dalej: <strong>Administrator</strong>).</li>
    <li>Kontakt z Administratorem mozliwy jest pod adresem e-mail: <a href="mailto:kontakt@cvbuilder.pl">kontakt@cvbuilder.pl</a>.</li>
    <li>Administrator dokłada szczególnej staranności w celu ochrony interesów osób, których dane dotyczą, a w szczególności zapewnia, że zbierane przez niego dane są przetwarzane zgodnie z prawem, zbierane dla oznaczonych, zgodnych z prawem celów i niepoddawane dalszemu przetwarzaniu niezgodnemu z tymi celami.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;2. Jakie dane zbieramy</h2>
<!-- ============================================================ -->

<p>W ramach korzystania z Serwisu Administrator może zbierać następujące kategorie danych osobowych:</p>

<h3>2.1. Dane podawane przez Użytkownika w CV</h3>
<ul>
    <li>imię i nazwisko,</li>
    <li>adres e-mail,</li>
    <li>numer telefonu,</li>
    <li>adres zamieszkania (miejscowość, kod pocztowy),</li>
    <li>data urodzenia,</li>
    <li>zdjęcie profilowe (jeśli zostanie dodane),</li>
    <li>historia zatrudnienia (nazwy pracodawców, stanowiska, zakresy obowiązków, daty),</li>
    <li>historia wykształcenia (nazwy uczelni, kierunki, daty),</li>
    <li>umiejętności, certyfikaty, języki obce,</li>
    <li>zainteresowania i inne informacje dobrowolnie umieszczone w CV.</li>
</ul>

<h3>2.2. Dane konta użytkownika</h3>
<ul>
    <li>adres e-mail (służący jako identyfikator konta),</li>
    <li>hasło (przechowywane wyłącznie w formie zahashowanej),</li>
    <li>data rejestracji i data ostatniego logowania,</li>
    <li>status płatności (aktywny/nieaktywny) i data wygaśnięcia dostępu.</li>
</ul>

<h3>2.3. Dane z logowania społecznościowego (Social Login)</h3>
<p>Jeśli Użytkownik loguje się za pośrednictwem Google, Facebook lub LinkedIn, otrzymujemy:</p>
<ul>
    <li>identyfikator użytkownika w danym serwisie (user ID),</li>
    <li>imię i nazwisko,</li>
    <li>adres e-mail,</li>
    <li>zdjęcie profilowe (avatar),</li>
    <li>w przypadku LinkedIn: dane dotyczące doświadczenia zawodowego i wykształcenia (jeśli Użytkownik wyrazi na to zgodę w trakcie autoryzacji).</li>
</ul>

<h3>2.4. Dane techniczne i cookies</h3>
<ul>
    <li>adres IP,</li>
    <li>typ i wersja przeglądarki,</li>
    <li>system operacyjny,</li>
    <li>źródło wejścia (referrer),</li>
    <li>czas spędzony w Serwisie,</li>
    <li>identyfikatory sesji (cookies funkcjonalne),</li>
    <li>dane analityczne (cookies analityczne, jeśli Użytkownik wyrazi zgodę).</li>
</ul>

<h3>2.5. Dane dotyczące płatności</h3>
<p><strong>Administrator nie przechowuje danych kart płatniczych, numerów rachunków bankowych ani kodów BLIK.</strong> Wszystkie dane płatnicze są przetwarzane wyłącznie przez operatora płatności &ndash; Stripe, Inc. Administrator przechowuje jedynie:</p>
<ul>
    <li>identyfikator transakcji Stripe,</li>
    <li>kwotę i datę transakcji,</li>
    <li>status płatności (opłacona/nieopłacona),</li>
    <li>ostatnie 4 cyfry karty (przekazywane przez Stripe wyłącznie w celu identyfikacji transakcji).</li>
</ul>

<!-- ============================================================ -->
<h2>&sect;3. Cel przetwarzania danych</h2>
<!-- ============================================================ -->

<p>Dane osobowe Użytkowników są przetwarzane w następujących celach:</p>

<ol>
    <li><strong>Świadczenie usługi</strong> &ndash; umożliwienie tworzenia, edycji, przechowywania i eksportu CV (podstawa prawna: art. 6 ust. 1 lit. b RODO &ndash; wykonanie umowy).</li>
    <li><strong>Obsługa płatności</strong> &ndash; realizacja jednorazowej płatności za dostęp do pełnych funkcji Serwisu (podstawa prawna: art. 6 ust. 1 lit. b RODO &ndash; wykonanie umowy).</li>
    <li><strong>Prowadzenie konta użytkownika</strong> &ndash; autentykacja, zarządzanie sesjami, przechowywanie ustawień (podstawa prawna: art. 6 ust. 1 lit. b RODO &ndash; wykonanie umowy).</li>
    <li><strong>Wypełnienie obowiązków prawnych</strong> &ndash; przechowywanie danych transakcji do celów podatkowych i księgowych (podstawa prawna: art. 6 ust. 1 lit. c RODO &ndash; obowiązek prawny).</li>
    <li><strong>Marketing bezpośredni</strong> &ndash; wysyłanie informacji o nowych funkcjach, promocjach lub szablonach, wyłącznie za wyraźną zgodą Użytkownika (podstawa prawna: art. 6 ust. 1 lit. a RODO &ndash; zgoda).</li>
    <li><strong>Analityka i doskonalenie usługi</strong> &ndash; analiza sposobu korzystania z Serwisu w celu poprawy jego funkcjonalności (podstawa prawna: art. 6 ust. 1 lit. f RODO &ndash; prawnie uzasadniony interes Administratora).</li>
    <li><strong>Obsługa reklamacji i zapytań</strong> &ndash; odpowiadanie na wiadomości Użytkowników (podstawa prawna: art. 6 ust. 1 lit. f RODO &ndash; prawnie uzasadniony interes Administratora).</li>
    <li><strong>Dochodzenie i obrona roszczeń</strong> &ndash; w przypadku sporów prawnych (podstawa prawna: art. 6 ust. 1 lit. f RODO &ndash; prawnie uzasadniony interes Administratora).</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;4. Podstawa prawna przetwarzania</h2>
<!-- ============================================================ -->

<p>Przetwarzanie danych osobowych odbywa się na podstawie Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. (RODO), w szczególności:</p>

<ol>
    <li><strong>Art. 6 ust. 1 lit. a RODO</strong> &ndash; zgoda osoby, której dane dotyczą (np. zgoda na marketing, zgoda na cookies analityczne).</li>
    <li><strong>Art. 6 ust. 1 lit. b RODO</strong> &ndash; niezbędność przetwarzania do wykonania umowy o świadczenie usług drogą elektroniczną lub do podjęcia działań przed zawarciem umowy.</li>
    <li><strong>Art. 6 ust. 1 lit. c RODO</strong> &ndash; niezbędność przetwarzania do wypełnienia obowiązku prawnego ciążącego na Administratorze (przepisy podatkowe, rachunkowe).</li>
    <li><strong>Art. 6 ust. 1 lit. f RODO</strong> &ndash; prawnie uzasadniony interes Administratora (analityka, doskonalenie usługi, dochodzenie roszczeń, zapewnienie bezpieczeństwa).</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;5. Odbiorcy danych</h2>
<!-- ============================================================ -->

<p>Dane osobowe Użytkowników mogą być przekazywane następującym kategoriom odbiorców:</p>

<ol>
    <li>
        <strong>Stripe, Inc.</strong> (San Francisco, USA) &ndash; operator płatności. Stripe przetwarza dane płatnicze w celu realizacji transakcji. Stripe jest certyfikowany w ramach EU-US Data Privacy Framework. Polityka prywatności Stripe: <a href="https://stripe.com/privacy" target="_blank" rel="noopener noreferrer">https://stripe.com/privacy</a>.
    </li>
    <li>
        <strong>Google Ireland Limited</strong> &ndash; w zakresie logowania społecznościowego (Google Sign-In) oraz opcjonalnie Google Analytics. Polityka prywatności Google: <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">https://policies.google.com/privacy</a>.
    </li>
    <li>
        <strong>Meta Platforms Ireland Limited</strong> &ndash; w zakresie logowania przez Facebook. Polityka prywatności Meta: <a href="https://www.facebook.com/privacy/policy/" target="_blank" rel="noopener noreferrer">https://www.facebook.com/privacy/policy/</a>.
    </li>
    <li>
        <strong>LinkedIn Ireland Unlimited Company</strong> &ndash; w zakresie logowania przez LinkedIn i importu danych zawodowych. Polityka prywatności LinkedIn: <a href="https://www.linkedin.com/legal/privacy-policy" target="_blank" rel="noopener noreferrer">https://www.linkedin.com/legal/privacy-policy</a>.
    </li>
    <li>
        <strong>Dostawca usług hostingowych</strong> &ndash; serwery, na których przechowywane są dane Serwisu, zlokalizowane na terenie Europejskiego Obszaru Gospodarczego (EOG).
    </li>
    <li>
        <strong>Organy państwowe</strong> &ndash; wyłącznie w przypadkach przewidzianych przepisami prawa (np. organy podatkowe, organy ścigania na podstawie nakazu sądowego).
    </li>
</ol>

<p>Administrator nie sprzedaje danych osobowych Użytkowników podmiotom trzecim. Dane nie są przekazywane w celach marketingowych zewnętrznym podmiotom.</p>

<!-- ============================================================ -->
<h2>&sect;6. Przekazywanie danych poza EOG</h2>
<!-- ============================================================ -->

<ol>
    <li>Dane płatnicze mogą być przekazywane do Stripe, Inc. z siedzibą w Stanach Zjednoczonych. Transfer ten odbywa się na podstawie decyzji Komisji Europejskiej o adekwatności ochrony danych (EU-US Data Privacy Framework) lub standardowych klauzul umownych (SCC).</li>
    <li>W przypadku korzystania z usług Google (Analytics, Sign-In), dane mogą być przetwarzane na serwerach Google zlokalizowanych poza EOG, z zachowaniem odpowiednich zabezpieczeń (standardowe klauzule umowne).</li>
    <li>Administrator nie przekazuje danych osobowych do państw trzecich w żadnym innym zakresie.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;7. Okres przechowywania danych</h2>
<!-- ============================================================ -->

<p>Dane osobowe są przechowywane przez okres niezbędny do realizacji celów, dla których zostały zebrane:</p>

<ol>
    <li><strong>Dane CV i dane konta</strong> &ndash; od momentu utworzenia konta do momentu jego usunięcia przez Użytkownika. Użytkownik może w każdej chwili usunąć swoje konto, co skutkuje trwałym usunięciem wszystkich danych CV z bazy danych Serwisu.</li>
    <li><strong>Dane transakcji płatniczych</strong> &ndash; przez okres 5 lat od końca roku kalendarzowego, w którym dokonano transakcji, zgodnie z wymogami przepisów prawa podatkowego i rachunkowego (ustawa o rachunkowości, Ordynacja podatkowa).</li>
    <li><strong>Dane przetwarzane na podstawie zgody</strong> (np. marketing) &ndash; do momentu cofnięcia zgody przez Użytkownika.</li>
    <li><strong>Dane przetwarzane na podstawie prawnie uzasadnionego interesu</strong> (np. analityka, dochodzenie roszczeń) &ndash; do czasu wniesienia skutecznego sprzeciwu lub przez okres przedawnienia roszczeń (3 lata dla roszczeń z umów o świadczenie usług).</li>
    <li><strong>Dane z cookies</strong> &ndash; zgodnie z okresem ważności poszczególnych plików cookies (szczegóły w &sect;9).</li>
</ol>

<p>Po upływie wskazanych okresów dane są trwale usuwane lub anonimizowane.</p>

<!-- ============================================================ -->
<h2>&sect;8. Prawa Użytkownika</h2>
<!-- ============================================================ -->

<p>Zgodnie z RODO, każdemu Użytkownikowi przysługują następujące prawa:</p>

<ol>
    <li>
        <strong>Prawo dostępu do danych</strong> (art. 15 RODO) &ndash; Użytkownik ma prawo uzyskać od Administratora potwierdzenie, czy przetwarzane są dane osobowe jego dotyczące, a jeśli tak, uzyskać dostęp do tych danych oraz informacje o celach przetwarzania, kategoriach danych, odbiorcach i planowanym okresie przechowywania.
    </li>
    <li>
        <strong>Prawo do sprostowania danych</strong> (art. 16 RODO) &ndash; Użytkownik ma prawo żądania niezwłocznego sprostowania nieprawidłowych danych osobowych lub uzupełnienia niekompletnych danych. Użytkownik może również samodzielnie edytować swoje dane w panelu konta.
    </li>
    <li>
        <strong>Prawo do usunięcia danych (&bdquo;prawo do bycia zapomnianym&rdquo;)</strong> (art. 17 RODO) &ndash; Użytkownik ma prawo żądania usunięcia swoich danych osobowych. Użytkownik może samodzielnie usunąć swoje konto w ustawieniach Serwisu, co skutkuje trwałym usunięciem wszystkich danych CV. Administrator zastrzega, że dane transakcyjne wymagane przepisami prawa będą przechowywane przez okres wskazany w &sect;7 pkt 2.
    </li>
    <li>
        <strong>Prawo do ograniczenia przetwarzania</strong> (art. 18 RODO) &ndash; Użytkownik ma prawo żądania ograniczenia przetwarzania danych w przypadkach określonych w RODO (np. zakwestionowanie prawidłowości danych, wniesienie sprzeciwu).
    </li>
    <li>
        <strong>Prawo do przenoszenia danych</strong> (art. 20 RODO) &ndash; Użytkownik ma prawo otrzymać swoje dane osobowe w ustrukturyzowanym, powszechnie używanym formacie nadającym się do odczytu maszynowego (np. JSON, CSV) oraz przesłać je innemu administratorowi. Serwis umożliwia eksport danych CV w formacie PDF.
    </li>
    <li>
        <strong>Prawo do sprzeciwu</strong> (art. 21 RODO) &ndash; Użytkownik ma prawo w dowolnym momencie wnieść sprzeciw wobec przetwarzania danych opartego na prawnie uzasadnionym interesie Administratora (art. 6 ust. 1 lit. f RODO), w tym wobec profilowania. W takim przypadku Administrator zaprzestanie przetwarzania, chyba że wykaże ważne prawnie uzasadnione podstawy do przetwarzania.
    </li>
    <li>
        <strong>Prawo do cofnięcia zgody</strong> (art. 7 ust. 3 RODO) &ndash; Użytkownik ma prawo w dowolnym momencie cofnąć zgodę na przetwarzanie danych osobowych, gdy przetwarzanie odbywa się na podstawie zgody. Cofnięcie zgody nie wpływa na zgodność z prawem przetwarzania, którego dokonano na podstawie zgody przed jej cofnięciem.
    </li>
    <li>
        <strong>Prawo do wniesienia skargi</strong> &ndash; Użytkownik ma prawo wniesienia skargi do organu nadzorczego &ndash; Prezesa Urzędu Ochrony Danych Osobowych (ul. Stawki 2, 00-193 Warszawa, <a href="https://uodo.gov.pl" target="_blank" rel="noopener noreferrer">https://uodo.gov.pl</a>).
    </li>
</ol>

<p>W celu realizacji powyższych praw Użytkownik powinien skontaktować się z Administratorem pod adresem: <a href="mailto:kontakt@cvbuilder.pl">kontakt@cvbuilder.pl</a>. Administrator rozpatrzy żądanie bez zbędnej zwłoki, nie później niż w terminie 30 dni od jego otrzymania.</p>

<!-- ============================================================ -->
<h2>&sect;9. Pliki cookies</h2>
<!-- ============================================================ -->

<h3>9.1. Czym są pliki cookies</h3>
<p>Pliki cookies (ciasteczka) to małe pliki tekstowe zapisywane na urządzeniu Użytkownika przez przeglądarkę internetową podczas korzystania z Serwisu.</p>

<h3>9.2. Rodzaje wykorzystywanych cookies</h3>

<p><strong>Cookies niezbędne (funkcjonalne):</strong></p>
<ul>
    <li><strong>Sesja użytkownika</strong> &ndash; utrzymanie zalogowanego stanu, zabezpieczenie formularzy (CSRF token). Czas życia: do zakończenia sesji przeglądarki lub maksymalnie 30 dni.</li>
    <li><strong>Preferencje cookies</strong> &ndash; zapamiętanie zgody lub odmowy na cookies analityczne. Czas życia: 12 miesięcy.</li>
    <li><strong>Zabezpieczenia Stripe</strong> &ndash; cookies wymagane przez Stripe do bezpiecznego przetwarzania płatności. Czas życia: zgodnie z polityką Stripe.</li>
</ul>

<p><strong>Cookies analityczne (opcjonalne):</strong></p>
<ul>
    <li><strong>Google Analytics</strong> &ndash; zbieranie anonimowych danych statystycznych o korzystaniu z Serwisu (odwiedzane strony, czas wizyty, źródło ruchu). Cookies te są ustawiane wyłącznie po wyrażeniu zgody przez Użytkownika. Czas życia: do 26 miesięcy.</li>
</ul>

<h3>9.3. Zarządzanie cookies</h3>
<p>Użytkownik może w każdej chwili zmienić ustawienia dotyczące cookies:</p>
<ul>
    <li>za pośrednictwem baneru cookies wyświetlanego w Serwisie,</li>
    <li>poprzez ustawienia przeglądarki internetowej (blokowanie lub usuwanie cookies).</li>
</ul>
<p>Wyłączenie cookies funkcjonalnych może uniemożliwić prawidłowe działanie Serwisu (np. utrzymanie sesji logowania).</p>

<!-- ============================================================ -->
<h2>&sect;10. Bezpieczeństwo danych</h2>
<!-- ============================================================ -->

<p>Administrator stosuje odpowiednie środki techniczne i organizacyjne w celu zapewnienia bezpieczeństwa danych osobowych, w szczególności:</p>

<ol>
    <li><strong>Szyfrowanie transmisji</strong> &ndash; cała komunikacja z Serwisem odbywa się przez protokół HTTPS z szyfrowaniem SSL/TLS, co zabezpiecza dane przed przechwyceniem podczas transmisji.</li>
    <li><strong>Hashowanie haseł</strong> &ndash; hasła użytkowników są przechowywane wyłącznie w formie zahashowanej (bcrypt). Administrator nie ma możliwości odczytania hasła Użytkownika w postaci jawnej.</li>
    <li><strong>Brak przechowywania danych kart płatniczych</strong> &ndash; dane kart, numery rachunków bankowych i kody BLIK nigdy nie trafiają na serwery Administratora. Są przetwarzane wyłącznie przez Stripe, który posiada certyfikat PCI DSS Level 1.</li>
    <li><strong>Kontrola dostępu</strong> &ndash; dostęp do danych osobowych mają wyłącznie upoważnione osoby, w zakresie niezbędnym do realizacji swoich obowiązków.</li>
    <li><strong>Regularne kopie zapasowe</strong> &ndash; baza danych jest regularnie archiwizowana w celu ochrony przed utratą danych.</li>
    <li><strong>Aktualizacje bezpieczeństwa</strong> &ndash; oprogramowanie Serwisu jest regularnie aktualizowane w celu eliminacji znanych luk bezpieczeństwa.</li>
    <li><strong>Izolacja danych</strong> &ndash; dane CV każdego Użytkownika są przypisane wyłącznie do jego konta i niedostępne dla innych Użytkowników.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;11. Profilowanie i zautomatyzowane podejmowanie decyzji</h2>
<!-- ============================================================ -->

<p>Administrator nie podejmuje zautomatyzowanych decyzji, w tym decyzji opartych na profilowaniu, które wywołują skutki prawne lub w podobny sposób istotnie wpływają na Użytkownika w rozumieniu art. 22 RODO.</p>

<!-- ============================================================ -->
<h2>&sect;12. Dane osobowe dzieci</h2>
<!-- ============================================================ -->

<p>Serwis jest przeznaczony dla osób, które ukończyły 18 lat. Administrator nie zbiera świadomie danych osobowych osób poniżej 18 roku życia. W przypadku powzięcia informacji o zebraniu danych dziecka, Administrator niezwłocznie je usunie.</p>

<!-- ============================================================ -->
<h2>&sect;13. Zmiany Polityki prywatności</h2>
<!-- ============================================================ -->

<ol>
    <li>Administrator zastrzega sobie prawo do wprowadzania zmian w niniejszej Polityce prywatności w celu dostosowania jej do zmian w przepisach prawa, zmian technologicznych lub zmian w funkcjonowaniu Serwisu.</li>
    <li>O wszelkich istotnych zmianach Użytkownicy zostaną powiadomieni poprzez:
        <ul>
            <li>wyświetlenie komunikatu w Serwisie,</li>
            <li>wysłanie informacji na adres e-mail powiązany z kontem (jeśli Użytkownik posiada konto).</li>
        </ul>
    </li>
    <li>Aktualna wersja Polityki prywatności jest zawsze dostępna na stronie Serwisu.</li>
    <li>Data ostatniej aktualizacji jest wskazana na początku dokumentu.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;14. Kontakt</h2>
<!-- ============================================================ -->

<p>W sprawach związanych z ochroną danych osobowych, w tym w celu realizacji praw opisanych w &sect;8, prosimy o kontakt:</p>

<ul>
    <li><strong>E-mail:</strong> <a href="mailto:kontakt@cvbuilder.pl">kontakt@cvbuilder.pl</a></li>
    <li><strong>Nazwa:</strong> CV Builder</li>
</ul>

<p>Administrator dołoży starań, aby odpowiedzieć na każde zapytanie bez zbędnej zwłoki, nie później niż w terminie 30 dni od daty otrzymania zapytania.</p>

</div>
</div>
</article>

<?php get_footer(); ?>
