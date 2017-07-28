
<?php

	session_start();

	if (isset($_POST['user'])) {

		if ($_POST['user'] == 'main') {

			$_SESSION['logged_in'] = 'yes';
			$_SESSION['user'] = $_POST['email'];
			echo 'success';	
			
		}
		else if ($_POST['user'] == 'gmail') {

			$_SESSION['logged_in'] = 'yes';
			$_SESSION['user'] = $_POST['email'];
			echo 'success';
			
		}
		else if ($_POST['user'] == 'facebook') {

			$_SESSION['logged_in'] = 'yes';
			$_SESSION['user'] = $_POST['email'];
			echo 'success';
			
		}
		else if ($_POST['user'] == 'logout') {

	        $_SESSION = array();
	        session_unset();
	        session_destroy();
			echo 'success';
			
		}else if ($_POST['user'] == 'check_session') {

			if (isset($_SESSION['user'])) {
				echo ($_SESSION['user']);
			}
			else
			{
				echo 'false';
			}

		}
	}

?>