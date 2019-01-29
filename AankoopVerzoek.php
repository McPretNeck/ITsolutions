<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
	<h1 class="text-center">Product aankoop verzoek</h1>
	<?php
		include 'Query.php';
		include 'myFunctions.php';
		if(isset($_POST["submitDB"]))
		{
			$x=$_SESSION["Data"];
			
			//uitvoeren Query om in de database te plaatsen.
			$Bestelnummer = toevoegenBestelling($x,$_POST["Reden"]);
			
			echo "<div class=\"px-5 mx-auto text-left\" style=\"width:65%;\"><p>Beste, ".$_SESSION["naam"]."</p><p>Uw bestelling ".$Bestelnummer." is aan gemaakt en zal zo snel mogelijk verwerkt worden.</p><br/><p>Vriendelijke groet,</p><p>IT aankoop team</p>";
			
			//Hier code plaatsen om een bericht te versturen
			$manager = false;
			
			for($y=0; $y< sizeof($_SESSION["Data"][0]); $y++)
			{
				
					if(ArrayNaarPrijs(getProductens(),intval($_SESSION["Data"][0][$y]))>500){
						$manager = true;
					}
			}
			SentPMaankoopverzoek($Bestelnummer,$manager,$_POST["Reden"]);
			unset($_SESSION["Data"]);
		}
		elseif(isset($_POST["submit"])==false){
			?><form class="mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"><?php
			$_SESSION["Data"]= getProductens();
		echo (ArrayNaarDataProducten($_SESSION["Data"]));
		?>
				<div align="center" class="mt-4" >
					<input class="mb-5 mx-auto" type="submit" name="submit" value="Aanvraag opstellen">
				</div>
			</form>
	<?php
		}
		else
		{
			?><form class="mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"><?php
			$_SESSION["Data"]= getProductens();
			$totaalPrijs = 0;
			
			for($y=0; $y< sizeof($_SESSION["Data"][0]); $y++)
			{
				if($_POST[$_SESSION["Data"][0][$y]]>0)
				{
					$totaalPrijs = $totaalPrijs + ArrayNaarPrijs(getProductens(),intval($_SESSION["Data"][0][$y]));
					ArrayNaarArray(getProductensByID(intval($_SESSION["Data"][0][$y]),intval($_POST[$_SESSION["Data"][0][$y]])));
					
				}
			}
			
			$x=array($_SESSION["PID"],$_SESSION["a"]);
			unset($_SESSION["Data"]);
			$_SESSION["Data"]=$x;
			
			unset($_SESSION["PID"]);
			unset($_SESSION["a"]);
			
			echo "<div style=\"width:600px;\" class=\"mx-auto mt-3\"><h3 class=\"float-center text-center\">De totaal prijs is geworden: €".$totaalPrijs."</h3></div>"?>
			<div align="center">
					<h5>Vul uw reden voor deze aankoop hieronder in.</h5>
					<textarea class="mx-auto" rows="5" cols="60" name="Reden"></textarea>
				</div>
				<div align="center">
					<input class="mt-4 mx-auto" type="submit" name="submitDB" value="Aanvraag opstellen">
				</div>
			<?php
			for($y=0; $y< sizeof($_SESSION["Data"][0]); $y++)
			{
				if($_POST[$_SESSION["Data"][0][$y]]>0)
				{
					//echo "Het product ". $_SESSION["Data"][0][$y] ." is ". $_POST[$_SESSION["Data"][0][$y]] ." keer besteld!<br/>";
					echo ArrayNaarDataProducten2(getProductensByID(intval($_SESSION["Data"][0][$y]),intval($_POST[$_SESSION["Data"][0][$y]])));
					
				}
			}
			?>
			</form>
	<?php
		}
	?>
	
</div>
</html>