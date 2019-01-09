<?php
//Werkt, maar moet eventueel nog wat gegevens invoeren
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
<?php
if(!isset($_POST["submit"])){
	?>
	<div align="Center">
<p> Voer uw gegevens in:</p> <br>
<form action="form_user.php" method="post">
Gebruikersnaam: <br>
	<input type="text" name="Naam" required ><br><br>
Wachtwoord: <br>
	<input type="password" name="Wachtwoord" required><br><br>
E-mail:<br>
	<input type="text" name="Email" required><br><br>
Telefoonnummer:<br>
	<input type="text" name="Telefoonnummer"><br><br>
<input type="submit" name="submit" value="Registreer">
</form>
</div>
</div>
<?php }
if(isset($_POST["submit"])){
$gn=	$_POST["Naam"];
$ww=	$_POST["Wachtwoord"];
$email=	$_POST["Email"];
$tel=	$_POST["Telefoonnummer"];
$query= "INSERT INTO gebruiker (Naam, Wachtwoord, Rol, Email, Telefoonnummer)
		VALUES('$gn','$ww','2','$email','$tel')";
		echo "</br><p align=\"Center\">Je hebt je succesvol geregistreerd</p>";
$results = mysqli_query($db,$query);

		mysqli_close($db);}
?>