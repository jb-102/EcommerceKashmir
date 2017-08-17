
<!DOCTYPE html>
<?php session_start(); ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    
    <meta name="description" content="kashmirtrends.com is a kashmir based ecommerce website.The Best Online Shopping Site for Kashmiri Products. " />
<meta name="keywords" content="kashmirtrends.com, kashmirtrend.com, kashmirtrends, kashmirtrend, estore ,  sports , electronics , kiryana , regular food items , baby care and toys , hardware , cleaning supplies , grocery and staples , non-veg items, clothes, cheap clothes, kashmir art, camera" />
<title>:: Welcome to Kashmirtrends.com , clothes , jeans , grocery , kashmir art , cosmetics ::</title>
  
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


    <!-- Main style sheet -->
    <link href="./css/style.css" rel="stylesheet">  

    <!-- My style sheet -->
    <link href="./css/mystyle.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="./admin/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="./admin/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="./admin/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- jQuery library -->
    <script src="./js/jquery.min.js"></script>  

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

<?php 
  include("inc/header.php");
  include("inc/db.php");
?>

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
                            <a href="#step-1">
                              <span class="step_no">1</span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-2">
                              <span class="step_no">2</span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-3">
                              <span class="step_no">3</span>
                            </a>
                          </li>
                      </ul>

                        <div class="panel-group" id="step-1">

                            
                            <!-- Billing Details -->
                            <div class="panel panel-default aa-checkout-billaddress">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a class="text-center">
                                    Billing Details
                                  </a>
                                </h4>
                              </div>

                              <div id="collapseThree" class="panel-collapse collapse in">

                            

                                <!-- user billing addresses -->
                              

                              
                                <!-- billing address form -->
                                <div id="billing_form" class="panel-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="billing_name" value="" required="" placeholder="First Name*" class="form-control parsley-success" data-parsley-id="200" /><ul class="parsley-errors-list" id="parsley-id-200"></ul>
                                      </div>                             
                                    </div>
                                  </div> 
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="email" id="billing_email" value="" required="" placeholder="Email Address*" class="form-control parsley-success" data-parsley-id="202" /><ul class="parsley-errors-list" id="parsley-id-202"></ul>
                                      </div>                             
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="number" id="billing_tel" value="" data-parsley-minlength="10" data-parsley-maxlength="10" required="" placeholder="Phone(without '91')*" class="form-control parsley-success" data-parsley-id="203" /><ul class="parsley-errors-list" id="parsley-id-203"></ul>
                                      </div>
                                    </div>
                                  </div> 
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="aa-checkout-single-bill">
                                        <textarea id="billing_address" required="" class="form-control parsley-success" data-parsley-id="204" placeholder="Address*" rows="3"></textarea><ul class="parsley-errors-list" id="parsley-id-204"></ul>
                                      </div>                             
                                    </div>                            
                                  </div>   
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="billing_landmark" value="" required="" placeholder="LandMark*" class="form-control parsley-success" data-parsley-id="2761" /><ul class="parsley-errors-list" id="parsley-id-2761"></ul>
                                      </div>                              
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="billing_district" value="" required="" placeholder="District*" class="form-control parsley-success" data-parsley-id="206" /><ul class="parsley-errors-list" id="parsley-id-206"></ul>
                                      </div>                             
                                    </div>
                                  </div>                                   
                                </div>
                              </div>
                            </div>

                        </div>


                        <div class="panel-group" id="step-2">

                            <!-- Shipping Address -->
                            <div  class="panel panel-default aa-checkout-billaddress">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a class="text-center">
                                    Shippping Address
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFour" class="panel-collapse collapse in">

                                <!-- user shipping addresses -->

                              
                                <!-- shipping address form -->
                                <div id="shipping_form" class="panel-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_name" value="" required="" placeholder="First Name*" class="form-control parsley-success" data-parsley-id="208" /><ul class="parsley-errors-list" id="parsley-id-208"></ul>
                                      </div>                             
                                    </div>
                                  </div> 
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="email" id="shipping_email" value="" required="" placeholder="Email Address*" class="form-control parsley-success" data-parsley-id="210" /><ul class="parsley-errors-list" id="parsley-id-210"></ul>
                                      </div>                             
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="number" id="shipping_tel" value="" data-parsley-minlength="10" data-parsley-maxlength="10" required="" placeholder="Phone(without '91')*" class="form-control parsley-success" data-parsley-id="211" /><ul class="parsley-errors-list" id="parsley-id-211"></ul>
                                      </div>
                                    </div>
                                  </div> 
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="aa-checkout-single-bill">
                                        <textarea id="shipping_address" required="" placeholder="Address*" class="form-control parsley-success" data-parsley-id="212" rows="3"></textarea><ul class="parsley-errors-list" id="parsley-id-212"></ul>
                                      </div>                             
                                    </div>                            
                                  </div>   
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_landmark" value="" placeholder="Landmark*" required="" class="form-control parsley-success" data-parsley-id="2144" /><ul class="parsley-errors-list" id="parsley-id-2144"></ul>
                                      </div> 
                                    </div>  
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_district" value="" placeholder="District*" required="" class="form-control parsley-success" data-parsley-id="214" /><ul class="parsley-errors-list" id="parsley-id-214"></ul>
                                      </div> 
                                    </div>
                                  </div>                
                                </div>
                              </div>
                            </div>

                        </div>


                        <div class="panel-group" id="step-3">

                            <!-- Order Summary -->
                            <div class="panel panel-default aa-checkout-odersummary">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a>
                                    Order Summary 
                                  </a>
                                </h4>
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
                                    <?php 

                                        $sql = "SELECT * FROM user_cart WHERE user_email = 'jeel@gmail.com'";
                                        $result = $con->query($sql);

                                        $total=0;
                                        $sub_total=0;

                                        while ($row = $result->fetch_assoc()) {

                                          $quantity = $row['total_quantity'];

                                          $card_sql = "SELECT item_name,item_price FROM products WHERE item_id = ".$row['item_id'];

                                          $res = $con->query($card_sql);

                                          $card_data = $res->fetch_assoc();

                                          $sub_total = ($quantity*$card_data['item_price']);

                                          $total = $total + $sub_total;

                                    ?>

                                    <tr>
                                      <td><?= $card_data['item_name']?> <strong> x  <?= $quantity?></strong></td>
                                      <td>RS <?= $sub_total ?></td>
                                    </tr>

                                    <?php 
                                      }
                                    ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th>Subtotal</th>
                                      <td>RS <?= $total ?></td>
                                    </tr>
                                     <tr>
                                      <th>Total</th>
                                      <td>RS <?= $total ?></td>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div>
                            </div>

                            </div>

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
    <input type="text" name="email" value="jeel@gmail.com" />
    <textarea id="full_billing_address" name="billing_address"></textarea>
    <textarea id="full_shipping_address" name="shipping_address"></textarea>
   </form>
 </div>

<div id="footer">

    <!-- footer -->  
    
    <?php include("inc/footer.php");?>
    <!-- / footer -->

  </div>

<!-- Include all compiled plugins (below), or include individual files as needed -->

  <!-- PNotify -->
  <script src="./admin/vendors/pnotify/dist/pnotify.js"></script>
  <script src="./admin/vendors/pnotify/dist/pnotify.buttons.js"></script>
  <script src="./admin/vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Parsley -->
  <script src="admin/vendors/parsleyjs/dist/parsley.min.js"></script>

  <!-- custom script -->
  <script type="text/javascript" src="./js/custom_script.js"></script>

  <!-- jQuery Smart Wizard -->
  <script src="./js/jquery.smartWizard.js"></script>

  </body>
</html>

  




