<?php
//old
$dbhost="127.0.0.1";
$dbuser="root";
$dbpass="";
$dbname="its";

//new online
//$dbhost="sql7.freemysqlhosting.net";
//$dbuser="sql7273416";
//$dbpass="jZ2kkDeeJ9";
$dbname="sql7273416";

$db= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//test of verbinding werkt:
if(mysqli_connect_errno()){
	die("De verbinding met de database is mislukt".
	mysqli_connect_error()."(".
	mysqli_connect_errno().")");
}
?>