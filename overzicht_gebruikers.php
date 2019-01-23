<?php

include 'menu.php';
include 'db.php';
?>
			<form>
		<table border=1 align = "center">
<TR>
		<h3 align = "center">Gebruikers </h3> <br>
</TR>
<TR>
		<th> Naam </th><th>E-mail</th><th>Telefoonnummer</th>
</TR>
		
		
<?php
if($_SESSION['ID'] == 1){
	
$query = "SELECT Naam, Email, Telefoonnummer FROM gebruiker WHERE idGebruiker <> 1";
$result = mysqli_query($db, $query);

while($row = mysqli_fetch_assoc($result)){
	$n = $row['Naam'];
	$e = $row['Email'];
	$t = $row['Telefoonnummer'];
	
echo"<tr><td>". $n."</td><td>". $e."</td><td>". $t."</td></tr>";}
echo   "</table> </form>";	 


mysqli_free_result($result);
}
?>