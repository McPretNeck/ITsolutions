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

?>