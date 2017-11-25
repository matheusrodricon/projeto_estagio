<?php
	if(!empty($_POST['check_list'])) {
	    foreach($_POST['check_list'] as $check) {
	        echo $check. '<br>';
	    }
	}
?>