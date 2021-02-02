<?php 

require_once "baza.php";
$db = new PDO($dsn, $db_user, $db_password);
$login=$_POST['loginek'];
$haslo=$_POST['haselko'];
if(isset($_POST['pracownik']))
$pracownik=$_POST['pracownik'];
else $pracownik="off";


	
	if(isset($login) && isset($haslo) && $login!="" && $haslo!="")
	{
		if($pracownik=="off")
		{
		$sql = "SELECT * FROM konta_klientow WHERE id='$login' AND haslo = '$haslo'";
		$db->query("SET NAMES 'utf8'");
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		if ($data = $stmt->fetch()) {
				session_start();
				$_SESSION['id'] = $data['id'];
				$_SESSION['id_klienta'] = $data['id_klienta'];
				$_SESSION['haslo'] = $data['haslo'];
				$_SESSION['rodzaj'] = $data['rodzaj'];
				$_SESSION['nr_rachunku'] = $data['nr_rachunku'];
				$_SESSION['data_zalozenia'] = $data['data_zalozenia'];
				$_SESSION['stan_konta'] = $data['stan_konta'];	
				$_SESSION['aktualne_id']=$login;	
				$_SESSION['aktywna']=true;
                $_SESSION['jakomod']=false;
				header('Location: uzytkownik.php');
		} else {
				echo 'Brak Takiego Uzytkownika';
			}
			
		}
		else{
				
				$sql = "SELECT * FROM konta_pracownikow WHERE id='$login' AND haslo = '$haslo'";
				$db->query("SET NAMES 'utf8'");
				$stmt = $db->prepare($sql);
				$stmt->execute();
				
				if ($data = $stmt->fetch()) {
						session_start();
						$_SESSION['id'] = $data['id'];
						$_SESSION['id_pracownika'] = $data['id_pracownika'];
						$_SESSION['haslo'] = $data['haslo'];
						$_SESSION['typ'] = $data['typ'];
						$_SESSION['data_zalozenia'] = $data['data_zalozenia'];
						$_SESSION['aktualne_id']=$login;							
						$_SESSION['aktywna']=true;
                        $_SESSION['jakomod']=true;
						header('Location: moderator.php');
				} 
				else {
						echo 'Brak Takiego Pracownika';
					}
				
			}
			
			
	}
	else
		echo "puste wartosci";
?>