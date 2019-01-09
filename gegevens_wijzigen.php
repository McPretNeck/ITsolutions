<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
<?php
$query = "SELECT * FROM gebruiker WHERE idGebruiker='" .$_SESSION["ID"] ."'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
$id= $_SESSION['ID'];
$g= $_SESSION['naam'];
$w= $row['Wachtwoord'];
$e= $row['Email'];
$t= $row['Telefoonnummer']; }}


if(!isset($_POST['submit'])){ ?><form align="Center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<h4> Uw gegevens wijzigen </h4><br>

<p>Nieuw Wachtwoord:</p>
<input type="password" name="wachtwoord" value="<?php echo $w;?>"><br><br>
<p>Herhaal wachtwoord:</p>
<input type="password" name="wachtwoord2" value="<?php echo $w;?>"><br><br>
<p>E-mail:</p>
<input type="text" name="email" value="<?php echo $e;?>"><br><br>
<p>Telefoonnummer:</p>
<input type="text" name="telefoonnummer" value="<?php echo "0".$t;?>"><br><br>

<br>

<input type="submit" name="submit" value="Wijzigen"> 
</form>


<?php }
if(isset($_POST['submit'])){
 if($_POST['wachtwoord'] <> $_POST['wachtwoord2']){echo'<p>Ingevoerde wachtwoorden komen niet overeen.</br><input type="Button" value="Terug" onclick="javascript:history.back();"></p><br>';}

 else{
	$id= 	mysqli_real_escape_string($db, $_SESSION['ID']);
	$g= 	mysqli_real_escape_string($db, $_SESSION['naam']);
	$w= 	mysqli_real_escape_string($db, $_POST['wachtwoord']);
	$e= 	mysqli_real_escape_string($db, $_POST['email']);
	$t= 	mysqli_real_escape_string($db, $_POST['telefoonnummer']);
	if(!filter_var($e, FILTER_VALIDATE_EMAIL)){
die( '<p>Ongeldig e-mailadres.</br><input type="Button" value="Terug" onclick="javascript:history.back();"></br></p>');}
elseif(!preg_match("/^[0-9]*$/", $t)){
die( "<p>Fout in het telefoonnummer: deze mag alleen cijfers bevatten.</br> Klik op vorige om je gegevens aan te passen</p>");}
	$query= "UPDATE `gebruiker` SET`Wachtwoord`='". $w ."',`Email`='". $e ."',`Telefoonnummer`='". $t ."' WHERE idGebruiker = '". $id ."'";
	$result= mysqli_query($db,$query);

	mysqli_close($db);
	echo '<div align="Center"><h4>Uw gegevens zijn succesvol aangepast.</h4><br><a href="index.php">Terug naar de hoofdpagina</a></div>';
}}

?></div>