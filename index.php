<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style4.css">
		<title>Odżywianie zwierząt</title>
	</head>
	<body>
		<section id="baner">
			<h2>DRAPIEŻNIKI I INNE</h2>
		</section>
		<section id="formularz">
			<h3>Wybierz styl życia:</h3>
			<form action="index.php" method="POST">
				<select name="list">
					<option value="1">Drapieżniki</option>
					<option value="2">Roślinożerne</option>
					<option value="3">Padlinożerne</option>
					<option value="4">Wszytkożerne</option>
				</select>
				<input type="submit" value="Zobacz">
			</form>
		</section>
		<section id="pl">
			<h3>Lista zwierząt</h3>
			<ul>
			<?php
				$polaczenie = mysqli_connect('localhost','root','','baza');
				$zapytanie = "SELECT gatunek, rodzaj FROM `zwierzeta` JOIN `odzywianie` ON zwierzeta.Odzywianie_id = odzywianie.id";
				$wynik = mysqli_query($polaczenie, $zapytanie);
				
					while ($wiersz = mysqli_fetch_assoc($wynik)) {
						echo "<li>" . $wiersz['gatunek'] . " " . $wiersz['rodzaj'] . "</li>";
					}
					
				 mysqli_close($polaczenie);
			?>
			</ul>
		</section>
		<section id="ps">
			<?php
				$polaczenie = mysqli_connect('localhost','root','','baza');
				$list = $_POST['list'];
				$zapytanie = "SELECT zwierzeta.id, gatunek, wystepowanie FROM `zwierzeta` JOIN `odzywianie` ON zwierzeta.Odzywianie_id = odzywianie.id WHERE zwierzeta.Odzywianie_id = $list ";
				$wynik = mysqli_query($polaczenie, $zapytanie);		 	

						if (isset($_POST['list'])) {
							
							if ($list == 1) {
								echo "<h3>"."Drapieżniki"."</h3>";
							}
							else if ($list == 2) {
								echo "<h3>"."Roślinożerne"."</h3>";
							}
							else if ($list == 3) {
								echo "<h3>"."Padlinożerne"."</h3>";
							}
							else if ($list == 4) {
								echo "<h3>"."Wszytkożerne"."</h3>";
							}
						}			

					while ($wiersz = mysqli_fetch_assoc($wynik)) {
						echo $wiersz['id'] . ". " . $wiersz['gatunek'] . ", " . $wiersz['wystepowanie'] . "<br>";
					}		 
				
				mysqli_close($polaczenie);
			?>
		</section>
		<section id="pp">
			<img src="drapieznik.jpg" alt="Wilki">
		</section>
		<section id="stopka">
			<a href="https://pl.wikipedia.org" target="blank">Poczytaj o zwierzętach na Wikipedii</a>
			<p>autor strony: 01234567890</p>
		</section>
</body>
</html>