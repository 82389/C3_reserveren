<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Inloggen Docent/mentor</title>
		
		<link rel="stylesheet" type="text/css" href="../css1.css">
		<style>
			body
			{
				background-image:url("../images/Pictures-Fall-leaves-desktop-wallpapers.jpg");
			}
			
		</style>
		
	</head>

	<body>
		<?php
		if (isset($_POST['InlogDoc']))
		{
			//config.php
			require 'config.inc.php';
			//gegevns lezen
			$GebrNaamDoc = $_POST['GebrNaamDoc'];
			$WWDoc = $_POST['WWDoc'];
			//query voor ophalen
			$opg = "SELECT * FROM C3_Docenten
			WHERE Naam = '$GebrNaamDoc'
			AND Wachtwoord = '$WWDoc'";
			//opg uitvoeren en result vangen
			$result = mysqli_query($mysqli, $opg);
			//controlle result
			if (mysqli_num_rows($result) > 0)
			{
				//user uit result
				$user = mysqli_fetch_array($result);
				//zet in een seesion
				$_SESSION['Naam'] = $user['Naam'];
				
				echo "<p>Hallo $GebrNaamDoc, u bent ingelogd!</p>";
				
				header("location:student_uitlees.php");
				
			}
			//result leeg
			else
			{
				echo "<p>Naam en/of wachtwoord zijn onjuist.</p>";
				echo "<p><a href='login_D.php'>Probeer opnieuw</a></p>";
			}
		}
		else
		{
			
		?>
		<main>
		<h1 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'">Inloggen</h1>
	
		<form method="post" action="">
			<table border="0">
				<tr>
					<td>Naam:</td>
					<td><input type="text" name="GebrNaamDoc"></td>
				</tr>
				<tr>
					<td>Wachtwoord:</td>
					<td><input type="password" name="WWDoc"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="InlogDoc" value="Log in"></td>
				</tr>
			</table>
		</form>
	
			</main>
		<?php
		}
		?>
	</body>
</html>