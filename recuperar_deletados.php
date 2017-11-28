<?php

	require_once('db.class.php');

	$msg = false;

	$objDb = new db();

	$link = $objDb->connect_mysql();

	$sql = "DELETE FROM softwares_deletados WHERE data > (NOW() - INTERVAL 10 MINUTE);";

	if(mysqli_query($link, $sql)) {
		$msg = "remocao-desfeita";
	} else {
		$msg = "erro";
	}

	header('Location: /projeto_estagio/tabela_softwares.php?msg='.$msg);

?>