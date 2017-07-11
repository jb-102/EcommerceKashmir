<?php

    include 'connection.php'; 

    if(isset($_POST['action']))
    {


        if ($_POST['action'] == "delete") {
            

            $del_sql = "DELETE FROM testimonials WHERE testimonial_id = ".$_POST['testimonial_id'];


            if ($conn->query($del_sql) === TRUE) {
                
                echo "success";

            }
            else
            {
                echo "Failed to upload.".$conn->error;
            }


        }
        else if ($_POST['action'] == "edit") {
            # code...

            $testimonial_id = $_POST['testimonial_id'];
            $customer_name = mysqli_real_escape_string($conn,$_POST['customer_name']);
            $customer_message = mysqli_real_escape_string($conn,$_POST['customer_message']);
            $customer_image = $_FILES['customer_image'];
            $testimonial_on_home = $_POST['testimonial_on_home'];

            $count=0;


            $chk = "SELECT testimonial_on_home,testimonial_id from testimonials";

            $chkres = $conn->query($chk);

            while ($row = $chkres -> fetch_assoc()) {
                # code...
                if (($row['testimonial_on_home'] == 'yes') && ($row['testimonial_id'] != $testimonial_id))
                $count++;
            }


            if ($count == 5 && $testimonial_on_home == 'yes') {

                echo 'Atmost 5 can be published.';

            }
            else if ($count == 2 && $testimonial_on_home == 'no') {

                echo 'Atleat 3 should be published.';
            }
            else
            {
                if (empty($customer_image['name'])) {

                    $sql = "UPDATE testimonials SET customer_name = '$customer_name', customer_message = '$customer_message', testimonial_on_home = '$testimonial_on_home' WHERE testimonial_id=".$testimonial_id;


                    if ($conn->query($sql) === TRUE) {

                       echo "success";

                    } else {

                        echo 'Failed to updated.'.$conn->error;
                    }
                }
                else {

                    $target_dir = "../images/";
                                
                        // saving and retrieving image path from database
                        $target_path = basename($customer_image['name']); 
                        $target_file = $target_dir . basename($customer_image['name']);

                        $imageFileType = pathinfo($target_path,PATHINFO_EXTENSION);
                        $check = getimagesize($customer_image["tmp_name"]);

                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                            
                            echo 'Please upload an image (jpg or png only).';
                        }
                        else if ($check[0] != 150 || $check[1] != 150 ) {

                            echo 'Please upload an image of dimentions 150*150.';
                        }
                        else if (file_exists($target_file)) {

                            

                            $sql = "UPDATE testimonials SET customer_name = '$customer_name', customer_image = '$target_path', customer_message = '$customer_message', testimonial_on_home = '$testimonial_on_home' WHERE testimonial_id=".$testimonial_id;


                            if ($conn->query($sql) === TRUE) {

                                echo "success";

                            } else {
                                echo 'failed to updated.'.$conn->error;
                            }

                        }
                        else if (move_uploaded_file($customer_image["tmp_name"], $target_file)) 
                        {
                            $sql = "UPDATE testimonials SET customer_name = '$customer_name', customer_image = '$target_path', customer_message = '$customer_message', testimonial_on_home = '$testimonial_on_home' WHERE testimonial_id=".$testimonial_id;

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

    }
    else
    {

        $query = "SELECT * from testimonials";
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