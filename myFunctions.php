<?php
Function dropdownleveranciers()
{
	//include 'Query.php';
	$leveranciers = getLeveransiers();
	
	$tekst = '';
	var_dump($leveranciers);
	foreach($leveranciers as $x)
	{
		$tekst .="<option value=".$x.">".$x."</option>";
	}
	return $tekst;
}

?>