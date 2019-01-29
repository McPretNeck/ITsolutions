<?php
include 'menu.php';
include 'db.php';

//functie voor het verkrijgen van alle producten
	//Query die selecteerd op of het product over de 500 euro is of niet.
	$query = "SELECT `bestelling`.`BestellingID`, `producten`.`ProductID` as 'ID', `bestelling`.`GebruikerID`, `bestelling`.`Status`, `bestelling`.`Reden`, `bestelling`.`Opmerking`, `producten`.`Naam`, `producten`.`Prijs` FROM `bestelling` JOIN `productenbesteld` on `bestelling`.`BestellingID` = `productenbesteld`.`BestellingID` JOIN `producten` on `productenbesteld`.`ProductID` = `producten`.`ProductID` WHERE `Prijs` > 500 ORDER BY `BestellingID`";
	$result = mysqli_query($db, $query);
	$text ="";
	
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
	$naam = $row['Naam'];
	$prijs = $row['Prijs'];
	$bs = $row['BestellingID'];
	$rd = $row['Reden'];
	$ID = $row['ID'];
	$n = $row['GebruikerID'];
	$p = $row['Status'];
	$o = $row['Opmerking'];
	
	$text = "
	<form method=post action=ApproveOrDeny.php>
	<table class=\"shadow mx-auto mt-2\" style=\"border:1px solid;\">
	
	<tr>
		<td colspan=\"3\">Bestelling ID : ".$bs." </br>Product ID: ".$ID." </td></tr>
	<tr><td colspan=\"3\">
		<textarea style=\"width:600px; height:200px\">Naam product : ".$naam." \nPrijs : ".$prijs." \nStatus : ".$p." \nReden : ".$rd." \nOpmerking : ".$o." 
		</textarea>
		</td>
	</tr>
	<tr>
		<td colspan=\"3\"> <button type=submit name=afwijzen>Afwijzen</button><button class=\"float-right\" type=submit name=accepteer>Accepteer</button></td>
	</tr>
	</table>
	</form> 
	<br/>
	<div class=\"mb-5\"></div>";
	
	echo $text;

	if(isset($_POST["afwijzen"])){
		include 'db.php';
	$query = "UPDATE `bestelling` SET `Status` = 'Denied' WHERE `BestellingID` = $bs";
	if(mysqli_query($db,$query)){
		echo "<p align=\"CENTER\">De order is afgewezen.</br>";
		echo "De gegevens hierboven worden afgewezen</br>";
		echo "</p>";
	}
	}

	if(isset($_POST["accepteer"])){
		include 'db.php';
	$query = "UPDATE `bestelling` SET `Status` = 'Accepted' WHERE `BestellingID` = $bs";
	if(mysqli_query($db,$query)){
		echo "<p align=\"CENTER\">De order is geaccepteerd en word doorgestuurd.</br>";
		echo "De gegevens hierboven zijn geaccepteerd</br>";
		echo "</p>";
	}
		
	}
}
	
}
	
	

	


?>