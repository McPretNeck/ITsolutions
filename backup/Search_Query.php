<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
<?php
//Alle gegevens uit het search formulier een variable geven:
$naam=mysqli_real_escape_string($db,$_POST['naam']);
$naam = ucfirst($_POST['naam']);
if( !preg_match("/^[A-Za-z]*$/", $naam)) {
die("Fout in Voornaam deze mag alleen letters en spaties bevatten.</br>"); }
$achternaam= mysqli_real_escape_string($db,$_POST['Achternaam']);
$achternaam = ucfirst($_POST['Achternaam']);
if( !preg_match("/^[A-Za-z]*$/", $achternaam)) {
die("Fout in Achternaam deze mag alleen letters en spaties bevatten.</br>"); }
$kleur=  mysqli_real_escape_string($db, $_POST['Kleur']);
$idmam= mysqli_real_escape_string($db, $_POST['IdMama']);
$idpap= mysqli_real_escape_string($db, $_POST['idPapa']);
$sekse= mysqli_real_escape_string($db,$_POST['geslacht']);

//query alleen specifiek op naam, geslacht, kleur, IDmam en IDpap
$query="SELECT* FROM dieren WHERE ";
    //echo "$naam $achternaam $gebd $od $kleur $idmam $idpap $sekse $query </br></br>";
    //echo "$naam ". is_null($naam) ."</br>  $achternaam ". is_null($achternaam) ."</br>  $gebd ". is_null($gebd) ."</br>  $od ". is_null($od) ."</br>  $kleur ". is_null($Kleur) ."</br>  $idmam ". is_null($idmam) ."</br>  $idpap ". is_null($idpap) ."</br>  $sekse ". is_null($sekse) ."</br>  $query";	
	
	if(strlen($naam)>0){//check of een naam is ingevuld
		$first = true;//het aangeven dat dit de eerste waarde is
		$query .= "Naam LIKE '%".$naam."%' ";}
	
	if(strlen($sekse)>0){//check of een sekse is ingevuld
		if(isset($first)){//checken of dit de eerste is
			$query .= "AND Sekse LIKE '%".$sekse."%' ";}
		else{
			$first = true;//het aangeven dat dit de eerste waarde is
			$query .= "Sekse LIKE '%".$sekse."%' ";}
		}
	if(strlen($kleur)>0){//check of een kleur is ingevuld
		if(isset($first)){//checken of dit de eerste is
			$query .= "AND Kleur LIKE '%".$kleur."%' ";}
		else{
			$first = true;//het aangeven dat dit de eerste waarde is
			$query .= "Kleur LIKE '%".$kleur."%' ";}
		}
	
	if($idmam >0){//check of een idmam is ingevuld
		if(isset($first)){//checken of dit de eerste is
			$query .= "AND IdMama = $idmam ";}
		else{
			$first = true;//het aangeven dat dit de eerste waarde is
			$query .= "IdMama = $idmam ";}
		}
	if($idpap >0){//check of een idpap is ingevuld
		if(isset($first)){//checken of dit de eerste is
			$query .= "AND idPapa = $idpap ";}
		else{
			$first = true;//het aangeven dat dit de eerste waarde is
			$query .= "idPapa = $idpap ";}
		}
	
	$result = mysqli_query($db, $query);
    echo "<h2> Resultaten: </h2>";
	//Hieronder de gegevens die je opzoekt
	echo "<table border=\"1\">";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
	    echo "<td>";
		echo "Naam:"."<b>".$naam = $row["Naam"]."</b>"."</br>";
		echo "Stalnaam:"."<b>".$achternaam = $row["Achternaam"]."</b>"."</br>";
		echo "Geboorte datum:"."<b>".$Geboorte = $row["Geb_datum"]."</b>"."</br>";
        echo "Overleidings datum:"."<b>".$Overleiding = $row["Overleidings_datum"]."</b>"."</br>";
        echo "Sekse:"."<b>".$sekse = $row["Sekse"]."</b>"."</br>";
		echo "Kleur: "."<b>".$Kleur = $row["Kleur"]."</b>"."</br>";
		echo "Moeder: "."<b>".$idmam = $row["idMama"]."</b>"."</br>";
		echo "Vader: "."<b>".$idpap = $row["idPapa"]."</b>"."</br>";
		echo (" <a href=\"Stamboom.php?Stamboom_ID=".$row['Stamboom_ID']."&naam=".$row['Naam']." \">Stamboom</a>");
        echo "</td>";
		echo "</tr>";
}
echo "</table>";
//connectie afsluiten
mysqli_free_result($result);
//connectie verbreken
mysqli_close($db);
?>
<footer><p><a href= "Search.php"> Zoek opnieuw</a><br/></footer>
</div>
