<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
	<h1 class="text-center">Product aankoop verzoek</h1>
	<form class="mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	<?php
		include 'Query.php';
		include 'myFunctions.php';
		$_SESSION["Data"]= getProductens();
		..
		if(isset($_POST["submit"])==false){
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
			$totaalPrijs = 0;
			
			for($y=0; $y< sizeof($_SESSION["Data"][0]); $y++)
			{
				if($_POST[$_SESSION["Data"][0][$y]]>0)
				{
					//echo "Het product ". $_SESSION["Data"][0][$y] ." is ". $_POST[$_SESSION["Data"][0][$y]] ." keer besteld!<br/>";
					echo ArrayNaarDataProducten2(getProductensByID(intval($_SESSION["Data"][0][$y]),intval($_POST[$_SESSION["Data"][0][$y]])));
					$totaalPrijs = $totaalPrijs + ArrayNaarPrijs(getProductens(),intval($_SESSION["Data"][0][$y]));
				}
			}
			echo "<div style=\"width:600px;\" class=\"mx-auto mt-5\"><h3 class=\"float-center text-center\">De totaal prijs is geworden: €".$totaalPrijs."</h3></div><br/>";
			?>
				<div align="center">
					<input class="mb-5 mx-auto" type="submit" name="submitDB" value="Aanvraag opstellen">
				</div>
			</form>
	<?php
		}
	?>
	
</div>
</html>