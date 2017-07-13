<?php

   include 'connection.php';


    if (isset($_POST['action'])) {

        if ($_POST['action'] == 'edit') {
        

            $slider_id = $_POST['slider_id'];
            $slider_text = $_POST['slider_text'];
            $slider_image = $_FILES['slider_image'];
            $slider_status = $_POST['slider_status'];


            $count=0;

            if ($slider_status == 'unpublished') {
                # code...

                $chk = "SELECT slider_status,slider_id from slider";

                $chkres = $conn->query($chk);

                while ($row = $chkres -> fetch_assoc()) {
                    # code...
                    if (($row['slider_status'] == 'unpublished') && ($row['slider_id'] != $slider_id))
                    {
                        $count++;
                 
                    }
                    
                }

            }

            if ($count < 2) {

                if (empty($slider_image['name'])) {

                    $sql = "UPDATE slider SET slider_text = '$slider_text', slider_status = '$slider_status' WHERE slider_id=".$slider_id;

                    if ($conn->query($sql) === TRUE) {

                        echo "success";

                    } else {
                        echo 'failed to updated.'.$conn->error;
                    }
                }
                else {

                    $target_dir = "../images/slider/";
                                
                    // saving and retrieving image path from database
                    $target_path = basename($slider_image['name']); 
                    $target_file = $target_dir . basename($slider_image['name']);

                    $imageFileType = pathinfo($target_path,PATHINFO_EXTENSION);
                    $check = getimagesize($slider_image["tmp_name"]);

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        
                        echo 'Please upload an image (jpg or png only).';
                    }
                    else if ($check[0] != 960 || $check[1] != 400 ) {

                        echo 'Please upload an image of dimentions 960*400.';
                    }
                    else if (file_exists($target_file)) {

                        $sql = "UPDATE slider SET slider_text = '$slider_text', slider_image = '$target_path', slider_status = '$slider_status' WHERE slider_id=".$slider_id;


                        if ($conn->query($sql) === TRUE) {

                            echo "success";

                        } else {
                            echo 'failed to updated.'.$conn->error;
                        }

                    }
                    else if (move_uploaded_file($slider_image["tmp_name"], $target_file)) 
                    {
                        $sql = "UPDATE slider SET slider_text = '$slider_text', slider_image = '$target_path', slider_status = '$slider_status' WHERE slider_id=".$slider_id;

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
                
            } else{
                 echo 'Atleat 3 should be published!';
            }

        }
        
    }
    else{
        
      $query = "SELECT * from slider";

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
