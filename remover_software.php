<?php
	require_once('db.class.php');

	$msg = false;

	if(!empty($_POST['check_list'])) {
	    foreach($_POST['check_list'] as $id_software) {
			
			$objDb = new db();
			$link = $objDb->connect_mysql();

	        // SELECIONA CADA SOFTWARE A SER DELETADO (BD SOFTWARES DISPONÍVEIS)
			$sql = "SELECT * FROM softwares_disponiveis WHERE id_software = '$id_software'";

			if($result = mysqli_query($link, $sql)) {

				if($result) {
					$data = mysqli_fetch_array($result);

					$nome_software = utf8_decode(utf8_encode($data['nome_software']));
					$descricao_software = utf8_decode(utf8_encode($data['descricao_software']));
					$nome_arquivo = utf8_decode(utf8_encode($data['nome_arquivo']));
					$nome_imagem = utf8_decode(utf8_encode($data['nome_imagem']));

					// INSERIR VALORES NO BD SOFTWARES DELETADOS
					$sql = "INSERT INTO softwares_deletados(nome_software_del, descricao_software_del, nome_arquivo_del, nome_imagem_del) values('$nome_software', '$descricao_software', '$nome_arquivo', '$nome_imagem')";

					if(mysqli_query($link, $sql)) {
						
						// DELETAR INFORMAÇÃO DO BD SOFTWARES DISPONÍVEIS
						$sql = "DELETE FROM softwares_disponiveis WHERE id_software = '$id_software'";

						if(mysqli_query($link, $sql)) {
							$msg = 'sucesso';
						}

						// arrumar um jeito do dado voltar para o bd, caso aconteça algym erro;

					} else {
						$msg =  "erro";
					}

				}

			}
			else {
				echo "Erro ao conectar-se ao banco de dados";
				$msg = "erro";
			}
	        
	    }
	}

	header('Location: /projeto_estagio/tabela_softwares.php?msg='.$msg);
?>