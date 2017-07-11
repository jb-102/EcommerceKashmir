<?php
		
	include '../admin/connection.php';

	if ($_POST['action'] == 'add') {

		$user_email = $_POST['user_email'];
		$item_id = $_POST['item_id'];

		$sql;
		$message;
		$check_sql = $conn -> query("SELECT COUNT(*) FROM user_wishlist WHERE item_id = $item_id and user_email = '$user_email'");

		$data = $check_sql -> fetch_assoc();

		if($data['COUNT(*)'] == 0)
		{
			$sql = "INSERT INTO user_wishlist (item_id,user_email) VALUES ($item_id,'$user_email')";
			$message = "Added To Wishlist.";
		}
		else
		{
			$sql = "DELETE FROM user_wishlist WHERE item_id=$item_id AND user_email='$user_email'";
			$message = "Removed From Wishlist.";
		} 
		

		if ($conn->query($sql)) {
			echo $message;
		}
		else
		{
			echo $conn->error;
		}
	}
	else if ($_POST['action'] == 'getAll') {

		$user_email = $_POST['user_email'];

		$sql = "SELECT item_id FROM user_wishlist WHERE  user_email='$user_email'";

		$result = array();

		$res = $conn->query($sql);
		
		while ($row = $res -> fetch_assoc()) {
			$result[] = $row;
		}


		print(json_encode($result));
	}
	else if ($_POST['action'] == 'checkNumbers') {
				
		$user_email = $_POST['user_email'];

		$sql = "SELECT COUNT(*) FROM user_wishlist WHERE  user_email='$user_email'";

		$result = array();

		$res = $conn->query($sql);
		
		$row = $res -> fetch_assoc();

		echo $row['COUNT(*)'];
	}


?>