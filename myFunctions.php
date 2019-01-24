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
	<table class=\"shadow mx-auto mt-5\" style=\"border:1px solid;\">
	<span border=\"1\">
	<tr>
	<td>".$n."</td><td style=\"width:100px;\">
	<div class=\"float-right text-right\">€".$p."</div></td>
	<td class=\"text-right\" style=\"width:120px;\">Aantal:
	<input class=\"float-right text-right\" type=\"number\" name=\"".$ID."\" style=\"width:40px;\" value=\"".$a."\" min=\"0\" max=\"99\" step=\"1\" >
	</td></tr>
	<tr><td colspan=\"3\">
	<textarea rows=\"5\" style=\"width:600px;\">".$o."</textarea>
	</td></tr></span></table>";
	
	return $text;
}


?>