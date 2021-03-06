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

<body><?php 
session_start(); 
@$isLoggedIn= $_SESSION['aktywna'];
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
                    <li class="nav-item "><a class="nav-link" href="index.php">Strona Główna</a></li>
                    <li class="nav-item active"><a class="nav-link" href="konta.php">Konta Bankowe</a></li>
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
            <div class="col-md-9">
                <section class="glowna">
                    <h2 class="section kolorpaskow">Rodzaje Kont Bankowych</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <article class="kolorpaskow konta siatkakonta">
                                <h3 class="konta">Super Konto Dla Każdego</h3>
                                <h6>Załóż Dobre Konto i przekonaj się, że wygoda może być za darmo.</h6>
                                <p><img src="img/konto4.jpg" width="350" height="250" alt="zdjecie" class="konta img-fluid"></p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                                    Więcej
                                </a>
                                <div class="collapse opiskont" id="collapseExample1">
                                    <div class="card opiskont">
                                        <ul>
                                            <li>0 zł za prowadzenie rachunku płatniczego</li>
                                            <li>0 zł za obsługę karty debetowej</li>
                                            <li>0 zł za wypłaty gotówki</li>
                                            <li>0 zł za krajowe przelewy w złotych przez Millenet i aplikacje mobilną</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="kolorpaskow konta siatkakonta">
                                <h3 class="konta">Konto Osobiste Premium</h3>
                                <h6>Wyjątkowe konto dla wymagających Klientów.</h6>
                                <p><img src="img/konto3.jpg" width="350" height="250" alt="zdjecie" class="konta img-fluid"></p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                                    Więcej
                                </a>
                                <div class="collapse" id="collapseExample3">
                                    <div class="card opiskont">
                                        <ul>
                                            <li>0 zł za wypłaty gotówki</li>
                                            <li> 0 zł za krajowe przelewy w złotych przez Millenet i aplikację mobilną</li>
                                            <li> 0 zł za zlecenia stałe oraz płatności na rachunki zdefiniowane</li>
                                            <li> 0 zł za polecenie zapłaty</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-6">
                            <article class="kolorpaskow konta siatkakonta">
                                <h3 class="konta">Konto 360 Stopni Student</h3>
                                <h6>Idealny wybór dla studentów.</h6>
                                <p><img src="img/konto2.jpg" width="350" height="250" alt="zdjecie" class="konta img-fluid"></p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                                    Więcej
                                </a>
                                <div class="collapse" id="collapseExample4">
                                    <div class="card opiskont">
                                        <ul>
                                            <li>0 zł prowadzenie rachunku płatniczego</li>
                                            <li> 0 zł za obsługę karty debetowej</li>
                                            <li> 0 zł za wypłaty gotówk</li>
                                            <li> 0 zł za realizację zleceń stałych i poleceń zapłaty</li>
                                            <li> 0 zł za przelewy krajowe w złotych przez internet i mobilne</li>
                                            <li> 0 zł za przelewy na e-mail lub telefon</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="kolorpaskow konta siatkakonta">
                                <h3 class="konta">Konto Wygodne</h3>
                                <h6>Jeżeli zależy Ci na wygodzie, nasze Konto osobiste mile Cię zaskoczy.</h6>
                                <p><img src="img/konto1.jpg" width="350" height="250" alt="zdjecie" class="konta img-fluid"></p>
                                <a class="btn btn-primary " data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                    Więcej
                                </a>
                                <div class="collapse" id="collapseExample2">
                                    <div class="card opiskont">
                                        <ul>
                                            <li>0 zł za dostęp do obsługi konta przez telefon i internet</li>
                                            <li>0 zł za wypłaty gotówki</li>
                                            <li>0 zł za przelewy wewnętrzne przez internet i telefon</li>
                                            <li>0 zł za realizację polecenia zapłaty</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3">
                <aside>
                    <h2 class="aside kolorpaskow">Aplikacja Moblilna</h2>
                    <p class="asidekontazdjecia">
                        Zyskaj więcej możliwości. Pobierz i aktywuj aplikację mobilną Banku Millennium, która kolejny rok z rzędu zdobyła pierwsze miejsce w rankingu "Przyjazny Bank Newsweeka" w kategorii "Bankowość mobilna".
                    </p>
                    <p class="asidekontazdjecia"><img src="img/mobilna.PNG" alt="zdjecie" class="asidekonta img-fluid"></p>
                    <p class="asidekontazdjecia">
                        Kupisz bilet autobusowy i opłacisz parking
                        w każdej chwili, bez rejestracji i dodatkowych opłat</p>

                    <p class="asidekontazdjecia"><img src="img/mobilna2.PNG" alt="zdjecie" class="asidekonta img-fluid"></p>
                    <p class="asidekontazdjecia">
                        Weźmiesz pożyczkę
                        w kilka kliknięć, bez zbędnych formalności (RRSO 10,60%)</p>
                    <p class="asidekontazdjecia"><img src="img/mobilna3.PNG" alt="zdjecie" class="asidekonta img-fluid"></p>
                    <p class="asidekontazdjecia">
                        Zapłacisz telefonem
                        kodem BLIK lub zbliżeniowo, bez portfela i plastikowej karty</p>
                </aside>
            </div>
        </div>
    </main>
    <footer class="kolorpaskow">Wszystkie Prawa Zastrzeżone</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body></html>