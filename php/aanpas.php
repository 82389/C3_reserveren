<?php
	require "session_D.php";
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Wijzig tijd en info</title>
		<link rel="stylesheet" type="text/css" href="../css1.css">
		<style>
			body
			{
				background-image:url("../images/Fall-leaves-desktop-hd-wallpapers.jpg");
			}
			
		</style>	
	</head>

	<body>
		<main>
			<?php
			echo "<h1>Welkom, " . $_SESSION['Naam'] . "</h1>";
			//begin form met vars
			require "config.inc.php";
			//id uit url
			$studid = $_GET['id'];
			//gegevens ophalen
			$qry = "select * from C3_Studenten_klas where Studentennummer = " . $studid;
			//uit db halen
			$result = mysqli_query($mysqli, $qry);
			if (mysqli_num_rows($result) == 0)
			{
				echo "<h1>Er is geen student gevonden met het nummer $studid</h1>";
			}
			else
			{
				//rijen ophalen
				$rij = mysqli_fetch_array($result);
				echo "Student met het nummer $studid is gevonden.<br><br>";
			}			
		?>
		<form action="aanpas_verwerk.php" method="post">
			<fieldset>
				<table>
					<tr>
						<td>Studentennummer: </td>
						<td><input type="number" name="student" value="<?php echo $rij['Studentennummer'] ?>" readonly></td>
					</tr>
					<tr>
						<td>Naam: </td>
						<td><input type="text" name="vnaam" value="<?php echo $rij['Naam'] ?>" readonly></td>
					</tr>
					<tr>
						<td>Geslacht: </td>						
						<td><input type="text" name="geslacht" value="<?php echo $rij['Geslacht'] ?>" readonly></td>
					</tr>
					<tr>
						<td>Info: </td>
						<td><textarea name="info" id="info" cols="30" rows="10"><?php echo $rij['Info'] ?></textarea></td>
					</tr>
					<tr>
						<td>Tijd van Komst</td>
						<td><input type="time" name="tijd" value="<?php echo $rij['Tijd_van_komst'] ?>"></td>
					</tr>
				</table>
			</fieldset>
			<input type="submit" name="pasAan" value="Aanpassen">
			<button onClick="history.back();return false;">Annuleren</button>
		</form>
		<p><a href="student_uitlees.php">Terug</a> naar de overzicht</p>
		</main>
	</body>
</html>