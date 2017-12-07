<?php
	require_once('db.class.php');
	
	$id_software = $_GET['id'];

	$msg = false;

	//RECUPERAÇÃO DOS DADOS DO SOFTWARE
	$objDb = new db();

	$link = $objDb->connect_mysql();

	$sql = "SELECT * FROM softwares_cadastrados WHERE id_software = '$id_software'";

	if($result = mysqli_query($link, $sql)) {

		if($result) {
			$data = mysqli_fetch_array($result);

			$nome_software = utf8_encode($data['nome_software']);
			$descricao_software = utf8_encode($data['descricao_software']);
			$nome_arquivo = utf8_encode($data['nome_arquivo']);
			$nome_imagem = utf8_encode($data['nome_imagem']);
		}

	}
	else {
		echo "Erro ao conectar-se ao banco de dados"; // redirecionar para outra página, talvez??
	}


	
	// CASO SEJA REQUISITADA UMA ATUALIZAÇÃO
	isset($_GET['atualiza']) ? $atualiza = $_GET['atualiza'] : $atualiza = '';

	if($atualiza == 'S') {
		$nome_software = utf8_decode($_POST['nome_software']);
		$descricao_software = utf8_decode($_POST['descricao_software']);


		// CASO O USUÁRIO DESEJA ALTERAR O ARQUIVO DO SOFTWARE
		if(isset($_FILES['nome_arquivo']) && strlen($_FILES['nome_arquivo']['name']) > 0) {
			$nome_arquivo_anterior = $nome_arquivo;

			$nome_arquivo =$_FILES['nome_arquivo']['name'];
			$diretorio = "../softwares/";
			move_uploaded_file($_FILES['nome_arquivo']['tmp_name'], $diretorio.$nome_arquivo);

			/* DELETAR O ARQUIVO ANTERIOR */
			$file = $diretorio.$nome_arquivo_anterior;

			unlink($file);	

		}



		// CASO O USUÁRIO DESEJA ALTERAR A IMAGEM DO SOFTWARE
		if(isset($_FILES['nome_imagem']) && strlen($_FILES['nome_imagem']['name']) > 0) {
			$nome_imagem_anterior = $nome_imagem;

			$extensao = strtolower(substr($_FILES['nome_imagem']['name'], -4));
			$nome_imagem = md5(time()) . $extensao;
			$diretorio = "imagens/";
			move_uploaded_file($_FILES['nome_imagem']['tmp_name'], $diretorio.$nome_imagem);


			/* DELETAR A IMAGEM ANTERIOR */
			$file = $diretorio.$nome_imagem_anterior;
			unlink($file);	
		}


		$objDb = new db();

		$link = $objDb->connect_mysql();

		$sql = "UPDATE softwares_cadastrados SET nome_software='$nome_software', descricao_software='$descricao_software', nome_imagem='$nome_imagem', nome_arquivo='$nome_arquivo' WHERE id_software = '$id_software'";

		if(mysqli_query($link, $sql)) {
			$nome_software = $_POST['nome_software'];
			$descricao_software = $_POST['descricao_software'];

			$msg =  "atualizado";
			
		}
		else {
			$msg =  "erro-atualizacao";
		}
		header('Location: /projeto_estagio/tabela_softwares.php?msg='.$msg);
	}

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Sistema manutenção info</title>

		<!-- jquery -->
		<script src="js/jquery-2.2.4.min.js"></script>

		<!-- bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
	
		<script>
			// código javascript						
		</script>

		<style>
		
		#etec-logo {
			padding: 10px;
		}

		</style>

	</head>

	<body>

		<!-- Static navbar -->
	     <?php include("barra_superior.php") ?>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <form class="form-horizontal" method="post" 
	        	<?php echo 'action="edita_software.php?atualiza=S&id=' . $id_software . '"'; ?>
	        enctype="multipart/form-data">
				<fieldset>

				<!-- Form Name -->
				<legend>Atualização de Software</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nome_software">Nome</label>  
				  <div class="col-md-6">
				  <input id="nome_software" name="nome_software" type="text" placeholder="Nome do Software" class="form-control input-md" required
				  	<?php echo 'value="'.$nome_software.'" '; ?>
				  >
				  </div>
				</div>

				<!-- Text input -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nome_arquivo">Atualizar arquivo de instalação</label>  
				  <div class="col-md-6">
				  	<input id="nome_arquivo" name="nome_arquivo" type="file" value="TESTE">
				  </div>
				</div>
				

				<!-- Text input -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nome_imagem">Atualizar imagem</label>  
				  <div class="col-md-6">
				  	<input id="nome_imagem" name="nome_imagem" type="file">
				   </div>
				</div>


				<!-- Textarea -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="descricao_software">Descrição</label>
				  <div class="col-md-6">                     
				    <textarea class="form-control" id="descricao_software" name="descricao_software" required placeholder="Descrição do Software" rows="4"><?php echo $descricao_software;?></textarea>
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="enviar"></label>
				  <div class="col-md-4">
				    <button id="enviar" name="enviar" class="btn btn-info">
				    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
				     Atualizar
					</button>
				    <a href="tabela_softwares.php" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true" ></span> Cancelar</a>
				  </div>
				</div>

				</fieldset>
			</form>

				    
			
			


	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="js/bootstrap.min.js"></script>
	
	</body>
</html>