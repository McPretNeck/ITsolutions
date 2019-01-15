<?php
include 'menu.php';
include 'db.php';
include 'Query.php';
?>
<div class="container mt-2">
	
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
					<textarea name="message" id="message" style="width:300px; height:200px">
					</textarea>
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
	
</div>
</html>