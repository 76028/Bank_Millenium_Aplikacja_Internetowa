<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Millennium</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body> 
    <?php 
session_start(); 
?>
    <header>
        <nav class="navbar navbar-dark kolorpaskow navbar-expand-md fixed-top">
            <a class="navbar-brand mr-0" href="index.php">
                <img src="img/logo.png" width="45" height="35" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="mainmenu" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Strona Główna</a></li>
                    <li class="nav-item"><a class="nav-link" href="konta.php">Konta Bankowe</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Produkty
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="kartykredytowe.php">Karty płatnicze</a>
                            <a class="dropdown-item" href="kredyty.php">Kredyty i pożyczki</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="kontakt.php">Kontakt</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> 
                    <?php
                        @$isLoggedIn= $_SESSION['aktywna'];
                        @$warunek = $_SESSION['jakomod'];
                        if ($warunek==false && $isLoggedIn==true):?>
                        
                            <a href="uzytkownik.php"><?php echo $_SESSION['imie'] . ' ' .$_SESSION['nazwisko'] ?></a>
                            <a href="wyloguj.php"> (Wyloguj się)</a>
                        
                      <?php elseif ($warunek==true && $isLoggedIn==true): ?>
                        
                        <a href="moderator.php"><?php echo $_SESSION['imie'] . ' ' .$_SESSION['nazwisko'] ?></a>
                            <a href="wyloguj.php"> (Wyloguj się)</a>
                        
                    <?php else: ?>
                            <a href="logowanie.php">Rejestracja / Logowanie</a>
                    <?php endif; ?>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div id="carouselExampleIndicators" class="carousel slide slajder" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/banner1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/banner2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/banner3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <section class="glowna">
                    <h2 class="section kolorpaskow">O NAS</h2>
                    <article class="glowna">
                        <h3 class="article">Kim jesteśmy?</h3>
                        <p class="article">
                            Bank Millennium jest ogólnopolskim, uniwersalnym bankiem oferującym swoje usługi wszystkim segmentom rynku poprzez sieć oddziałów, sieci indywidualnych doradców i bankowość elektroniczną. Twórcom i akcjonariuszom Banku od początku przyświecała idea stworzenia nowoczesnej instytucji wykorzystującej najlepsze tradycje bankowości, z powodzeniem konkurującej we wszystkich segmentach rynku finansowego.
                        </p>
                        <p class="article">
                            Znajomość polskiego rynku finansów zbudowaliśmy na wieloletnich doświadczeniach w obsłudze przedsiębiorstw i klientów indywidualnych, uzupełniamy ją wiedzą i międzynarodową praktyką w dziedzinie finansów wnoszoną przez Banco Comercial Portugues (Millennium bcp) - największy komercyjny bank w Portugalii, który jest strategicznym udziałowcem Banku.
                        </p>
                        <p><img class="img-fluid article" style="width: 100%;" src="img/millenium.jpg" alt="zdjecie millenium"></p>
                        <p class="article">
                            Dzięki swoimi spółkom zależnym i firmom współpracującym, Bank od lat prowadzi działalność na wszystkich rynkach finansowych, zapewniając tym samym swoim Klientom kompleksowe usługi finansowe w ramach jednej instytucji.
                        </p>
                        <p class="article">Bank stanowi centrum Grupy Banku Millennium w skład, której wchodzą: Millennium Leasing, Millennium Dom Maklerski i Millennium Towarzystwo Funduszy Inwestycyjnych. Zatrudniamy ponad 6000 pracowników. Jednocześnie informujemy, że sprzedaż, dzierżawa lub wynajem nieruchomości nastąpi po zakończonym procesie negocjacji, które Bank przeprowadzi po przeanalizowaniu otrzymanych ofert.</p>
                    </article>
                </section>
                <section class="glowna">
                    <h2 class="section kolorpaskow">Nasza Załoga</h2>
                    <article class="glowna">
                        <div class="row">
                            <div class="col-sm-6 col-xl-4">

                                <div class="zaloga2">

                                    <img class="img-fluid" src="img/pracownik.jpg" alt="Card image cap">
                                    <h3 class="zaloga">Marcin Shokata</h3>
                                    <div class="zaloga">
                                        <p class="zaloga">Pan Marcin jest absolwentem Wydziału Handlu Zagranicznego SGPiS (obecnie SGH) w Warszawie, wieloletnim pracownikiem Ministerstwa Finansów, specjalistą w zakresie finansowania handlu zagranicznego.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="zaloga2">
                                    <img class="img-fluid" src="img/pracownik2.png" alt="Card image cap">
                                    <h3 class="zaloga">Tomasz Działowy</h3>
                                    <div class="zaloga">
                                        <p class="zaloga">Pan Tomasz absolwent Wydziału Organizacji i Zarzadzania Firmami ISCTE (Insituto Superior de Ciencias do Trabalho e da Empresa) oraz Zaawansowanego Programu Zarządzania w INSEAD (Francja).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="zaloga2">

                                    <img class="img-fluid" src="img/pracownik3.jpg" alt="Card image cap">
                                    <h3 class="zaloga">Janusz Krzak</h3>
                                    <div class="zaloga">
                                        <p class="zaloga">Pan Janusz jest absolwentem Wydziału Ekonomiki Produkcji Szkoły Głównej Handlowej (SGH) oraz studiów podyplomowych z zakresu Strategicznego Zarządzania Marketingowego SGH i z zakresu pośrednictwa. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="zaloga2">
                                    <img class="img-fluid" src="img/pracownik4.jpg" alt="Card image cap">
                                    <h3 class="zaloga">Jan Kowalski</h3>
                                    <div class="zaloga">
                                        <p class="zaloga">Pan Jan ukończył studia ekonomiczne w Szkole Głównej Planowania i Statystyki (obecnie Szkoła Główna Handlowa) w 1963 r., a w 1964 r. studia socjologiczne na Uniwersytecie Warszawskim.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="zaloga2">
                                    <img class="img-fluid" src="img/pracownik5.png" alt="Card image cap">
                                    <h3 class="zaloga">Anna Kryszczak</h3>
                                    <div class="zaloga">
                                        <p class="zaloga">Pani Anna ukończyła studia w zakresie Business Administration na uniwersytecie Wilfrid Laurier University w Waterloo, w prowincji Ontario, w Kanadzie.Jej kariera zawodowa rozpoczęła się w Procter</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="zaloga2">
                                    <img class="img-fluid" src="img/pracownik6.jpg" alt="Card image cap">
                                    <h3 class="zaloga">Dominika Okejka</h3>
                                    <div class="zaloga">
                                        <p class="zaloga">Pani Dominika ukończyła studia ekonomiczne w Szkole Głównej Handlowej w Warszawie oraz studia podyplomowe z zakresu Public Relations, także w SGH.Swoją karierę zawodową związała z obszarem nowych technologii.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
            
            </div>
            <div class="col-lg-3">
                <aside>
                    <h2 class="aside kolorpaskow">Wiadomości</h2>
                    <p>
                        <img class="img-fluid aside" style="width: 100%;" src="img/aside3.jpg" alt="wiadomosci"></p>
                    <p>
                        Super Bank Polski potwierdził informację o zatrzymaniu przez prokuraturę byłych pracowników. Nie ma to związku z bieżącą działalnością operacyjną banku - podał Super BAnk Polski w komunikacie.
                    </p>
                    <p>
                        Bank podał, że w lipcu 2019 r. złożył do Prokuratury zawiadomienie o podejrzeniu popełnienia przestępstwa przez niektórych byłych członków zarządu Idea Banku. W prowadzonym postępowaniu bank uzyskał status pokrzywdzonego
                    </p>
                    <h2 class="aside kolorpaskow">Wydarzenia</h2>
                    <p>
                        <img class="img-fluid aside" src="img/aside.png" alt="wydarzenie">
                        Bank Millennium jest pierwszą spółką sektora finansowego, która opublikowała raport finansowy i społeczny za 2018 rok w wersji on-line. Dzięki temu analitycy, inwestorzy i wszyscy zainteresowani działalnością firmy mają nie tylko szybki, ale i łatwy dostęp do kluczowych informacji.</p>
                    <h2 class="aside kolorpaskow">Mecenat kultury</h2>
                    <p>
                        <img class="img-fluid aside" style="width: 100%;" src="img/aside2.jpg" alt="zlote berlo"></p>
                    <p>
                        Bank Millennium przywiązuje ogromną wagę do komunikacji ze środowiskami pozostającymi poza zakresem jego bezpośredniej aktywności biznesowej: organizacjami pozarządowymi, społecznymi, samorządowymi i fundacjami. Realizując swoją misję społeczną Bank prowadzi wspólnie z tymi instytucjami wieloletnie programy w obszarze kultury, edukacji i inicjatyw charytatywnych. Działania te stanowią element szeroko rozumianego programu komunikacji spółki będącej instytucją zaufania publicznego. </p>
                    <h2 class="aside kolorpaskow">Promocje</h2>
                    <p>
                        <img class="img-fluid aside" style="width: 100%;" src="img/aside4.png" alt="zlote berlo"></p>
                    <p>
                        Obserwuj naszą stronę internetową, aby dowiedzieć się, kiedy będzie można założyć lokatę z podwyższonym oprocentowaniem. Informacja taka jest ogłaszana raz w tygodniu w godzinach 9-10. Ostatnia promocja miała miejsce 27 marca w godzinach 13-16.</p>
                    <ul class="aside promocje">
                        <li>maksymalna kwota lokat w ramach danej promocji to 20 000 PLN</li>
                        <li>kwota minimalna lokaty to 500 PLN</li>
                        <li>na okres od 32 do 61 dni</li>
                        <li>w aplikacji mobilnej lub Millenecie</li>
                    </ul>
                    <h2 class="aside kolorpaskow">Szybka pożyczka</h2>
                    <p>
                        <img class="img-fluid aside" style="width: 100%;" src="img/aside5.jpg" alt="pozyczka"></p>
                    <p>
                        Rzeczywista Roczna Stopa Oprocentowania (RRSO) wynosi 9,37%, całkowita kwota kredytu (bez kredytowanych kosztów) 77 775,56 zł, całkowita kwota do zapłaty 111 143,14 zł, oprocentowanie zmienne 8,99% całkowity koszt kredytu 33 367,58 zł (w tym: prowizja 0,00 zł, odsetki 33 367,58 zł), 101 miesięcznych rat równych po 1 100,53 zł. Kalkulacja na dzień 14.02.2019 r. na reprezentatywnym przykładzie.</p>
                </aside>
            </div>
        </div>
    </main>
    <footer class="kolorpaskow">Wszystkie Prawa Zastrzeżone</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body></html>