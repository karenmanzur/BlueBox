<?php

$server = "a2plcpnl0414.prod.iad2.secureserver.net" ;
$db = "bluebox";
$user = "ieyc21ti2pr3";
$password = "sjz3kD-EOI"; 
$mysqli = new mysqli($server, $user, $password, $db);
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}






 ?>