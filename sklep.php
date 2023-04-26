<html>
<head>
	<meta charset="utf-8" />
	<title>Warzywniak</title>
	<link rel="stylesheet" href="styl2.css" />
</head>
<body>
	<div class="lbaner">
		<h1>Internetowy sklep z eko-warzywami</h1>
	</div>
	<div class="rbaner">
		<ol>
			<li>warzywa</li>
			<li>owoce</li>
			<li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
		</ol>
	</div>
	<div class="main">
			<?php
				
				$con = new mysqli("127.0.0.1", "root", "", "dane2");
				$q = "SELECT nazwa, ilosc, opis, cena, zdjecie, Rodzaje_id FROM produkty WHERE Rodzaje_id IN (1,2);";
				$res = $con -> query($q);
				$food = $res -> fetch_all(MYSQLI_ASSOC);
				for ($i=0; $i<count($food);$i++){
					echo "<div class='scresult'>";
					echo "<img src='".$food[$i]['zdjecie']."' alt='warzywniak'>";
					echo "<h5>".$food[$i]['nazwa']."</h5>";
					echo "<p>Opis: ".$food[$i]['opis']."</p>";
					echo "<h2>".$food[$i]['cena']."zł</h2>";
					echo "</div>";
				}

			?>
	</div>
	<footer>
		<form method="post">
			<label>Nazwa:</label><input type="text" id="nazwa" name="nazwa"/>
			<label>Cena:</label><input type="number" id="cena" name="cena"/>
			<button type="submit">Dodaj produkt</button>
			<p>Stronę wykonał: SJs</p>
			<?php
			if($_POST!=NULL){
					if($_POST['nazwa']!="" && $_POST['cena']!=""){
						$q2 = "INSERT INTO `produkty`(`Rodzaje_id`, `Producenci_id`, `nazwa`, `opis`, `ilosc`, `cena`, `zdjecie`) VALUES ('1','4','".$_POST['nazwa']."', '', '10', '".$_POST['cena']."', 'owoce.jpg')";
						$res2 = $con -> query($q2);
					}
				}
			?>
		</form>
	</footer>
</body>
</html>