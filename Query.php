<?php
function insertQuery($query)
{
	include 'db.php';
	$result= mysqli_query($db,$query);
}

?>