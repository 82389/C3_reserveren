<?php
	require "session.php";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>verwerk_ouderavond</title>
	<link rel="stylesheet" type="text/css" href="../css1.css">
		<style>
			body
			{
				background-image:url("../images/Fall-Desktop-Wallpapers-HD.jpg");
			}
			
		</style>
</head>

<body>
<main>	
<?php
	//is het formulier verstuurd?
	if (isset($_POST['submit']))
		
	{
	//voeg de koppeling naar de database toe
	require 'config.inc.php';
	
	//Lees het formulier uit
	$student = $_POST['student'];
	$Naam = $_POST['Naam'];
	$Achternaam = $_POST['Achternaam'];
	$Klas = $_POST['Klas'];
	$Tijd_van_komst = $_POST['tijd'];
	$komt = $_POST['komt'];
	
	//var_dump($_POST);
	//maak de query
	$query = "UPDATE C3_Studenten_klas
			  SET Tijd_van_komst = '$Tijd_van_komst', Komt = '$komt'
			  WHERE Studentennummer = '$student'";
		
	$query2 = "UPDATE C3_Tijden
			   SET Gekozen = '$komt'
			   WHERE Tijd = '$Tijd_van_komst' AND Klas = '$Klas'";
		
	
	//TEST: schrijf de query naar het sherm (TIJDELIJKE CODE)
	
	
	//als de opdracht goed wordt uitgevoerd:
	if(mysqli_query($mysqli, $query))
	{
		echo "<p>Reservering voor ouder avond van $Naam om $Tijd_van_komst is succesvol ingepland!</p>";
	}
	//anders
	else
	{
		echo "<p>FOUT bij reserveren voor ouderavond voor leerling met studentnummer: $student.</p>";
		echo mysqli_error($mysqli); //LET OP: tijdelijk toevoegen
	}
		if (mysqli_query($mysqli, $query2)){
			print('Het is gelukt!');
		}
}
	else
	{
	echo "<p>Geen gegevens ontvangen...</p>";	
	}
	echo "<p><a href='homeouders.php'>Terug</a></p>";
?>
</main>	
</body>
</html>