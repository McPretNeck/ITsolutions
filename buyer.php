<?php
include 'menu.php';
include 'db.php';
include'Query.php';
if(isset($_GET['ID'])){$BID = $_GET['ID'];}
$text="";
?>
<div class="container mt-2">
	<?php
	if(isset($_GET['LID'])){
	$query = "SELECT `leveranciers`.`LeverancierID` AS 'ID'
  FROM `productenbesteld` JOIN `producten` ON `productenbesteld`.`ProductID` = `producten`.`ProductID` JOIN `leveranciers` ON `leveranciers`.`LeverancierID` = `producten`.`LeveranciersID` JOIN `bestelling` on `bestelling`.`BestellingID` = `productenbesteld`.`BestellingID`
  WHERE `productenbesteld`.`ProductID` in (select `ProductID` FROM `productenbesteld` where `BestellingID` = ".$BID.") AND `productenbesteld`.`BestellingID` = ".$BID." AND `producten`.`LeveranciersID` =".$_GET['LID'].";";
  
  $result = mysqli_query($db, $query);
	
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
		insertQuery(" INSERT INTO `factuur` (`OderID`,`Status`,`leverancierID`) VALUES (".$BID.",'Nieuw',".$row['ID'].");");
	
	
	}}
	
	echo "<h1 align=\"center\">De producten bij ".$_GET['LN']." zijn besteld!</h1>";
	$a = "<a align=\"center\" href=\"".htmlspecialchars($_SERVER["PHP_SELF"])."?ID=".$BID."\">Terug</a>";
		echo $a;
		$body = "Er is een nieuwe factuur binnen gekomen.<br/><a href ="*"> Aanvraag behandelen </a>";
		SendPM(6, $_SESSION['ID'],FALSE,'Nieuw factuur binnen gekregen',$body);
	}
	else
	{
		$query = "
		SELECT `productenbesteld`.`ProductID` AS 'ProductID', `producten`.`Prijs` AS Prijs,`producten`.`Naam` AS 'Naam', `productenbesteld`.`Aantal` AS 'Aantal', (`producten`.`Prijs` * `productenbesteld`.`Aantal`)  AS `Totaal`,
		`leveranciers`.`Naam` AS 'LNAAM', `leveranciers`.`LeverancierID` AS 'LID' , `bestelling`.`GebruikerID` AS 'GID', `gebruiker`.`Naam` as 'gnaam'
		FROM `productenbesteld` JOIN `producten` ON `productenbesteld`.`ProductID` = `producten`.`ProductID` 
		JOIN `leveranciers` ON `leveranciers`.`LeverancierID` = `producten`.`LeveranciersID` 
		JOIN `bestelling` on `bestelling`.`BestellingID` = `productenbesteld`.`BestellingID` 
		JOIN `gebruiker` on `bestelling`.`GebruikerID` = `gebruiker`.`idGebruiker`
		WHERE `productenbesteld`.`ProductID` in (select `ProductID` FROM `productenbesteld` where `BestellingID` = ".$BID.") AND `productenbesteld`.`BestellingID` = ".$BID.";";
		
		$XYZ=0;
		$result = mysqli_query($db, $query);	
		While($row = mysqli_fetch_assoc($result))
		{
			//echo (in_array($row['ProductID'],getFactuur($BID)));
			if(in_array($row['ProductID'],getFactuur($BID))==FALSE){
			$fgid = $row["gnaam"];
			$fleveranciernaam = $row["LNAAM"];
			$flid = $row["LID"];
			$fproduct = $row["Naam"];
			$faantal = $row["Aantal"];
			$fprijs  = $row["Prijs"];
			$ftotaal = $row["Totaal"];
			if($flid==$XYZ){
				$text .="
				<tr><td>
				<input name=\"lnaam\" value=\"". $fleveranciernaam."\" readonly></td>
				<td><input name=\"gebruiker\" value=\"".$fgid."\" readonly></td>
				<td><input name=\"product\" value=\"". $fproduct."\" readonly></td>
				<td><input name=\"aantal\" value=\"". $faantal."\" readonly></td>
				<td><input name=\"prijs\" value=\"". $fprijs."\" readonly></td>
				<td><input name=\"totaal\" value=\"".round($ftotaal,2)."\" readonly></td>
				</tr>";
				
			}elseif($XYZ==0){
				$text .="
				<table class=\"mt-5\" align=\"center\" border=\"2px\">
				<tr><th>Leverancier</th><th>Gebruiker</th><th>Product</th><th>Aantal</th><th>Prijs</th><th>Totaal</th></tr>
				<form method=\"post\" action=\"". htmlspecialchars($_SERVER["PHP_SELF"]."?ID=".$BID."&LID=".$flid."&LN=".$fleveranciernaam)."\" align=\"center\">
				<tr><td>
				<input name=\"lnaam\" value=\"". $fleveranciernaam."\" readonly></td>
				<td><input name=\"gebruiker\" value=\"".$fgid."\" readonly></td>
				<td><input name=\"product\" value=\"". $fproduct."\" readonly></td>
				<td><input name=\"aantal\" value=\"". $faantal."\" readonly></td>
				<td><input name=\"prijs\" value=\"". $fprijs."\" readonly></td>
				<td><input name=\"totaal\" value=\"". round($ftotaal,2)."\" readonly></td>
				</tr>";
				$XYZ=$flid;
			}
			elseif($XYZ!=$flid){
				$XYZ=0;
				$text .="
				<tr><td colspan=\"6\" align=\"center\">
				<input align=\"center\" type=\"submit\" name=\"submit\" value=\"Bestellen\" ></td></tr>
				</form>
				</table>
				
				<table class=\"mt-5\" align=\"center\" border=\"2px\">
				<tr><th>Leverancier</th><th>Gebruiker</th><th>Product</th><th>Aantal</th><th>Prijs</th><th>Totaal</th></tr>
				<form method=\"post\" action=\"". htmlspecialchars($_SERVER["PHP_SELF"]."?ID=".$BID."&LID=".$flid."&LN=".$fleveranciernaam)."\" align=\"center\">
				<tr><td>
				<input name=\"lnaam\" value=\"". $fleveranciernaam."\" readonly></td>
				<td><input name=\"gebruiker\" value=\"".$fgid."\" readonly></td>
				<td><input name=\"product\" value=\"". $fproduct."\" readonly></td>
				<td><input name=\"aantal\" value=\"". $faantal."\" readonly></td>
				<td><input name=\"prijs\" value=\"". $fprijs."\" readonly></td>
				<td><input name=\"totaal\" value=\"". round($ftotaal,2)."\" readonly></td>
				</tr>";
				 
			}}
		}
		
				$text .="<tr><td colspan=\"6\" align=\"center\"><input align=\"center\" type=\"submit\" name=\"submit\" value=\"Bestellen\" ></td></tr></form></table>";
				print_r($text);
	}
	
	
	?>
	<h3 align="center">Zie je niks ?Dan zijn alle facuren verwerkt!</h3>
</div>
</html>