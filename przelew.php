<?php 
session_start();
$odbiorca = $_POST['nr_rachunku_odbiorcy'];
$nadawca = $_SESSION['nr_rachunku'];
$opis = $_POST['opis'];
$kwota = $_POST['kwota'];


require_once "baza.php";
    $db = new PDO($dsn, $db_user, $db_password);
    $db->query("SET NAMES 'utf8'");

$sql = "INSERT INTO przelewy(nr_rachunku_nadawcy,nr_rachunku_odbiorcy,tytul,kwota)
    VALUES ('$nadawca','$odbiorca','$opis','$kwota')";
    $db->exec($sql);

echo $odbiorca;


   $sql = "SELECT * FROM konta_klientow where nr_rachunku = '$odbiorca'";
                $stmt = $db->prepare($sql);
				$stmt->execute();
				if ($data = $stmt->fetch()) {
                    
                    $kwota_odbiorcy=$data['stan_konta'];
                }

        
    $nowa_kwota_odbiorcy=$kwota_odbiorcy+$kwota;
    
$sql = "SELECT * FROM konta_klientow where nr_rachunku = '$nadawca'";
                $stmt = $db->prepare($sql);
				$stmt->execute();
				if ($data = $stmt->fetch()) {
                    
                    $kwota_nadawcy=$data['stan_konta'];
                }


    $nowa_kwota_nadawcy=$kwota_nadawcy-$kwota;

 $db->exec("update konta_klientow set stan_konta='$nowa_kwota_nadawcy' where nr_rachunku='$nadawca'");
$db->exec("update konta_klientow set stan_konta='$nowa_kwota_odbiorcy' where nr_rachunku='$odbiorca'");


?>