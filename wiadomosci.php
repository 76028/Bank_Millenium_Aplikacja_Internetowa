<?php 
session_start();
$wiadomosc = $_POST['message'];
$decyzja =  $_POST['decyzja'];
$id=    $_POST['id_wiadomosci'];



if($decyzja=="tak"){
    
    
    $to= "plgoguspl@gmail.com";
    $subject = "Sukces";
    $messages= "Wiadomość została pomyślnie wysłana z serwera lokalnego.";

    if( mail($to, $subject, $messages) ) {
      echo "Wiadomość wysłana!";
    } else {
      echo "Niepowodzenie!";
    }
}
else 
{
    require_once "baza.php";
    $db = new PDO($dsn, $db_user, $db_password);
    $db->query("SET NAMES 'utf8'");
    $sql = "delete from wiadomosci where id='$id'";
    $db->exec($sql);
    header('Location: moderator.php');
}?>