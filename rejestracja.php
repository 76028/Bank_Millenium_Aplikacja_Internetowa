<?php  
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$email=$_POST['email'];
$haslo=$_POST['haslo'];
$nr_telefonu=$_POST['nr_telefonu'];
$ulica=$_POST['ulica'];
$nr_domu=$_POST['nr_domu'];
$nr_lokalu=$_POST['nr_lokalu'];
$kod_pocztowy=$_POST['kod_pocztowy'];
$miasto=$_POST['miasto'];
$wojewodztwo=$_POST['wojewodztwo'];
$pesel=$_POST['pesel'];
$rodzaj=$_POST['rodzaj'];
require_once "baza.php";
$db = new PDO($dsn, $db_user, $db_password);
$db->query("SET NAMES 'utf8'");
$sql = "INSERT INTO konta_oczekujace(id_moderatora,rodzaj_konta,haslo,imie,nazwisko,pesel,email,nr_telefonu,ulica,nr_domu,nr_lokalu,kod_pocztowy,miasto,wojewodztwo)
VALUES (1,'$rodzaj','$haslo','$imie','$nazwisko','$pesel','$email','$nr_telefonu','$ulica','$nr_domu','$nr_lokalu','$kod_pocztowy','$miasto','$wojewodztwo')";
$db->exec($sql);
header('Location: logowanie.php');
?>