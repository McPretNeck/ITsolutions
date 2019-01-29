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

function toevoegenBestelling($x, $r)
{
	include 'db.php';
	$ID= 0;
	$query = "INSERT INTO `sql7273416`.`bestelling` (`GebruikerID`, `Status`, `Reden`) VALUES (".$_SESSION["ID"].", 'Nieuw', '".$r."');";
	$result = mysqli_query($db, $query);
	
	$query = "SELECT `BestellingID` AS `ID` FROM `bestelling` ORDER BY ID DESC LIMIT 1";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
	$ID = $row["ID"];
	
	}}
	
	
	for($q=0;sizeof($x[0])>$q;$q++){
	$query = "INSERT INTO `productenbesteld` (`BestellingID`,`ProductID`,`Aantal`) VALUES(".$ID.", ".$x[0][$q].", ".$x[1][$q].");";
	$result = mysqli_query($db, $query);
	}
	return $ID;
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
	$id=array();
	$naam=array();
	$prijs=array();
	$omschrijving=array();
	$text ="";
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			array_push($id, $row['ID']);
			array_push($naam, $row['Naam']);
			array_push($prijs, $row['Prijs']);
			array_push($omschrijving, $row['Omschrijving']);		
		}	
	}
	
	$producten=array($id,$naam,$prijs,$omschrijving);
	return $producten;
}

function getProductensByID($ID, $TA)
{
	include 'db.php';
	$query = "SELECT `ProductID` as 'ID', `Naam`, `Prijs`, `Omschrijving` FROM `producten`;";
	$result = mysqli_query($db, $query);
	$id=array();
	$naam=array();
	$prijs=array();
	$aantal=array();
	$omschrijving=array();
	$text ="";
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			 if($row['ID']==$ID){
			array_push($id, $row['ID']);
			array_push($naam, $row['Naam']);
			array_push($prijs, $row['Prijs']);
			array_push($aantal, $TA);
			array_push($omschrijving, $row['Omschrijving']);		
			}
		}	
	}
	
	$producten=array($id,$naam,$prijs,$omschrijving,$aantal);
	return $producten;
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
	$query = "SELECT `AfdCode` FROM `afdelingen` ORDER BY `AfdCode` ASC";
	$result = mysqli_query($db, $query);
	$x=array();
	
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
	array_push($x,$row["AfdCode"]);
	
	}}
		
	return $x;
}

function getAfdelingByCode($ID, $TA)
{
	include 'db.php';
	$query = "SELECT `AfdCode`, `AfdNaam`, `AfdHoofd` FROM `afdelingen`;";
	$result = mysqli_query($db, $query);
	$afdcode=array();
	$afdnaam=array();
	$afdhoofd=array();
	
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			 if($row['ID']==$ID){
			array_push($afdcode, $row['AfdCode']);
			array_push($afdnaam, $row['AfdNaam']);
			array_push($afdhoofd, $row['AfdHoofd']);		
			}
		}	
	}
	
	$afdelingen=array($afdcode);
	return $afdelingen;
}

?>