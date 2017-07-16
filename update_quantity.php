<?php

	include("inc/db.php");
	
    if(isset($_POST['prod_id']))
    {
        $id = $_POST['prod_id'];

        $sql = "UPDATE user_cart set total_quantity +=1  WHERE item_id = $id";
        $data = $con -> query($sql);
        $data = $data -> fetch_assoc();

        print(json_encode($data));

    }

?>