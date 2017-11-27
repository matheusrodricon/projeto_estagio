<?php  
	set_include_path('C:\xampp\htdocs\projeto_estagio');
	require_once('db.class.php');

	// REMOÇÃO DE DADOS NO BD
		$objDb = new db();

		$link = $objDb->connect_mysql();

		$sql = "SELECT id_software_del, nome_arquivo_del, nome_imagem_del from softwares_deletados WHERE data < (NOW() - INTERVAL 10 MINUTE)";
		
		if($result = mysqli_query($link, $sql)) {
			if($result) {
				while($data = mysqli_fetch_array($result)){

					$id_software = utf8_encode($data['id_software_del']);
					$nome_arquivo = utf8_encode($data['nome_arquivo_del']);
					$nome_imagem = utf8_encode($data['nome_imagem_del']);

					echo $nome_arquivo;
					echo "<br>";
					echo $nome_imagem;

					// DELETAR ARQUIVO DE INSTALAÇÃO DA PASTA SOFTWARES
					$diretorio = 'C:\xampp\htdocs\softwares\\';

					$file = $diretorio.$nome_arquivo;
					unlink($file);


					// DELETAR IMAGEM DA PASTA IMAGENS
					$diretorio = 'C:\xampp\htdocs\projeto_estagio\imagens\\';
					$file = $diretorio.$nome_imagem;
					unlink($file);

					// DELETAR INFORMAÇÃO DO BD SOFTWARES DELETADOS
					$sql = "DELETE FROM softwares_deletados WHERE id_software_del = '$id_software'";
					mysqli_query($link, $sql);
				}
			} // fim do if result

		}
		else {
			echo "Erro ao conectar-se ao banco de dados"; // redirecionar para outra página, talvez??
		}
		
?>