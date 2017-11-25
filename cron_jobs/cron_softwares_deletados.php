<?php  
	set_include_path('C:\xampp\htdocs\projeto_estagio');
	require_once('db.class.php');

	// PERSISTÊNCIA DOS DADOS NO BD
		$objDb = new db();

		$link = $objDb->connect_mysql();

		$nome_software = utf8_decode('Testezão');
		$descricao_software = utf8_decode('Teste descrição');
		$nome_arquivo = utf8_decode('arquivo.exe');
		$nome_imagem = utf8_decode('imagem.jpg');
		
		$sql = "INSERT INTO softwares_deletados(nome_software_del, descricao_software_del, nome_arquivo_del, nome_imagem_del) values('$nome_software', '$descricao_software', '$nome_arquivo', '$nome_imagem')";

		if(mysqli_query($link, $sql)) {
			echo "sucesso";
		} else {
			echo "erro";
		}

		/*
		DELETE from softwares_deletados WHERE data < (NOW() - INTERVAL 10 MINUTE);
		*/

?>