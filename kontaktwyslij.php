<?php 
session_start();
$klient = $_POST['gridRadios'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$telefon = $_POST['telefon'];
$email = $_POST['email'];
$tresc = $_POST['message'];








echo $klient;
require_once "baza.php";
    $db = new PDO($dsn, $db_user, $db_password);
    $db->query("SET NAMES 'utf8'");
$zapytanie = $db->prepare("SELECT COUNT(*) FROM wiadomosci");
                        $zapytanie->execute();
                        $liczbalini = $zapytanie->fetchColumn();
$random = rand(0,$liczbalini);


$sql = "INSERT INTO wiadomosci(imie,nazwisko,telefon,email,klient,tresc,id_moderatora)
    VALUES ('$imie','$nazwisko','$telefon','$email','$klient','$tresc','$random')";
    $db->exec($sql);
header('Location: index.php');


?>
