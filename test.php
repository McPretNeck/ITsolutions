<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
	<h1 class="text-center">Product aankoop verzoek</h1>
	<form class="mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
	<?php
		include 'Query.php';
		include 'myFunctions.php';
		$_SESSION["Data"]= getProductens();
		if(isset($_GET["submit"])==false){
		echo (ArrayNaarDataProducten($_SESSION["Data"]));
		}
		else
		{
			for($y=0; $y< sizeof($_SESSION["Data"][0]); $y++)
			{
				if($_GET[$_SESSION["Data"][0][$y]]>0)
				{
					echo "Het product ". $_SESSION["Data"][0][$y] ." is ". $_GET[$_SESSION["Data"][0][$y]] ." keer besteld!<br/>";
					
				}
			}
		}
	?>
	<div align="right" class="pr-5 mt-4 mr-5" >
	<div align="right" class="pr-5 mr-5" >
	<div align="right" class="mr-3" >
	<input class="mb-5 mr-5" type="submit" name="submit" value="Aanvraag opstellen">
	</div>
	</div>
	</div>
	</form>
</div>
</html>