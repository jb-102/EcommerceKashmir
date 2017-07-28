<?php

  include '../admin/connection.php';

  $found = false;
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 


  if ($_POST['from'] == 'login') {
    # code

    $sql = "SELECT * FROM user_credentials";

        $result = $conn -> query($sql);

        while ($row = $result -> fetch_assoc()) {

            if ($_POST['email'] == $row['user_email'] && $_POST['password'] == $row['user_password']) {
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
            echo "Incorrect email or password!";
        }
  }
  elseif ($_POST['from'] == 'register') {


      $email = $_POST['email'];

      $fullname = $_POST['fullname'];

      $password = $_POST['password'];

      $sql = "INSERT INTO user_credentials (user_name,user_email,user_password) VALUES ('$fullname','$email','$password')";

      if ($conn->query($sql) === TRUE) {
        echo "success";
      }
      else
      {
        echo "sorry, unable to register now, try later";
      }     
  }
  elseif ($_POST['from'] == 'gmail') {

    $email = $_POST['email'];

    $fullname = $_POST['fullname'];

    $select_sql = "SELECT user_email from user_credentials";

    $result = $conn -> query($select_sql);

    while ($row = $result -> fetch_assoc()) {
      
      if($email == $row['user_email'])
      {
        $found = true;
        break;
      }

    }
    if ($found) {
      echo "success";
    }
    else
    {
      $sql = "INSERT INTO user_credentials (user_name,user_email,registered_from) VALUES ('$fullname','$email','gmail')";

      if ($conn->query($sql) === TRUE) {

          echo "success";

      }
      else
      {
        echo "sorry, unable to register now, try later".$conn->error;
      }     
    }
  }
  elseif ($_POST['from'] == 'facebook') {

    $email = $_POST['email'];

    $fullname = $_POST['fullname'];

    $select_sql = "SELECT user_email from user_credentials";

    $result = $conn -> query($select_sql);

    while ($row = $result -> fetch_assoc()) {
      
      if($email == $row['user_email'])
      {
        $found = true;
        break;
      }

    }


    if ($found) {
      echo "success";
    }
    else
    {
      $sql = "INSERT INTO user_credentials (user_name,user_email,registered_from) VALUES ('$fullname','$email','facebook')";

      if ($conn->query($sql) === TRUE) {

          echo "success";

      }
      else
      {
        echo "sorry, unable to register now, try later".$conn->error;
      }     
    }
  }
  elseif ($_POST['from'] == 'forgotPassword') {

    $user_email = $_POST['user_email'];

    $sql = "SELECT registered_from from user_credentials WHERE user_email = '$user_email'";

    $result = $conn -> query($sql);

    $result = $result->fetch_assoc();
    $register_email = $result['registered_from'];

    if ($register_email == "" || $register_email == null ) {

      echo "Email is not registered, Please register first!";

    }
    else
    { 
        if($register_email == 'gmail')
        {
          echo 'This email is registered with Google. Please Signin with Google';
        }
        elseif ($register_email == 'facebook') 
        {
          echo 'This email is registered with Facebook. Please Login with Facebook';
        }
        elseif ($register_email == 'mainsite') 
        {
          $ranvalue = getRandom();

          $update_sql = "UPDATE user_credentials SET user_password=$ranvalue WHERE user_email = '$user_email'";

          mail($user_email, "New Password : ". $ranvalue, "Your new auto generated password: " . $ranvalue . "\r\n \r\n \r\n \r\n Please don't reply to this system generated email.", "From: contact@ecommerce.com");


          if ($conn->query($update_sql) === TRUE){

              echo 'success';
          }
          else
          {
              echo "failed";
          }
        }
      
    }
  }
  elseif ($_POST['from'] == 'update') {

    $user_email = $_POST['account_email'];
    $new_password = $_POST['account_password'];
      
    $update_sql = "UPDATE user_credentials SET user_password='$new_password' WHERE user_email = '$user_email'";

    if ($conn->query($update_sql) === TRUE)
    {
      echo 'success';
    }
    else
    {
      echo "Sorry, Failed to change! Try again!".$conn->error;
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