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
                    <li class="nav-item"><a class="nav-link" href="index.php">Strona Główna</a></li>
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
                    <li class="nav-item  active"><a class="nav-link" href="kontakt.php ">Kontakt</a></li>
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
        <section class="glowna">
            <h2 class="section kolorpaskow">Kontakt z Doradcą Bankowości Prywatnej</h2>
            <article class="glowna">
                <h3 class="doradca">Jeśli zainteresowała Cię nasza oferta i chcesz otrzymać szczegółowe informacje wypełnij poniższy formularz - oddzwonimy.</h3>
                <div class="doradca">
                    <form method="post" action="kontaktwyslij.php">
                        <div class="form-group row">
                            <label for="inputimiedoradca" class="col-sm-12 col-lg-1 col-form-label">Imie:</label>
                            <div class="col-sm-12 col-lg-11">
                                <input type="text" class="form-control" id="inputimiedoradca" placeholder="Imie" name="imie">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputnazwiskodoradca" class="col-sm-12 col-lg-1 col-form-label">Nazwisko:</label>
                            <div class="col-sm-12 col-lg-11">
                                <input type="text" class="form-control" id="inputnazwiskodoradca" placeholder="Nazwisko" name="nazwisko">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtelefon" class="col-sm-12 col-lg-1 col-form-label">Telefon:</label>
                            <div class="col-sm-12 col-lg-11">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+48</div>
                                    <input type="text" class="form-control" id="inputtelefon" placeholder="" name="telefon"> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputemail" class="col-sm-12 col-lg-1 col-form-label">Email:</label>
                            <div class="col-sm-12 col-lg-11">
                                <input type="text" class="form-control" id="inputemail" placeholder="Email" name="email">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <label class="col-form-label col-sm-12 pt-0">Czy jesteś klientem Banku?</label>
                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="tak" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Tak
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="nie">
                                        <label class="form-check-label" for="gridRadios2">
                                            Nie
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label>Treść Wiadomości:</label>
                                <textarea class="col-sm-12" name="message" placeholder="" ></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Wyślij</button>
                            </div>
                        </div>
                    </form>
                </div>
            </article>
        </section>
    </main>
    <footer class="kolorpaskow">Wszystkie Prawa Zastrzeżone</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body></html>
