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

		.clearfix {
			overflow: auto;
		}

		.table-hover tbody tr:hover {
			background-color: #ebf0fa;
		}

		.opcao_remover {
			color: #b32d00;
		}
		
		.opcao_remover:hover {
			color: #992600;
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

	    	<table class="table table-hover">
	    		<thead>
	    			<tr>
	    				<th width="15%">Software</th>
	    				<th width="65%">Descrição</th>
	    				<th width="10%"></th>
	    				<th width="10%"></th>
	    			</tr>
	    		</thead>

	    		<tbody>
		  <?php
			require_once('db.class.php');

			$objDb = new db();

			$link = $objDb->connect_mysql();

			$sql = "SELECT * FROM softwares_disponiveis ORDER BY nome_software ASC";

			if($result = mysqli_query($link, $sql)) {
				
				if($result) {
					while($data = mysqli_fetch_array($result)){
						echo '<tr>';
					        echo '<td>'.utf8_encode($data['nome_software']).'</td>';
					        echo '<td>'.utf8_encode($data['descricao_software']).'</td>';

					        echo '<td><a href="edita_software.php?id='.utf8_encode($data['id_software']).'"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Editar </a></td>';

					        echo '<td><a href="" class="opcao_remover"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>  Remover </a></td>';
					    echo '</tr>';
					}	
				}	
			} else {
				echo "Erro ao conectar-se ao banco de dados";
			}
		?>
				</tbody>
	    	</table>
	    </div>
	     </div>

	      <div class="clearfix"></div>
		</div>

	    </div>
	
		<script src="js/bootstrap.min.js"></script>
	
	</body>
</html>