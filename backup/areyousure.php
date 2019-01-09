<?php 
	include 'wijzig locaties.php';
	include 'db.php';
?>
	<div class="container mt-2">
<?php
$locatieID=$_GET["idLocatie"];
$query="SELECT * FROM `locatie` WHERE idLocatie=".$_GET["idLocatie"]."";
include 'db.php';
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result)>0){
			echo "<form method= POST>";
			echo "<table border=\"2\">";
				while($row = mysqli_fetch_assoc($result)){ 
				echo "<tr>"; 
				echo "<td>". $row['Straatnaam']  ."</td>"; 
				echo "<td>". $row['Huisnummer'] ."</td>"; 
				echo "<td>". $row['Toevoeging'] ."</td>"; 
				echo "<td>". $row['Postcode']  ."</td>"; 
				echo "<td>". $row['Plaats'] ."</td>";
				echo "<td>". $row['Land'] ."</td>";	
				echo "<td>". $row['Stalnaam'] ."</td>";
				echo "</tr>"; } 	
			echo "</table>";
			echo "</form>";	
}
?>
<form action="<?php echo ($_SERVER["PHP_SELF"]."?idLocatie=$locatieID");?>" method="POST">
<input type="hidden" name="confirm" value="1">
<input type="hidden" name="idLocatie" value="<?php echo($_GET['idLocatie']);?>">
<input type="Submit" value="Verwijder">
</form>
<?php
if(isset($_POST["confirm"])){
    $query="DELETE FROM locatie WHERE idLocatie='".$_POST['idLocatie']."'";
	echo $query."</br>";
	include 'db.php';
    $result= mysqli_query($db,$query) or die(mysqli_error($db));
    echo ("de query die uitgevoerd is:<b>$query</b><br>\n");
    if($result){
        echo("locatie ".$_POST['idLocatie']."is verwijderd.<p>\n");
    }
}
?>
<form>
<input type="button" value="Home" onclick="window.location.href='index.php'"/>
</form>
</div>