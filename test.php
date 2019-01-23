<?php
include 'menu.php';
include 'db.php';
?>
<div class="container mt-2">
	<h1 class="text-center">Product aankoop vervoek</h1>
	<form class="mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
	<?php
		include 'Query.php';
		echo "".getProductens();
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