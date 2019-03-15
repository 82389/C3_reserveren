<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>

	<body>
		<?php
		session_start();
		//Docent
		//als gebruiker niet is ingelogd
		if (!isset($_SESSION['Naam']))
		{
			//terug sturen
			header("location:../index.html");
		}
		?>
	</body>
</html>