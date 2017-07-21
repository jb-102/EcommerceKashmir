
<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Checkout Page</title>


  
  <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">

    <!-- CSS FILES -->
    <link href="css/animate.min7edd.css" rel="stylesheet" />
    <link href="css/animate7edd.css" rel="stylesheet" />
    <link href="css/bc.responsive.scss7edd.css" rel="stylesheet" />
    <link href="css/bc.style.scss7edd.css" rel="stylesheet" />
    <link href="css/bc.toggle.scss7edd.css" rel="stylesheet" />
    <link href="css/bootstrap.3x7edd.css" rel="stylesheet" />
    <link href="css/colpick7edd.css" rel="stylesheet" /> 
    <link href="css/jquery-ui7edd.css" rel="stylesheet" />
    <link href="css/jquery.countdown7edd.css" rel="stylesheet" />
    <link href="css/jquery.fancybox-buttons7edd.css" rel="stylesheet" />
    <link href="css/jquery.fancybox7edd.css" rel="stylesheet" />
    <link href="css/jquery.jgrowl7edd.css" rel="stylesheet" />
    <link href="css/jquery.owl.carousel7edd.css" rel="stylesheet" />
    <link href="css/jquery.swiper7edd.css" rel="stylesheet" />
    <link href="css/normalize7edd.css" rel="stylesheet" />
    <link href="css/page7edd.css" rel="stylesheet" />
    <link href="css/swatch7edd.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/bc.global.scss7edd.css" rel="stylesheet" />


    <!-- Bootstrap -->
    <link href="wizard/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="wizard/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="wizard/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">

        <!-- time picker -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.css">

    <!-- bootstrap-daterangepicker -->
    <link href="./allow_me/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="wizard/css/style.css" rel="stylesheet">  

    <!-- My style sheet -->
    <link href="wizard/css/mystyle.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="./allow_me/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="./allow_me/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="./allow_me/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- jQuery library -->
    <script src="wizard/js/jquery.min.js"></script>  

    <!-- gmail platform -->
    <script src="https://apis.google.com/js/api:client.js"></script>


    <!-- facebook js sdk library -->
    <script src="js/facebook.js"></script>



   <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body> 

<?php include("inc/header.php")?>

<div id="main_page_content" >

     <!-- Cart view section -->
     <section id="checkout">
        <div class="container">
           <div class="row">
           <div class="col-md-12">
            <div class="checkout-area">
              <form action="">
                  <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">

                          <li>
                            <a href="#step-2">
                              <span class="step_no" style="width: 140px;border-radius: 0;">Edit Account</span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-3">
                              <span class="step_no" style="width: 140px;border-radius: 0;">Order Details</span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-4">
                              <span class="step_no" style="width: 140px;border-radius: 0;">My Wishlist</span>
                            </a>
                          </li>

                      </ul>

                       


                        <div class="panel-group" id="step-2">

                            <!-- Shipping Address -->
                            <div  class="aa-checkout-billaddress" style="background-color: ghostwhite;">
                              <div class="panel-heading">
                                    <h3 class="text-center">Edit Account</h3>
                              </div>
                              <div id="collapseFour" class="panel-collapse collapse in">

                                <!-- shipping address form -->
                                <div id="shipping_form" class="panel-body" style="padding: 50px;"> 
                                 <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_first_name" value="" required="" readonly="" placeholder="Enter your Name*" class="form-control parsley-success" data-parsley-id="208" /><ul class="parsley-errors-list" id="parsley-id-208"></ul>
                                      </div>                             
                                    </div>

                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="email" id="shipping_email" value="" readonly="" required="" placeholder="Email Address*" class="form-control parsley-success" data-parsley-id="210" /><ul class="parsley-errors-list" id="parsley-id-210"></ul>
                                      </div>                             
                                    </div>
                                  </div> 

                                  <div class="row">

                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="password" id="shipping_tel" value="" data-parsley-minlength="10" data-parsley-maxlength="10" required="" placeholder="New Password*" class="form-control parsley-success" data-parsley-id="211" /><ul class="parsley-errors-list" id="parsley-id-211"></ul>
                                      </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="password" id="shipping_district" value="" placeholder="Confirm password*" required="" class="form-control parsley-success" data-parsley-id="214" /><ul class="parsley-errors-list" id="parsley-id-214"></ul>
                                      </div>                             
                                    </div>
                                  </div> 
                                  <div>
                                    <input type="submit" value="Cancel" class="btn btn-success pull-right" name="">

                                    <input type="submit" value="Submit" class="btn btn-success pull-right" name="" style="margin-right: 5px;">

                                  </div> 

                                </div>
                              </div>
                            </div>

                        </div>


                        <div class="panel-group" id="step-3" style="margin:0;">

                            <!-- Order Summary -->
                            <div class="panel panel-default aa-checkout-odersummary">
                              

                          <div class="box-title">
                              <h3 class="text-center">Order Summary</h3>
                          </div>
                              <div id="collapseFour" class="panel-collapse collapse in">
                              <div class="aa-order-summary-area">
                                <table class="table table-responsive">
                                  <thead>
                                    <tr>
                                      <th>Product</th>
                                      <th>Total</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                    <tr>
                                      <td>M-744 <strong> x  1</strong></td>
                                      <td>RS 46</td>
                                    </tr>

                                                                      </tbody>
                                  <tfoot>
                                    <tr>
                                      <th>Subtotal</th>
                                      <td>RS 46</td>
                                    </tr>
                                     <tr>
                                      <th>Total</th>
                                      <td>RS 48.3</td>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div>
                            </div>

                            <input type="hidden" value="46" id="cc_billing_amount">
                            </div>

                        </div>



                        <div class="panel-group" id="step-4">

                            
                            <!-- Card Details -->
                            <div class="aa-checkout-billaddress">

                        <div class="box-title">
                            <h3 class="text-center">My Wishlist</h3>
                        </div>

                              <div id="collapseOne" class="panel-collapse collapse in">

                                <table class="table">

          <thead>
            <tr>
              <th class="image">Product</th>
              <th class="item">Name</th>
              <th class="price">Price</th>
              <th class="price">Category</th>

            </tr>
          </thead>

          <tbody>


 

            
            <!--Apply CartJS with Rivet.js-->
            
            <!-- rivets: each-item -->
            <tr id="cart_row_1">
              
              <td class="item-image">
                <a href="#">
                   <img src="admin/images/christian1.jpg" alt="image" style="width:100px; height:100px; ">
                </a>
              </td>
              <td class="item-title">
                <a href="/products/hot-com-product-sample?variant=10631504707">
                  <span class="item-name"> Samsung C4 </span>
                </a>
                <p class="item-variant"> <span class="item-variant"></span></p>
              </td>
              <td class="item-price"><span class="money" id="product_price_1" data-currency-usd="$225.00" data-currency="USD">₹8000</span></td>
           

              <td class="item-total"><span class="money" data-currency-usd="$675.00" data-currency="USD"><span id="product_total_1">category name</span></span></td>
              
            </tr>

        </table>


                              </div>
                            </div> 
                        </div>

                  <div class="modal fade" style="top: 35%" id="prompt-success-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" style="width: 400px;">
                            <div class="modal-content">                      
                              <div class="modal-body">
                                <button type="button" id="prompt_close_btn" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <div id="login_div">
                                  <h4><strong>ORDER MESSAGE</strong></h4>
                                  <hr/>
                                  <p>Your order was successfully placed with order id <span id="prompt_order_id">hello world</span></p>
                                </div>
                              </div>                        
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div>

                      </div>
              </form>
             </div>
           </div>
         </div>
       </div>
     </section>
   <!-- / Cart view section -->

   <form id="hidden_form" hidden>

    <input type="text" name="email" value="nubraleisurecamp@gmail.com" />
    <textarea id="full_billing_address" name="billing_address"></textarea>
    <textarea id="full_shipping_address" name="shipping_address"></textarea>
    <textarea id="full_card_details" name="card_details"></textarea>

   </form>
 </div>

<div id="footer">

    <!-- footer -->  
    
    <?php include("inc/footer.php")?>
    <!-- / footer -->

    <!-- Login Modal -->  
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">                      
          <div class="modal-body">
          <button type="button" id="close_login_dialog" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div id="login_div">
              <h4>Login</h4>
              <form id="login_form" class="aa-login-form">
                <input type="hidden" value="login" name="from">
                <label for="email">Email address<span>*</span></label>
                <input type="email" name="email" class="form-control parsley-success" data-parsley-id="101" required="" placeholder="Enter Email"><ul class="parsley-errors-list" id="parsley-id-101"></ul>
                <label for="password">Password<span>*</span></label>
                <input type="password" name="password" class="form-control parsley-success" data-parsley-id="102" required="" placeholder="Password"><ul class="parsley-errors-list" id="parsley-id-102"></ul>
              </form>
              <button class="aa-browse-btn" style="width: 100%;" id="submit_login">Login</button>
              <br/>
              <p class="aa-lost-password"><a id="switchToReset">Lost your password?</a></p>
              <div id="other_signin_text" class="aa-register-now">
                OR SIGN IN WITH
              </div>
              <div>
                  <!-- FACEBOOK BTN -->
                  <div style="display: inline-block;">
                    <fb:login-button id="f_login" data-size="xlarge" scope="public_profile,email" onlogin="checkLoginState()">
                      facebook
                    </fb:login-button>
                  </div>
                  <!-- GMAIL BTN -->
                  <div id="gmail_btn">
                    <span class="icon"></span>
                    <span class="buttonText">Gmail</span>
                  </div>
              </div>
              <div class="aa-register-now">
                Don't have an account?<a id="switchToRegister">Register now!</a>
              </div>
              <div hidden id="error_message_login" style="color: red;" class="aa-register-now">
              </div>
            </div>
            <div hidden id="register_div">
              <h4>Register</h4>
              <form id="register_form" class="aa-login-form">
                <input type="hidden" value="register" name="from">
                <label for="email">Email address<span>*</span></label>
                <input type="email" name="email" class="form-control parsley-success" data-parsley-id="103" required="" placeholder="Enter Email"><ul class="parsley-errors-list" id="parsley-id-103"></ul>
                <label for="fullname">Full Name<span>*</span></label>
                <input type="text" name="fullname" class="form-control parsley-success" data-parsley-id="104" required="" placeholder="Enter Full Name"><ul class="parsley-errors-list" id="parsley-id-104"></ul>
                <label for="password">Password<span>*</span></label>
                <input type="password" name="password" class="form-control parsley-success" data-parsley-id="105" required="" placeholder="Password"><ul class="parsley-errors-list" id="parsley-id-105"></ul>
              </form>
              <button class="aa-browse-btn" style="width: 100%;" id="submit_register">Register</button>
              <br/>
              <div class="aa-register-now">
                do have an account?<a id="switchToLogin">Login!</a>
              </div>
              <div hidden id="error_message_register" style="color: red;" class="aa-register-now">
              </div>
            </div>
            <div hidden id="reset_div">
              <h4>Reset</h4>
              <div hidden id="code_sent_message" style="color: green;">
              </div>
              <form id="reset_form" class="aa-login-form">
                <input type="hidden" value="reset" name="from">
                <label for="email">Email address<span>*</span></label>
                <input type="email" id="reset_email" name="email" class="form-control parsley-success" data-parsley-id="106" required="" placeholder="Enter Email"><ul class="parsley-errors-list" id="parsley-id-106"></ul>
                <label for="new_password">New Password<span>*</span></label>
                <input type="password" name="new_password" class="form-control parsley-success" data-parsley-id="107" required="" placeholder="New Password"><ul class="parsley-errors-list" id="parsley-id-107"></ul>
                <label for="confirm_password">Confirm Password<span>*</span></label>
                <input type="password" name="confirm_password" class="form-control parsley-success" data-parsley-id="108" required="" placeholder="Confirm Password"><ul class="parsley-errors-list" id="parsley-id-108"></ul>
                <label for="confirmation_code">Confirmation Code<span>*</span></label>
                <input type="password" name="confirmation_code" class="form-control parsley-success" data-parsley-id="109" required="" placeholder="Confirmation Code"><ul class="parsley-errors-list" id="parsley-id-109"></ul>
              </form>
              <button class="aa-browse-btn" disabled style="width: 100%;" id="submit_reset">Reset</button>
              <br/>
              <div class="aa-register-now">
                Send Confirmation Code to your email!<a id="generateCode">SEND!</a>
              </div>
              <div hidden id="error_message_reset" style="color: red;" class="aa-register-now">
              </div>
            </div>
          </div>                        
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>  
  </div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="./allow_me/vendors/bootstrap/dist/js/bootstrap.min.js"></script>  

  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="wizard/js/jquery.smartmenus.js"></script>

  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="wizard/js/jquery.smartmenus.bootstrap.js"></script>  

  <!-- Product view slider -->
  <script type="text/javascript" src="wizard/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="wizard/js/jquery.simpleLens.js"></script>

  <!-- slick slider -->
  <script type="text/javascript" src="wizard/js/slick.js"></script>

  <!-- Price picker slider -->
  <script type="text/javascript" src="wizard/js/nouislider.js"></script>
  
  <!-- Custom js -->
  <script src="wizard/js/custom.js"></script> 

  <!-- Parsley -->
  <script src="allow_me/vendors/parsleyjs/dist/parsley.min.js"></script>

    <!-- time picker -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>

  <!-- bootstrap-daterangepicker -->
  <script src="./allow_me/vendors/moment/min/moment.min.js"></script>
  <script src="./allow_me/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- PNotify -->
  <script src="./allow_me/vendors/pnotify/dist/pnotify.js"></script>
  <script src="./allow_me/vendors/pnotify/dist/pnotify.buttons.js"></script>
  <script src="./allow_me/vendors/pnotify/dist/pnotify.nonblock.js"></script>

  <!-- timer script -->
  <script type="text/javascript" src="wizard/js/timer.jquery.js"></script>

  <!-- custom script -->
  <script type="text/javascript" src="wizard/js/my_script.js"></script>

  <!-- jQuery Smart Wizard -->
  <script src="wizard/js/jquery.smartWizard.js"></script>

  </body>
</html>

  




