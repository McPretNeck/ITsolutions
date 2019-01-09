<?php 
	
	include 'menu.php';
	include 'db.php';
?>
	<div class="container mt-2">
<?php
	
$query="SELECT * FROM `locatie`";
$result = mysqli_query($db, $query);
			echo "<form method= POST>";
			echo "<table border=\"2\">";
				while($row = mysqli_fetch_assoc($result)){ 
				echo "<tr>"; 
				echo "<td>". $row['idLocatie']  ."</td>";
				echo "<td>". $row['Straatnaam']  ."</td>"; 
				echo "<td>". $row['Huisnummer'] ."</td>"; 
				echo "<td>". $row['Toevoeging'] ."</td>"; 
				echo "<td>". $row['Postcode']  ."</td>"; 
				echo "<td>". $row['Plaats'] ."</td>";
				echo "<td>". $row['Land'] ."</td>";	
				echo "<td>". $row['Stalnaam'] ."</td>";
				echo "<td> <a href=\"wijzig.php?idLocatie=".$row['idLocatie']."\">Wijzig</a></td>";
				echo "<td> <a href=\"areyousure.php?idLocatie=".$row['idLocatie']."\">Verwijder</a></td>";
				echo "</tr>"; } 
			echo "</table>";
			echo "</form>";
	
	
mysqli_free_result($result);
mysqli_close($db);

?>








