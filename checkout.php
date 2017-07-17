
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
                          <li>
                            <a href="#step-4">
                              <span class="step_no">4</span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-5">
                              <span class="step_no">5</span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-6">
                              <span class="step_no">6</span>
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
                                  <hr>
                                </h4>
                                <div class="address_single add_address" style="margin: 0 auto">
                                            <i class="fa fa-plus-circle fa_plus" aria-hidden="true" ></i>
                                            <div>
                                            <span></span>
                                              ADD ADDRESS
                                            </div>
                                        </div>
                              </div>

                              <div id="collapseThree" class="panel-collapse collapse in">

                            

                                <!-- user billing addresses -->
                              

                              
                                <!-- billing address form -->
                                <div id="billing_form" class="panel-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="billing_first_name" value="" required="" placeholder="First Name*" class="form-control parsley-success" data-parsley-id="200" /><ul class="parsley-errors-list" id="parsley-id-200"></ul>
                                      </div>                             
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="billing_last_name" value="" required="" placeholder="Last Name*" class="form-control parsley-success" data-parsley-id="201" /><ul class="parsley-errors-list" id="parsley-id-201"></ul>
                                      </div>
                                    </div>
                                  </div> 
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" name="billing_company_name" value="" class="form-control" placeholder="Company name">
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
                                        <input type="text" id="billing_appartment" value="" class="form-control" placeholder="Appartment, Suite etc.">
                                      </div>                             
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="billing_city" value="" required="" placeholder="City / Town*" class="form-control parsley-success" data-parsley-id="205" /><ul class="parsley-errors-list" id="parsley-id-205"></ul>
                                      </div>
                                    </div>
                                  </div>   
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="billing_district" value="" required="" placeholder="District*" class="form-control parsley-success" data-parsley-id="206" /><ul class="parsley-errors-list" id="parsley-id-206"></ul>
                                      </div>                             
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="number" data-parsley-minlength="6" value="" data-parsley-maxlength="6" id="billing_pincode" required="" placeholder="Pincode / ZIP*" class="form-control parsley-success" data-parsley-id="207" /><ul class="parsley-errors-list" id="parsley-id-207"></ul>
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
                                  <a>
                                    Shippping Address
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFour" class="panel-collapse collapse in">


                                <div id="shipping_address_message" class="panel-body">
                                  <div>Please select/add a shipping address below or check below if it's the same as your billing address.</div>
                                  <hr/>
                                  <div><input type="checkbox" id="sameAsBilling"> Same As Billing</div>
                                </div>

                                <!-- user shipping addresses -->
                              <div id="shipping_addresses" class="panel-body set_addresses">
                                  
                                <!-- add bill address -->
                                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="address_single add_address">
                                          <div class="add_address_div" style="margin-bottom: 10%; margin-top: 10%;">
                                            <i class="fa fa-plus-circle fa_plus" aria-hidden="true" ></i>
                                            <div>
                                              ADD ADDRESS
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                              </div>

                              
                                <!-- shipping address form -->
                                <div id="shipping_form" class="panel-body">
                                 <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_first_name" value="" required="" placeholder="First Name*" class="form-control parsley-success" data-parsley-id="208" /><ul class="parsley-errors-list" id="parsley-id-208"></ul>
                                      </div>                             
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_last_name" value="" required="" placeholder="Last Name*" class="form-control parsley-success" data-parsley-id="209" /><ul class="parsley-errors-list" id="parsley-id-209"></ul>
                                      </div>
                                    </div>
                                  </div> 
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_company_name" value="" class="form-control" placeholder="Company name">
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
                                        <input type="text" id="shipping_appartment" value="" placeholder="Appartment, Suite etc.">
                                      </div>                             
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_city" value="" required="" placeholder="City / Town*" class="form-control parsley-success" data-parsley-id="213" /><ul class="parsley-errors-list" id="parsley-id-213"></ul>
                                      </div>
                                    </div>
                                  </div>   
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="text" id="shipping_district" value="" placeholder="District*" required="" class="form-control parsley-success" data-parsley-id="214" /><ul class="parsley-errors-list" id="parsley-id-214"></ul>
                                      </div>                             
                                    </div>
                                    <div class="col-md-6">
                                      <div class="aa-checkout-single-bill">
                                        <input type="number" id="shipping_pincode" value="" data-parsley-minlength="6" data-parsley-maxlength="6" required="" placeholder="Pincode / ZIP*" class="form-control parsley-success" data-parsley-id="215" /><ul class="parsley-errors-list" id="parsley-id-215"></ul>
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
                            <div class="panel panel-default aa-checkout-billaddress">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a>
                                    Card Details
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse in">

                                <div id="card_details_div" >
                                  <div class="card_details_sub_div with_padding" style="" id="card_details_header" >
                                    <div> 
                                      MRS. & MR. <input type="text" placeholder="Your Name" id="card_details_mr_mrs" required="" class="parsley-success" data-parsley-id="301" /><ul class="parsley-errors-list" id="parsley-id-301"></ul> <br/>
                                    cordially invites you to grace and bless the auspecious invitation of the marriage 
                                      of their
                                    </div>
                                    <div>
                                      <input type="radio" checked name="marriage_of" value="son(s)" class="card_details_marriage_of"> Son(s) 
                                      <input type="radio" name="marriage_of" value="daughter(s)" class="card_details_marriage_of"> Daughter(s) 
                                      <input type="radio" name="marriage_of" value="both" class="card_details_marriage_of"> Both 
                                      <input type="radio" name="marriage_of" value="other" class="card_details_marriage_of"> Other 
                                      <input type="text" value="son(s)" hidden id="card_details_marriage_of_value" required="" class="parsley-success" data-parsley-id="300" /><ul class="parsley-errors-list" id="parsley-id-300"></ul>
                                    </div>
                                    <div id="card_details_couples_div" >
                                      <div>
                                        <div class="couples_div_inline">
                                          <input type="text" placeholder="Your Son" class="card_details_marriage_of_name" id="card_details_marriage_of_name_1" required="" class="parsley-success" data-parsley-id="302" /><ul class="parsley-errors-list" id="parsley-id-302"></ul>
                                        </div>
                                        <div class="couples_div_inline"> with </div>
                                        <div class="couples_div_inline">
                                          <input type="text" class="card_details_marriage_with_name" placeholder="Your daughter-in-law" id="card_details_marriage_with_name_1" required="" class="parsley-success" data-parsley-id="303" /><ul class="parsley-errors-list" id="parsley-id-303"></ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div>
                                      <a class="aa-browse-btn" data-count="1" id="card_details_add_couple" >ADD ANOTHER</a>
                                    </div>
                                    <div>
                                    <span id="card_details_marriage_with" >daughters(s) </span>of <input type="text" id="card_details_marraige_with_fathers_name" required="" class="parsley-success" data-parsley-id="304" /><ul class="parsley-errors-list" id="parsley-id-304"></ul> respectively.
                                    </div>
                                  </div>
                                  <hr/>
                                  <div class="card_details_sub_div with_padding" id="card_details_address_div" >
                                    <div>
                                      at there residence
                                    </div>
                                    <div>
                                      <textarea rows="6" cols="30" id="card_details_residence" required="" class="parsley-success" data-parsley-id="305"></textarea><ul class="parsley-errors-list" id="parsley-id-305"></ul>
                                    </div>
                                    <div>
                                      as per program
                                    </div>
                                  </div>
                                  <hr/>
                                  <div class="card_details_sub_div" id="card_details_function_div" >
                                    <table id="card_details_function_table">
                                      <thead>
                                        <tr>
                                          <th>REMOVE</th>
                                          <th>FUNCTION</th>
                                          <th>DAY & DATE</th>
                                          <th>TIME</th>
                                          <th>LADIES</th>
                                          <th>GENTS</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td></td>
                                          <td>
                                            <select id="card_details_function_name_1" > 
                                            <option value="MEHENDIRAAT" >MEHENDIRAAT</option>
                                            <option value="WALIMA" >WALIMA</option>
                                            <option value="WITH BARAAT" >WITH BARAAT</option>
                                            <option value="MASNANDNISHINI" >MASNANDNISHINI</option>
                                          </td>
                                          <td>
                                            <input id="card_details_function_date_1" class="date-picker" type="text" required="" class="parsley-success" data-parsley-id="310" /><ul class="parsley-errors-list" id="parsley-id-310"></ul>
                                          </td>
                                          <td>
                                            <div>
                                              gents : <input class="time-picker" type="text" id="card_details_function_gents_1" required="" class="parsley-success" data-parsley-id="311" /><ul class="parsley-errors-list" id="parsley-id-311"></ul>
                                            </div>
                                            <div>
                                              ladies : <input class="time-picker" type="text" id="card_details_function_ladies_1" required="" class="parsley-success" data-parsley-id="312" /><ul class="parsley-errors-list" id="parsley-id-312"></ul>
                                            </div>
                                          </td>
                                          <td>---</td>
                                          <td>---</td>
                                        </tr>
                                      </tbody>
                                      <tfoot style="" >
                                        <th colspan="6"><a class="aa-browse-btn" data-count='1' id="card_details_add_event" >ADD FUNCTION/EVENT</a></th>
                                      </tfoot>
                                    </table>
                                  </div>
                                  <hr/>
                                  <div class="card_details_sub_div" id="card_details_footer" >
                                    <div style="float: left;">R.S.V.P <br/> 
                                      <textarea id="card_details_rsvp" rows="4" required="" class="parsley-success" data-parsley-id="305"></textarea><ul class="parsley-errors-list" id="parsley-id-305"></ul>
                                    </div>
                                    <div style="float: right;">with best compliments from <br/> 
                                      <textarea id="card_details_best_compliments" rows="4" required="" class="parsley-success" data-parsley-id="305"></textarea><ul class="parsley-errors-list" id="parsley-id-305"></ul>
                                    </div>
                                  </div>
                                  <hr/>
                                  <div>
                                    <div>
                                      <input type="checkbox" id="labels_checkbox"> <span>Print labels also.</span>
                                    </div>
                                    <br/>
                                    <div id="upload_labels_div" hidden>
                                      <span>Please choose label file to upload(pdf,image,exel) :</span> <input style="display: inline-block;" type="file" id="labels_file" required="" data-parsley-fileextension="jpg jpeg png pdf xlsx xls" class="parsley-success" data-parsley-id="312" /><ul class="parsley-errors-list" id="parsley-id-312"></ul>
                                    </div>                                
                                  </div>
                                </div>

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
                                  <p>Your order was successfully placed with order id '<span id="prompt_order_id">ORDER788988787aid</span>'.</p>
                                </div>
                              </div>                        
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div>

                        <div class="panel-group" id="step-5">
                          
                            <!-- Payment Options -->
                            <div class="panel panel-default aa-checkout-billaddress">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a>
                                    Card Details Preview (This is the Preview of your card details. Click next to proceed or previous to edit.)
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFour" class="panel-collapse collapse in">
                                <div id="card_details_div_preview" >
                                  <div class="card_details_sub_div with_padding_preview" id="card_details_header" >
                                    <div> 
                                      MRS. & MR. <span id='check_mr_mrs'>Junaid</span> <br/>
                                    cordially invites you to grace and bless the auspecious invitation of the marriage 
                                      of their
                                    </div>
                                    <div>
                                      <span id='check_mairrage_of_relation'>Sons(s)</span>
                                    </div>
                                    <div id="check_card_details_couples_div" >

                                    </div>

                                    <div id="check_marriage_with_mr_mrs" >
                                    </div>
                                  </div>
                                  <hr/>
                                  <div class="card_details_sub_div" id="card_details_address_div" >
                                    <div>
                                      at there residence
                                    </div>
                                    <div id="check_residence">
                                      nishat bagh srinagar
                                    </div>
                                    <div>
                                      as per program
                                    </div>
                                  </div>
                                  <hr/>
                                  <div class="card_details_sub_div" id="card_details_function_div" >
                                    <table id="check_card_details_function_table">
                                      <thead>
                                        <tr>
                                          <th>FUNCTION</th>
                                          <th>DAY & DATE</th>
                                          <th>TIME</th>
                                          <th>LADIES</th>
                                          <th>GENTS</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                  </div>
                                  <hr/>
                                  <div class="card_details_sub_div" id="card_details_footer" >
                                    <div id="check_rsvp" style="float: left;">
                                      R.S.V.P<br/>
                                      <div>abc,hdhd,dhdh</div>
                                    </div>
                                    <div id="check_compliments" style="float: right;">
                                      with best compliments<br/>
                                      <div>abc,hdhd,dhdh</div>
                                    </div>
                                  </div>
                                  <hr/>
                                  <div id="check_labels_file">          
                                  </div>
                                </div>
                            </div>
                            </div>  
                        </div>

                        <div class="panel-group" id="step-6">
                          
                            <!-- Payment Options -->
                            <div class="panel panel-default aa-checkout-paymentoption">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a>
                                    Payment Options 
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFour" class="panel-collapse collapse in">
                              <div class="aa-payment-method"> 
                                <div id="cashOndelivery">
                                  <div>
                                    <label class="payment_mode_label">
                                    <input type="radio" name="payment_mode" checked id="cashOndelivery_radio"> Cash On Delivery
                                    </label>
                                    <label class="payment_mode_label">  
                                    <input type="radio" name="payment_mode" id="ccAvenue_radio"> ccAvenue
                                    </label>
                                  </div>
                                  <div id="cod_div">
                                    <a class="aa-browse-btn" id="cod_button" >Place Order</a>
                                    <div id="otp_div" hidden>
                                      <p>We have sent you an otp on ******<span id="user_phn_number"></span>. Please verify your number.</p>
                                      <div style="padding: 10px">
                                        <input placeholder="OPT eg '9090'" type="text" id="otp_code">
                                      </div>
                                      <a class="aa-browse-btn" id="verify_otp_btn" >VERIFY</a>
                                      <a class="aa-browse-btn" id="resend_otp_btn" >RESEND OTP</a>
                                      <div id="otp_timer_div" hidden>You can resend otp after : <span id="otp_timer"></span></div>
                                    </div>
                                  </div>
                                </div>    
                              </div>
                              <div class="aa-payment-method"> 
                                <div hidden id="ccPayment">
                                </div>    
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

  




