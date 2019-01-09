<?php
include ('menu.php');
include ('phpmailer\email_wachtwoord_mailer.php');
?>
<div class="container mt-2">
<?php
if (!empty($_POST)){
	// databaseverbinding invoegen
	include("db.php");
	
	$email = mysqli_real_escape_string($db, $_POST['email']);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		// NEE, email-adres niet gevonden: foutmelding tonen
		?>
		<h2 align="Center">Wachtwoord e-mailen</h2>
		<p align="Center">Voer het email adres is waarop uw account staat geregistreerd.</p>
		<div align="Center">Dit e-mailadres (<font color="red"><b><?php echo $_POST["email"]?> </b></font>) is ongeldig.<br></div>
		<form align="Center" method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">
		Uw e-mailadres:
		<input type="Text" name="email" value="<?php echo"".$_POST['email']."" ?>" size="30">
		<input type="Submit" value="E-mail mijn wachtwoord!">
		</form>
		</br>
		<?php
	}
	else{
	// query samenstellen en uitvoeren
	$query = "SELECT * FROM gebruiker WHERE Email='$email';";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysql_error()); 
	
	// controleren of mail-adres is gevonden
	if (mysqli_num_rows($result) > 0){
		// JA: variabelen toekennen
		while($row = mysqli_fetch_assoc($result)){
			
			$gebruikersnaam = $row['Naam'];
			$wachtwoord = $row['Wachtwoord'];
		}
		
		// rest van het bericht opstellen, inclusief extra header
		$onderwerp = "Wachtwoord herstel van stambeest";
		$msg = "Hallo, u heeft verzocht voor uw wachtwoord en gebruikersnaam\n\n";
		$msg .= "Uw gebruikersnaam is: " . $gebruikersnaam;
		$msg .= "\nUw wachtwoord is: " . $wachtwoord;
		$msg.="\n\nWij wensen u veel plezier met de website.\n";
       	$msg.="\n\nMet vriendelijke groet,\n\nAdmin van stambeest\n\n";
       	$msg.=" ---- Einde van het automatisch gegenereerde bericht----";

		mailen($email, $gebruikersnaam, $msg ,$onderwerp);
	}else{
		// NEE, email-adres niet gevonden: foutmelding tonen?>
		<h2 align="Center">Wachtwoord e-mailen</h2>
		<p align="Center">Voer het email adres is waarop uw account staat geregistreerd.</p>
		<div align="Center">Dit e-mailadres (<font color="red"><b><?php echo $_POST["email"]?> </b></font>) komt niet voor in de database.<br></div>
		<form align="Center" method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">
		Uw e-mailadres:
		<input type="Text" name="email" value="<?php echo"".$_POST['email']."" ?>" size="30">
		<input type="Submit" value="E-mail mijn wachtwoord!">
		</form>
		</br>
		<?php
	}}
	
 //Indien pagina zichzelf niet heeft aangeroepen: HTML-formulier tonen
}else{
?>
<h2 align="Center">Wachtwoord e-mailen</h2>
<p align="Center">Invoer van het geregistreerde e-mailadres geeft als resultaat dat gebruikersnaam en wachtwoord toegezonden worden.
<form align="Center" method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">
Uw e-mailadres: 
<input type="Text" name="email" placeholder="voorbeeld@stambeest.nl" size="30">
<input type="Submit" value="E-mail mijn wachtwoord!">
</form>
<?php
} //else-blok afsluiten
?>
</div>