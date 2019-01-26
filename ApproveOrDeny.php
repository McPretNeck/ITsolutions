<?php
include 'menu.php';
include 'db.php';

//functie voor het verkrijgen van alle producten
	//moet nog een manier komen om de bestellings id in de query te plaatsen
	$query = "SELECT `bestelling`.`BestellingID`, `producten`.`ProductID` as 'ID', `bestelling`.`GebruikerID`, `bestelling`.`Status`, `bestelling`.`Reden`, `bestelling`.`Opmerking`, `producten`.`Naam`, `producten`.`Prijs` FROM `bestelling` JOIN `productenbesteld` on `bestelling`.`BestellingID` = `productenbesteld`.`BestellingID` JOIN `producten` on `productenbesteld`.`ProductID` = `producten`.`ProductID` where `bestelling`.`BestellingID`= 9;";
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
	
	$text .= "
	<form method=post action=ApproveOrDeny.php>
	<table class=\"shadow mx-auto mt-3\" style=\"border:1px solid;\">
	<span border=\"1\">
	<tr>
	<td>Bestelling ID : ".$bs." </br>Product ID: ".$ID." </td><td style=\"width:120px;\">
	<div class=\"float-right text-right\"".$p."</div></td>
	<td class=\"text-left\" style=\"width:120px;\"></td></tr>
	<tr><td colspan=\"3\">
	<textarea style=\"width:600px; height:200px\">Naam product : ".$naam." \nPrijs : ".$prijs." \nStatus : ".$p." \nReden : ".$rd." \nOpmerking : ".$o." 
	</textarea>
	<tr><td> <button type=submit name=afwijzen>Afwijzen</button>
	<td class=\"float-right text-right\" style=\"width:120px;\"><button type=submit name=accepteer>Accepteer</button></td></tr>
	<tr><td colspan=\"3\">
	</td></tr></span>
	</table></form> ";
	
	
	}
	echo $text;
}
	
	
	
	if(isset($_POST["accepteer"])){
		echo "<p align=\"CENTER\">De order is afgewezen.</br>";
		echo "De gegevens hierboven worden afgewezen</br>";
		echo "</p>";
		//hier
	}
	if(isset($_POST["afwijzen"])){
		echo "<p align=\"CENTER\">De order is geaccepteerd en word doorgestuurd.</br>";
		echo "De gegevens hierboven zijn geaccepteerd</br>";
		echo "</p>";
		
	include 'db.php';
	$query = "UPDATE `bestelling` SET `Status` = 'Accepted' WHERE `$bs`";
	}


?>