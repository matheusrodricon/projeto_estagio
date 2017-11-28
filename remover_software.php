<?php
	require_once('db.class.php');

	$msg = false;

	if(!empty($_POST['check_list'])) {
	    foreach($_POST['check_list'] as $id_software) {
			
			$objDb = new db();
			$link = $objDb->connect_mysql();

	        // SELECIONA CADA SOFTWARE A SER DELETADO (BD SOFTWARES DISPONÍVEIS)
			$sql = "INSERT INTO softwares_deletados(id_software) VALUES('$id_software')";

			// VERIFICAR, POIS SE TRATA DE UM LOOP
			if(mysqli_query($link, $sql)) {
				$msg = "sucesso";				
			}
			else {
				$msg = "erro";
			}
	    }
	}

	header('Location: /projeto_estagio/tabela_softwares.php?msg='.$msg);
?>