<?php

	include '../admin/connection.php';

	if (isset($_POST['action'])) {
	
		if ($_POST['action'] == 'remove') {

			$user_email = $_POST['user_email'];
			$item_id = $_POST['item_id'];

			$sql = "DELETE FROM user_cart WHERE item_id=$item_id AND user_email='$user_email'";

			if ($conn->query($sql)) {
				echo 'success';
			}
			else
			{
				echo $conn->error;
			}
		}
		elseif ($_POST['action'] == 'update') {

			$user_email = $_POST['user_email'];
			$item_id = $_POST['item_id'];
			$total_quantity = $_POST['total_quantity'];
			
			$sql = "UPDATE user_cart SET total_quantity = $total_quantity WHERE item_id = $item_id AND user_email = '$user_email'";

			if ($conn->query($sql)) {
				echo 'success';
			}
			else
			{
				echo $conn->error;
			}
		}
		else if ($_POST['action'] == 'getAll') {

			$user_email = $_POST['user_email'];

			$sql = "SELECT item_id FROM user_cart WHERE  user_email='$user_email'";

			$result = array();

			$res = $conn->query($sql);
			
			while ($row = $res -> fetch_assoc()) {
				$result[] = $row;
			}

			print(json_encode($result));
		}
		else if ($_POST['action'] == 'add') {

			$user_email = $_POST['user_email'];
			$item_id = $_POST['item_id'];
			$quantity = $_POST['quantity'];
			$sql;

			$result = $conn->query("SELECT * FROM user_cart WHERE item_id = $item_id AND user_email = '$user_email'");
			if($result->num_rows == 0) {
			    $sql = "INSERT INTO user_cart (item_id,user_email,total_quantity) VALUES ($item_id,'$user_email',$quantity)";
			} else {
			    $sql = "UPDATE user_cart SET total_quantity = total_quantity + $quantity WHERE item_id = $item_id AND user_email = '$user_email'";
			}

			
			if ($conn->query($sql)) {
				$count = $conn->query("SELECT COUNT(*) FROM user_cart WHERE  user_email='$user_email'");
				$count = $count->fetch_assoc();
				echo 'success,'.$count['COUNT(*)'];
			}
			else
			{
				echo $conn->error;
			}
		}
		else if ($_POST['action'] == 'checkNumbers') {

			$user_email = $_POST['user_email'];

			$sql = "SELECT COUNT(*) FROM user_cart WHERE  user_email='$user_email'";

			$res = $conn->query($sql);
			
			$row = $res -> fetch_assoc();

			echo $row['COUNT(*)'];
		}
	}
	
?>