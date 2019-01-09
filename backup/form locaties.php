<?php 
	include 'menu.php';
	include 'db.php';
?>
<div class="container mt-2">
<?php
if(isset($_POST["submit"])){	
?>
<form action="form locaties.php" method ="POST">
<table>
<tr><td>Postcode</td>	<td><input type ="text" name="postcode" /></td></tr>
<tr><td>Straatnaam</td>	<td><input type ="text" name="straat"/></td></tr>
<tr><td>Huisnummer</td>	<td><input type ="number" name="huisnummer" min="1" max="10"  /></td></tr>
<tr><td>Toevoeging</td>	<td><input type ="text" name="toevoeging" /></td></tr>
<tr><td>Woonplaats</td>	<td><input type ="text" name="woonplaats" /></td></tr>
<tr><td>Land</td>		<td><input type ="text" name="land"/></td></tr>
<tr><td>Stalnaam</td>	<td><input type ="text" name="stalnaam"  /></td></tr>
    </tr><td><input  type = "submit" name ="submit" value="Submit"></td></tr>
</table>
</form>
</br>
</br>
<?php
echo"uw ingevoerde gegevens zijn:";
echo"Postcode: ".$_POST["postcode"]."</br>";
echo"Straatnaam: ".$_POST["straat"]."</br>";
echo"Huisnummer: ".$_POST["huisnummer"]."</br>";
echo"Toevogeing: ".$_POST["toevoeging"]."</br>";
echo"woonplaats: ".$_POST["woonplaats"]."</br>";
echo"Land: ".$_POST["land"]."</br>";
echo"Stalnaam: ".$_POST["stalnaam"]."</br>";

$postcode=$_POST["postcode"];
$straat=$_POST["straat"];
$huinummer=$_POST["huisnummer"];
$toevoeging=$_POST["toevoeging"];
$woonplaats=$_POST["woonplaats"];
$land=$_POST["land"];
$stalnaam=$_POST["stalnaam"];

$query="INSERT INTO locatie( Straatnaam, idGebruiker, Huisnummer, Toevoeging, Postcode,Plaats, Land, Stalnaam)
		VALUES (\"".$straat."\",". 1 .",".$huinummer.",\"".$toevoeging."\",\"".$postcode."\",\"".$woonplaats."\",\"".$land."\",\"".$stalnaam."\")";
		include 'db.php';
$result = mysqli_query($db, $query) or die('query is fucked.');		
}else{

?>
<form action="form locaties.php" method ="POST">
<table>
<tr><td>postcode</td>	<td><input type ="text" name="postcode" /></td></tr>
<tr><td>straatnaam</td>	<td><input type ="text" name="straat"/></td></tr>
<tr><td>huisnummer</td>	<td><input type ="number" name="huisnummer" min="1" max="10"  /></td></tr>
<tr><td>toevoeging</td>	<td><input type ="text" name="toevoeging" /></td></tr>
<tr><td>Woonplaats</td>	<td><input type ="text" name="woonplaats" /></td></tr>
<tr><td>land</td>		<td><input type ="text" name="land"/></td></tr>
<tr><td>stalnaam</td>	<td><input type ="text" name="stalnaam"  /></td></tr>
    </tr><td><input  type = "submit" name ="submit" value="Submit"></td></tr>
</table>
</form>
<?php
}
?>
</div>
