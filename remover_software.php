<?php

if(!isset($_SESSION)) {
	session_start(); 
} 

$id_software = $_SESSION['id_software'];
echo $id_software;

session_destroy();


?>