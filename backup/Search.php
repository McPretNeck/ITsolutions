<?php 
include 'menu.php';
?>
<div class="container mt-2">
<form action="Search_Query.php" method="post">
	<h3> Zoeken op: </h3>
	<fieldset>
		<table>
			<tr>
				<td align="right">Naam:</td>
				<td align="left">
				<input type="text" name="naam" value="">
			</tr>
			<tr>
				<td align="right">Achternaam:</td>
				<td align="left">
				<input type="text" name="Achternaam"><br></td>
			</tr>
			<tr>
				<td align="right">Kleur:</td>
				<td align="left">
				<select name="Kleur" >
					<option value="">Niet bekend</option>
					<option value="Zwart">Zwart</option>
					<option value="Bruin">Bruin</option>
					<option value="Vos">Vos</option>
					<option value="Schimmel">Schimmel</option>
					<option value="Bont">Bont</option>
				</select>
				<br>
				</td>
			</tr>

			<tr>
				<td align="right"> Sekse: </td>
				<td align="left">
				<input type= "radio" name="geslacht" value="" checked>Niet bekend<br>
				<input type="radio" name="geslacht" value="Ruin"> Ruin<br>
				<input type="radio" name="geslacht" value="Hengst"> Hengst<br>
				<input type="radio" name="geslacht" value="Merrie"> Merrie <br>
				</td>
			</tr>

			<tr>
			<td align="right"> Selecteer moeder:</td>

			<?php include 'db.php';
			//uitvoeren database query
				$query="SELECT*";
				$query.="FROM dieren WHERE Sekse = 'Merrie';";
				$result= mysqli_query($db,$query);
				if(!$result){
					die("Database query failed");}
			//gegevens komen nog niet uit de database
			?>
			<td align= "left">
			<select name="IdMama">
				<option value="">Geen ouder bekend</option>

			<?php
				while($gegevens=mysqli_fetch_assoc($result)){
				echo "<option value=".$gegevens['Stamboom_ID'].">".$gegevens['naam'].','.$gegevens['Achternaam'].','.$gegevens['Kleur'].','.$gegevens['Sekse']."</option>";}
			?>

			</select><br>

			<?php
			//connectie afsluiten
				mysqli_free_result($result);
			//connectie verbreken
				mysqli_close($db);
			?>

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

			<td align= "left">
			<select name="idPapa">
				<option value="">Geen ouder bekend</option>
			<?php
				while($gegevens=mysqli_fetch_assoc($result)){
				echo "<option value=".$gegevens['Stamboom_ID'].">".$gegevens['naam'].','.$gegevens['Achternaam'].','.$gegevens['Kleur'].','.$gegevens['Sekse']."</option>";
			}
			?>
			
			</select><br>
			
			<?php
			//connectie afsluiten
				mysqli_free_result($result);
			//connectie verbreken
				mysqli_close($db);
			?>
			
			</tr>
			<tr>
				<td align="right">
				<input type="submit" name="submit" value="Zoek dier"></td>
			</tr>
		</table>
	</fieldset>
</form>
</div>