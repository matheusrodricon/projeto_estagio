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

		.titulo_software {
			color: blue;
		}

		
		.logo-software {
			min-width : 80px;
			max-width: 100px;
			float: right;
		}

		.clearfix {
			overflow: auto;
		}
		
		.download-software {
			font-size: 2rem;
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
	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	      	<h1>Softwares Disponíveis</h1>
	      	<p>Programas utilizados nos laboratórios de informática.</p>
	      </div>

		  <?php
			require_once('db.class.php');

			$objDb = new db();

			$link = $objDb->connect_mysql();

			$sql = "SELECT * FROM softwares_cadastrados WHERE softwares_cadastrados.id_software NOT IN
		(SELECT softwares_deletados.id_software FROM softwares_deletados) ORDER BY nome_software ASC";

			if($result = mysqli_query($link, $sql)) {
				
				if($result) {
					while($data = mysqli_fetch_array($result)){
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">';
							echo '<h3>'. utf8_encode($data['nome_software']). '</h3>';
						echo '</div>';
						echo '<div class="panel-body">';
							echo '<div class="clearfix">';
								echo '<img class="logo-software" src="imagens/';
								echo utf8_encode($data['nome_imagem']) . '" />';
								
								echo '<h4>' . utf8_encode($data['descricao_software']) . '</h4>';
								echo '<a href="../../softwares/' . utf8_encode($data['nome_arquivo']); 
								echo '" class="download-software" download>';
								echo	'<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>  Download </a>';
							echo '</div>';
						echo '</div>';
						echo '</div>';
					}	
				}	
			} else {
				echo "Erro ao conectar-se ao banco de dados";
			}
		?>
	    </div>
	     </div>

	      <div class="clearfix"></div>
		</div>

	    </div>
	
		<script src="js/bootstrap.min.js"></script>
	
	</body>
</html>