<?php
include("db.php");
include("menu.php");
//veiligheid boven alles
$userid = $_SESSION['ID'] ;

if(isset($_REQUEST['actie'])) $actions=$_REQUEST['actie'];
if($actions=="verstuur"){
//variabelen lezen
$naar = $_POST['naar'];
$van = $_SESSION['ID'];
$status = "0";
$admin = $_POST['admin'];
$onderwerp = $_POST['onderwerp'];
$bericht = $_POST['berichtl'];
$tijd=date("Y-m-d H:i:s");
// enter is enter
$bericht=nl2br($bericht);
//$bericht=eregi_replace("\n","",$bericht);
$PM_insert_SQL="INSERT INTO pm (van,naar,status,admin,onderwerp,tijd,bericht) VALUES ('$van','$naar','$status','$admin', '$onderwerp','$tijd','$bericht')";
$bool=mysqli_query($db, $PM_insert_SQL);
if($bool==1){
?>
        <h2>Personal Message: Sending succesful</h2>
               <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"> Archief </a><a href="pm_send.php"><b>Nieuw bericht</b></a><br /><br />
<br><br>Uw bericht is succesvol verstuurd!
<?php
}
else{ ?>
        <h2>Personal Message: Sending Wrong</h2>
               <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"> Archief </a><a href="pm_send.php"><b>Nieuw bericht</b></a><br /><br />
<br><br>Uw bericht is <b>Niet</b> succesvol verstuurd!
Stuur a.u.b. een mailtje via de contact pagina!
<?php }
}

elseif($actions=="verwijder"){
//variabelen lezen
$id = $_GET['id'];
$naar = $_SESSION['ID'];
//deleten
$PM_delete_SQL="DELETE FROM pm WHERE id=$id AND naar=$naar";
$bool=mysqli_query($db, $PM_delete_SQL);
if($bool==1){
?>
        <h2>Personal Message: Deleting succesful</h2>
               <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"> Archief </a><a href="pm_send.php">Nieuw bericht</a><br /><br />
<br><br>Uw bericht is verwijderd!
<?php
}
else{ ?>
        <h2>Personal Message: deleting Wrong</h2>
               <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"> Archief </a><a href="pm_send.php">Nieuw bericht</a><br /><br />
<br><br>Uw bericht is <b>Niet</b> succesvol verwijderd!
Stuur a.u.b. een mailtje via de contact pagina!
<?php }
}
elseif($actions=="archief"){
//variabelen lezen
$id = $_GET['id'];
$naar = $_SESSION['ID'];
$status = "1";
//archieveren
$PM_a_SQL="UPDATE pm SET status=$status WHERE id=$id AND naar=$naar";
$bool=mysqli_query($db, $PM_a_SQL);
if($bool==1){
?>
        <h2>Personal Message: Archievering succesful</h2>
               <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"> Archief </a><a href="pm_send.php">Nieuw bericht</a><br /><br />
<br><br>Uw bericht is succesvol verplaatst naar het archief!
<?php
}
else{ ?>
        <h2>Personal Message: deleting Wrong</h2>
               <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"> Archief </a><a href="pm_send.php">Nieuw bericht</a><br /><br />
<br><br>Uw bericht is <b>Niet</b> succesvol verplaatst!
<?php }
}
else{ ?>
<h2>Personal Message: What do I have to do? </h2>
       <a href="pm_inbox.php">Inbox </a><a href="pm_archief.php"> Archief </a><a href="pm_send.php">Nieuw bericht</a><br /><br />

De actie is niet aangegeven! Klik op een van de links hierboven!
<?php
}
?>