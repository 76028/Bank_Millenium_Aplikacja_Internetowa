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
require_once "baza.php";
$db = new PDO($dsn, $db_user, $db_password);
    $db->query("SET NAMES 'utf8'");
$id=$_SESSION['aktualne_id'];
$sql = "SELECT * FROM klienci WHERE id= $id";
	$stmt = $db->prepare($sql);
    $stmt->execute();
    
    if ($data = $stmt->fetch()) {
			$_SESSION['imie'] = $data['imie'];
			$_SESSION['nazwisko'] = $data['nazwisko'];
			$_SESSION['pesel'] = $data['pesel'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['nr_telefonu'] = $data['nr_telefonu'];
			$_SESSION['ulica'] = $data['ulica'];
			$_SESSION['nr_domu'] = $data['nr_domu'];
			$_SESSION['nr_lokalu'] = $data['nr_lokalu'];
			$_SESSION['kod_pocztowy'] = $data['kod_pocztowy'];
			$_SESSION['miasto'] = $data['miasto'];
			$_SESSION['wojewodztwo'] = $data['wojewodztwo'];
    } else {
        echo 'Empty Query';
    }
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
                <ul class="navbar-nav ">
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
                    <li class="nav-item  active"><a href="uzytkownik.php"><?php echo $_SESSION['imie'] . ' ' .$_SESSION['nazwisko'] ?></a>
                            <a href="wyloguj.php"> (Wyloguj się)</a></li>
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
            <div class="col-lg-4">
                <aside>
                    <h2 class="aside kolorpaskow">Dane Osobowe</h2>
                    <p class="dane">Imie:
                        <span style="color: orangered; font-size:20px; font-style: italic"><?php echo $_SESSION['imie'];?></span></p>
                    <p class="dane">Nazwisko: <span style="color: orangered; font-size:20px; font-style: italic"><?php echo $_SESSION['nazwisko'];?></span></p>
                    <p class="dane">Email: <span style="color: orangered; font-size:20px; font-style: italic"><?php echo $_SESSION['email'];?></span></p>
                    <p class="dane">Adres: <span style="color: orangered; font-size:20px; font-style: italic">
					<?php
					if($_SESSION['nr_lokalu']==NULL)
					echo $_SESSION['ulica']." ".$_SESSION['nr_domu'];
					else echo $_SESSION['ulica']." ".$_SESSION['nr_domu']."/".$_SESSION['nr_lokalu'];
					?>
					</span></p>
                    <p class="dane">Pesel: <span style="color: orangered; font-size:20px; font-style: italic"><?php echo $_SESSION['pesel']?></span></p>
                    <h2 class="aside kolorpaskow">Dane Konta</h2>
                    <p class="dane">Zalogowano jako: <span style="color:green">Użytkownik</span></p>
                    
                </aside>
            </div>
            <div class="col-lg-8">
                <section class="glowna">
                    <h2 class="section kolorpaskow">Witamy Banku Millennium</h2>
                    <table class="tg" style="table-layout: fixed; width: 100%">
                        <colgroup>
                            <col style="width: 60%">
                            <col style="width: 40%">
                        </colgroup>
                        <tr>
                            <th class="tg-fcto">Rodzaj Konta</th>
                            <th class="tg-fcto">Stan Konta</th>
                        </tr>
                        <tr>
                            <td class="tg-041m"><?php echo $_SESSION['rodzaj']?></td>
                            <td class="tg-041m"><?php echo $_SESSION['stan_konta']?> zł</td>
                        </tr>
                    </table>
                    <nav class="navbar navbar-dark kolorpaskow navbar-expand-sm">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#uzytkownikmenu" aria-controls="uzytkownikmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="uzytkownikmenu" class="collapse navbar-collapse">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item m-1">
                                    <a class="btn btn-primary" role="button" data-toggle="collapse" data-target="#przelew" aria-expanded="true" aria-controls="przelew" style="width: 100%">
                                        Przelew
                                    </a>
                                </li>
                                <li class="nav-item m-1">
                                    <a class="btn btn-primary" role="button" data-toggle="collapse" data-target="#historiaprzelew" aria-expanded="false" aria-controls="historiaprzelew" style="width: 100%">
                                        Historia Przelewów
                                    </a></li>
                                    
                            </ul>
                        </div>
                    </nav>
                    <div class="collapse" id="przelew">
                        <div class="card card-body tlomenuuzytkownik">
                            <form method="post" action="przelew.php">
                                <h3>Przelew Na Konto:</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputHaslo">Podaj Numer Rachunku:</label>
                                        <input type="text" maxlength="27" class="form-control" id="inputHaslo" placeholder="89 4564 4565 4564 5869 1564" name="nr_rachunku_odbiorcy">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="inputImie">Podaj Imie:</label>
                                        <input type="text" class="form-control" id="inputImie" placeholder="Imie">
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="inputNazwisko">Podaj Nazwisko:</label>
                                        <input type="text" class="form-control" id="inputNazwisko" placeholder="Nazwisko">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputUlica">Ulica:</label>
                                        <input type="text" class="form-control" id="inputUlica" placeholder="np. Stołeczna">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputDom">Nr Domu:</label>
                                        <input type="text" class="form-control" id="inputDom" placeholder="np. 32">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputLokal">Nr Lokalu:</label>
                                        <input type="text" class="form-control" id="inputLokal" placeholder="np. 16">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputMiasto">Miasto:</label>
                                        <input type="text" class="form-control" id="inputMiasto" placeholder="np. Warszawa">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputKwota">Kwota:</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="inputKwota" style="text-align: right;" placeholder="0,00" name="kwota">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">ZŁ</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputOpis">Opis:</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="inputOpis" placeholder="Krótki opis" name="opis">
                                        </div>

                                    </div>
                                </div>
                        
                                <button type="submit" class="btn btn-primary">Wykonaj Przelew</button>
                            </form>
                        </div>
                    </div>
                    <div class="collapse" id="historiaprzelew">
                        <div class="card card-body tlomenuuzytkownik">
                            <table class="tg2" style="table-layout: fixed; width: 100%">
                                
                                <colgroup>
                                    <col style="width: 10%">
                                    <col style="width: 15%">
                                    <col style="width: 30%">
                                    <col style="width: 10%">
                                </colgroup>
                                <tr>
                                    <th class="tg-ylws">Data</th>
                                    <th class="tg-ylws">Odbiorca</th>
                                    <th class="tg-ylws">Opis</th>
                                    <th class="tg-ylws">Kwota</th>
                                </tr>
                                 <?php
                                    $sql = "SELECT * FROM przelewy";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                    if ($data = $stmt->fetch()) {
                                            $_SESSION['id_przelewu'] = $data['id'];
                                            $_SESSION['data_przelewu'] = $data['data_przelewu'];
                                            $_SESSION['nr_rachunku_nadawcy'] = $data['nr_rachunku_nadawcy'];
                                            $_SESSION['nr_rachunku_odbiorcy'] = $data['nr_rachunku_odbiorcy'];
                                            $_SESSION['tytul'] = $data['tytul'];
                                            $_SESSION['kwota'] = $data['kwota'];
                                    }
                        
                                    $wlasciciel=$_SESSION['nr_rachunku'];
                                    $sql = "SELECT * FROM przelewy where nr_rachunku_nadawcy='$wlasciciel' OR nr_rachunku_odbiorcy='$wlasciciel'";   
                                    foreach($db->query($sql) as $row) {
                                        
                                        ?>
                                
                                       <tr>
                                        <th class="tg-ffmg"><?php print $row['data_przelewu'] ?></th>
                                        <th class="tg-ffmg"><?php print $row['nr_rachunku_odbiorcy'] ?></th>
                                        <th class="tg-ffmg"><?php print $row['tytul'] ?></th>
                                           
                                        <?php
                                          if($row["nr_rachunku_odbiorcy"]==$wlasciciel)  
                                        print "<th class='tg-5w87'>+".$row['kwota']." zł"."</th></tr>";
                                         else print "<th class='tg-cc3t'>-".$row['kwota']." zł"."</th>";
                                        ?>
                                </tr> 
                            <?php
                                    }
                                    ?>
                            </table>               
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
    </main>
    <script>
        var suwak1 = document.getElementById('suwak1');
        var suwak2 = document.getElementById('suwak2');
        var suwak3 = document.getElementById('suwak3');
        var suwak4 = document.getElementById('suwak4');

        function wartosc() {
            var val = suwak1.value;
            wynik1.innerHTML = val;
        }

        function wartosc2() {
            var val = suwak2.value;
            wynik2.innerHTML = val;
        }

        function wartosc3() {
            var val = suwak3.value;
            wynik3.innerHTML = val;
        }

        function wartosc4() {
            var val = suwak4.value;
            wynik4.innerHTML = val;
        }
    </script>
    <footer class="kolorpaskow">Wszystkie Prawa Zastrzeżone</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body></html>