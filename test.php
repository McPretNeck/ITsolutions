<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<table frame="box" class="ml-auto mr-auto" style="text-align:right;">
		<tbody>
			<tr><td colspan="2" style="text-align:center;">
				<legend>Leveranier gegevens</legend>
			</tr></td>
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
</div>
</html>