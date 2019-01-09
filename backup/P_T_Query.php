<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
<?php
//Link moet nog aan de onderkant van de pagina EN de mysqli_real_escape_string werkt nog niet voor 'Pap'
include 'db.php';
$naam=mysqli_real_escape_string($db,$_POST['naam']);
$naam = ucfirst($_POST['naam']);
if( !preg_match("/^[A-Za-z]*$/", $naam)) {
die("Fout in Voornaam deze mag alleen letters en spaties bevatten.</br>"); }
$stamboek	= mysqli_real_escape_string($db,$_POST['idStamboeken']);
$idmam		= mysqli_real_escape_string($db,$_POST['IdMama']);
$idpap		= mysqli_real_escape_string($db,$_POST['IdPapa']);
$achternaam	= mysqli_real_escape_string($db,$_POST['Achternaam']);
$achternaam	= ucfirst($_POST['Achternaam']);
if( !preg_match("/^[A-Za-z]*$/", $achternaam)) {
die("Fout in Achternaam deze mag alleen letters en spaties bevatten.</br>"); }
$gebd= mysqli_real_escape_string($db,$_POST['Geb_datum']);
$od= mysqli_real_escape_string($db,$_POST['Overleidings_datum']);
$kleur=  mysqli_real_escape_string($db, $_POST['Kleur']);
$sekse= mysqli_real_escape_string($db,$_POST['geslacht']);
$chip= mysqli_real_escape_string($db,$_POST['Chipnummer']);
$plaatje= mysqli_real_escape_string($db,$_POST['Plaatje']);

//query
$query="INSERT INTO dieren(Naam, idStamboeken, IdMama, idPapa, Achternaam, Geb_datum, Overleidings_datum, Kleur, Sekse, Plaatje, Chipnummer, idLocatie)
VALUES('$naam',$stamboek,$idmam,$idpap,'$achternaam','$gebd',";
if($od == ""){$query.=' NULL';}else{$query.="('$od')";};
$query.=",'$kleur','$sekse',$plaatje,$chip,1)";//locatie id is nog niet dynamisch
echo $query;
if(mysqli_query($db,$query)){
	echo "Gelukt! Deze gegevens zijn opgeslagen:</br>";
	echo "<table border=\"1\"><tr>";
	echo "<tr>";
	echo "<td>";
	echo "Voornaam : $naam</br>";
	echo "Stalnaam: $achternaam</br>";
	echo "Geboorte datum: $gebd</br>";
	echo "Kleur: $kleur</br>";
	echo "Sekse: $sekse</br>";
	echo "Mam: $idmam</br>";
	echo "Pap: $idpap </br>";
	echo "Chipnummer: $chip</br>";
	echo "Plaatje: $plaatje</br>";
	echo "</td>";
	echo "</tr>";
}else{
	echo "Error </br> ". $query;
}
//Link moet nog aan de onderkant van de pagina

mysqli_close($db);
?>
<footer><p><a href= "P_Toevoegen.php"> Nog een paard toevoegen</a><br/></footer>
</div>
