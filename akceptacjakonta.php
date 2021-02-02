<?php 
session_start();
$wiadomosc = $_POST['message'];
$decyzja =  $_POST['decyzja'];
$id=$_POST['id_ocz'];


if($decyzja=="tak"){
    
    require_once "baza.php";
    $db = new PDO($dsn, $db_user, $db_password);
    $db->query("SET NAMES 'utf8'");
    
    $sql = "SELECT * FROM konta_oczekujace where id = '$id'";
                $stmt = $db->prepare($sql);
				$stmt->execute();
				
				if ($data = $stmt->fetch()) {
                    
                                        $id_moderatora=$data["id_moderatora"];
                                        $rodzaj_ocz=$data["rodzaj_konta"];
                                        $haslo_ocz=$data["haslo"];
                                        $imie_ocz=$data["imie"];
                                        $nazwisko_ocz=$data["nazwisko"];
                                        $pesel_ocz=$data["pesel"];
                                        $email_ocz=$data["email"];
                                        $nr_telefonu_ocz=$data["nr_telefonu"];
                                        $ulica_ocz=$data["ulica"];
                                        $nr_domu_ocz=$data["nr_domu"];
                                        $nr_lokalu_ocz=$data["nr_lokalu"];
                                        $kod_pocztowy_ocz=$data["kod_pocztowy"];
                                        $miasto_ocz=$data["miasto"];
                                        $wojewodztwo_ocz=$data["wojewodztwo"];
                                    }



    
    $sql = "SELECT * FROM konta_klientow";
    $znaleziono=true;
    while($znaleziono)
    {
        $czlon1=rand(10,99);
        $czlon2=rand(1000,9999);
        $czlon3=rand(1000,9999);
        $czlon4=rand(1000,9999);
        $czlon5=rand(1000,9999);
        $czlon6=rand(1000,9999);
        
       foreach($db->query($sql) as $row) {
           
               $rachunek=$row["nr_rachunku"];
               if($rachunek==$czlon1.' '.$czlon2.' '.$czlon3.' '.$czlon4.' '.$czlon5.' '.$czlon6)
               {
                   $znaleziono=true;
               }
               else {
                   $znaleziono=false;
                   $nowy_rachunek=$czlon1.' '.$czlon2.' '.$czlon3.' '.$czlon4.' '.$czlon5.' '.$czlon6; 
                    }
           
                
        }
    }
        echo $nowy_rachunek;
        
     
    $sql = "INSERT INTO klienci(imie,nazwisko,pesel,email,nr_telefonu,ulica,nr_domu,nr_lokalu,kod_pocztowy,miasto,wojewodztwo)
    VALUES ('$imie_ocz','$nazwisko_ocz','$pesel_ocz','$email_ocz','$nr_telefonu_ocz','$ulica_ocz','$nr_domu_ocz','$nr_lokalu_ocz','$kod_pocztowy_ocz','$miasto_ocz','$wojewodztwo_ocz')";
    $db->exec($sql);
    
                $sql = "SELECT * FROM klienci where pesel = '$pesel_ocz'";
                $stmt = $db->prepare($sql);
				$stmt->execute();
				
				if ($data = $stmt->fetch()) {
                    
                    $id_konta_ocz=$data['id'];
                }
    echo $id_konta_ocz;
    
    
    
    $sql = "INSERT INTO konta_klientow(id_klienta,haslo,rodzaj,nr_rachunku)
    VALUES ('$id_konta_ocz','$haslo_ocz','$rodzaj_ocz','$nowy_rachunek')";
    $db->exec($sql);
    
    
    
    
    
}
    
    else{
        
        require_once "baza.php";
    $db = new PDO($dsn, $db_user, $db_password);
    $db->query("SET NAMES 'utf8'");
    
    $sql = "SELECT * FROM konta_oczekujace where id = '$id'";
                $stmt = $db->prepare($sql);
				$stmt->execute();
				
				if ($data = $stmt->fetch()) {
                    
                                        $id_moderatora=$data["id_moderatora"];
                                        $rodzaj_ocz=$data["rodzaj_konta"];
                                        $haslo_ocz=$data["haslo"];
                                        $imie_ocz=$data["imie"];
                                        $nazwisko_ocz=$data["nazwisko"];
                                        $pesel_ocz=$data["pesel"];
                                        $email_ocz=$data["email"];
                                        $nr_telefonu_ocz=$data["nr_telefonu"];
                                        $ulica_ocz=$data["ulica"];
                                        $nr_domu_ocz=$data["nr_domu"];
                                        $nr_lokalu_ocz=$data["nr_lokalu"];
                                        $kod_pocztowy_ocz=$data["kod_pocztowy"];
                                        $miasto_ocz=$data["miasto"];
                                        $wojewodztwo_ocz=$data["wojewodztwo"];
                                    }
        
        
         $sql = "INSERT INTO konta_odrzucone(id_moderatora,rodzaj_konta,imie,nazwisko,pesel,haslo,email,nr_telefonu,ulica,nr_domu,nr_lokalu,kod_pocztowy,miasto,wojewodztwo,komentarz)
    VALUES ('$id_moderatora','$rodzaj_ocz','$imie_ocz','$nazwisko_ocz','$pesel_ocz','$haslo_ocz','$email_ocz','$nr_telefonu_ocz','$ulica_ocz','$nr_domu_ocz','$nr_lokalu_ocz','$kod_pocztowy_ocz','$miasto_ocz','$wojewodztwo_ocz','$wiadomosc')";
    $db->exec($sql);
        
        
        
        $sql = "delete from konta_oczekujace where id='$id'";
    $db->exec($sql);
        
        
        
    }



?>