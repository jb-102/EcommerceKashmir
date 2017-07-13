<?php

    include './connection.php';


    if (isset($_POST['action'])) {

        # code...
        if ($_POST['action'] == "mainCategories") {
            # code...

            $options = "<option value = '-1' >Select Main Category</option>";

            $sql_select = "SELECT * FROM main_categories";
            $result_select = $conn->query($sql_select);

            
            while ($row = $result_select -> fetch_assoc()) {
                # code...
                $options = $options."<option value='".$row["main_cat_name"]."' >".$row["main_cat_name"]."</option>";

            }

            print($options);
        }
        else if ($_POST['action'] == "itemCategories") {
            # code...

            $value = $_POST['value'];
            $options = "<option value = '-1' >Select a Category</option>";

            $sql_select = "SELECT * FROM category WHERE main_category = '$value'";
            $result_select = $conn->query($sql_select);

            
            while ($row = $result_select -> fetch_assoc()) {
                # code...
                $options = $options."<option value='".$row["cat_name"]."' >".$row["cat_name"]."</option>";

            }

            print($options);
        }
        else if ($_POST['action'] == "itemSubCategories") {
            # code...

            $options = "<option value = '-1' >Select Sub Category</option>";
            $value = $_POST['value'];

            $sql_select = "SELECT * FROM sub_category WHERE sub_cat_parent = '$value'";
            $result_select = $conn->query($sql_select);

            
            while ($row = $result_select -> fetch_assoc()) {
                # code...
                $options = $options."<option value='".$row["sub_cat_name"]."' >".$row["sub_cat_name"]."</option>";

            }

            print($options);
        }
        else if ($_POST['action'] == "mainCategoriesOptions") {
            # code...

            $sql_select = "SELECT * FROM main_categories";
            $result_select = $conn->query($sql_select);

            $options = array();
            $arr['label'] = "Chose your option";
            $arr['value'] = "-1";
            array_push($options, $arr);

            
            while ($row = $result_select -> fetch_assoc()) {
                # code...
                $arr['label'] = $row["main_cat_name"];
                $arr['value'] = $row["main_cat_name"];
                array_push($options, $arr);
            }

            print(json_encode($options));
        }
        else if ($_POST['action'] == "itemCategoriesOptions") {
            # code...

            $sql_select = "SELECT * FROM category;";
            $result_select = $conn->query($sql_select);

            $options = array();
            $arr['label'] = "Chose your option";
            $arr['value'] = "-1";
            array_push($options, $arr);

            
            while ($row = $result_select -> fetch_assoc()) {
                # code...
                $arr['label'] = $row["cat_name"];
                $arr['value'] = $row["cat_name"];
                array_push($options, $arr);

            }

            print(json_encode($options));
        }
        else if ($_POST['action'] == "subCategoriesOptions") {
            # code...

            $sql_select = "SELECT * FROM sub_category;";
            $result_select = $conn->query($sql_select);

            $options = array();
            $arr['label'] = "Chose your option";
            $arr['value'] = "-1";
            array_push($options, $arr);

            
            while ($row = $result_select -> fetch_assoc()) {
                # code...
                $arr['label'] = $row["sub_cat_name"];
                $arr['value'] = $row["sub_cat_name"];
                array_push($options, $arr);

            }

            print(json_encode($options));
        }

    }

    $conn->close();

?>
