<?php

    include 'connection.php';


    if (isset($_POST['action'])) {

        # code...
        if ($_POST['action'] == "edit") {
            # code...

            $category_id = $_POST['category_id'];

            $category_name = $_POST['category_name'];

            $category_description = $_POST['category_description'];


            $sql_select = "SELECT category_name FROM category WHERE category_id=$category_id";
            $result_select = $conn->query($sql_select);
            $data_select = $result_select->fetch_assoc();
            $old_name = $data_select['category_name'];

            $card_update = "UPDATE cards SET card_category = '$category_name' WHERE card_category = '$old_name'";


            $sql_update = "UPDATE category SET category_name = '$category_name', category_description = '$category_description' WHERE category_id=$category_id";


            if ($conn->query($card_update) === TRUE) {

                if ($conn->query($sql_update) === TRUE) {

                    echo "success";
                }
                else {
                echo 'Failed to updated.'.$conn->error;
                }

            } else {
                echo 'Failed to updated.'.$conn->error;
            }
        }
        else if ($_POST['action'] == "add")
        {

            $category_name = $_POST['category_name'];

            $category_description = $_POST['category_description'];


            $sql = "INSERT into category (category_name,category_description) VALUES ('$category_name','$category_description')";



            if ($conn->query($sql) === TRUE) {

                echo "success";

            }
            else
            {
                echo "Failed to update.";
            }        

            
      }
        

    }else
    {

        $query = "SELECT * from sub_category";

        $res = $conn -> query($query);


        $result = array();
        $options = array();


        while ($row = $res -> fetch_assoc()) {
            # code...
            $result[] = $row;

        }
        
            
        print('{"data":'.json_encode($result).'}');            
            
    }

            $conn->close();

?>
