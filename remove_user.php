<?php
include 'menu.php';
?>
<div align="Center">
</br>
<b><p> Wanneer u uw account verwijdert, worden al uw gegevens gewist!</p></b>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<b>Weet u zeker dat u uw account wilt verwijderen?</b><br><br>
<input type="submit" name="Logoff2" value="Verwijder mijn account">
</form>
</div>
<?php
include "db.php";
if(isset($_POST["Logoff2"])){
$query= "DELETE FROM gebruiker WHERE idGebruiker='" .$userID."'";
$result = mysqli_query($db,$query) or die (mysqli_error());
mysqli_close ($db);
echo "</br><h1 align=\"Center\">Uw gegevens zijn succesvol verwijderd</h1>";
} 
//Dit werkt nog niet!!!
?>