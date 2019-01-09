<?php 
	include 'wijzig locaties.php';
	include 'db.php';
?>
	<div class="container mt-2">
<?php
if (isset($_POST["confirm"])){

	$query="UPDATE `locatie` SET
		Straatnaam = \"". $_POST["Straatnaam"] ."\", 
		Huisnummer = ". $_POST["Huisnummer"] .", 
		Toevoeging = ". $_POST["Toevoeging"] .", 
		Postcode = \"". $_POST["Postcode"] ."\", 
        Plaats = \"". $_POST['Plaats'] . "\",
		land = \"". $_POST['Land'] ."\",	
		Stalnaam = \"". $_POST['Stalnaam'] ."\"
		WHERE idLocatie =" .$_POST["idLocatie"] ."";
	
	echo $query;
	
	$result = mysqli_query($db, $query);
	if ($result){
		echo "Je hebt deze gegevens veranderd van: ";
		echo ("idLocatie " .$_POST["idLocatie"]);
?>
		<form><input type="button" value="Home" onclick="index.php" /></form>
<?php
	}
}
else{
	$query = "SELECT * FROM `locatie` WHERE idLocatie=". $_GET["idLocatie"] ."";
	include 'db.php';
	$result = mysqli_query($db,$query);
	if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		$Straatnaam =$row['Straatnaam'];
		$Huisnummer =$row['Huisnummer'];
		$Toevoeging =$row['Toevoeging'];
		$Postcode =$row['Postcode'];
		$Plaats =$row["Plaats"];
		$Land =$row['Land'];
		$Stalnaam=$row['Stalnaam'];
    }
	} 
	else {
	echo "Geen record gevonden";   
	}
?>
<h2>Wilt u deze aangegeven gegevens wijzigen?</h2>
<form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
	<input type="hidden" name="confirm" value="1">
	<input type="hidden" name="idLocatie" value="<?php echo($_GET["idLocatie"]);?>">
	<table border=2px>
	<tr><td>Straataam: </td><td><input type="text" name="Straatnaam" value="<?php echo($Straatnaam);?>" ></td></tr>
	<tr><td>Huisnummer: </td><td><input type="text" name="Huisnummer" value="<?php echo($Huisnummer);?>" ></td></tr>
	<tr><td>Toevoeging: </td><td><input type="text" name="Toevoeging" value="<?php echo($Toevoeging);?>" ></td></tr>
	<tr><td>Postcode: </td><td><input type="text" name="Postcode" value="<?php echo($Postcode);?>" ></td></tr>
	<tr><td>Plaats: </td><td><input type="text" name="Plaats" value="<?php echo($Plaats);?>" ></td></tr>
	<tr><td>Land: </td><td><input type="text" name="Land" value="<?php echo($Land);?>" ></td></tr>
	<tr><td>Stalnaam: </td><td><input type="text" name="Stalnaam" value="<?php echo($Stalnaam);?>" ></td></tr>
</table>
<input type ="Submit" value="Verander">
</form>

<?php		
mysqli_free_result($result);
mysqli_close($db);
}
?>
</div>