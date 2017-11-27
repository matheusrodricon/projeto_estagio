<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Sistema manutenção info</title>

		<!-- jquery -->
		<script src="js/jquery-2.2.4.min.js"></script>
			
		<!-- jquery ui -->
		<link rel="stylesheet" href="css/jquery-ui.min.css">
  		<script src="js/jquery-ui.min.js"></script>

  		<!-- bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
	
		<script>
		 $( function() {
		    $("#dialog").dialog({
		     autoOpen: false,
		     minWidth: 450,
		     modal: true,
		     buttons : {
		          "Excluir todos os itens" : function() {
		              $('#form_delete').submit();            
		          },
		          "Cancelar" : function() {
		            $(this).dialog("close");
		          }
		        }
		      });

		  $("#callConfirm").on("click", function(e) {
		      e.preventDefault();
		      $("#dialog").dialog("open");
		  });
	  	});
		</script>

		<script>
		$(document).ready(function(){

			$delete_button = $('#callConfirm'); 
			$checkbox = $('input[type=checkbox]');

	   		$checkbox.on('click', function(){
	   			$linha_selecionada = $(this.closest("td")).parent(); 	

	   			$delete_button.prop('disabled', true);

	   			if(this.checked === true) {
	   				$linha_selecionada.css('background-color', '#ffe6e6');
	   			} else {
	   				$linha_selecionada.removeAttr("style");
	   			}

	   			$checkbox.each(function() {
	   				if(this.checked === true) {
	   					$delete_button.removeAttr("disabled");
	   				}
	   			});
	   		});

	   		
	   		// ADICIONAR CLASSE CORRETA PARA O BOTÃO CLOSE
	   		$close_btn = $('.ui-dialog-titlebar-close');
	   		$close_btn.removeClass().addClass('ui-button ui-corner-all ui-widget ui-button-icon-only ui-dialog-titlebar-close');
	   		$close_btn.attr("title", "Close");
	   		$close_btn.append('<span class="ui-button-icon ui-icon ui-icon-closethick"></span><span class="ui-button-icon-space"> </span>Close');

	   		
	   		// BARRA DE SUCESSO PARA A REMOÇÃO DE ITENS (3000 = 3 SEGUNDOS)
	   		$("#success-alert").fadeTo(3000, 500).fadeOut(800, function(){
   				$("#success-alert").fadeOut(800);
			});
			
		});
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
	    		isset($_GET['msg']) ? $msg = $_GET['msg'] : $msg = false;

	    		if($msg != false) {

	    			if($msg == "sucesso") {
	    				echo '<div class="alert alert-success alert-dismissable" id="success-alert">';
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

	    	<form id="form_delete" action="remover_software.php" method="POST">
		    	<table class="table table-hover">
		    		<thead>
		    			<tr>
		    				<th width="15%">SOFTWARE</th>
		    				<th width="70%">DESCRIÇÃO</th>
		    				<th width="10%"></th>
		    				<th width="5%"></th>
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
						        echo '<td><strong>'.utf8_encode($data['nome_software']).'</strong></td>';
						        echo '<td>'.utf8_encode($data['descricao_software']).'</td>';

						        echo '<td><a href="edita_software.php?id='.utf8_encode($data['id_software']).'"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Editar </a></td>';

						        echo '<td>
						        		<input type="checkbox" name="check_list[]"
						        		value="'.utf8_encode($data['id_software']).'">
						        	</td>';
						    echo '</tr>';
						}	
					}	
				} else {
					echo "Erro ao conectar-se ao banco de dados";
				}
			?>
					</tbody>
		    	</table>

		    	<button class="btn btn-danger pull-right" id="callConfirm" disabled>Excluir itens</button>

		    </form> <!-- fim do form-->

		    <div id="dialog" title="Confirma exclusão">
			  Você está certo disto?
			</div>

	    </div>
	     </div>

	      
		</div>

	    </div>
	
		<script src="js/bootstrap.min.js"></script>
	
	</body>
</html>