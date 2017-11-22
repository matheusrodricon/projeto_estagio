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
	        <img id="etec-logo" src="imagens/etec-jga.png" />
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <form class="form-horizontal" method="post" action="valida_cadastro_novo_software.php">
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
				  <label class="col-md-4 control-label" for="nome_arquivo">Arquivo</label>  
				  <div class="col-md-6">
				  <input id="nome_arquivo" name="nome_arquivo" type="text" placeholder="Ex: arquivo.exe" class="form-control input-md" required>
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nome_imagem">Imagem</label>  
				  <div class="col-md-6">
				  <input id="nome_imagem" name="nome_imagem" type="text" placeholder="Ex: imagem.jpg" class="form-control input-md" required>
				    
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