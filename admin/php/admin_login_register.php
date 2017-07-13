<?php

    include 'connection.php';

    if ($_POST['from'] == 'login') {
        # code...

        $sql = "SELECT * FROM admin_credentials";

        $result = $conn -> query($sql);

        while ($row = $result -> fetch_assoc()) {

            if ($_POST['username'] == $row['admin_username'] && $_POST['password'] == $row['admin_password']) {
                $found = true;
                break;
            }

        }

        if ($found) {
            # code...
            echo "success";
        }
        else {
            # code...
            echo "failure";
        }

    }
    elseif ($_POST['from'] == 'reset') {
        # code...

        if($_POST['new_password'] == $_POST['confirm_password'])
        {
            $sql = "SELECT confirmation_code from admin_credentials";

            $result = $conn -> query($sql);

            while ($row = $result -> fetch_assoc()) {

                if ($_POST['confirmation_code'] == $row['confirmation_code']) 
                {
                    $update_sql = "UPDATE admin_credentials SET admin_password='".$_POST['new_password']."'";
                    if ($conn->query($update_sql) === TRUE){

                        echo "success";

                    }
                    else
                    {

                        echo "sorry, couldn't reset password, try again".$conn->error;

                    }

                    
                }
                else
                {
                    echo "incorrect confirmation code"; 
                }

                break;
            }

        }
        else
        {
            echo "passwords doesn't match";
        }

    }
    elseif ($_POST['from'] == 'generateCode') {
        # code...


        $ranvalue = getRandom();


        $update_sql = "UPDATE admin_credentials SET confirmation_code=$ranvalue";

        $select_sql = "SELECT admin_email from admin_credentials"; 

        $result = $conn -> query($select_sql);

        while ($row = $result -> fetch_assoc()) {

            mail($row['admin_email'], "Confirmation Code from Kashmir Trend : ". $ranvalue, "Your Confirmation code is : " . $ranvalue . "\r\n \r\n \r\n \r\n Please don't reply to this system generated email.", "From: contact@kashmirtrend.com");

        }

        if ($conn->query($update_sql) === TRUE){

            echo $ranvalue;

        }
        else
        {
            echo "failed";
        }

    }


    function getRandom()
    {
        $a = 0;
        for ($i = 0; $i<6; $i++) 
        {
            $a .= mt_rand(0,9);
        }

        $a .= time();
        $val = substr($a, 3,5);
        $val = $val * mt_rand(81, 7340);
        return substr($val, 2, 4);
    }

    $conn->close();

?>