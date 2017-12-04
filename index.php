<?php
	session_start();

	if(isset($_SESSION['usuario'])){
		header('Location: inicio_area_restrita.php');
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
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img id="etec-logo" src="imagens/etec-jga.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li class="">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	            	<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
	            	Entrar
	            	</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Área restrita</h3>
				    		<br />
							<form method="post" action="login_area_restrita.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" required/>
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" required/>
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />
								
							</form>
						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	    	

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Sistema Manutenção</h1>
	        
	        <a class="btn btn-info btn-lg" href="softwares_disponiveis.php" role="button">Softwares disponíveis</a>

	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="js/bootstrap.min.js"></script>
	
	</body>
</html>