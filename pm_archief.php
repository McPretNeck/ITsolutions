<?php
include("db.php");
include("menu.php");
?>
		<div class="container mt-2 px-5">
		<div class="px-5 mx-auto">
        <h2>Personal Message: Archief</h2><br/>
        <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"><b>Archief </b></a><a href="pm_send.php">Nieuw bericht</a><br /><br />
                <table border="1">
<tr><td width="200">Onderwerp</td><td width="150">Afzender</td><td width="100">Verstuurd op:</td><td width="100">Opties</td></tr>
<?php
// wat is de user id?
$userid = $_SESSION['ID'] ;
//filter
$status ="1";
//de user zijn eigen berichten laten ophalen en  zorg dat alleen de nieuwe berichten worden weergeven
//$pm_SQL="SELECT id,naar,van,admin,status,onderwerp,bericht,tijd FROM pm WHERE naar='$userid' AND status='$status' ORDER BY tijd";
$pm_SQL="SELECT `id`,`naar`,`van`,`admin`,`status`,`onderwerp`,`bericht`,`tijd` FROM pm WHERE naar='$userid' AND status='$status' ORDER BY tijd";
//nu de SQL opdracht verwerken
$pm_result=mysqli_query($db, $pm_SQL);
// een while lus op alle berichten te weergeven
while($pm=mysqli_fetch_array($pm_result)){
//variabelen netjes
$id = $pm['id'];
$onderwerp = $pm['onderwerp'];
$admin = $pm['admin'];

//de afzender
$id_van = $pm['van'];
//even id naar naam omzetten
$van_SQL="SELECT `Naam` FROM gebruiker WHERE idGebruiker=".$id_van." LIMIT 1;";
$van_result=mysqli_query($db, $van_SQL);
$vanvar=mysqli_fetch_array($van_result);
$un = $vanvar['Naam'];

//even de tijd parsen
$tijd = strtotime($pm['tijd']);
//uitkomst while lus  
?>
<tr>
<td>
<a href="pm_read.php?id=<?= $id ?>">
<?php 
if($admin==1){
?><b>ADMIN:<?php echo $onderwerp ?></b><?php
}
else{
echo $onderwerp; 
}?>
</a></td>
<td><a href="users.php?id=<?php echo $id_van ; ?>"> <?php echo "$un"; ?></a></td>
<td><?php echo date("j-n-y H:i",$tijd); ?></td>
<td><a href="pm_verwerk.php?actie=verwijder&id=<?php echo $id; ?>">Verwijder </a></td>
</tr>
<?php
//einde while lus
}
?>
</table>
</div></div>