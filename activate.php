<?php

  include '../admin/connection.php';
  session_start();
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 


  if (isset($_GET['id'])) {
    # code

    $sql = "UPDATE user_credentials SET status=1 WHERE user_email = '".$_GET['id']."'";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['logged_in'] = 'yes';
      $_SESSION['user'] = $_POST['email'];
      echo "<script>alert('Congrats! Your account has been activated'); window.location = 'index.php'</script>";
    } else {
      echo "<script>alert('Sorry! Please Try again'); window.location = 'index.php'</script>";
    }
    
  }

  $conn->close();

?>