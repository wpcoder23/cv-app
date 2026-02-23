<?php
/**
 * Template Name: Regulamin
 * Description: Full Polish terms of service for CV Builder SaaS.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<article class="page-content">
<div class="container container--narrow">
<h1 class="page-content__title">Regulamin serwisu CV Builder</h1>
<div class="page-content__body prose">

<p><strong>Data wejścia w życie:</strong> 23 lutego 2026 r.</p>

<!-- ============================================================ -->
<h2>&sect;1. Postanowienia ogólne</h2>
<!-- ============================================================ -->

<ol>
    <li>Niniejszy Regulamin określa zasady i warunki korzystania z serwisu internetowego CV Builder, dostępnego pod adresem <?php echo esc_url( home_url( '/' ) ); ?> (dalej: <strong>Serwis</strong>).</li>
    <li>Regulamin stanowi regulamin świadczenia usług drogą elektroniczną w rozumieniu ustawy z dnia 18 lipca 2002 r. o świadczeniu usług drogą elektroniczną (Dz.U. 2002 Nr 144, poz. 1204 ze zm.).</li>
    <li>Definicje użyte w Regulaminie:
        <ul>
            <li><strong>Usługodawca</strong> &ndash; CV Builder, adres e-mail: <a href="mailto:kontakt@cvbuilder.pl">kontakt@cvbuilder.pl</a>, będący właścicielem i operatorem Serwisu.</li>
            <li><strong>Użytkownik</strong> &ndash; każda osoba fizyczna, która korzysta z Serwisu, w tym osoba posiadająca Konto.</li>
            <li><strong>Konsument</strong> &ndash; Użytkownik będący osobą fizyczną dokonującą czynności prawnej niezwiązanej bezpośrednio z jej działalnością gospodarczą lub zawodową (art. 22<sup>1</sup> Kodeksu cywilnego), a także osoba fizyczna prowadząca jednoosobową działalność gospodarczą, dokonująca czynności prawnej bezpośrednio związanej z jej działalnością gospodarczą, gdy z treści tej czynności wynika, że nie posiada ona dla niej charakteru zawodowego (art. 385<sup>5</sup> Kodeksu cywilnego).</li>
            <li><strong>Usługa</strong> &ndash; usługa świadczona drogą elektroniczną przez Usługodawcę za pośrednictwem Serwisu, obejmująca w szczególności tworzenie, edycję, przechowywanie i eksport dokumentów CV.</li>
            <li><strong>Konto</strong> &ndash; zbiór zasobów i ustawień przypisanych indywidualnie do Użytkownika, tworzony automatycznie w momencie dokonania pierwszej płatności lub rejestracji przez logowanie społecznościowe.</li>
            <li><strong>Płatny Dostęp</strong> &ndash; 30-dniowy okres pełnego dostępu do wszystkich funkcji Serwisu, rozpoczynający się od momentu zaksięgowania płatności.</li>
            <li><strong>Stripe</strong> &ndash; Stripe, Inc. &ndash; zewnętrzny operator płatności obsługujący transakcje w Serwisie.</li>
        </ul>
    </li>
    <li>Korzystanie z Serwisu oznacza akceptację niniejszego Regulaminu.</li>
    <li>Regulamin jest udostępniony nieodpłatnie na stronie Serwisu w formie umożliwiającej jego pobranie, utrwalenie i wydrukowanie.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;2. Rodzaj i zakres usług</h2>
<!-- ============================================================ -->

<ol>
    <li>Usługodawca świadczy za pośrednictwem Serwisu następujące usługi drogą elektroniczną:
        <ol type="a">
            <li><strong>Tworzenie CV</strong> &ndash; udostępnienie interaktywnego edytora umożliwiającego tworzenie dokumentów CV na podstawie danych wprowadzonych przez Użytkownika.</li>
            <li><strong>Szablony CV</strong> &ndash; udostępnienie 10 profesjonalnych szablonów graficznych CV do wykorzystania przez Użytkownika.</li>
            <li><strong>Podgląd na żywo</strong> &ndash; wyświetlanie podglądu dokumentu CV w czasie rzeczywistym podczas edycji.</li>
            <li><strong>Eksport CV</strong> &ndash; pobieranie dokumentu CV w formacie PDF, JPG lub PNG (funkcja dostępna wyłącznie w ramach Płatnego Dostępu).</li>
            <li><strong>Przechowywanie CV</strong> &ndash; zapis dokumentów CV w chmurze na koncie Użytkownika (funkcja dostępna wyłącznie w ramach Płatnego Dostępu).</li>
            <li><strong>Import danych</strong> &ndash; możliwość automatycznego uzupełnienia danych CV na podstawie profilu Google, Facebook lub LinkedIn (za zgodą Użytkownika).</li>
        </ol>
    </li>
    <li>Usługi dzielą się na:
        <ul>
            <li><strong>Usługi bezpłatne</strong>: tworzenie CV, podgląd na żywo, przeglądanie szablonów &ndash; dostępne bez rejestracji i opłat.</li>
            <li><strong>Usługi płatne</strong>: eksport CV (PDF, JPG, PNG), zapis w chmurze, konto użytkownika &ndash; dostępne po dokonaniu jednorazowej płatności w ramach Płatnego Dostępu.</li>
        </ul>
    </li>
</ol>

<!-- ============================================================ -->
<h2>&sect;3. Warunki korzystania z Serwisu</h2>
<!-- ============================================================ -->

<ol>
    <li>Korzystanie z Serwisu wymaga:
        <ol type="a">
            <li>urządzenia z dostępem do sieci Internet,</li>
            <li>przeglądarki internetowej obsługującej JavaScript (aktualnej wersji Chrome, Firefox, Safari lub Edge),</li>
            <li>aktywnego adresu e-mail (w przypadku korzystania z usług płatnych).</li>
        </ol>
    </li>
    <li>Z Serwisu mogą korzystać wyłącznie osoby pełnoletnie (które ukończyły 18 lat).</li>
    <li>Użytkownik zobowiązuje się do:
        <ol type="a">
            <li>podawania prawdziwych i aktualnych danych osobowych,</li>
            <li>korzystania z Serwisu zgodnie z jego przeznaczeniem,</li>
            <li>niepodejmowania działań mogących zakłócić funkcjonowanie Serwisu,</li>
            <li>nieumieszczania w CV treści bezprawnych, obraźliwych, naruszających prawa osób trzecich lub dobre obyczaje,</li>
            <li>niepodejmowania prób nieautoryzowanego dostępu do systemów informatycznych Serwisu,</li>
            <li>niekorzystania z Serwisu w sposób zautomatyzowany (boty, scrapery) bez pisemnej zgody Usługodawcy.</li>
        </ol>
    </li>
    <li>Usługodawca zastrzega sobie prawo do zawieszenia lub usunięcia konta Użytkownika, który narusza postanowienia niniejszego Regulaminu, po uprzednim wezwaniu do zaprzestania naruszeń.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;4. Rejestracja i konto użytkownika</h2>
<!-- ============================================================ -->

<ol>
    <li>Korzystanie z bezpłatnych funkcji Serwisu (tworzenie CV, podgląd) nie wymaga rejestracji ani zakładania konta.</li>
    <li>Konto Użytkownika jest tworzone automatycznie w momencie:
        <ol type="a">
            <li>dokonania pierwszej płatności za Płatny Dostęp, lub</li>
            <li>pierwszego logowania za pośrednictwem usługi społecznościowej (Google, Facebook, LinkedIn).</li>
        </ol>
    </li>
    <li>W przypadku tworzenia konta przy płatności, identyfikatorem konta jest adres e-mail podany w procesie płatności. Hasło tymczasowe zostanie wysłane na ten adres.</li>
    <li>W przypadku logowania społecznościowego, konto jest powiązane z kontem w wybranym serwisie zewnętrznym (Google, Facebook, LinkedIn). Użytkownik może dodatkowo ustawić hasło do konta w ustawieniach Serwisu.</li>
    <li>Użytkownik jest odpowiedzialny za zachowanie poufności danych logowania do swojego konta.</li>
    <li>Użytkownik może w każdej chwili usunąć swoje konto w ustawieniach Serwisu. Usunięcie konta jest nieodwracalne i skutkuje trwałym usunięciem wszystkich dokumentów CV oraz danych osobowych Użytkownika (z wyjątkiem danych, które Usługodawca jest zobowiązany przechowywać na podstawie przepisów prawa).</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;5. Płatności</h2>
<!-- ============================================================ -->

<ol>
    <li>Płatny Dostęp do Serwisu kosztuje <strong>29 zł brutto</strong> (dwadzieścia dziewięć złotych) i stanowi jednorazową płatność.</li>
    <li>Płatny Dostęp jest aktywny przez <strong>30 dni kalendarzowych</strong> od momentu zaksięgowania płatności.</li>
    <li><strong>Serwis nie oferuje subskrypcji.</strong> Płatność nie jest automatycznie odnawiana. Po upływie 30 dni Płatny Dostęp wygasa automatycznie, bez pobierania jakichkolwiek dodatkowych opłat.</li>
    <li>Po wygaśnięciu Płatnego Dostępu Użytkownik zachowuje dostęp do swojego konta oraz zapisanych CV (podgląd i edycja), jednak traci możliwość eksportu CV (pobierania plików PDF, JPG, PNG). Użytkownik może w każdej chwili ponownie wykupić Płatny Dostęp.</li>
    <li>Płatności są realizowane za pośrednictwem operatora płatności Stripe i obejmują następujące metody:
        <ol type="a">
            <li><strong>BLIK</strong>,</li>
            <li><strong>Karta płatnicza</strong> (Visa, Mastercard),</li>
            <li><strong>Przelewy24 (P24)</strong> &ndash; szybki przelew bankowy.</li>
        </ol>
    </li>
    <li>Usługodawca <strong>nie przechowuje danych kart płatniczych, numerów rachunków bankowych ani kodów BLIK</strong>. Wszystkie dane płatnicze są przetwarzane wyłącznie przez Stripe, Inc., posiadający certyfikat PCI DSS Level 1.</li>
    <li>Potwierdzenie dokonania płatności jest wysyłane na adres e-mail Użytkownika.</li>
    <li>Cena podana w &sect;5 ust. 1 jest ceną brutto i zawiera podatek VAT (jeśli ma zastosowanie). Usługodawca zastrzega sobie prawo do zmiany ceny, przy czym zmiana nie dotyczy płatności już dokonanych ani Płatnego Dostępu już aktywnego.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;6. Prawo odstąpienia od umowy</h2>
<!-- ============================================================ -->

<ol>
    <li>Konsument, który zawarł umowę na odległość (dokonał płatności za Płatny Dostęp), ma prawo odstąpić od umowy <strong>w terminie 14 dni</strong> od dnia zawarcia umowy (tj. od dnia dokonania płatności), bez podania przyczyny, zgodnie z ustawą z dnia 30 maja 2014 r. o prawach konsumenta (Dz.U. 2014, poz. 827 ze zm.).</li>
    <li>Prawo odstąpienia od umowy <strong>nie przysługuje</strong>, jeżeli Usługodawca wykonał w pełni usługę za wyraźną i uprzednią zgodą Konsumenta, który został poinformowany przed rozpoczęciem świadczenia, że po spełnieniu świadczenia przez Usługodawcę utraci prawo odstąpienia od umowy, i przyjął to do wiadomości (art. 38 pkt 1 ustawy o prawach konsumenta).</li>
    <li>Przed dokonaniem płatności Użytkownik jest informowany, że:
        <ol type="a">
            <li>Płatny Dostęp jest aktywowany natychmiast po zaksięgowaniu płatności,</li>
            <li>Użytkownik wyraża zgodę na natychmiastowe rozpoczęcie świadczenia usługi,</li>
            <li>skorzystanie z usługi (np. pobranie pliku CV) skutkuje utratą prawa do odstąpienia od umowy.</li>
        </ol>
    </li>
    <li>W przypadku, gdy Konsument nie skorzystał z żadnej usługi płatnej (nie pobrał żadnego pliku CV) w okresie 14 dni od zakupu, prawo odstąpienia przysługuje na zasadach ogólnych.</li>
    <li>Aby skorzystać z prawa odstąpienia, Konsument powinien przesłać jednoznaczne oświadczenie o odstąpieniu od umowy na adres: <a href="mailto:kontakt@cvbuilder.pl">kontakt@cvbuilder.pl</a>. Oświadczenie może mieć dowolną formę, w tym formę wiadomości e-mail.</li>
    <li>Wzór oświadczenia o odstąpieniu od umowy:
        <blockquote>
            <p><em>Ja, [imię i nazwisko], niniejszym informuję o moim odstąpieniu od umowy o świadczenie usługi Płatnego Dostępu w serwisie CV Builder. Data zawarcia umowy: [data płatności]. Adres e-mail konta: [e-mail]. [Imię i nazwisko, data].</em></p>
        </blockquote>
    </li>
    <li>W przypadku skutecznego odstąpienia od umowy, Usługodawca zwróci Konsumentowi wszystkie otrzymane płatności niezwłocznie, nie później niż w terminie <strong>14 dni</strong> od dnia otrzymania oświadczenia o odstąpieniu. Zwrot nastąpi przy użyciu takiego samego sposobu płatności, jakiego użył Konsument, chyba że Konsument wyrazi zgodę na inny sposób zwrotu.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;7. Własność intelektualna</h2>
<!-- ============================================================ -->

<ol>
    <li>Serwis, w tym jego interfejs graficzny, szablony CV, kod źródłowy, logotyp, grafiki, teksty i inne elementy, stanowi własność intelektualną Usługodawcy i jest chroniony przepisami prawa autorskiego oraz prawa własności intelektualnej.</li>
    <li><strong>Szablony CV</strong> udostępnione w Serwisie stanowią własność Usługodawcy. Użytkownik nabywa prawo do korzystania z szablonów wyłącznie w celu tworzenia i eksportowania własnych dokumentów CV w ramach korzystania z Serwisu (licencja niewyłączna, nieprzenoszalna).</li>
    <li>Użytkownik <strong>nie ma prawa</strong> do:
        <ol type="a">
            <li>kopiowania, rozpowszechniania, sprzedaży ani sublicencjonowania szablonów CV jako samodzielnych produktów,</li>
            <li>inżynierii wstecznej, dekompilacji ani rozbierania kodu źródłowego Serwisu,</li>
            <li>usuwania lub modyfikowania oznaczeń praw autorskich Usługodawcy.</li>
        </ol>
    </li>
    <li><strong>Treść CV</strong> &ndash; wszelkie treści (teksty, dane osobowe, zdjęcia) wprowadzone przez Użytkownika do dokumentu CV pozostają wyłączną własnością Użytkownika. Usługodawca nie rości sobie żadnych praw do treści tworzonych przez Użytkownika.</li>
    <li>Usługodawca nie ponosi odpowiedzialności za naruszenie praw osób trzecich przez treści umieszczone w CV przez Użytkownika.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;8. Odpowiedzialność</h2>
<!-- ============================================================ -->

<ol>
    <li>Usługodawca <strong>nie gwarantuje</strong> uzyskania zatrudnienia, zaproszenia na rozmowę kwalifikacyjną ani jakiegokolwiek innego rezultatu w związku z korzystaniem z CV utworzonego w Serwisie.</li>
    <li>Usługodawca dokłada starań, aby Serwis działał prawidłowo i był dostępny nieprzerwanie, jednak nie gwarantuje ciągłości działania ani braku błędów technicznych. Usługodawca zastrzega sobie prawo do czasowych przerw technicznych w celu konserwacji, aktualizacji lub naprawy Serwisu.</li>
    <li><strong>Odpowiedzialność za treść CV ponosi wyłącznie Użytkownik.</strong> Usługodawca nie weryfikuje prawdziwości, aktualności ani kompletności danych wprowadzonych przez Użytkownika do dokumentu CV.</li>
    <li>Usługodawca nie ponosi odpowiedzialności za:
        <ol type="a">
            <li>skutki podania przez Użytkownika nieprawdziwych, nieaktualnych lub niekompletnych danych,</li>
            <li>utratę danych wynikającą z działania siły wyższej, awarii technicznych po stronie dostawców usług hostingowych lub telekomunikacyjnych,</li>
            <li>działania osób trzecich (np. nieuprawniony dostęp do konta Użytkownika wynikający z ujawnienia danych logowania przez Użytkownika),</li>
            <li>szkody pośrednie, utracone korzyści, utratę danych będącą wynikiem okoliczności niezależnych od Usługodawcy.</li>
        </ol>
    </li>
    <li>Odpowiedzialność Usługodawcy wobec Użytkownika niebędącego Konsumentem jest ograniczona do wysokości opłaty uiszczonej przez Użytkownika za Płatny Dostęp.</li>
    <li>Powyższe ograniczenia odpowiedzialności nie mają zastosowania w zakresie, w jakim bezwzględnie obowiązujące przepisy prawa wyłączają możliwość ich zastosowania, w szczególności wobec Konsumentów.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;9. Ochrona danych osobowych</h2>
<!-- ============================================================ -->

<ol>
    <li>Administratorem danych osobowych Użytkowników jest Usługodawca (CV Builder).</li>
    <li>Szczegółowe zasady przetwarzania danych osobowych, w tym informacje o zakresie zbieranych danych, celach przetwarzania, odbiorcach, okresie przechowywania oraz prawach Użytkownika, określa <strong><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Polityka prywatności</a></strong>, stanowiąca integralną część niniejszego Regulaminu.</li>
    <li>Dane osobowe Użytkowników są przetwarzane zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. (RODO) oraz ustawą z dnia 10 maja 2018 r. o ochronie danych osobowych.</li>
    <li>Dane CV Użytkowników są przechowywane w bazie danych Serwisu, a komunikacja z Serwisem jest szyfrowana protokołem SSL/TLS.</li>
    <li>Usługodawca nie przechowuje danych płatniczych Użytkowników &ndash; są one przetwarzane wyłącznie przez operatora płatności Stripe.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;10. Reklamacje</h2>
<!-- ============================================================ -->

<ol>
    <li>Użytkownik ma prawo zgłosić reklamację dotyczącą funkcjonowania Serwisu lub świadczonych usług.</li>
    <li>Reklamację należy przesłać na adres e-mail: <a href="mailto:kontakt@cvbuilder.pl">kontakt@cvbuilder.pl</a>.</li>
    <li>Reklamacja powinna zawierać:
        <ol type="a">
            <li>adres e-mail Użytkownika (powiązany z kontem w Serwisie),</li>
            <li>opis problemu lub nieprawidłowości,</li>
            <li>oczekiwany sposób rozwiązania problemu,</li>
            <li>datę wystąpienia problemu (jeśli dotyczy).</li>
        </ol>
    </li>
    <li>Usługodawca rozpatrzy reklamację i udzieli odpowiedzi na adres e-mail Użytkownika w terminie <strong>14 dni kalendarzowych</strong> od dnia jej otrzymania.</li>
    <li>W przypadku konieczności uzupełnienia reklamacji, Usługodawca zwróci się do Użytkownika z prośbą o dodatkowe informacje. Termin 14 dni biegnie od dnia otrzymania kompletnej reklamacji.</li>
    <li>Konsument ma możliwość skorzystania z pozasądowych sposobów rozpatrywania reklamacji i dochodzenia roszczeń, w szczególności:
        <ol type="a">
            <li>zwrócenia się do wojewódzkiego inspektora Inspekcji Handlowej z wnioskiem o wszczęcie postępowania mediacyjnego,</li>
            <li>zwrócenia się do stałego polubownego sądu konsumenckiego działającego przy Inspekcji Handlowej z wnioskiem o rozstrzygnięcie sporu,</li>
            <li>skorzystania z unijnej platformy internetowego rozstrzygania sporów (ODR), dostępnej pod adresem: <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener noreferrer">https://ec.europa.eu/consumers/odr</a>.</li>
        </ol>
    </li>
</ol>

<!-- ============================================================ -->
<h2>&sect;11. Dostępność Serwisu i siła wyższa</h2>
<!-- ============================================================ -->

<ol>
    <li>Usługodawca dołoży wszelkich starań, aby Serwis był dostępny nieprzerwanie, 24 godziny na dobę, 7 dni w tygodniu.</li>
    <li>Usługodawca zastrzega sobie prawo do czasowych przerw w działaniu Serwisu, wynikających z:
        <ol type="a">
            <li>planowanych prac konserwacyjnych i aktualizacji (Użytkownicy będą informowani z wyprzedzeniem, gdy to możliwe),</li>
            <li>awarii technicznych niezależnych od Usługodawcy,</li>
            <li>działania siły wyższej (np. klęski żywiołowe, przerwy w dostawie energii elektrycznej, ataki cybernetyczne).</li>
        </ol>
    </li>
    <li>Przerwy techniczne nie stanowią podstawy do reklamacji ani żądania zwrotu płatności, chyba że przerwa uniemożliwiła korzystanie z Serwisu przez okres przekraczający 72 godziny ciągłe w trakcie aktywnego Płatnego Dostępu &ndash; w takim przypadku okres Płatnego Dostępu zostanie przedłużony o czas trwania przerwy.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;12. Zmiany Regulaminu</h2>
<!-- ============================================================ -->

<ol>
    <li>Usługodawca zastrzega sobie prawo do zmiany niniejszego Regulaminu z ważnych przyczyn, takich jak:
        <ol type="a">
            <li>zmiany w obowiązujących przepisach prawa mające wpływ na świadczone usługi,</li>
            <li>zmiany technologiczne lub funkcjonalne Serwisu,</li>
            <li>zmiany zakresu lub charakteru świadczonych usług,</li>
            <li>konieczność dostosowania Regulaminu do decyzji, orzeczeń lub zaleceń organów nadzorczych.</li>
        </ol>
    </li>
    <li>O zmianach Regulaminu Użytkownicy posiadający konto zostaną powiadomieni za pośrednictwem wiadomości e-mail na adres powiązany z kontem, z co najmniej <strong>14-dniowym wyprzedzeniem</strong> przed wejściem zmian w życie.</li>
    <li>Zmiany Regulaminu nie mają wpływu na Płatny Dostęp wykupiony przed datą wejścia zmian w życie &ndash; do takiego Płatnego Dostępu stosuje się postanowienia Regulaminu obowiązującego w dniu dokonania płatności.</li>
    <li>Użytkownik, który nie akceptuje zmian Regulaminu, ma prawo usunąć swoje konto przed datą wejścia zmian w życie.</li>
    <li>Aktualna wersja Regulaminu jest zawsze dostępna na stronie Serwisu.</li>
</ol>

<!-- ============================================================ -->
<h2>&sect;13. Postanowienia końcowe</h2>
<!-- ============================================================ -->

<ol>
    <li>W sprawach nieuregulowanych niniejszym Regulaminem zastosowanie mają przepisy prawa polskiego, w szczególności:
        <ol type="a">
            <li>ustawy z dnia 23 kwietnia 1964 r. &ndash; Kodeks cywilny (Dz.U. 1964 Nr 16, poz. 93 ze zm.),</li>
            <li>ustawy z dnia 18 lipca 2002 r. o świadczeniu usług drogą elektroniczną (Dz.U. 2002 Nr 144, poz. 1204 ze zm.),</li>
            <li>ustawy z dnia 30 maja 2014 r. o prawach konsumenta (Dz.U. 2014, poz. 827 ze zm.),</li>
            <li>Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. (RODO).</li>
        </ol>
    </li>
    <li>Ewentualne spory między Usługodawcą a Użytkownikiem niebędącym Konsumentem będą rozstrzygane przez sąd właściwy dla siedziby Usługodawcy.</li>
    <li>Spory z Konsumentem będą rozstrzygane przez sąd właściwy zgodnie z przepisami Kodeksu postępowania cywilnego (sąd właściwy dla miejsca zamieszkania Konsumenta).</li>
    <li>Jeżeli którekolwiek z postanowień niniejszego Regulaminu zostanie uznane za nieważne lub nieskuteczne przez właściwy sąd lub organ, pozostałe postanowienia zachowują pełną moc i skuteczność. W miejsce nieważnego postanowienia stosuje się odpowiednie przepisy prawa powszechnie obowiązującego.</li>
    <li>Regulamin jest sporządzony w języku polskim. W przypadku tłumaczenia na inne języki, wersja polska jest wersją wiążącą.</li>
    <li>Niniejszy Regulamin wchodzi w życie z dniem <strong>23 lutego 2026 r.</strong></li>
</ol>

</div>
</div>
</article>

<?php get_footer(); ?>
