<?php
 include("db.php");
include("menu.php");
?>
		<div class="container mt-2 px-5">
		<div class="px-5 mx-auto">
        <h2>Personal Message: read message</h2><br/>
<?php
// wat is de user id?
$userid = $_SESSION['ID'] ;
// wat is de bericht id
$id = $_GET['id'];

//de user zijn eigen berichten laten ophalen
$pm_SQL="SELECT id,naar,van,admin,status,onderwerp,bericht,tijd FROM pm WHERE naar=$userid AND id=$id";
//nu de SQL opdracht verwerken
$pm_result=mysqli_query($db, $pm_SQL);
// een berichten  weergeven
$pm=mysqli_fetch_array($pm_result);
//variabelen netjes
$id = $pm['id'];
$onderwerp = $pm['onderwerp'];
$admin = $pm['admin'];
$bericht = $pm['bericht'];
$status = $pm['status'];


//de afzender
$id_van = $pm['van'];
//even de van id naar naam omzetten
$van_SQL="SELECT `Naam` FROM gebruiker WHERE idGebruiker=$id_van".";";
$van_result=mysqli_query($db, $van_SQL);
$vanvar=mysqli_fetch_array($van_result);
$un = $vanvar['Naam'];

//de ontvanger
$id_naar = $pm['naar'];
//even de naar id naar naam omzetten
$nvan_SQL="SELECT Naam FROM gebruiker WHERE idGebruiker=$id_naar  ";
$nvan_result=mysqli_query($db, $nvan_SQL);
$nvanvar=mysqli_fetch_array($nvan_result);
$nun = $nvanvar['Naam'];

//even de tijd parsen
$tijd = strtotime($pm['tijd']);
//kopje archief of inbox
if($status==0){ ?>
       <a href="pm_inbox.php"><b>Inbox </b></a><a href="pm_archief.php">Archief </a><a href="pm_send.php">Nieuw bericht</a><br /><br />
       <?php
       }
else{ ?>
       <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"><b>Archief </b></a><a href="pm_send.php">Nieuw bericht</a><br /><br />
       <?php }
//tabel
?>
<table border="1" width="700">
<tr><td width="30%">Ontvanger:</td><td width="70%"><?php echo "$nun"; ?></td></tr>
<tr><td width="30%">Afzender:</td><td width="70%"><?php echo "$un"; ?></td></tr>
<tr><td width="30%">Verstuurd op:</td><td width="70%"><?php echo date("j-n-y H:i",$tijd); ?></td></tr>
<tr><td width="30%">Onderwerp:</td><td width="70%"><?php 
// admin berichten onderscheiden
if($admin==1){
?><b>ADMIN:<?php echo $onderwerp ?></b><?php
}
else{
echo $onderwerp; 
}?></td></tr></table>
<table width="700" border="1">
<tr><td width="700"><?php echo $bericht ?></td></tr>
</table>
<ul>U heeft de volgende opties met dit bericht:
<li><a href="pm_verwerk.php?actie=verwijder&id=<?php echo $id; ?>">Verwijder</a></li>
<?php
if($status==0){ ?>
<li><a href="pm_verwerk.php?actie=archief&id=<?php echo $id; ?>">Archiveer</a></li>
<?php } ?>
</ul>
</div>
</div>