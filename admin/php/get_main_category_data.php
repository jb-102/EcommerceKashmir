<?php

    include 'connection.php';


    if (isset($_POST['action'])) {

        # code...
        if ($_POST['action'] == "edit") {
            # code...

            $main_cat_id = $_POST['main_cat_id'];

            $main_cat_name = $_POST['main_cat_name'];

            $main_cat_desc = $_POST['main_cat_desc'];


            $sql_select = "SELECT main_cat_name FROM main_categories WHERE main_cat_id=$main_cat_id";
            $result_select = $conn->query($sql_select);
            $data_select = $result_select->fetch_assoc();
            $old_name = $data_select['main_cat_name'];

            $product_update = "UPDATE products SET item_main_category = '$main_cat_name' WHERE item_main_category = '$old_name'";


            $subCatUpdate = "UPDATE category SET main_category = '$main_cat_name' WHERE main_category = '$old_name'";


            $sql_update = "UPDATE main_categories SET main_cat_name = '$main_cat_name', main_cat_desc = '$main_cat_desc' WHERE main_cat_id=$main_cat_id";


            if ($conn->query($product_update) === TRUE && $conn->query($subCatUpdate) === TRUE) {

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

            $main_cat_name = $_POST['main_cat_name'];

            $main_cat_desc = $_POST['main_cat_desc'];


            $sql = "INSERT into main_categories (main_cat_name,main_cat_desc) VALUES ('$main_cat_name','$main_cat_desc')";



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

        $query = "SELECT * from main_categories";

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
