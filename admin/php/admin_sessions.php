<?php

	session_start();

	if (isset($_POST['admin'])) {

		if ($_POST['admin'] == 'login') {

			$_SESSION['logged_in'] = 'admin';
			echo "success";	
			
		}else if ($_POST['admin'] == 'logout') {

			session_unset();
			echo "success";
			
		}
	}

?>