<?php
$dbhost="127.0.0.1";
$dbuser="root";
$dbpass="";
$dbname="its";
$db= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//test of verbinding werkt:
if(mysqli_connect_errno()){
	die("De verbinding met de database is mislukt".
	mysqli_connect_error()."(".
	mysqli_connect_errno().")");
}
?>