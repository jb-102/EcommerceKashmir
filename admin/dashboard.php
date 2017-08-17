<!DOCTYPE html>

<?php

  include './php/admin_sessions.php';
  include './php/connection.php';
  include './php/smart_resize_image.function.php';

  if (!(isset($_SESSION['logged_in'])) || ($_SESSION['logged_in'] != 'admin')) 
  {
  echo '<script>window.location.href = "index.php";</script>';
  }


?>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JEEL ECOM | Admin</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="vendors/datatables.net/extensions/FixedHeader/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net/extensions/Scroller/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
    <link href="vendors/datatables.net/extensions/Select/css/select.dataTables.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">



  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>JEEL ECOM</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Administrator</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li id="home_nav"><a class="link active"><i class="fa fa-home"></i> Home </a></li>

                  <li id="main_category_nav"><a class="link"><i class="fa fa-edit"></i> Main Categories </a></li>

                  <li id="category_nav"><a class="link"><i class="fa fa-desktop"></i> Categories </a></li>

                  <li id="sub_category_nav"><a class="link"><i class="fa fa-table"></i> Sub Categories </a></li>
                  
                  <li id="edit_orders_nav"><a class="link"><i class="fa fa-table"></i> User Orders </a></li>

                  <li id="products_nav"><a class="link" ><i class="fa fa-bar-chart-o"></i> All Products </a></li>

                  <!-- <li id="edit_cancel_requests_nav"><a class="link" ><i class="fa fa-clone"></i> Cancel Requests </a></li>

                  <li id="edit_user_order_details_nav"><a class="link" ><i class="fa fa-clone"></i> User Order Details </a></li> -->
                </ul>
              </div>
              <div class="menu_section">
                <h3>ADMIN SETTING</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Admin Profile </a></li>

                  <li><a><i class="fa fa-windows"></i> Messages </a></li>

                  <li><a><i class="fa fa-sitemap"></i> Site Profile </span></a></li>                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Administrator
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a> Profile</a></li>
                    <li><a id="logout_button" ><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="menu_tabs">
            <!-- top menu tabs -->
            <div class="top_menu" >

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div id="add_slider" class="tile-stats">
                  <div class="icon"><i class="fa fa-plus-square"></i>
                  </div>
                  
                  <div class="count">389</div>
                  
                  <h3>EDIT SLIDER</h3>
                  
                  <p>EDIT SLIDER DETAILS.</p>
                </div>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div id="add_tile" class="tile-stats">
                  <div class="icon"><i class="fa fa-plus-square"></i>
                  </div>
                    
                  <div class="count">389</div>

                  <h3>EDIT TILES</h3>
                  
                  <p>EDIT TILES DETAILS.</p>
                </div>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div id="add_item" class="tile-stats">
                  <div class="icon"><i class="fa fa-plus-square"></i>
                  </div>
                  
                  <div class="count">389</div>
                  
                  <h3>ADD PRODUCT</h3>
                  
                  <p>ADD PRODUCT DETAILS.</p>
                </div>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div id="add_main_category" class="tile-stats">
                  <div class="icon"><i class="fa fa-plus-square"></i>
                  </div>
                  
                  <div class="count">389</div>
                  
                  <h3>ADD MAIN CAT</h3>
                  
                  <p>ADD MAIN CAT DETAILS.</p>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <!-- content -->
            <div hidden id="content_add">  

              <!-- content to add slider to site -->
              <div class="row" id="slider_div">

                <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">

                    <div class="x_title">
                      <h2>EDIT SLIDER DETAILS</h2>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content" style="display: block;">
                      <table id="slider_datatable-responsive" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
                      </table>  
                    </div>
                  </div>
                </div>
              </div>

              <!-- content to add tile to site -->
              <div class="row" id="tiles_div">
                <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">

                    <div class="x_title">
                      <h2>EDIT TILES DETAILS</h2>
                    <div class="clearfix"></div>
                    </div>

                      <div class="x_content" style="display: block;">
                        <table id="tiles_datatable-responsive" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
                      </table>

  
                      </div>
                  </div>
                </div>
              </div>



              <!-- content to add item to site -->
              <div class="row" id="item_div">
                <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">

                    <div class="x_title">
                      <h2>ADD NEW ITEM</h2>
                    <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="x_content" style="display: block;">
                    <br>

                    <form id="item_form" enctype="multipart/form-data" data-parsley-validate="" method="post"  class="form-horizontal form-label-left" novalidate="">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_name">Item Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="item_name" id="item_name" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                          </div>
                        </div>
                  

                        <div class="form-group">
                          <label for="main_category" class="control-label col-md-3 col-sm-3 col-xs-12">Select Main Category 
                          <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="main_category" data-parsley-dropdown="true" name="main_category" class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                              <option  value="-1">Select a Main Category</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="item_category" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category 
                          <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="item_category" data-parsley-dropdown="true" name="item_category" class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                              <option  value="-1">Select a Category</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="item_sub_category" class="control-label col-md-3 col-sm-3 col-xs-12">Select Sub Category 
                          <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="item_sub_category" data-parsley-dropdown="true" name="item_sub_category" class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                              <option  value="-1">Select a Sub Category</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_price">Item Price<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="item_price" data-parsley-type="digits" id="item_price" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="item_description"  class="control-label col-md-3 col-sm-3 col-xs-12">Item Description <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea type="text" style="resize: vertical;" required="required" id="item_description" name="item_description" class="resizable_textarea form-control col-md-7 col-xs-12 parsley-success" rows="3" data-parsley-id="8" ></textarea><ul class="parsley-errors-list" id="parsley-id-8"></ul>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_size">Item Size <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="item_size" id="item_size" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="171"><ul class="parsley-errors-list" id="parsley-id-171"></ul>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_color">Item Color <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="item_color" id="item_color" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="181"><ul class="parsley-errors-list" id="parsley-id-181"></ul>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="ist_image" class="control-label col-md-3 col-sm-3 col-xs-12">Ist Image<span class="required">* (900*1024)</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="ist_image" data-parsley-fileextension="jpg png"  data-parsley-dimensions="true" data-parsley-dimensions-options='{"width": "900","height": "1024"}'  class="form-control col-md-7 col-xs-12" required="required" type="file" name="ist_image" data-parsley-id="9">
                            <ul class="parsley-errors-list" id="parsley-id-9"></ul>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="2nd_image" class="control-label col-md-3 col-sm-3 col-xs-12">2nd Image<span class="required">* (900*1024)</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="2nd_image" data-parsley-fileextension="jpg png"  data-parsley-dimensions="true" data-parsley-dimensions-options='{"width": "900","height": "1024"}'  class="form-control col-md-7 col-xs-12" required="required" type="file" name="2nd_image" data-parsley-id="10">
                            <ul class="parsley-errors-list" id="parsley-id-10"></ul>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="3rd_image" class="control-label col-md-3 col-sm-3 col-xs-12">3rd Image<span class="required">* (900*1024)</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="3rd_image" data-parsley-fileextension="jpg png"  data-parsley-dimensions="true" data-parsley-dimensions-options='{"width": "900","height": "1024"}'  class="form-control col-md-7 col-xs-12" required="required" type="file" name="3rd_image" data-parsley-id="11">
                            <ul class="parsley-errors-list" id="parsley-id-11"></ul>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="4th_image" class="control-label col-md-3 col-sm-3 col-xs-12">4th Image<span class="required">* (900*1024)</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="4th_image" data-parsley-fileextension="jpg png"  data-parsley-dimensions="true" data-parsley-dimensions-options='{"width": "900","height": "1024"}'  class="form-control col-md-7 col-xs-12" required="required" type="file" name="4th_image" data-parsley-id="12">
                            <ul class="parsley-errors-list" id="parsley-id-12"></ul>
                          </div>
                        </div>
                
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" name="submit_item_details" value="Add Details" class="btn btn-success">
                          </div>
                        </div>

                      </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- content to add testimonial  -->
              <div class="row" id="main_category_div">
                <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">

                    <div class="x_title">
                      <h2>ADD NEW MAIN CATEGORY</h2>
                    <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="x_content" style="display: block;">
                    <br>

                    <form id="testimonial_form" enctype="multipart/form-data" data-parsley-validate="" method="post"  class="form-horizontal form-label-left" novalidate="">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_name">Category Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="main_category_name" id="main_category_name" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_message">Category Description <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="main_category_description" id="main_category_description" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                          </div>
                        </div>

                
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" name="submit_main_category_details" value="Add Details" 
                            class="btn btn-success">
                          </div>
                        </div>

                      </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="clearfix"></div>

        <div id="content_main">
            
            <!-- content to add/edit slider -->
            <div hidden class="row" id="category_div">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">
                    <h2>EDIT MAINCATEGORY DETAILS</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content" style="display: block;">
                    <table id="main_category_datatable-responsive" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
                    </table>  
                  </div>
                </div>
              </div>
            </div>    

            <!-- content to edit/delete item -->
            <div hidden class="row" id="edit_item_div">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">
                    <h2>EDIT CATEGORY DETAILS</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content" style="display: block;">
                    <table id="category_datatable-responsive" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
                    </table>  
                  </div>
                </div>
              </div>
            </div>   

            <!-- content to edit/delete testimonials -->
            <div hidden  class="row" id="testimonials_div">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">
                    <h2>EDIT SUB CATEGORY DETAILS</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content" style="display: block;">
                    <table id="sub_category_datatable-responsive" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
                    </table>  
                  </div>

                </div>

              </div>
            </div> 

            


 <!-- content to view orders -->
            <div hidden  class="row" id="orders_div">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">
                    <h2>VIEW ORDERS</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content" style="display: block;">
                    <table id="orders_datatable-responsive" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
                    </table>  
                  </div>

                </div>

              </div>
            </div> 

            <!-- content to view orders -->
            <div hidden  class="row" id="products_div">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">
                    <h2>EDIT ALL PRODUCTS</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content" style="display: block;">
                    <table id="products_datatable-responsive" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
                    </table>  
                  </div>

                </div>

              </div>
            </div> 
            
        </div>

      </div>


        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Ecommerce - Admin Template by <a href="https://ivtectsolutions.in">IV TECH SOLUTIONS</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/datatables.net/media/js/jquery.js"></script>               
    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>

    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <script src="vendors/parsleyjs/dist/laravel-parsley.js"></script> 

    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>

    <!-- PNotify -->
    <script src="vendors/pnotify/dist/pnotify.js"></script>
    <script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>

    <!-- Datatables -->
    <script src="vendors/datatables.net/media/js/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net/media/js/dataTables.bootstrap.js"></script>
    <script src="vendors/datatables.net/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net/extensions/Buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net/extensions/Buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net/extensions/FixedHeader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net/extensions/KeyTable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net/extensions/Responsive/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/datatables.net/extensions/Select/js/dataTables.select.min.js"></script>
    <script src="js/dataTables.altEditor.js"></script>
    <script src="js/my_admin_script.js"></script>

  </body>


  <?php 


	if (isset($_POST['submit_item_details'])) {


    echo $_POST['main_category'];
	           
	  $target_dir_ist = "./images/items/ist_image/";
	  $target_dir_2nd = "./images/items/2nd_image/";
	  $target_dir_3rd = "./images/items/3rd_image/";
	  $target_dir_4th = "./images/items/4th_image/";
	  
	  // saving and retrieving image path from database
	  $target_path_ist = basename($_FILES['ist_image']['name']); 
	  $target_file_ist = $target_dir_ist . 'main/' . basename($_FILES['ist_image']['name']);
	  $tile_file_ist = $target_dir_ist . 'tiles/' . basename($_FILES['ist_image']['name']);
	  $thumb_file_ist = $target_dir_ist . 'thumbnails/' . basename($_FILES['ist_image']['name']);


	  $target_path_2nd = basename($_FILES['2nd_image']['name']); 
	  $target_file_2nd = $target_dir_2nd . 'main/' . basename($_FILES['2nd_image']['name']);
	  $tile_file_2nd = $target_dir_2nd . 'tiles/' . basename($_FILES['2nd_image']['name']);
	  $thumb_file_2nd = $target_dir_2nd . 'thumbnails/' . basename($_FILES['2nd_image']['name']);


	  $target_path_3rd = basename($_FILES['3rd_image']['name']); 
	  $target_file_3rd = $target_dir_3rd . 'main/' . basename($_FILES['3rd_image']['name']); 
	  $tile_file_3rd = $target_dir_3rd . 'tiles/' . basename($_FILES['3rd_image']['name']);
	  $thumb_file_3rd = $target_dir_3rd . 'thumbnails/' . basename($_FILES['3rd_image']['name']);


	  $target_path_4th = basename($_FILES['4th_image']['name']); 
	  $target_file_4th = $target_dir_4th . 'main/' . basename($_FILES['4th_image']['name']);
	  $tile_file_4th = $target_dir_4th . 'tiles/' . basename($_FILES['4th_image']['name']);
	  $thumb_file_4th = $target_dir_4th . 'thumbnails/' . basename($_FILES['4th_image']['name']);


	  
	  $query = "INSERT into products (item_name,item_desc,item_price,item_main_category,item_category,item_sub_category,item_ist_view,item_2nd_view,item_3rd_view,item_4th_view,item_color,item_size) VALUES ('{$_POST['item_name']}','{$_POST['item_description']}','{$_POST['item_price']}','{$_POST['main_category']}','{$_POST['item_category']}','{$_POST['item_sub_category']}','{$target_path_ist}','{$target_path_2nd}','{$target_path_3rd}','{$target_path_4th}','{$_POST['item_color']}','{$_POST['item_size']}')";
	 
	  if (move_uploaded_file($_FILES["ist_image"]["tmp_name"], $target_file_ist) && move_uploaded_file($_FILES["2nd_image"]["tmp_name"], $target_file_2nd) && move_uploaded_file($_FILES["4th_image"]["tmp_name"], $target_file_3rd) && move_uploaded_file($_FILES["3rd_image"]["tmp_name"], $target_file_4th)) {
	  if ($conn->query($query) === TRUE){

        echo "string";

	      if (stockMainCat($_POST['main_category']) && stockCat($_POST['item_category']) && stockSubCat($_POST['item_sub_category'])) {
	        # code...

          smart_resize_image($target_file_ist , null, 250 , 300 , false , $tile_file_ist , false , false ,100 );
          smart_resize_image($target_file_ist , null, 150 , 150 , false , $thumb_file_ist , false , false ,100 );

          smart_resize_image($target_file_2nd , null, 250 , 300 , false , $tile_file_2nd , false , false ,100 );
          smart_resize_image($target_file_2nd , null, 150 , 150 , false , $thumb_file_2nd , false , false ,100 );

          smart_resize_image($target_file_3rd , null, 250 , 300 , false , $tile_file_3rd , false , false ,100 );
          smart_resize_image($target_file_3rd , null, 150 , 150 , false , $thumb_file_3rd , false , false ,100 );

          smart_resize_image($target_file_4th , null, 250 , 300 , false , $tile_file_4th , false , false ,100 );
          smart_resize_image($target_file_4th , null, 150 , 150 , false , $thumb_file_4th , false , false ,100 );


	        echo "<script>new PNotify({
	              title: 'Status',
	              text: 'Data successfully entered!',
	              type: 'success',
	              styling: 'bootstrap3'
	            });</script>";
	      }
	      else
	      {
          echo "<script>alert('".$conn->error."');</script>";
	        echo "<script>new PNotify({
	              title: 'Status',
	              text: '".$conn->error."',
	              type: 'error',
	              styling: 'bootstrap3'
	            });</script>";
	      }
	  
	    }else
        {
          echo "<script>alert('".$conn->error."');</script>";
          echo "<script>new PNotify({
                title: 'Status',
                text: '".$conn->error."',
                type: 'error',
                styling: 'bootstrap3'
              });</script>";
        } 
	  } else {
	  echo "<script>new PNotify({
	              title: 'Status',
	              text: 'Sorry! An error occured while uploading your file.',
	              type: 'error',
	              styling: 'bootstrap3'
	            });</script>";
	      }
	  $conn->close();     
	}


	function stockMainCat($item_main_category)
	{

		$chk = $GLOBALS['conn'] -> query("UPDATE main_categories SET main_cat_stock=main_cat_stock+1 WHERE  main_cat_name = '$item_main_category'");

		return $chk;
	}


  function stockCat($item_category)
  {

    $chk = $GLOBALS['conn'] -> query("UPDATE category SET cat_stock=cat_stock+1 WHERE  cat_name = '$item_category'");

    return $chk;
  }

  function stockSubCat($item_sub_category)
  {

    $chk = $GLOBALS['conn'] -> query("UPDATE sub_category SET sub_cat_stock=sub_cat_stock+1 WHERE  sub_cat_name = '$item_sub_category'");

    return $chk;
  }

	if (isset($_POST['submit_main_category_details'])) {


	  	$cat_name = $_POST['main_category_name'];

	    
	    $query = "INSERT INTO main_categories (main_cat_name,main_cat_desc) VALUES ('{$_POST['main_category_name']}','{$_POST['main_category_description']}')";

	    $create_query = "CREATE TABLE `$cat_name` (`item_id` int(10) NOT NULL,`item_name` varchar(50) NOT NULL,`item_desc` varchar(400) NOT NULL,`item_price` float NOT NULL,`item_category` varchar(30) NOT NULL,`item_sub_category` varchar(30) NOT NULL,`item_ist_view` varchar(100) NOT NULL,`item_2nd_view` varchar(100) NOT NULL,`item_3rd_view` varchar(100) NOT NULL,`item_4th_view` varchar(100) NOT NULL,`item_color` varchar(30) NOT NULL,`item_size` int(10) NOT NULL,`item_added_on` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP)";
	   
	    
	    if ($conn->query($query) === TRUE && $conn->query($create_query) === TRUE){


	    echo "<script>new PNotify({
	                  title: 'Status',
	                  text: 'Data successfully entered!',
	                  type: 'success',
	                  styling: 'bootstrap3'
	                });</script>";
	        } 
	    else{

	    	echo "<script>alert('".$conn->error."');</script>";
	           echo "<script>new PNotify({
	                  title: 'Status',
	                  text: '".$conn->error."',
	                  type: 'error',
	                  styling: 'bootstrap3'
	                });</script>";
	        }

  $conn->close();  

	}     

?>



</html>
