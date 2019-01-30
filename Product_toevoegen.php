<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
	
	<?php
	if(isset($_POST["query"]))
	{
		include 'Query.php';
		toevoegenProduct($_POST["naam"], $_POST["prijs"], trim($_POST["message"]), $_POST["leverancier"]);
		echo "<p style=\"text-align:center;\"> Product ".$_POST["naam"]." is toegevoegt!</p>";
		echo "<form style=\"text-align:Center;\" class=\"ml-auto mr-auto\" action=\"Product_toevoegen.php\" method=\"POST\">";
		echo "<div style=\"text-align:Center;\" class=\"ml-auto mr-auto\"><input style=\"text-align:Center;\"  	class=\"ml-auto mr-auto\" name=\"reload\" type=\"submit\" value=\"Nog een toevoegen\" /></div></form>";
	}
	elseif(isset($_POST["naam"])){
	
	?>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		
		<table frame="box" class="ml-auto mr-auto" style="text-align:right;">
		
		<tbody>
			
			<tr>
				<td colspan="2" style="text-align:center;">
					<legend>Product toevoegen</legend>
					<p style="text-align:center;">Controleer de gegevens!</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="name">Naam<span style="color:Red;">*</span></label>
				</td><td>
					<input type="text" id="name" name="naam" value="<?php echo "".$_POST["naam"]; ?>" disabled>
					<input type="hidden" name="naam" value="<?php echo "".$_POST["naam"]; ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="prijs">Prijs<span style="color:Red;">*</span></label>
				</td><td>	
					<span>€ </span><input type="number" value="<?php echo "". $_POST["prijs"];?>" name="prijs" id="prijs" disabled>
					<input type="hidden" name="prijs" value="<?php echo "".$_POST["prijs"]; ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="leverancier">Leverancier<span style="color:Red;">*</span></label>
				</td><td>				
					<select type="number"name="leverancier" id="leverancier" disabled>
						<?php
						include 'Query.php';
						include 'myFunctions.php';
						echo ("".leverancierByID($_POST["leverancier"]));
							
						?>
					</select>
					<input type="hidden" name="leverancier" value="<?php echo "".$_POST["leverancier"]; ?>">
				</td>
			</tr>
			
			<tr>
				
				<td colspan="2" style="text-align:center;">
					<label class="mb-0" for="message">Omschrijving</label>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">	
					<textarea name="message" id="message" style="width:300px; height:200px" disabled>
					<?php 
					echo "".$_POST["message"];
					?>
					</textarea>
					<input type="hidden" name="message" value="<?php echo "".trim($_POST["message"]); ?>">
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td style="text-align:left; align:left;">
					<input name="query" type="submit" value="Toevoegen" />
				</td>
			</tr>
		
		</tbody>
		
		</table>
		
	</form>
	<?php
	}
	else
	{
	?>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		
		<table frame="box" class="ml-auto mr-auto" style="text-align:right;">
		
		<tbody>
			
			<tr>
				<td colspan="2" style="text-align:center;">
					<legend>Product toevoegen</legend>
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
					<label for="prijs">Prijs<span style="color:Red;">*</span></label>
				</td><td>	
					<span>€ </span><input type="number" min="0.00" step="0.01" name="prijs" id="prijs" required>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="leverancier">Leverancier<span style="color:Red;">*</span></label>
				</td><td>				
					<select type="number"name="leverancier" id="leverancier" required>
						<?php
							include 'Query.php';
							include 'myFunctions.php';
							echo dropdownleveranciers();
						?>
					</select>
				</td>
			</tr>
			
			<tr>
				
				<td colspan="2" style="text-align:center;">
					<label class="mb-0" for="message">Omschrijving</label>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">	
					<textarea name="message" id="message" style="width:300px; height:200px"></textarea>
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
	
	<?php } ?>
</div>
</html>