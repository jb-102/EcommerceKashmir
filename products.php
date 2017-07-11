
<?php
    include("inc/db.php");

if(!isset($_GET['var_name'])){

    header("location:index.php");
}
else
{
    $get_id = $_GET["var_name"];

?>

<!doctype html>
<!--[if IE 8]><html lang="en" class="ie8 js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="js"> <!--<![endif]-->


                          
<head>

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="canonical" href="index.html" />

    <meta name="description" content="" />
    <title>:: Welcome to ecommerce website ::</title>

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



    <!-- PNotify -->
    <link href="./admin/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="./admin/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="./admin/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>  

    <!-- gmail platform -->
    <script src="https://apis.google.com/js/api:client.js"></script>


    <!-- facebook js sdk library -->
    <script src="js/facebook.js"></script>

    <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->
    <link rel="shortcut icon" href="favicon.png" type="image/png" />



    <!-- test js file -->
    <script src="js/api.jquery-edit.js" type="text/javascript"></script>

    <script src="js/jquery-1.9.1.min7edd.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.3x.min7edd.js" defer></script>
    <script src="js/jquery.easing.1.37edd.js" defer></script>
    <script src="js/modernizr7edd.js" async></script>
    <script src="js/mobile-detect.min7edd.js" defer></script>
    <script src="js/jquery.swiper7edd.js"></script>
    <script src="js/page.min7edd.js"></script>
    <script src="js/cookies7edd.js"></script>
    <script src="js/wow.min7edd.js" defer></script>
    <script src="js/colpick7edd.js"></script>
    <script src="js/jquery.imagesloaded7edd.js"></script>
    <script src="js/jquery.fancybox.min7edd.js"></script>
    <script src="js/jquery.jgrowl.min7edd.js" defer></script>
    <script src="js/jquery.elevatezoom.min7edd.js" defer></script>
    <script src="js/jquery.owl.carousel.min7edd.js" defer></script>
    <script src="js/jquery.scrollTo-min7edd.js" defer></script>
    <script src="js/jquery.serialScroll7edd.js" defer></script>
    <script src="js/jquery.plugin7edd.js" defer></script>
    <script src="js/jquery.countdown7edd.js" defer></script>
    <script src="js/cart7edd.js" defer></script>
    <script src="js/rivets-cart.min7edd.js" defer></script>
    <script src="js/bc.ajax-search7edd.js" defer></script>
    <script src="js/option_selection7edd.js" defer></script>
    <script src="js/functions7edd.js"></script>
    <script src="js/bc.global7edd.js" defer></script>
    <script src="js/bc.slider7edd.js"></script>
    <script src="js/bc.script7edd.js"></script>

        <!-- PNotify -->
    <script src="./admin/vendors/pnotify/dist/pnotify.js"></script>
    <script src="./admin/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="./admin/vendors/pnotify/dist/pnotify.nonblock.js"></script>

</head>
                          

<body class="templateCollection">
  
  
  <!-- Begin Loader -->
  
  
  
  <!-- End Loader -->
  
  
  <div id="widget-social">

  <ul class="widget-social">

    
    <li>
      <a target="_blank" href="#" class="social-icon-inner facebook" title="Facebook">
        <span class="social-icon">
          <i class="fa fa-facebook"></i>
        </span>
      </a>
    </li>
    

    
    <li>
      <a target="_blank" href="#" class="social-icon-inner twitter" title="Twitter">
        <span class="social-icon">
          <i class="fa fa-twitter"></i>
        </span>
      </a>
    </li>
    
    
    
    <li>
      <a target="_blank" href="#" class="social-icon-inner google" title="Google">
        <span class="social-icon">
          <i class="fa fa-google-plus"></i>
        </span>
      </a>
    </li>
    

    
    <li>
      <a target="_blank" href="#" class="social-icon-inner instagram" title="Instagram">
        <span class="social-icon">
          <i class="fa fa-instagram"></i>
        </span>
      </a>
    </li>
    
      

  </ul>

</div>
  
  
  <div class="boxes-wrapper">
    
    <!-- Begin Menu Mobile-->
<?php
include("inc/mobileversion.php");
?>

<!-- End Menu Mobile-->
    
    <div id="page-body">

      <!-- Begin Mobile -->
    
      
      <!-- End Mobile -->

      
      <!-- Begin Header -->
<?php
	include("inc/header.php");
?>
      <!-- End Header -->

      <div id="body-content">
        <div class="container">
          <div class="row">

            <!--  Begin Left Side Control -->
        
    <?php
        include("inc/left_side_control.php");
    ?>

<!--  End Left Side Control -->           

            
            

            <div id="main-column" class="col-md-9 col-xs-12">

              <!-- Begin Main Content -->

              <div id="main-content">

                <div class="main-content">
                  
                  <div class="page-cata">

  <div id="breadcrumb" class="breadcrumb-holder">
    
    <ul class="breadcrumb">

		<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a itemprop="url" href="../index.php">
				<span itemprop="title" class="hide"></span><i class="fa fa-home"></i>
			</a>
		</li>

		

			
				<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="hide">
					<a href="accessories.html" itemprop="url">
						<span itemprop="title">Accessories</span>
					</a>
			    </li>
				<li class="active">Products</li>
			  
    </ul>

</div>

  <div class="cata-header">
    
  </div>

  <div id="col-main">

    

    <div class="cata-toolbar">
  
  <div class="group-toolbar row">

    
    <div class="group-gl col-sm-6 col-xs-6">
      <ul class="list-inline">
        <li class="grid-list">
          <label>View</label>
          <span class="grid active" title="Grid"><i class="fa fa-th-large"></i></span>
          <a class="list" href="accessoriesd1fd.html?view=list" title="List"><i class="fa fa-th-list"></i></a>
        </li>
      </ul>
    </div>

    <div class="sort-by col-sm-6 col-xs-6">
      <div class="sort-by-inner">
        
      </div>
    </div>
    
  </div>
  
  <div class="visible-xs">
    <span class="filter-toggle"><i class="fa fa-filter"></i> Filter</span>
  </div>

</div>

    <div class="cata-product cp-grid clearfix">
      
<?php
  include("inc/db.php");
  $get_name = $_GET['var_name'];
  $getproducts = "select * from products where item_main_category = '$get_name' ";
  $run = mysqli_query($con , $getproducts);

  while ($row = mysqli_fetch_array($run)) {
    $get_id =$row['item_id'];
    $getimage1 = $row['item_ist_view'];
    $getimage2 = $row['item_2nd_view'];
    $getname = $row['item_name'];
    $getprice = $row['item_price'];

?>

      <div class="product-grid-item product-price-range" data-price="200">
        <div class="product-wrapper">

  <div class="product-head">

    <div class="product-image">      
      <div class="featured-img switch">
        <a href="SingleProductDetails.php?var_id=<?php echo "$get_id";?>"> 
          <img class="featured-image front" src="admin/images/<?php echo "$getimage1";?>" alt="product image" style="height: 180px;" />
          
          <span class="hidden-sm hidden-xs">
            <img src="admin/images/<?php echo "$getimage2";?>" class="back" alt="product image" style="height: 180px;"/>    
          </span>
        </a>
      </div>
    </div>

  </div>

  <div class="product-content">
    <div class="pc-inner">
      <h5 class="product-name">
        <a href="SingleProductDetails.php?var_id=<?php echo "$get_id";?>"><?=$getname?></a>
      </h5>

      <div class="product-price">
        <span class="price">
          <span class='money'><?=$getprice?></span>
        </span>
      </div>

  <div class="product-button">
                    <div class="add-cart-button">
                        <a data-id="<?=$get_id?>" id="add-to-cart" class="btn btn-default add_toCart select-options"><i class="fa fa-shopping-cart"></i><span class="hidden-desktop">Select options</span></a>
                    </div>
                    <div data-handle="golddax-product-example" data-target="#quick-shop-popup" class="quick_shop quick-shop-button btn-default hidden-sm hidden-xs" data-toggle="modal" title="Quick View">
                        <i class="fa fa-expand"></i>
                        <span class="json hide">
                            
                        </span>
                    </div>
                    <div class="product-wishlist">

            <button data-id="<?= $get_id?>" type="button" class="btn btn-default add-to-wishlist" title="Add to wishlist"><i class="fa fa-heart"></i><span class="hidden-desktop">Add to wishlist</span></button>
                    </div>
                </div>

    </div>

  </div>
</div>


      </div>
      
<?php
  }
?>
      
      
    </div>

    
    
  </div>


  

<div class="pagination-holder">

  <ul class="pagination">

    
    <li>
      <a class="prev disabled" href="javascript:;">
        <i class="fa fa-angle-left"></i>
      </a>
    </li>
    

    
      
        
        <li class="active"><a href="javascript:;">1</a></li>
        
      
    
      
        <li><a href="accessories4658.html?page=2">2</a></li>
      
    

    
    <li>
      <a href="accessories4658.html?page=2" title="Next" class="next">
        <i class="fa fa-angle-right"></i>
      </a>
    </li>
    

  </ul>

</div>




  

</div>

                            
                </div>

              </div>

              <!-- End Main Content -->

            </div>
            
          </div>
        </div>
      </div>

      
      <!-- Begin Footer -->
      

<?php
include("inc/footer.php");
?>
      
      <!-- End Footer -->


        </div>


        <div id="scroll-to-top" title="Up To Top">
            <a href="javascript:;"><i class="fa fa-angle-up"></i></a>
        </div>


        <!--<div class="loading" style="display: none;"></div>-->


        <div id="quick-shop-popup" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">



            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close" title="Close" data-dismiss="modal" aria-hidden="true"></span>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                              <div class="col-md-5 product-image">
                        <div class="product-image-inner row">
                            <img id="qs-product-image" src="" style="height: 250px">
                        </div>
                    </div>

                            <div class="col-md-7 product-info">

                                <div id="qs-rating"></div>

                                <h2 id="qs-product-title">Sample Product</h2>

                                <div id="qs-product-description" class="description"></div>

                                <div id="qs-product-type"></div>

                                <div id="qs-action-wrapper">

                                    <form method="post" class="variants" id="qs-product-action" enctype="multipart/form-data">

                                        <div class="quantity-product">
                                            <label>Quantity :</label>
                                            <div class="quantity"></div>
                                        </div>

                                        <div id="qs-product-variants" class="variants-wrapper"></div>

                                        <div id="qs-product-price" class="detail-price"><?=$productprice?></div>

                                        <div class="qs-product-button">
                                            <div class="qs-action">
                                                <button id="qs-add-cart" class="btn btn-default add-to-cart" type="submit" name="add"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div id="qs-product-wl"></div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        



        
    </div>

</body>
<script src="./js/custom_script.js"></script>
</html>
<?php
}
?>