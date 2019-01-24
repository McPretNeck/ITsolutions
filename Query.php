<?php
function insertQuery($query)
{
	include 'db.php';
	$result= mysqli_query($db,$query);
}

function toevoegenProduct($naam, $prijs, $text, $leverancier)
{
	include 'db.php';
	$query = "insert into `producten` (`producten`.`Naam`, `producten`.`Prijs`, `producten`.`Omschrijving`, `producten`.`LeveranciersID`) VALUES(\"".$naam."\", ".$prijs.", \"".$text."\", ".$leverancier.");";
	$result = mysqli_query($db, $query);
}

function getLeveransiers()
{
	include 'db.php';
	$query = "SELECT `leveranciers`.`Naam` FROM `leveranciers` ORDER BY `leveranciers`.`Naam` ASC";
	$result = mysqli_query($db, $query);
	$x=array();
	
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
	array_push($x,$row["Naam"]);
	
	}}
		
	return $x;
}

function getProductens()
{
	include 'db.php';
	$query = "SELECT `ProductID` as 'ID', `Naam`, `Prijs`, `Omschrijving` FROM `producten`;";
	$result = mysqli_query($db, $query);
	$x=array();
	$text ="";
	
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
	$ID = $row['ID'];
	$n = $row['Naam'];
	$p = $row['Prijs'];
	$o = $row['Omschrijving'];
	
	$text .= "
	<table class=\"shadow mx-auto mt-3\" style=\"border:1px solid;\">
	<span border=\"1\">
	<tr>
	<td>".$n."</td><td style=\"width:100px;\">
	<div class=\"float-right text-right\">€".$p."</div></td>
	<td class=\"text-right\" style=\"width:120px;\">Aantal:
	<input class=\"float-right text-right\" type=\"number\" name=\"".$ID."\" style=\"width:40px;\" value=\"0\" min=\"0\" max=\"99\" step=\"1\">
	</td></tr>
	<tr><td colspan=\"3\">
	<textarea style=\"width:600px; height:200px\">".$o."</textarea>
	</td></tr></span></table>";
	}
	$text .= "";
	
	
	
	}	
	return $text;
}

function getLeveransiersID()
{
	include 'db.php';
	$query = "SELECT `leveranciers`.`LeverancierID` AS ID FROM `leveranciers` ORDER BY `leveranciers`.`Naam` ASC";
	$result = mysqli_query($db, $query);
	$x=array();
	
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
	array_push($x,$row["ID"]);
	
	}}
		
	return $x;
}

function getGebruikers()
{
	include 'db.php';
	$query = "SELECT `Naam` FROM `gebruikers` ORDER BY `Naam` ASC";
	$result = mysqli_query($db, $query);
	$x=array();
	
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
	array_push($x,$row["Naam"]);
	
	}}
		
	return $x;
}

function getAfdelingscode()
{
	include 'db.php';
	$query = "SELECT `AfdCode` AS AFDELING FROM `afdelingen` ORDER BY `AfdCode` ASC";
	$result = mysqli_query($db, $query);
	$x=array();
	
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
	array_push($x,$row["ID"]);
	
	}}
		
	return $x;
}

?>