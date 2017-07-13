<?php

    include 'connection.php'; 

    if (isset($_POST['action'])) {
        
       if ($_POST['action'] == 'confirm_cancel') {

        $delete_orders = "DELETE FROM user_orders WHERE  order_id = '".$_POST['order_id']."'";

        $delete_details = "DELETE FROM order_details WHERE order_id = '".$_POST['order_id']."'";

        $delete_card_details = "DELETE FROM user_order_card_details WHERE order_id = '".$_POST['order_id']."'";            

        if ($conn->query($delete_sql) && $conn->query($delete_sql) && $conn->query($delete_card_details)) {
        echo "success";
        }
        else
        {
        echo $conn->error;
        }

       }
       else if ($_POST['action'] == 'initiate_cancel') {

           $update_sql = "UPDATE user_orders set cancel_status = 1 WHERE order_id = '".$_POST['order_id']."'";
           if ($conn->query($update_sql)) {
               echo "success";
           }
           else
           {
            echo $conn->error;
           }

       }
    }
    else
    {
        $query = "SELECT order_id,user_email,user_name,billing_address,order_date,shipping_address from user_orders WHERE cancel_status = 1";
        $res = $conn -> query($query);


        $result = array();


        while ($row = $res -> fetch_assoc()) {
            # code...
            $result[] = $row;

        }

        print('{"data":'.json_encode($result).'}');
    }

    $conn->close();

?>