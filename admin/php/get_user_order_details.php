<?php

    include 'connection.php'; 

    $query = "SELECT * from user_order_card_details";
        $res = $conn -> query($query);


        $result = array();


        while ($row = $res -> fetch_assoc()) {
            # code...
            $result[] = $row;

        }

        print('{"data":'.json_encode($result).'}');

    $conn->close();

?>