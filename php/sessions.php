
<?php

	session_start();

	if (isset($_POST['user'])) {

		if ($_POST['user'] == 'main') {

			$_SESSION['logged_in'] = 'yes';
			$_SESSION['user'] = $_POST['email'];
			echo "success";	
			
		}
		else if ($_POST['user'] == 'gmail') {

			$_SESSION['logged_in'] = 'yes';
			$_SESSION['user'] = $_POST['email'];
			echo "success";
			
		}
		else if ($_POST['user'] == 'facebook') {

			$_SESSION['logged_in'] = 'yes';
			$_SESSION['user'] = $_POST['email'];
			echo "success";
			
		}
		else if ($_POST['user'] == 'logout') {

	        $_SESSION = array();
	        session_unset();
	        session_destroy();
			echo "success";
			
		}else if ($_POST['user'] == 'check_session') {

			// if (isset($_SESSION['user'])) {
			// 	echo ($_SESSION['user']);
			// }
			// else
			// {
			// 	echo 'false';
			// }
			echo "jeel@gmail.com";
			
		}
	}
	else if (isset($_POST['billing_address'])) {
	  $_SESSION['billing_address'] = $_POST['billing_address'];
	  $_SESSION['shipping_address'] = $_POST['shipping_address'];
	  $_SESSION['card_details'] = $_POST['card_details'];
	  $_SESSION['billing_email'] = $_POST['email'];
	}
	elseif (isset($_FILES['labels_file'])) {
		$_SESSION['labels_file'] = $_FILES["labels_file"]["name"];

		if (file_exists("../allow_me/labels/" . $_FILES["labels_file"]["name"]))
		{
		echo $_FILES["labels_file"]["name"] . " already exists. ";
		}
		else
		{
		move_uploaded_file($_FILES["labels_file"]["tmp_name"],"../allow_me/labels/temp/" . $_FILES["labels_file"]["name"]);
		};
	}


?>