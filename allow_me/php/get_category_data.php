<?php

    include 'connection.php';


    if (isset($_POST['action'])) {

        # code...
        if ($_POST['action'] == "edit") {
            # code...

            $cat_id = $_POST['cat_id'];

            $cat_name = $_POST['cat_name'];

            $cat_desc = $_POST['cat_desc'];

            $main_category = $_POST['main_category'];


            $sql_select = "SELECT cat_name FROM category WHERE cat_id=$cat_id";
            $result_select = $conn->query($sql_select);
            $data_select = $result_select->fetch_assoc();
            $old_name = $data_select['cat_name'];


            $product_update = "UPDATE products SET item_category = '$cat_name', item_main_category = '$main_category'  WHERE item_category = '$old_name'";

            $subCatUpdate = "UPDATE sub_category SET sub_cat_parent = '$cat_name' WHERE sub_cat_parent = '$old_name'";


            $sql_update = "UPDATE category SET cat_name = '$cat_name', cat_desc = '$cat_desc', main_category = '$main_category' WHERE cat_id=$cat_id";


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

            $cat_name = $_POST['cat_name'];

            $cat_desc = $_POST['cat_desc'];

            $main_category = $_POST['main_category'];


            $sql = "INSERT into category (cat_name,cat_desc,main_category) VALUES ('$cat_name','$cat_desc','$main_category')";



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

        $query = "SELECT * from category";

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
