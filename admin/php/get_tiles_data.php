<?php

    include 'connection.php'; 

    if(isset($_POST['action']))
    {


        if ($_POST['action'] == "edit") {
            # code...

            $tile_id = $_POST['tile_id'];
            $tile_image = $_FILES['tile_image'];
            $tile_url = $_POST['tile_url'];

            $check = false;

            $sql;




            if (empty($tile_image['name'])) {

               $sql = "UPDATE tiles SET tile_url = '$tile_url' WHERE tile_id=".$tile_id;

               if ($conn->query($sql) === TRUE) {

                    echo "success";

                } else {

                    echo 'Failed to updated.';

                }

            }
            else {

                $target_dir = "../images/tiles/";
                            
                    // saving and retrieving image path from database
                    $target_path = basename($tile_image['name']); 
                    $target_file = $target_dir . basename($tile_image['name']);

                    $imageFileType = pathinfo($target_path,PATHINFO_EXTENSION);
                    $check = getimagesize($tile_image["tmp_name"]);

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        
                        echo 'Please upload an image (jpg or png only).';
                    }
                    else if ($check[0] != 270 || $check[1] != 132 ) {
                        
                        echo 'Please upload an image of dimentions 270*132.';
                    }
                    else if (file_exists($target_file)) {


                        $sql = "UPDATE tiles SET tile_url = '$tile_url', tile_image = '$target_path' WHERE tile_id=".$tile_id;


                        if ($conn->query($sql) === TRUE) {

                            echo "success";

                        } else {
                            echo 'failed to updated.'.$conn->error;
                        }

                    }
                    else if (move_uploaded_file($tile_image["tmp_name"], $target_file)) 
                    {
                        $sql = "UPDATE tiles SET tile_url = '$tile_url', tile_image = '$target_path' WHERE tile_id=".$tile_id;

                        if ($conn->query($sql) === TRUE) {

                            echo "success";

                        } else {
                            echo 'failed to updated.'.$conn->error;
                        }
                    }
                    else
                    {
                    echo 'Sorry, there was an error uploading your file.';
                    }
            }

        }

    }
    else
    {

        $query = "SELECT * from tiles";
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