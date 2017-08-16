<?php

    include 'connection.php'; 

    $query = "SELECT order_id,user_email,user_name,billing_address,order_date,shipping_address from user_orders";
    $res = $conn -> query($query);


    $result = array();

    while ($row = $res -> fetch_assoc()) {
        # code...
        $result[] = $row;

    }

    print('{"data":'.json_encode($result).'}');

    $conn->close();

?>