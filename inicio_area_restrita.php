<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php');
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
		$(document).ready(function(){
			$("#inicio").addClass("active");
		});
		</script>

		<style>
		
		
		</style>

	</head>

	<body>

		<!-- Static navbar -->
	    <?php include("barra_superior.php") ?>


	    <div class="container">
	      <div class="row">
	      	<div class="col-md-2">
	      		<?php include('barra_lateral.php') ?>
	      	</div>
	      	<div class="col-md-10">
	      		<div class="jumbotron">
	      			<h1>Sistema Manutenção</h1>
	      			<p>Softwares utilizados em laboratórios</p>
	        	</div>
	    	</div>
	      </div>	

	      <div class="clearfix"></div>
		</div>

		<script src="js/bootstrap.min.js"></script>
	
	</body>
</html>