<?php 
include 'menu.php';
include 'db.php'; ?>
<body>
<div class="container mt-2">
<form method="post" action="P_T_Query.php">
<fieldset>
<h2> Voeg een paard toe! </h2>
<h6> <font color="blue"> (Voeg eerst ouders toe wanneer deze missen bij de ouder selectie) </font> </h6>
<table>
<tr>
<td align="right" ><font color="red">*verplicht veld.</font><br></td>
</tr>
<tr>
<td align="right">Naam:</td>
<td align="left"><input type="text" name="naam" value="" required>
<span class="error"><font color="red">*</font></span><br></td>
</tr>
<tr>
<td align="right">Stalnaam:</td>
<td align="left"><input type="text" name="Achternaam"><br></td>
</tr>
<tr>
<td align="right">Geboorte datum:</td>
<td align="left"><input type="text" name="Geb_datum" placeholder="YYYY-MM-DD" value="" required 
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" 
title="Voer een datum in met dit formaat: YYYY-MM-DD"/>
<span class="error"><font color="red">*</font></span><br></td>
</tr>
<tr>
<td align="right">Overleidings datum:</td>
<td align="left"><input type="text" name="Overleidings_datum" placeholder="YYYY-MM-DD" value=""
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" 
title="Voer een datum in met dit formaat: YYYY-MM-DD"/>
</tr>
<tr>
<td align="right">Kleur:</td>
<td align="left"><select name="Kleur" required>
<option value="zwart">Zwart</option>
<option value="bruin">Bruin</option>
<option value="vos">Vos</option>
<option value="schimmel">Schimmel</option>
<option value="bont">Bont</option>
</select><br></td>
</tr>

<tr>
<td align="right"> Sekse: </td>
<td align="left"><input type="radio" name="geslacht" value="Ruin" checked> Ruin<br>
<input type="radio" name="geslacht" value="Hengst"> Hengst<br>
<input type="radio" name="geslacht" value="Merrie"> Merrie <br>
</td></tr>

<tr>
<td align="right">Chipnummer:</td>
<td align="left"><input type="text" name="Chipnummer" size="20">
<span class="error"><font color="red">*</font></span><br></td>
</tr>

<tr>
<td align="right">Selecteer Stamboek:</td>

<?php include 'db.php';
//uitvoeren database query
$query="SELECT*";
$query.="FROM stamboeken";
$result= mysqli_query($db,$query);
if(!$result){
	die("Database query failed");
}
?>

<td align= "left"><select name="idStamboeken">
<option value="NULL">Geen stamboek bekend</option>
<?php
while($gegevens=mysqli_fetch_assoc($result)){
echo "<option value=".$gegevens['idStamboek'].">".$gegevens['Naam']."</option>";
}
//connectie afsluiten
mysqli_free_result($result);
//connectie verbreken
mysqli_close($db);
?>
</select><br>
</tr>




<tr>
<td align="right">Selecteer moeder:</td>
<?php include 'db.php';
//uitvoeren database query
$query="SELECT*";
$query.="FROM dieren WHERE Sekse = 'Merrie'";
$result= mysqli_query($db,$query);
if(!$result){
	die("Database query failed");
}
//gegevens komen nog niet uit de database
?>

<td align= "left"><select name="IdMama">
<option value="NULL">Geen ouder bekend</option>
<?php
while($gegevens=mysqli_fetch_assoc($result)){
echo "<option value=".$gegevens['Stamboom_ID'].">".$gegevens['Naam'].','.$gegevens['Achternaam'].','.$gegevens['Kleur'].','.$gegevens['Sekse']."</option>";
}
//connectie afsluiten
mysqli_free_result($result);
//connectie verbreken
mysqli_close($db);
?>
</select><br>
</tr>
<tr>
<td align="right"> Selecteer vader:</td>
<?php include 'db.php';
//uitvoeren database query
$query="SELECT*";
$query.="FROM dieren WHERE Sekse in('Hengst','Ruin')";
$result= mysqli_query($db,$query);
if(!$result){
	die("Database query failed");
}
//gegevens komen nog niet uit de database
?>
<td align= "left"><select name="IdPapa">
<option value="NULL">Geen ouder bekend</option>
<?php
while($gegevens=mysqli_fetch_assoc($result)){
echo "<option value=".$gegevens['Stamboom_ID'].">".$gegevens['Naam'].','.$gegevens['Achternaam'].','.$gegevens['Kleur'].','.$gegevens['Sekse']."</option>";
}
//connectie afsluiten
mysqli_free_result($result);
//connectie verbreken
mysqli_close($db);
?>
</select><br>
</tr>
<tr>
<td align="right">Upload plaatje<br></td>
<td align="left"><input type="text" name="Plaatje" value="NULL"><br>
</tr>
<tr>
<td align="right"><input type="submit" name="submit" value="Verzend formulier"></td>
</tr>
<tr>
<td align="right"><input type="reset" name="reset" value="Velden leegmaken"></td>
</tr>

</form>
</div>
</div><!-- content container -->
</body>
