<?php
	require_once('db.class.php');

	$nome = $_POST['nome_software'];
	$local = $_POST['local_software'];
	$descricao = $_POST['descricao_software'];

	$objDb = new db();

	$link = $objDb->connect_mysql();

	$sql = "INSERT INTO softwares_disponiveis(nome_software, descricao_software, local_software) values('$nome', '$descricao', '$local')";

	if(mysqli_query($link, $sql)) {
		echo "Software registrado com sucesso";
	} else {
		echo "Erro ao registrar novo software";
	}
?>