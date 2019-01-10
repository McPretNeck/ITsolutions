<?php 
	include 'menu.php';
	include 'db.php';
?>
<div class="container mt-2">
<form>
<table class="ml-auto mr-auto" style="text-align:right;">
<tbody>
	<tr>
		<td>Naam:</td>
		<td><input type="text" name="Naam"></td>
	</tr>
	<tr>
		<td>Huisnummer:</td>
		<td><input type="number" name="Huisnr"></td>
	</tr>
	<tr>
		<td>Postcode:</td>
		<td><input type="text" name="Postcode" pattern="[0-9]{4}[A-Z]{2}" placeholder="1234AB"/></td>
		
	</tr>
</tbody>
</table>
</form>
</div>

