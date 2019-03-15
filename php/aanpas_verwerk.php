<?php
	require "session_D.php";
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Aanpas verwerk</title>
	</head>

	<body>
		<?php
		echo "<h1>Welkom, " . $_SESSION['Naam'] . "</h1>";
			
			if (isset($_POST['pasAan'])) 
			{
				require 'config.inc.php';
				//vars voor back12_artiesten
				$stnr = $_POST['student'];
				$naam = $_POST['vnaam'];
				$infor = $_POST['info'];
				$tvk = $_POST['tijd'];
				

				//query voor update
				$query = "UPDATE C3_Studenten_klas
				SET Info = '$infor', Tijd_van_komst = '$tvk'
				WHERE Studentennummer = '$stnr'";

				//if, else check
				if (mysqli_query($mysqli, $query))
				{
					echo "<p>De student $naam is aangepast</p>";
					header("location:student_uitlees.php");
				}
				else
				{
					echo "<p>FOUT bij het aanpassen van student $naam</p>";
				}
			}
			else
			{
				echo "<p>Geen gegevens gevonden en ontvangen</p>";
			}

				



			?>
		
		
	</body>
</html>