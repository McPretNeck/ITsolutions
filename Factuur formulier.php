<html>
<?php
include 'db.php';
include 'menu.php';
if(isset($_GET['ID'])){$BID = $_GET['ID'];}

//
//iets moet dit versturen en dit moet nog gelockt worden onder een department manager

$query = "SELECT `productenbesteld`.`ProductID` AS 'ProductID', `producten`.`Prijs` AS Prijs,`producten`.`Naam` AS 'Naam', `productenbesteld`.`Aantal` AS 'Aantal', (`producten`.`Prijs` * `productenbesteld`.`Aantal`)  AS `Totaal`,             `leveranciers`.`Naam` AS 'LNAAM', `leveranciers`.`LeverancierID` AS 'LID' , `bestelling`.`GebruikerID` AS 'GID', `gebruiker`.`Naam` as 'gnaam'
  FROM `productenbesteld` JOIN `producten` ON `productenbesteld`.`ProductID` = `producten`.`ProductID` 
  JOIN `leveranciers` ON `leveranciers`.`LeverancierID` = `producten`.`LeveranciersID` 
  JOIN `bestelling` on `bestelling`.`BestellingID` = `productenbesteld`.`BestellingID` 
  JOIN `gebruiker` on `bestelling`.`GebruikerID` = `gebruiker`.`idGebruiker`
  WHERE `productenbesteld`.`ProductID` in (select `ProductID` FROM `productenbesteld` where `BestellingID` = ".$BID.") AND `productenbesteld`.`BestellingID` = ".$BID.";";
  

?>
<table class="mt-5" align="center" border="2px">
<tr><th>Leverancier</th><th>Gebruiker</th><th>Product</th><th>Aantal</th><th>Prijs</th><th>Totaal</th><th>weigeren</th><th>betalen</th></tr>
<?php
$result = mysqli_query($db, $query);	
		While ($row = mysqli_fetch_assoc($result))
		{
			$fgid = $row["gnaam"];
			$fleveranciernaam = $row["LNAAM"];
			$flid = $row["LID"];
			$fproduct = $row["Naam"];
			$faantal = $row["Aantal"];
			$fprijs  = $row["Prijs"];
			$ftotaal = $row["Totaal"];
		?>
		<form method="post" align="center">
		<tr><td>
		<input name="lnaam" value="<?php echo $fleveranciernaam; ?>" readonly></td>
		<td><input name="gebruiker" value="<?php echo$fgid; ?>" readonly></td>
		<td><input name="product" value="<?php echo $fproduct; ?>" readonly></td>
		<td><input name="aantal" value="<?php echo $faantal; ?>" readonly></td>
		<td><input name="prijs" value="<?php echo $fprijs; ?>" readonly></td>
		<td><input name="totaal" value="<?php echo round($ftotaal,2); ?>" readonly></td>
		<td><input type="submit" name="submit" value="Weiger Factuur" ></td>
		<td><input type="submit" name="submit" value="Betalen Factuur" action="Factuur Betalen.php">
		</td></tr>
		</form><?php
		}
		mysqli_free_result($result);
		mysqli_close($db);
		
		// het versturen van deze data werkt maar moet niet naar de volgdende pagina sturen aangezien alleen financiën bij het betalen mag komen
?>
</table>		


