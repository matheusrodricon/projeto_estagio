<?php
	require_once('db.class.php');

	$nome = $_POST['nome_software'];
	$arquivo = $_POST['nome_arquivo'];
	$descricao = $_POST['descricao_software'];
	$imagem = $_POST['nome_imagem'];

	$objDb = new db();

	$link = $objDb->connect_mysql();

	$sql = "INSERT INTO softwares_disponiveis(nome_software, descricao_software, nome_arquivo, nome_imagem) values('$nome', '$descricao', '$arquivo', '$imagem')";

	if(mysqli_query($link, $sql)) {
		echo "Software registrado com sucesso";
	} else {
		echo "Erro ao registrar novo software";
	}
?>