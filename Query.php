<?php
function insertQuery($query)
{
	include 'db.php';
	$result= mysqli_query($db,$query);
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

?>