<!DOCTYPE html>

<?php 

  include './php/admin_sessions.php';

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'admin') {

		echo '<script>window.location.href = "dashboard.php";</script>';

	}

?>


<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NEW ECOM | LOGIN</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="resetPassword"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login_form" data-parsley-validate="" >
              <h1>Login Form</h1>
                <input type="hidden" name="from" value="login">
              <div>
                <input type="text" name="username" class="form-control parsley-success" data-parsley-id="101" required="" placeholder="Username"  />
                <ul class="parsley-errors-list" id="parsley-id-101"></ul>
              </div>
              <div>
                <input type="password" name="password" class="form-control parsley-success" data-parsley-id="102" required="" placeholder="Password"  /><ul class="parsley-errors-list" id="parsley-id-102"></ul>
              </div>
              <div>
                <a id="login" class="btn btn-default submit">Log in</a>
                <a id="reset_pass" class="reset_pass" href="#resetPassword">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p style="color: red" hidden id="error_message" class="change_link">username or password incorrect.</p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> NEW ECOM Admin.</h1>
                  <p>©2017 All Rights Reserved. NEW ECOM Admin. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div class="animate form resett_form">
          <section class="login_content">
            <form id="reset_form" data-parsley-validate="" >
              <h1>Reset Account</h1>
                <input type="hidden" name="from" value="reset">
              <div>
                <p>Confirmation code has been sent to your email</p>
              </div>
              <div class="separator"></div>
              <div>
                <input type="text" name="confirmation_code" class="form-control parsley-success" data-parsley-id="103" placeholder="Confirmation Code" required="" /><ul class="parsley-errors-list" id="parsley-id-103"></ul>
              </div>
              <div>
                <input type="password" name="new_password" class="form-control parsley-success" data-parsley-id="104" placeholder="New Password" required="" /><ul class="parsley-errors-list" id="parsley-id-104"></ul>
              </div>
              <div>
                <input type="password" name="confirm_password" class="form-control parsley-success" data-parsley-id="105" placeholder="Confirm Password" required="" /><ul class="parsley-errors-list" id="parsley-id-105"></ul>
              </div>
              <div>
                <a id="reset" class="btn btn-default submit">Reset</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p style="color: red" hidden id="error_message_reset" class="change_link">incorrect confirmation code.</p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> NEW ECOM Admin.</h1>
                  <p>©2017 All Rights Reserved. NEW ECOM Admin. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

  <!-- jQuery -->
  <script src="vendors/datatables.net/media/js/jquery.js"></script> 

  <!-- Parsley -->
  <script src="vendors/parsleyjs/dist/parsley.min.js"></script>

  <script>

    var url = "./php/admin_login_register.php";
    
    $('#reset').click(function() {
      // body...

      if ($('#reset_form').parsley().validate())
      {
        $("#error_message_reset").hide();

        var formData = $("#reset_form").serializeArray();
        $.post(url, formData).done(function (data) {


        	if (data == 'success') 
        	{

        		$.post('./php/admin_sessions.php',{admin:'login'}).done(function(data){

              if (data == 'success') 
              {
                window.location.href = "dashboard.php";
              }
              else
              {
                alert(data);
              }

            });

        	}
        	else 
        	{	
        		$("#error_message_reset").text(data);
        		$("#error_message_reset").slideDown();
        	}

        });
      }

    });

    $('#reset_pass').click(function() {
      // body...
      
      $.post(url, {from:"generateCode"});

    });

    $('#login').click(function() {
      // body...

      if ($('#login_form').parsley().validate())
      {

        $("#error_message").hide();

        var formData = $("#login_form").serializeArray();
        $.post(url, formData).done(function (data) {

          if (data == 'success') 
          {
          	$.post('./php/admin_sessions.php',{admin:'login'}).done(function(data){

              if (data == 'success') 
              {
                window.location.href = "dashboard.php";
              }
              else
              {
                alert(data);
              }

            });
          	
          }
          else
          {
          	$("#error_message").slideDown();
          }

        });
      }

    });

  </script>


</html>
