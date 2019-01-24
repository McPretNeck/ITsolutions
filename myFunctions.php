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
	<table class=\"shadow mx-auto mt-3\" style=\"border:1px solid;\">
	<span border=\"1\">
	<tr>
	<td>".$n."</td><td style=\"width:100px;\">
	<div class=\"float-right text-right\">€".$p."</div></td>
	<td class=\"text-right\" style=\"width:120px;\">Aantal:
	<input class=\"float-right text-right\" type=\"number\" name=\"".$ID."\" style=\"width:40px;\" value=\"0\" min=\"0\" max=\"99\" step=\"1\">
	</td></tr>
	<tr><td colspan=\"3\">
	<textarea style=\"width:600px; height:200px\">".$o."</textarea>
	</td></tr></span></table>";
	
	return $text;
}


?>