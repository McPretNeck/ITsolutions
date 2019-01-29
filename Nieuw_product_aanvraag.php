<?php
	include "menu.php";
	include "db.php";
?>
<div class="container mt-2 mb-5">
<?php
if(isset($_POST['nieuwe_leverancier'])){
?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<h3 align="center"> nieuw product aanvragen </h3>
		<p align="center"> Vul alleen de gegevens voor een leverancier in wanneer de gewenste leverancier niet in de lijst staat</p>
			
			<h4 align="center">Productinformatie</h4>
			
			<fieldset style="text-align:center; align:center;">
			<table align="center" style="text-align:left; align:left;">
			<tr>
			<td>
			
				<label for="productnaam">
					<span> Productnaam: </span>
					</label>
			</td>
			<td>
					<input type="text" id="productnaam" name="productnaam" required>
				
			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="prijs">
					<span> Prijs:      </span>
					</label>
					<div class="float-right text-right"> €      </div>
			</td>
			<td>
					<input type="number" id="prijs" name="productprijs" required>
				
			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="leverancier">
					<span> Leverancier: </span>
				</label>
			</td>
			<td>
					<select type="number"name="leverancier" id="leverancier" >
						<?php
						include 'Query.php';
						include 'myFunctions.php';
						echo dropdownleveranciers();
							
						?>
					</select>
			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="omschijving">
					<span> Omschrijving: </span>
				</label>
			</td>
			
			
			<td>
			
					<textarea name="message" id="message" style="width:300px; height:200px" >
					</textarea>
				
			
			</td>
			</tr>
			<tr>
			<td colspan="2">
			
				<h6 class="text-justify">Vul dit alleen in indien de gewenste leverancier niet in de bovenstaande lijst voorkomt!</h6>
			
			</td>
			</tr>
			
			<tr>
			<td>
			
				<label for="leverancier_nieuw">
					<span> Naam nieuwe leverancier: </span>
					</label>
			</td>
			<td>
					<input type="text" id="leveranciernaam" name="leveranciernaam">
				
			
			</td>
			</tr>
			
			<tr>
			<td>
			
				<label for="adres">
					<span> Straatnaam + nummer:</span>
				</label>
			</td>
			<td>
					<input type="text" id="straatnaam" name="straatnaam"  style="width:60%" >
					<input type="number" id="nummer" name="straatnr" style="width:20%">			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="postcode">
					<span> Postcode: </span>
					</label>
			</td>
			<td>
					<input type="text" id="postcode" name="postcode" pattern="[0-9]{4}[A-Z][{2}" maxlength="6" size="6" >
				
			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="land">
					<span> Land: </span>
				</label>
			</td>
			<td>
					<input type="text" id="land" name="land" >
				
			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="telefoonnummer">
					<span> Telefoonnummer:</span>
					</label>
			</td>
			<td>
					<input type="numbers" id="telnr" name="telnr" pattern="[0-9]{10}" maxlength="10"min="1" max="10" >
				
			
			</td>
			</tr>
			<tr>
			<td>
				<label for="email">
					<span> E-mailadres:</span>
					</label>
			</td>
			<td>
					<input type="text" id="mail" name="mail" pattern="[a-0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}">
			</td>
			</tr>
			<tr>
			<td colspan="2" style="text-align:center; align:center;">
				<input type="submit" name="verstuur" value="Verstuur uw aanvraag">
				
			</td>
			</tr>
			</table>
			</fieldset>
			</form>
<?php
}
elseif(isset($_POST['verstuur'])){
	$product 		=	$_POST["productnaam"];
			$prijs 			=	$_POST["productprijs"];
			$leverancier	=	$_POST["leverancier"];
			$omschrijving	=	$_POST["message"];
			$lever_nieuw	=	$_POST["leveranciernaam"];
			$straat			=	$_POST["straatnaam"];
			if(isset($_POST['straatnr'])){$straatnr		=	$_POST["straatnr"];}
			$postcode		=	$_POST["postcode"];
			$land 			=	$_POST["land"];
			$telnr			=	$_POST["telnr"];
			$email			=	$_POST["mail"];
		
		echo "<h5 align=\"center\">De volgende gegevens worden verstuurd:</h5>";
	?>
	<form>
	<table align="center">
		<tr>
		<th>Aanvraag nieuw product</th>
		</tr>
		
		<tr>
		<td>
			Pruductnaam:
		</td>
		<td>
			<?php echo "$product"; ?>
		</td>
		</tr>
		
		<tr>
		<td>
			Prijs:
		</td>
		<td>
			<?php echo "€$prijs"; ?>
		</td>
		</tr>
		
		<tr>
		<td>
			Omschrijving:
		</td>
		<td>
			<?php echo "$omschrijving"; ?>
		</td>
		</tr>
		
		<tr>
		<td>
			Leverancier:
		</td>
		<td>
			<?php
					if ($_POST["leveranciernaam"])
					{ echo "$lever_nieuw";}
					else
					{ echo "$leverancier";}
			?>
		</td>
		</tr>
		
		<?php
				if ($_POST["leveranciernaam"])
				{ ?>
		<tr>
		<td>
			Straatnaam + huisnummer:
		</td>
		<td>
			<?php echo "$straat";?>
		</td>
		<td>
			<?php echo "$straatnr";?>
		</td>
		</tr>
		
		<tr>
		<td>
			Postcode:
		</td>
		<td>
			<?php echo "$postcode"; ?>
		</td>
		</tr>
		
		<tr>
		<td>
			Land:
		</td>
		<td>
			<?php echo "$land"; ?>
		</td>
		</tr>
		
		<tr>
		<td>
			Telefoonnummer:
		</td>
		<td>
			<?php echo "$telnr"; ?>
		</td>
		</tr>
		
		<tr>
		<td>
			E-mailadres:
		</td>
		<td>
			<?php echo "$email"; ?>
		</td>
		</tr>
	
	<?php } ?>
	<tr>
	<td colspan="2" align="center">
	<br/>
	<input type="submit" name="definitief" value="De gegevens kloppen">
	</td>
	</tr>
	</table>
	</form>
	<?php
}
elseif(isset($_POST['definitief']))
{
	//code voor het versturen van de gegevens
}
else
{
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
		<h3 align="center"> nieuw product aanvragen </h3>
		<p align="center"> Vul alleen de gegevens voor een leverancier in wanneer de gewenste leverancier niet in de lijst staat</p>
			
			<h4 align="center">Productinformatie</h4>
			
			<fieldset style="text-align:center; align:center;">
			<table align="center" style="text-align:left; align:left;">
			<tr>
			<td>
			
				<label for="productnaam">
					<span> Productnaam: </span>
					</label>
			</td>
			<td>
					<input type="text" id="productnaam" name="productnaam" required>
				
			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="prijs">
					<span> Prijs:      </span>
					</label>
					<div class="float-right text-right"> €      </div>
			</td>
			<td>
					<input type="number" id="prijs" name="productprijs" required>
				
			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="leverancier">
					<span> Leverancier: </span>
				</label>
			</td>
			<td>
					<select type="number"name="leverancier" id="leverancier" >
						<?php
						include 'Query.php';
						include 'myFunctions.php';
						echo dropdownleveranciers();
							
						?>
					</select>
			
			</td>
			</tr>
			<tr>
			<td>
			
				<label for="omschijving">
					<span> Omschrijving: </span>
				</label>
			</td>
			
			
			<td>
			
					<textarea name="message" id="message" style="width:300px; height:200px" >
					</textarea>
				
			
			</td>
			</tr>
			<tr>
			<td colspan="2" style="text-align:center; align:center;">
				<input type="submit" name="verstuur" value="Verstuur uw aanvraag">
				<input type="submit" value="ook leverancier toevoegen" name="nieuwe_leverancier">
			</td>
			</tr>
			</table>
			</fieldset>
			</form>
	<?php
}
?>			
			<br/>
			</div>

