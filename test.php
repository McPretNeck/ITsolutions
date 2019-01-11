<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
	
	<?php
	if(isset($_POST["fToevoegen"]))
	{
		include 'Query.php';
		$query = "";
		if(strlen($straat)>0){}
		if(strlen($toevoeging)>0){}
		if(strlen($land)>0){}
	}
	elseif(isset($_POST["telefoon"] )!= true){
	?>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		
		<table frame="box" class="ml-auto mr-auto" style="text-align:right;">
		
		<tbody>
			
			<tr>
				<td colspan="2" style="text-align:center;">
					<legend>Leveranier gegevens</legend>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="name">Naam<span style="color:Red;">*</span></label>
				</td><td>
					<input type="text" id="name" name="naam" required> 
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="email">Email<span style="color:Red;">*</span></label>
				</td><td>	
					<input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" required>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="straat">Straatnaam</label>
				</td><td>	
					<input type="text" name="straat" id="straat" placeholder="Zonder huis nummer">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="huisnummer">Huis nummer<span style="color:Red;">*</span></label>
				</td><td>	
					<input type="number" name="huisnummer" id="huisnummer" required>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="toevoeging">Toevoeging</label>
				</td><td>	
					<input type="text" name="toevoeging" id="toevoeging">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="postcode">Postcode<span style="color:Red;">*</span></label>
				</td><td>	
					<input type="text" name="postcode" class="postcode" pattern="[0-9]{4}[A-Z][{2}" placeholder="1234AB" maxlength="6"  required>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="land">Land</label>
				</td><td>	
					<input type="text" name="land" id="land">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="telefoon">Telefoon<span style="color:Red;">*</span></label>
				</td><td>	
					<input type="tel" name="telefoon" id="telefoon" pattern="[0-9]{10}" placeholder="0612345678" maxlength="10" required>
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td style="text-align:left; align:left;">
					<input type="submit" value="Toevoegen" />
				</td>
			</tr>
		
		</tbody>
		
		</table>
		
	</form>
	
	<?php
	}
	else{
		$naam = $_POST["naam"];
		$email = $_POST["email"];
		$straat = $_POST["straat"];
		$huisnr = $_POST["huisnummer"];
		$toevoeging = $_POST["toevoeging"];
		$postcode = $_POST["postcode"];
		$land = $_POST["land"];
		$telefoon =  $_POST["telefoon"];
	?>
	
	<table border="1" class="ml-auto mr-auto" style="text-align:right;">
		
		<tbody>
			
			<tr>
				<td colspan="2" style="text-align:center;">
					<legend>Leveranier gegevens</legend>
					<p>Kloppen de gegevens ?</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="name">Naam </label>
				</td><td>
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["naam"]."</div>"; ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="email">Email </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["email"]."</div>"; ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="straat">Straatnaam </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["straat"]."</div>"; ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="huisnummer">Huis nummer </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["huisnummer"]."</div>"; ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="toevoeging">Toevoeging </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["toevoeging"]."</div>"; ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="postcode">Postcode </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["postcode"]."</div>"; ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="land">Land </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["land"]."</div>"; ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="telefoon">Telefoon </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["telefoon"]."</div>"; ?>
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td style="text-align:left; align:left;">
					<input type="submit" name="fToevoegen" value="Toevoegen" />
				</td>
			</tr>
		
		</tbody>
		
		</table>
		<?php
		
			}
		
		?>
	
</div>
</html>