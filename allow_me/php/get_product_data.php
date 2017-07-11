<?php

    include 'connection.php';
    include 'smart_resize_image.function.php';


    if (isset($_POST['action'])) {


        # code...
        if ($_POST['action'] == "edit") {
            # code...

            $item_id = $_POST['item_id'];
            $item_name = $_POST['item_name'];
            $item_desc = $_POST['item_desc'];
            $item_price = $_POST['item_price'];
            $item_main_category = $_POST['item_main_category'];
            $item_category = $_POST['item_category'];
            $item_sub_category = $_POST['item_sub_category'];
            $item_ist_view = $_FILES['item_ist_view'];
            $item_2nd_view = $_FILES['item_2nd_view'];
            $item_3rd_view = $_FILES['item_3rd_view'];
            $item_4th_view = $_FILES['item_4th_view'];
            $item_color = $_POST['item_color'];
            $item_size = $_POST['item_size']; 
            $is_popular = $_POST['is_popular'];


            $error_message = ""; 
            $image_ist_flag = true;
            $image_2nd_flag = true;
            $image_3rd_flag = true;
            $image_4th_flag = true; 

            $main_query = "UPDATE products SET item_name = '$item_name', item_desc = '$item_desc', item_price = '$item_price', is_popular = '$is_popular', item_color = '$item_color', item_size = '$item_size', ";

            $old_details = $conn->query("SELECT * from products WHERE item_id = $item_id");

            $old_details = $old_details -> fetch_assoc();
           

            if (!empty($item_ist_view['name']) && $error_message == "") {

                $target_dir = "../images/items/ist_image/";
                        
                // saving and retrieving image path from database
                $target_path = basename($item_ist_view['name']); 
                $target_file = $target_dir . 'main/' . basename($item_ist_view['name']);
                $tile_file = $target_dir . 'tiles/' . basename($item_ist_view['name']);
                $thumb_file = $target_dir . 'thumbnails/' . basename($item_ist_view['name']);                

                $imageFileType = pathinfo($target_path,PATHINFO_EXTENSION);
                $check = getimagesize($item_ist_view['tmp_name']);

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    
                    $error_message = 'Please upload an main image (jpg or png only).';
                }
                else if ($check[0] != 900 || $check[1] != 1024 ) {

                    $error_message = 'Please upload an main image of dimentions 900*1024.';
                }
                else if (file_exists($target_file)) {

                    $main_query = $main_query."item_ist_view = '$target_path', ";

                }
                else if (move_uploaded_file($item_ist_view["tmp_name"], $target_file)) 
                {
                    $main_query = $main_query."item_ist_view = '$target_path', ";

                    smart_resize_image($target_file , null, 250 , 300 , false , $tile_file , false , false ,100 );

                    smart_resize_image($target_file , null, 150 , 150 , false , $thumb_file , false , false ,100 );
                }
                else
                {
                    $image_ist_flag = false;
                }
            }

            if (!empty($item_2nd_view['name']) && $error_message == "") {
                
                $target_dir = "../images/items/2nd_image/";
                        
                // saving and retrieving image path from database
                $target_path = basename($item_2nd_view['name']); 
                $target_file = $target_dir . 'main/' . basename($item_2nd_view['name']);
                $tile_file = $target_dir . 'tiles/' . basename($item_2nd_view['name']);
                $thumb_file = $target_dir . 'thumbnails/' . basename($item_2nd_view['name']); 

                $imageFileType = pathinfo($target_path,PATHINFO_EXTENSION);
                $check = getimagesize($item_2nd_view['tmp_name']);

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    
                    $error_message = 'Please upload an front image (jpg or png only).';
                }
                else if ($check[0] != 900 || $check[1] != 1024 ) {

                    $error_message = 'Please upload an front image of dimentions 900*1024.';
                }
                else if (file_exists($target_file)) {

                    $main_query = $main_query."item_2nd_view = '$target_path', ";

                }
                else if (move_uploaded_file($item_2nd_view["tmp_name"], $target_file)) 
                {
                    $main_query = $main_query."item_2nd_view = '$target_path', ";

                    smart_resize_image($target_file , null, 250 , 300 , false , $tile_file , false , false ,100 );

                    smart_resize_image($target_file , null, 150 , 150 , false , $thumb_file , false , false ,100 );
                }
                else
                {
                    $image_2nd_flag = false;
                }
            }

            if (!empty($item_3rd_view['name']) && $error_message == "") {

                $target_dir = "../images/items/3rd_image/";
                        
                // saving and retrieving image path from database
                $target_path = basename($item_3rd_view['name']); 
                $target_file = $target_dir . 'main/' . basename($item_3rd_view['name']);
                $tile_file = $target_dir . 'tiles/' . basename($item_3rd_view['name']);
                $thumb_file = $target_dir . 'thumbnails/' . basename($item_3rd_view['name']); 

                $imageFileType = pathinfo($target_path,PATHINFO_EXTENSION);
                $check = getimagesize($item_3rd_view['tmp_name']);

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    
                    $error_message = 'Please upload an content image (jpg or png only).';
                }
                else if ($check[0] != 900 || $check[1] != 1024 ) {

                    $error_message = 'Please upload an content image of dimentions 900*1024.';
                }
                else if (file_exists($target_file)) {

                    $main_query = $main_query."item_3rd_view = '$target_path', ";

                }
                else if (move_uploaded_file($item_3rd_view["tmp_name"], $target_file)) 
                {
                    $main_query = $main_query."item_3rd_view = '$target_path', ";

                    smart_resize_image($target_file , null, 250 , 300 , false , $tile_file , false , false ,100 );

                    smart_resize_image($target_file , null, 150 , 150 , false , $thumb_file , false , false ,100 );
                }
                else
                {
                    $image_3rd_flag = false;
                }  
            }

            if (!empty($item_4th_view['name']) && $error_message == "") {

                $target_dir = "../images/items/4th_image/";
                        
                // saving and retrieving image path from database
                $target_path = basename($item_4th_view['name']); 
                $target_file = $target_dir . 'main/' . basename($item_4th_view['name']);
                $tile_file = $target_dir . 'tiles/' . basename($item_4th_view['name']);
                $thumb_file = $target_dir . 'thumbnails/' . basename($item_4th_view['name']);

                $imageFileType = pathinfo($target_path,PATHINFO_EXTENSION);
                $check = getimagesize($item_4th_view['tmp_name']);

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    
                    $error_message = 'Please upload an back image (jpg or png only).';
                }
                else if ($check[0] != 900 || $check[1] != 1024 ) {

                    $error_message = 'Please upload an back image of dimentions 900*1024.';
                }
                else if (file_exists($target_file)) {

                    $main_query = $main_query."item_4th_view = '$target_path', ";

                }
                else if (move_uploaded_file($item_4th_view["tmp_name"], $target_file)) 
                {
                    $main_query = $main_query."item_4th_view = '$target_path', ";

                    smart_resize_image($target_file , null, 250 , 300 , false , $tile_file , false , false ,100 );

                    smart_resize_image($target_file , null, 150 , 150 , false , $thumb_file , false , false ,100 );
                }
                else
                {
                    $image_4th_flag = false;
                } 
            }


            if ($error_message != "") {
                echo ($error_message);
            }
            else if ($image_ist_flag && $image_2nd_flag && $image_3rd_flag && $image_4th_flag) {
                
                if ($old_details['item_main_category'] != $item_main_category) {

                    if (change_main_stock($old_details['item_main_category'],$item_main_category)) {
                         
                        $main_query = $main_query."item_main_category = '$item_main_category', ";
                    }
                }

                if ($old_details['item_category'] != $item_category) {

                    if (change_category_stock($old_details['item_category'],$item_category)) {
                         
                        $main_query = $main_query."item_category = '$item_category', ";
                    }
                }

                if ($old_details['item_sub_category'] != $item_sub_category) {

                    if (change_sub_stock($old_details['item_sub_category'],$item_sub_category)) {
                         
                        $main_query = $main_query."item_sub_category = '$item_sub_category', ";
                    }
                }


                $main_query = rtrim($main_query,", ");
                $main_query = $main_query." WHERE item_id = $item_id";

                if ($conn->query($main_query) === TRUE) {
                    echo 'success';
                }
                else
                {
                    echo "Failed to update!";
                }
            }
            else
            {
                echo "Sorry, Failed to update";
            }

        }
        elseif ($_POST['action'] == "delete") 
        {

            $sql = "DELETE from products WHERE item_id=".$_POST['item_id'];

            if ($conn->query($sql) === TRUE) {

                echo "success";

            }
            else {
                echo  "Failed to upload.".$conn->error;
            }

        }          
    }
    else
    {

            $query = "SELECT * from products";

            $res = $conn -> query($query);


            $result = array();



            while ($row = $res -> fetch_assoc()) {

                $result[] = $row;

            }
            
            print('{"data":'.json_encode($result).'}');

        }

    function change_main_stock($old_category,$new_category)
    {

        $old = $GLOBALS['conn'] -> query("UPDATE main_categories SET main_cat_stock = main_cat_stock - 1 WHERE  main_cat_name = '$old_category'");
        $new = $GLOBALS['conn'] -> query("UPDATE main_categories SET main_cat_stock = main_cat_stock + 1 WHERE  main_cat_name = '$new_category'");

        return ($old && $new);
    }

    function change_category_stock($old_category,$new_category)
    {

        $old = $GLOBALS['conn'] -> query("UPDATE category SET cat_stock = cat_stock - 1 WHERE  cat_name = '$old_category'");
        $new = $GLOBALS['conn'] -> query("UPDATE category SET cat_stock = cat_stock + 1 WHERE  cat_name = '$new_category'");

        return ($old && $new);
    }

    function change_sub_stock($old_category,$new_category)
    {

        $old = $GLOBALS['conn'] -> query("UPDATE sub_category SET sub_cat_stock = sub_cat_stock - 1 WHERE  sub_cat_name = '$old_category'");
        $new = $GLOBALS['conn'] -> query("UPDATE sub_category SET sub_cat_stock = sub_cat_stock + 1 WHERE  sub_cat_name = '$new_category'");

        return ($old && $new);
    }


    $conn->close();

?>