<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
	
	<?php
	if(isset($_POST["fToevoegen"]))
	{
		include 'Query.php';
		echo "".$_POST["naam"]."";
		
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
		
	?>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		
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
					<input type="hidden" name="naam" value="<?php echo $_POST["naam"] ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="email">Email </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["email"]."</div>"; ?>
					<input type="hidden" value="<?php echo $_POST["email"] ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="straat">Straatnaam </label>
				</td><td>	
					<?php echo '<div name="straat" class="mb-2" style="text-align:left;">'.$_POST["straat"]."</div>"; ?>
					<input type="hidden" name="email" value="<?php echo $_POST["straat"] ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="huisnummer">Huis nummer </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["huisnummer"]."</div>"; ?>
					<input type="hidden" name="huisnummer" value="<?php echo $_POST["huisnummer"] ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="toevoeging">Toevoeging </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["toevoeging"]."</div>"; ?>
					<input type="hidden" name="toevoeging" value="<?php echo $_POST["toevoeging"] ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="postcode">Postcode </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["postcode"]."</div>"; ?>
					<input type="hidden" name="postcode" value="<?php echo $_POST["postcode"] ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="land">Land </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["land"]."</div>"; ?>
					<input type="hidden" name="land" value="<?php echo $_POST["land"] ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="telefoon">Telefoon </label>
				</td><td>	
					<?php echo '<div class="mb-2" style="text-align:left;">'.$_POST["telefoon"]."</div>"; ?>
					<input type="hidden" name="telefoon" value="<?php echo $_POST["telefoon"] ?>">
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
	</form>
		<?php
		
			}
		
		?>
	
</div>
</html>