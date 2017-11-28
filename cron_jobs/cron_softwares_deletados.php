<?php  
	set_include_path('C:\xampp\htdocs\projeto_estagio');
	require_once('db.class.php');

	// REMOÇÃO DE DADOS NO BD
		$objDb = new db();

		$link = $objDb->connect_mysql();

		$sql = "SELECT id_software, nome_arquivo, nome_imagem FROM softwares_cadastrados
				WHERE softwares_cadastrados.id_software IN
					(SELECT softwares_deletados.id_software 
						FROM softwares_deletados 
						WHERE data < (NOW() - INTERVAL 10 MINUTE));";
		
		if($result = mysqli_query($link, $sql)) {
			if($result) {
				while($data = mysqli_fetch_array($result)){

					$id_software = utf8_encode($data['id_software']);
					$nome_arquivo = utf8_encode($data['nome_arquivo']);
					$nome_imagem = utf8_encode($data['nome_imagem']);

					// DELETAR ARQUIVO DE INSTALAÇÃO DA PASTA SOFTWARES
					$diretorio = 'C:\xampp\htdocs\softwares\\';
					$file = $diretorio.$nome_arquivo;
					unlink($file);

					// DELETAR IMAGEM DA PASTA IMAGENS
					$diretorio = 'C:\xampp\htdocs\projeto_estagio\imagens\\';
					$file = $diretorio.$nome_imagem;
					unlink($file);

					// DELETAR INFORMAÇÃO DO BD SOFTWARES DELETADOS
					$sql = "DELETE FROM softwares_deletados WHERE id_software = '$id_software'";
					mysqli_query($link, $sql);

					// DELETAR INFORMAÇÃO DO BD SOFTWARES CADASTRADOS
					$sql = "DELETE FROM softwares_cadastrados WHERE id_software = '$id_software'";
					mysqli_query($link, $sql);
				}
			} // fim do if result

		}
		else {
			echo "Erro ao conectar-se ao banco de dados"; //
		}
		
?>