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
$sql = "SELECT * FROM pracownicy WHERE id= $id";
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
                        <span style="color: orangered; font-size:20px; font-style: italic"><?php echo $_SESSION['imie']?></span></p>
                    <p class="dane">Nazwisko: <span style="color: orangered; font-size:20px; font-style: italic"><?php echo $_SESSION['nazwisko']?></span></p>
                    <p class="dane">Email: <span style="color: orangered; font-size:20px; font-style: italic"><?php echo $_SESSION['email']?></span></p>
                    <p class="dane">Adres: <span style="color: orangered; font-size:20px; font-style: italic">
                            <?php
					if($_SESSION['nr_lokalu']==NULL)
					echo $_SESSION['ulica']." ".$_SESSION['nr_domu'];
					else echo $_SESSION['ulica']." ".$_SESSION['nr_domu']."/".$_SESSION['nr_lokalu'];
					?>
                        </span></p>
                    <p class="dane">Pesel: <span style="color: orangered; font-size:20px; font-style: italic"><?php echo $_SESSION['pesel']?></span></p>
                    <h2 class="aside kolorpaskow">Dane Konta</h2>

                    <p class="dane">Zalogowano jako: <span style="color:orange"><?php echo $_SESSION['typ']?></span></p>
                    <p class="dane">Liczba wiadomosci: <span style="color: red">
                            <?php
    
                        $zapytanie = $db->prepare("SELECT COUNT(*) FROM wiadomosci WHERE id_moderatora = '$id'");
                        $zapytanie->execute();
                        $liczbalini = $zapytanie->fetchColumn();
                        echo $liczbalini; 
                        ?>

                        </span></p>
                    <p class="dane">Liczba oczekujących kont: <span style="color: red">
                            <?php
    
                        $zapytanie = $db->prepare("SELECT COUNT(*) FROM konta_oczekujace WHERE id_moderatora = '$id'");
                        $zapytanie->execute();
                        $liczbalini = $zapytanie->fetchColumn();
                        echo $liczbalini; 
                        ?>


                        </span> </p>
                </aside>
            </div>
            <div class="col-lg-8">
                <section class="glowna">
                    <h2 class="section kolorpaskow">Panel Moderatora</h2>
                    <nav class="navbar navbar-dark kolorpaskow navbar-expand-sm">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#uzytkownikmenu" aria-controls="uzytkownikmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="uzytkownikmenu" class="collapse navbar-collapse">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item m-1">
                                    <a class="btn btn-primary" role="button" data-toggle="collapse" data-target="#przelew" aria-expanded="true" aria-controls="przelew" style="width: 100%">
                                        Wiadomosci
                                    </a>
                                </li>
                                <li class="nav-item m-1">
                                    <a class="btn btn-primary" role="button" data-toggle="collapse" data-target="#historiaprzelew" aria-expanded="false" aria-controls="historiaprzelew" style="width: 100%">
                                        Oczekujące Konta
                                    </a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="collapse" id="przelew">
                        <div class="card card-body tlomenuuzytkownik">
                            <h3>Skrzynka Odbiorcza:</h3>





                            <?php
                                    $sql = "SELECT * FROM wiadomosci where id_moderatora = '$id'";
                                    foreach($db->query($sql) as $row) {
                                        {
                                         

                                                ?>
                            <div class="wiadomosci">
                                 
                                <form method="post" action="wiadomosci.php">
                                    
                                    <h3>Wiadomość od:</h3>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input name="id_wiadomosci" type="hidden" value="<?php echo $row['id']?>">
                                            <h5>Imie: <?php print $row["imie"] ?></h5>
                                            <h5>Nazwisko: <?php print $row["nazwisko"] ?></h5>
                                            <h5>Telefon: <?php print $row["telefon"] ?></h5>
                                            <h5>Email: <?php print $row["email"] ?></h5>

                                        </div>
                                        <div class="col-md-7">
                                            <textarea class="col-md-12" name="message" placeholder=""><?php print $row["tresc"] ?></textarea></div>
                                        <div class="col-md-12">
                                            <div class="col-md-12"><label>Szybka Odpowiedź :</label><textarea class="col-md-12" name="message" placeholder="">
                                                </textarea></div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="decyzja" id="gridRadios1" value="tak" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Wyslij
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="decyzja" id="gridRadios2" value="nie">
                                        <label class="form-check-label" for="gridRadios2">
                                            Usun
                                        </label>
                                    </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Akceptuj</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                           
                            <?php
                                        }
                                    }                         
                                ?>



                        </div>
                    </div>
                    <div class="collapse" id="historiaprzelew">
                        <div class="card card-body tlomenuuzytkownik">
                            <h3>Konta Oczekujace:</h3>
                            <?php
                                    $sql = "SELECT * FROM konta_oczekujace where id_moderatora = '$id'";
                                    foreach($db->query($sql) as $row) {
                                        {
                                           

                                                ?>
                            <div class="oczekujace">
                            <form method="post" action="akceptacjakonta.php">
                                <h3>Dane Osobowe:</h3>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input name="id_ocz" type="hidden" value="<?php echo $row['id']?>">
                                        <h5>Imie: <?php print $row["imie"] ?></h5>
                                        <h5>Nazwisko: <?php print $row["nazwisko"] ?></h5>
                                        <h5>Pesel: <?php print $row["pesel"] ?></h5>
                                        <h5>Ulica: <?php
                                        if($row["nr_lokalu"]==NULL)
                                        echo $row["ulica"]." ".$row["nr_domu"];
                                        else echo $row["ulica"]." ".$row["nr_domu"]."/".$row["nr_lokalu"];
                                        ?></h5>
                                        <h5>Rodzaj Konta: <?php print $row["rodzaj_konta"] ?></h5>
                                    </div>
                                    <div class="col-md-5">
                                        <h4>Kontakt:</h4>
                                        <h5>Telefon: <?php print $row["nr_telefonu"] ?></h5>
                                        <h5>Email: <?php print $row["email"] ?></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Komentarz:</label>
                                        <textarea class="col-md-12" name="message" placeholder=""></textarea>
                                    </div>
                                </div>
                                <fieldset class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="decyzja" id="gridRadios1" value="tak" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Akceptuj
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="decyzja" id="gridRadios2" value="nie">
                                        <label class="form-check-label" for="gridRadios2">
                                            Odrzuc
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">Akceptuj</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <?php
                                        }
                                    }                         
                                ?>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <footer class="kolorpaskow">Wszystkie Prawa Zastrzeżone</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
