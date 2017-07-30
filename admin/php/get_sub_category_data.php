<?php

    include 'connection.php';


    if (isset($_POST['action'])) {

        # code...
        if ($_POST['action'] == "edit") {
            # code...

            $sub_cat_id = $_POST['sub_cat_id'];

            $sub_cat_name = $_POST['sub_cat_name'];

            $sub_cat_desc = $_POST['sub_cat_desc'];

            $sub_cat_parent = $_POST['sub_cat_parent'];


            $sql_select = "SELECT sub_cat_name FROM sub_category WHERE sub_cat_id=$sub_cat_id";
            $result_select = $conn->query($sql_select);
            $data_select = $result_select->fetch_assoc();
            $old_name = $data_select['sub_cat_name'];

            $product_update = "UPDATE products SET item_sub_category = '$sub_cat_name', sub_cat_parent = '$sub_cat_parent' WHERE item_sub_category = '$old_name'";


            $sql_update = "UPDATE sub_category SET sub_cat_name = '$sub_cat_name', sub_cat_desc = '$sub_cat_desc' WHERE sub_cat_id=$sub_cat_id";


            if ($conn->query($product_update) === TRUE) {

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

            $sub_cat_name = $_POST['sub_cat_name'];

            $sub_cat_desc = $_POST['sub_cat_desc'];

            $sub_cat_parent = $_POST['sub_cat_parent'];


            $sql = "INSERT into sub_category (sub_cat_name,sub_cat_desc,sub_cat_parent) VALUES ('$sub_cat_name','$sub_cat_desc','$sub_cat_parent')";



            if ($conn->query($sql) === TRUE) {

                echo "success";

            }
            else
            {
                echo "Failed to update.".$conn->error;
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
