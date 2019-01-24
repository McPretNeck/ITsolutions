<?php
include 'db.php';
include 'menu.php';
?>
<div class="container mr-2">
<?php
if($_SESSION['rol']==1){
	
if(!isset($_POST["submit"])){
	
?>
<h4> Voer uw gegevens in:</h4> <br>
<p> Velden met een <font color = "red">*</font> zijn verplicht </p>	
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<p>Gebruikersnaam:</p> 
	<input type="text" name="Naam" required ><font color="red">*</font> <br><br>
<p>Wachtwoord:</p> 
	<input type="password" name="Wachtwoord" required><font color="red">*</font> <br><br>
<p>Herhaal wachtwoord:</p> 
	<input type="password" name="Wachtwoord2" required><font color="red">*</font> <br><br>
<p>Afdelingscode:</p> 
	<input type="text" name="AfdCode" maxlength="3" required ><font color="red">*</font> <br><br>
<p>E-mail:</p> 	
	<input type="text" name="Email" required><font color="red">*</font> <br><br>
<p>Telefoonnummer:</p> 	
	<input type="text" name="Telefoonnummer"><br><br>
<input type="submit" name="submit" value="Registreer">
</form>
<?php }
if(isset($_POST["submit"])){
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
return $data;
}

$gn = 	test_input($_POST["Naam"]);
$ww = 	test_input($_POST["Wachtwoord"]);
$ww2 = 	test_input($_POST["Wachtwoord2"]);
$a = 	test_input($_POST["AfdCode"]);
$e = 	test_input($_POST["Email"]);
$t = 	test_input($_POST["Telefoonnummer"]);
	//Eerst testen of gebruikersnaam al bestaat:
	$querygn = 'SELECT COUNT(Naam) as count FROM gebruiker WHERE Naam = "'. $gn . '"';
	$resultgn = mysqli_query($db,$querygn);
	$rowgn = mysqli_fetch_assoc($resultgn);
	if($rowgn['count'] > 0)
	{die( '<p>Deze gebruikersnaam is al in gebruik.</p></br><input type="Button" value="Terug" onclick="javascript:history.back();">');
	}
//Als gebruikersnaam nog niet in de database voorkomt, dan verder testen of gegevens kloppen
if(!preg_match("/^[A-Za-z]*$/", $gn)) {
echo '<p>Fout in de naam: deze mag alleen letters en spaties bevatten.</br><input type="Button" value="Terug" onclick="javascript:history.back();"></br></p>';}
elseif($ww <> $ww2){
echo '<p>De ingevoerde wachtwoorden komen niet overeen.</br><input type="Button" value="Terug" onclick="javascript:history.back();"></br></p>';}
elseif(!filter_var($e, FILTER_VALIDATE_EMAIL)){
echo '<p>Ongeldig e-mailadres</br><input type="Button" value="Terug" onclick="javascript:history.back();"></p>';}
elseif(!preg_match("/^[A-Z]{3}*$/", $t)){
echo '<p>Fout in de afdelingscode: deze mag alleen hoofdletters bevatten.</br><input type="Button" value="Terug" onclick="javascript:history.back();"></br></p>';}
elseif(!preg_match("/^[0-9]*$/", $t)){
echo '<p>Fout in het telefoonnummer: deze mag alleen cijfers bevatten.</br><input type="Button" value="Terug" onclick="javascript:history.back();"></br></p>';}
else{
//Als alles klopt, dan de insert query uitvoeren
	$query= "INSERT INTO gebruiker (Naam, Wachtwoord, AfdCode, Rol, Email, Telefoonnummer) VALUES('$gn','$ww','$a','2','$e','$t')";
		
	$results = mysqli_query($db,$query);
		echo "<p>Je hebt je succesvol geregistreerd</br></p>";

	echo'	<br><br><br><br><br><br><a href = "index.php">Terug naar de hoofdpagina</a>';
		
};

mysqli_close($db);}

}
?>
</div>