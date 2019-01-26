<?php
 include("db.php");
include("menu.php");
?>
        <h2>Personal Message: New Message</h2><br/>
        <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"> Archief </a><a href="pm_send.php"><b>Nieuw bericht</b></a><br /><br />
                <table border="1">
<?php
// wat is de user id?
$userid = $_SESSION['ID'] ;
?>
<form name="formulier" method="post" action="pm_verwerk.php" >
<table border="1" width="700">

<tr><td width="30%">Ontvanger:</td><td width="70%">
<select name="naar">
<?php
$id = $_SESSION['ID'];
$user_SQL="SELECT id,naam,voornaam,achternaam FROM gebruikers ORDER BY voornaam ASC";
$user_result=mysql_query($user_SQL);
while($users=mysql_fetch_array($user_result)){
$id = $users['id'];
$vn = $users['voornaam'];
$an = $users['achternaam'];
$un = $users['naam'];
?><option value="<?php echo $id ;?>"><?php echo "$vn $an ( $un)"; ?></option>
<?php
}
?>
</td></tr>
<tr><td width="30%">Onderwerp:</td><td width="70%"><input name="onderwerp" type="text" size="25" /></td></tr>
<?php
if
($_SESSION['rol']==1){ ?>
<tr><td width="30%">Admin bericht:</td><td width="70%">
<select name="admin"><option value="0">Nee</option><option value="1">Ja</option></select></td></tr>
<?php } 
else{ ?>
<input type="hidden" value="0" name="admin" />
<?php } ?>

</table>
<textarea name="berichtl" cols="110" rows="10" ></textarea>

<br />
<input type="submit" value="verstuur"  name="actie" />
</form>