<?php
include 'menu.php';
include 'db.php';

$ID = $_GET['ID'];
$query = "SELECT `ProductID`, `Prijs`, `producten`.`Naam`, `LeveranciersID`, `Aantal`, `bestelling`.`GebruikerID` FROM `producten` JOIN `productenbesteld` USING (`ProductID`) JOIN `Bestelling` USING (`BestellingID`) JOIN `factuur` ON `OderID` = `BestellingID` WHERE `factuur`.`OderID` = ".$ID.";";
$result = mysqli_query($db,$query);

echo "<table class=\"shadow mx-auto mt-2 mb-5\" style=\"border:1px solid;\">";


if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
	$naam = $row['Naam'];
	$prijs = $row['Prijs'];
    $rd = $row['ProductID'];
    $lv = $row['LeveranciersID'];
    $a = $row['Aantal'];
    $geb = $row['GebruikerID'];

    echo "
	
	<tr>
		<td colspan=\"3\">Bestelling ID : ".$ID." </br>Product ID: ".$rd." </br>Gebruiker ID: ".$geb." </td></tr>
	<tr><td colspan=\"3\">
		<textarea style=\"width:600px; height:200px\">Naam product : ".$naam." \nPrijs : ".$prijs." \nLeverancier : ".$lv." \nAantal : ".$a."
		</textarea>
		</td>
	</tr>
	<tr>";
    

}
    echo "<td colspan=\"3\" style=\"text-align:center; align:center;\"> <button type=submit name=opgehaald>Opgehaald!</button></td>
	</tr>
    </table>";
}
    if(isset($_POST["opgehaald"])){
		include 'db.php';
	$query = "UPDATE `bestelling` SET `Status` = 'Opgehaald' WHERE `BestellingID` = ".$ID.";";
	if(mysqli_query($db,$query)){
		echo "<p align=\"CENTER\">De order is ontvangen en opgehaald!</br>";
		echo "</p>";


}}

