<?php
Function dropdownleveranciers()
{
	//include 'Query.php';
	$leveranciers = getLeveransiers();
	$leveranciersID = getLeveransiersID();
	
	$tekst = '';
	for($i = 0; $i<count($leveranciers);$i++)
	{
		$tekst .="<option value=".$leveranciersID[$i].">".$leveranciers[$i]."</option>";
	}
	return $tekst;
}

Function leverancierByID(int $x)
{
	//include 'Query.php';
	$leveranciers = getLeveransiers();
	$leveranciersID = getLeveransiersID();
	
	$tekst = '';
	for($i = 0; $i<count($leveranciers);$i++)
	{
		//if($x $leveranciersID[$i]){
			$tekst .="<option value=".$leveranciersID[$i].">".$leveranciers[$i]."</option>";
		//}
	}
	return $tekst;
}

Function ToevoegenKnop($ID)
{
	echo "De product code is:".$ID."!";
}

Function ArrayNaarDataProducten($x)
{
	$q = "";
	
		for($y=0; $y< sizeof($x[0]); $y++)
	{
		$n = $x[1][$y];
		$p = $x[2][$y];
		$ID = $x[0][$y];
		$o = $x[3][$y];
		$q .= ProductOverzicht($n, $p, $ID, $o);
		
	}//}
	
	return $q;
}

Function ProductOverzicht($n, $p, $ID, $o)
{
		$text = "
	<table class=\"shadow mx-auto mt-5\" style=\"border:1px solid;\">
	<span border=\"1\">
	<tr>
	<td>".$n."</td><td style=\"width:100px;\">
	<div class=\"float-right text-right\">€".$p."</div></td>
	<td class=\"text-right\" style=\"width:120px;\">Aantal:
	<input class=\"float-right text-right\" type=\"number\" name=\"".$ID."\" style=\"width:40px;\" value=\"0\" min=\"0\" max=\"99\" step=\"1\">
	</td></tr>
	<tr><td colspan=\"3\">
	<textarea rows=\"5\" style=\"width:600px;\">".$o."</textarea>
	</td></tr></span></table>";
	
	return $text;
}

Function ArrayNaarDataProducten2($x)
{
	$q = "";
	
		for($y=0; $y< sizeof($x[0]); $y++)
	{
		$n = $x[1][$y];
		$p = $x[2][$y];
		$ID = $x[0][$y];
		$o = $x[3][$y];
		$a = $x[4][$y];
		$q .= ProductOverzicht2($n, $p, $ID, $o, $a);
		
	}
	
	return $q;
}

Function ArrayNaarArray($x)
{
	$q = "";
	
		for($y=0; $y< sizeof($x[0]); $y++)
	{
		
		$ID = $x[0][$y];
		$a = $x[4][$y];
		if(isset($_SESSION["PID"])){
		array_push($_SESSION["PID"], $ID);
		array_push($_SESSION["a"], $a);
		}
		else
		{
		$_SESSION["PID"]=array($ID);
		$_SESSION["a"]=array($a);
		}
		
	}
	
}

Function ArrayNaarPrijs($x, $ID)
{
		for($y=0; $y< sizeof($x[0]); $y++)
	{
		if($x[0][$y]==$ID){
			return $x[2][$y];
		}
		
	}
}

Function ProductOverzicht2($n, $p, $ID, $o, $a)
{
		$text = "
	<table class=\"shadow mx-auto mt-3\" style=\"border:1px solid;\">
	<span border=\"1\">
	<tr>
	<td>".$n."</td><td style=\"width:100px;\">
	<div class=\"float-right text-right\">€".$p."</div></td>
	<td class=\"text-right\" style=\"width:120px;\">Aantal:
	<input class=\"float-right text-right\" type=\"number\" name=\"".$ID."\" style=\"width:40px;\" value=\"".$a."\" min=\"0\" max=\"99\" step=\"1\" disabled>
	</td></tr>
	<tr><td colspan=\"3\">
	<textarea rows=\"5\" style=\"width:600px;\">".$o."</textarea>
	</td></tr></span></table>";
	
	return $text;
}

Function SentPM ($naar, $van, $bestellingID, $systeemMsg, $onderwerp, $text)
{
	$status ="0";
	$sChack = $systeemMsg;
	if($sChack == true)
	{
		$onderwerp = "SYSTEEM: ".$onderwerp;
	}
	include'db.php';
	$tijd=date("Y-m-d H:i:s");
	$query = "INSERT INTO pm (naar,van,status,OrderID,onderwerp,tijd,bericht) VALUES (".$naar.", ".$van.", '".$status."', ".$bestellingID.", '".$onderwerp."', '".$tijd."', '".$text."');";
	echo $query;
	$result = mysqli_query($db, $query);
}

Function SentPMnP ($naar, $van, $systeemMsg, $onderwerp, $text)
{
	$status ="0";
	$sChack = $systeemMsg;
	if($sChack == true)
	{
		$onderwerp = "SYSTEEM: ".$onderwerp;
	}
	include'db.php';
	$tijd=date("Y-m-d H:i:s");
	$query = "INSERT INTO pm (naar,van,status,onderwerp,tijd,bericht) VALUES (".$naar.", ".$van.", '".$status."', '".$onderwerp."', '".$tijd."', '".$text."');";
	echo $query;
	$result = mysqli_query($db, $query);
}

Function SentPMaankoopverzoek ($bestellingID, $manager, $text, $naam)
{
	
	$status = "";
	$onderwerp = "";
	if($manager == false){
		include 'db.php';
		$ID = 0;
		$query = "SELECT `idGebruiker` AS 'ID' FROM `gebruiker` WHERE `AfdCode` IN (SELECT `AfdCode` FROM `gebruiker` WHERE `idGebruiker` = ".$_SESSION['ID'].") AND `Rol` = 3 LIMIT 1;";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				
				$ID = $row["ID"];
	
	}}
	$onderwerp = "Aankoopverzoek van ".$_SESSION['naam'];
	SentPM ($ID, $_SESSION['ID'], $bestellingID, FALSE, $onderwerp, $text);
	
	$statusBestelling = "Jouw aanvraacht is in behandeling.(buyer)";
	$query = "UPDATE `bestelling` SET `Status` = '".$statusBestelling."' WHERE `BestellingID` = ".$bestellingID."";
	$result = mysqli_query($db, $query);
	}
	elseif($manager == true)
	{
	include 'db.php';
	$ID = 0;
	$query = "SELECT `AfdManager` AS 'ID' FROM `afdelingen` WHERE `AfdCode` IN (SELECT `AfdCode` FROM `gebruiker` WHERE `idGebruiker` = ".$_SESSION['ID'].") LIMIT 1;";
	//print_r($query."<br/>");
	//print_r($db."<br/>");
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
	$ID = $row["ID"];
	
	}}
	$onderwerp = "Aankoopverzoek van ".$_SESSION['naam'].": ".$onderwerp;
	$text = $text . "<br/><br/><a href=\"ApproveOrDeny.php?ID=".$bestellingID."&naam=".$naam."\">Bestel aanvraag verwerken.</b></a>";
	SentPM ($ID, $_SESSION['ID'], $bestellingID, FALSE, $onderwerp, $text);
	
	$statusBestelling = "Jouw aanvraacht is in behandeling bij uw manager.";
	$query = "UPDATE `bestelling` SET `Status` = '".$statusBestelling."' WHERE `BestellingID` = ".$bestellingID."";
	$result = mysqli_query($db, $query);
	}
}
?>