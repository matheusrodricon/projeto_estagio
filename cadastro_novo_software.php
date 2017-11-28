<?php
	require_once('db.class.php');

	$msg = false;

	if(isset($_FILES['nome_arquivo'])) {

		$nome_software = utf8_decode($_POST['nome_software']);
		$descricao_software = utf8_decode($_POST['descricao_software']);


		// ARQUIVO DE INSTALAÇÃO
		$arquivo_instalacao = $_FILES['nome_arquivo']['name'];
		$diretorio = "../softwares/";
		move_uploaded_file($_FILES['nome_arquivo']['tmp_name'], $diretorio.$arquivo_instalacao);


		$imagem_software = null;
		
		// ARQUIVO DE IMAGEM (não obrigatório)		
		if(isset($_FILES['nome_imagem']) && strlen($_FILES['nome_imagem']['name']) > 0) {
			$extensao = strtolower(substr($_FILES['nome_imagem']['name'], -4));
			$imagem_software = md5(time()) . $extensao;
			$diretorio = "imagens/";
			move_uploaded_file($_FILES['nome_imagem']['tmp_name'], $diretorio.$imagem_software);
		}

		// PERSISTÊNCIA DOS DADOS NO BD
		$objDb = new db();

		$link = $objDb->connect_mysql();

		$sql = "INSERT INTO softwares_cadastrados(nome_software, descricao_software, nome_arquivo, nome_imagem) values('$nome_software', '$descricao_software', '$arquivo_instalacao', '$imagem_software')";

		if(mysqli_query($link, $sql)) {
			$msg =  "sucesso";
		} else {
			$msg =  "erro";
		}

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
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <a href="index.php">
	        	<img id="etec-logo" src="imagens/etec-jga.png" />
	        </a>
	      </div>
	    </nav>


	    <div class="container">

	    	<?php
	    		if($msg != false) {

	    			if($msg == "sucesso") {
	    				echo '<div class="alert alert-success alert-dismissable">';
	    				echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	    				echo 	'<strong>Sucesso! </strong> Software foi registrado.';
	    				echo '</div>';	
	    			}

	    			if($msg == "erro") {
	    				echo '<div class="alert alert-danger alert-dismissable">';
	    				echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	    				echo 	'<strong>Atenção! </strong> Software não foi registrado. Tente novamente.';
	    				echo '</div>';	
	    			}
	    		}
	    	?>
			
	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <form class="form-horizontal" method="post" action="cadastro_novo_software.php" enctype="multipart/form-data">
				<fieldset>

				<!-- Form Name -->
				<legend>Cadastro de Software</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nome_software">Nome</label>  
				  <div class="col-md-6">
				  <input id="nome_software" name="nome_software" type="text" placeholder="Nome do Software" class="form-control input-md" required>
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nome_arquivo">Arquivo de instalação</label>  
				  <div class="col-md-6">
				  	<input id="nome_arquivo" name="nome_arquivo" type="file" required>
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nome_imagem">Imagem</label>  
				  <div class="col-md-6">
				  	<input id="nome_imagem" name="nome_imagem" type="file">
				   </div>
				</div>



				<!-- Textarea -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="descricao_software">Descrição</label>
				  <div class="col-md-6">                     
				    <textarea class="form-control" id="descricao_software" name="descricao_software" required placeholder="Descrição do Software"></textarea>
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="enviar"></label>
				  <div class="col-md-4">
				    <button id="enviar" name="enviar" class="btn btn-primary">Cadastrar</button>
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