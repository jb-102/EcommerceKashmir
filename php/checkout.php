<?php

	$user_name;

	include '../admin/connection.php';

	if (isset($_POST['billing_address'])) 
	{
		$user_email = $_POST['email'];
		$billing_address = $_POST['billing_address'];
		$shipping_address = $_POST['shipping_address'];
		$user_name = getUserName($user_email);
		$order_id = generateOrderId();
		$check = false;


		$get_item_ids = "SELECT * from user_cart WHERE user_email = '$user_email'";

		$item_ids = $conn -> query($get_item_ids);

		while ($items = $item_ids -> fetch_assoc()) {

			$card_sql = "SELECT item_name,item_price FROM products WHERE item_id = ".$items['item_id'];

			$item_id = $items['item_id']; 

			$item_quantity = $items['total_quantity'];

            $res = $conn->query($card_sql);

            $card_data = $res->fetch_assoc();

            $total_price = ($item_quantity*$card_data['item_price']);
            $item_name =$card_data['item_name'];

            $insert_order_details = "INSERT INTO order_details (order_id, item_id, item_name, item_quantity, total_price) VALUES ('$order_id', $item_id, '$item_name', $item_quantity, $total_price)";

            if ($conn -> query($insert_order_details) === TRUE) {
            	
            	$check = true;

            }
            else
            {
            	$check = false;
            	echo "error details  ".$conn->error;
            	break;
            }

		}

		if ($check) {
			
			$insert_order = "INSERT INTO user_orders (order_id, user_name, user_email, billing_address, shipping_address) 
			VALUES ('$order_id', '$user_name', '$user_email', '$billing_address', '$shipping_address')";

			if ($conn -> query($insert_order) === TRUE) 
			{
				
				if($conn->query("DELETE FROM user_cart WHERE user_email = '$user_email'") === TRUE)
				{

					echo 'success,'.$order_id;

				}
			}
			else
			{
				echo "error order in ".$insert_order."  error:".$conn->error;
			}
		}
	}

	function generateOrderId()
	{
		$username = $GLOBALS['user_name'];
		$id = "ORDER".time();

		$username = explode(" ", $username);

		$username = substr($username[0], (strlen($username[0])/2) , ((strlen($username[0])/2)+1));

		return ($id.$username);
	}

	function getUserName($user_email)
	{

		$select_user = "SELECT user_name FROM user_credentials WHERE user_email = '$user_email'";

		$user = $GLOBALS['conn'] -> query($select_user);

		$user_data = $user -> fetch_assoc();

		return ($user_data['user_name']);
	}

	
?>