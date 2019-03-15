<?php
	require "session_D.php";
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Uitlees studenten</title>
		<link rel="stylesheet" type="text/css" href="../css1.css">
		<style>
			body
			{
				background-image:url("../images/Free-Images-Fall-Desktop-Wallpapers.jpg");
			}
			
		</style>
	</head>

	<body>
		<main>
			<?php
		
			echo "<h1>Welkom, " . $_SESSION['Naam'] . "</h1>";
			
			require 'config.inc.php';
			
			$docent = $_SESSION['Naam'];
			//opzoek query
			$query = "SELECT Studentennummer, C3_Studenten_klas.Naam, C3_Studenten_klas.Tussenvoegsel, C3_Studenten_klas.Achternaam, Geslacht, C3_Studenten_klas.Klas, Info, Tijd_van_komst, Komt FROM C3_Docenten, C3_Studenten_klas WHERE C3_Docenten.Naam = '$docent' AND C3_Docenten.Klas = C3_Studenten_klas.Klas";
			
			//resultaat verzamelen 
			$resultaat = mysqli_query($mysqli, $query);

			//checken voor resultaat voor studenten
			if (mysqli_num_rows($resultaat) == 0)
			{
				echo "<p>Er zijn geen resultaten gevonden.</p>";
			}
			else
			{
				echo "<table class='doc' border='1'>";
				echo "<tr>";
				echo "<th>Studentennummer</th>";
				echo "<th>Naam</th>";
				echo "<th>Tussenvoegsel</th>";
				echo "<th>Achternaam</th>";
				echo "<th>Geslacht</th>";
				echo "<th>Klas</th>";
				echo "<th>Info</th>";
				echo "<th>Tijd van komst</th>";
				echo "<th>Komt??</th>";
				//echo "<th>Detail</th>";
				echo "<th>Tijd en info wijziggen</th>";
				//echo "<th>Verwijderen</th>";
				echo "</tr>";
				//toon lid
				while ($rij = mysqli_fetch_array($resultaat))
				{
					echo "<tr>";
					echo "<td>" . $rij['Studentennummer'] . "</td>";
					echo "<td>" . $rij['Naam'] . "</td>";
					echo "<td>" . $rij['Tussenvoegsel'] . "</td>";
					echo "<td>" . $rij['Achternaam'] . "</td>";
					echo "<td>" . $rij['Geslacht'] . "</td>";
					echo "<td>" . $rij['Klas'] . "</td>";
					echo "<td>" . $rij['Info'] . "</td>";
					echo "<td>" . $rij['Tijd_van_komst'] . "</td>";
					echo "<td>" . $rij['Komt'] . "</td>";
					//wijzig en verwijder
					echo "<td><a href='aanpas.php?id=" . $rij['Studentennummer'] . "'>Tijd en info wijziggen</a></td>";
					//echo "<td><a href='#.php?id=" . $rij['id'] . "'>Verwijder</a></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			?>
		</main>
	</body>
</html>
