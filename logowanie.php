
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
                    <li class="nav-item active">
                        <a href="logowanie.php">Rejestracja / Logowanie</a>
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
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section kolorpaskow">Logowanie</h2>
                    <article class="glowna">
                        <h3 class="kredyty">Jeśli posiadasz konto:</h3>
                        
                        <form method="post" action="zalogowanie.php">
                            <div class="form-group">
                                <label for="InputId">ID Konta:</label>
                                <input type="text" class="form-control" id="InputId" aria-describedby="idHelp" placeholder="Np. 45758959" name="loginek">
                                <small id="idHelp" class="form-text text-muted">Identyfikator konta znajdziesz na umowie.</small>
                            </div>
                            <div class="form-group">
                                <label for="InputHasloL">Hasło:</label>
                                <input type="password" class="form-control" id="InputHasloL" placeholder="Hasło" name="haselko">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="jakopracownik" name="pracownik">
                                <label class="form-check-label" for="jakopracownik">Zaloguj jako pracownik</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Zaloguj</button>
                        </form>
                        
                    </article>
                </div>
                <div class="col-lg-8">
                    <h2 class="section kolorpaskow">Rejestracja</h2>
                    <article class="glowna">
                        <form method="post" action="rejestracja.php">
                            <h3 class="kredyty">Jeśli nie posiadasz konta:</h3>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputImie">Podaj Imie:</label>
                                    <input type="text" class="form-control" id="inputImie" placeholder="Imie" name="imie">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="inputNazwisko">Podaj Nazwisko:</label>
                                    <input type="text" class="form-control" id="inputNazwisko" placeholder="Nazwisko" name="nazwisko">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputEmail">Podaj Email:</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputHaslo">Podaj Hasło:</label>
                                    <input type="password" class="form-control" id="inputHaslo" placeholder="Hasło" name="haslo">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputTelefon">Numer Telefonu:</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+48</div>
                                        </div>
                                        <input type="text" class="form-control" maxlength="9" id="inputTelefon" placeholder="telefon" name="nr_telefonu">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputUlica">Ulica:</label>
                                    <input type="text" class="form-control" id="inputUlica" placeholder="ul. Stołeczna 12" name="ulica">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputDom">Nr Domu:</label>
                                    <input type="text" class="form-control" id="inputDom" placeholder="np. 32" name="nr_domu"> 
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputLokal">Nr Lokalu:</label>
                                    <input type="text" class="form-control" id="inputLokal" placeholder="np. 16" name="nr_lokalu">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputKodPocztowy">Kod Pocztowy:</label>
                                    <input type="text" class="form-control" maxlength="6" pattern="^[0-9]{2}-[0-9]{3}$" id="inputKodPocztowy" placeholder="np. 16-256" name="kod_pocztowy">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputMiasto">Miasto:</label>
                                    <input type="text" class="form-control" id="inputMiasto" placeholder="np. Warszawa" name="miasto">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputWoj">Województwo:</label>
                                    <select id="inputWoj" class="form-control" name="wojewodztwo">
                                        <option selected>Wybierz</option>
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPesel">Pesel:</label>
                                    <input type="text" class="form-control" maxlength="11" id="inputPesel" placeholder="np. 56265456982" name="pesel">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputKonto">Rodzaj Konta</label>
                                    <select id="inputKonto" class="form-control" name="rodzaj">
                                        <option selected>Wybierz</option>
                                        <option>Konto Wygodne</option>
                                        <option>Super Konto Dla Każdego</option>
                                        <option>Konto Osobiste Premium</option>
                                        <option>Konto 360 Stopni Student</option>
                                    </select>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Zarejestruj</button>
                        </form>
                    </article>
                </div>
            </div>
        </section>
    </main>
    <footer class="kolorpaskow">Wszystkie Prawa Zastrzeżone</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body></html>