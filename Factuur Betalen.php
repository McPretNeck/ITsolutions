<?php
// een message moet hier naar verwijzen

include 'db.php';
include 'menu.php';
?>
<form method="post" align="center">
<input name="lnaam" 	value="<?php echo $_POST['lnaam']; ?>" readonly></br>
<input name="gebruiker" value="<?php echo $_POST['gebruiker']; ?>" readonly></br>
<input name="product" 	value="<?php echo $_POST['product']; ?>" readonly></br>
<input name="aantal" 	value="<?php echo $_POST['aantal']; ?>" readonly></br>
<input name="prijs" 	value="<?php echo $_POST['prijs']; ?>" readonly></br>
<input name="totaal" 	value="<?php echo $_POST['totaal']; ?>" readonly></br>
<input type="submit" name="submit" value="betalen Factuur" action="Betalen Factuur.php">
</form>
<?php

// deze pagina moet alleen ter beschikking komen voor de financiën afdeling
?>