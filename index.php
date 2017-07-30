<!doctype html>
<?php session_start(); ?>
<!--[if IE 8]><html lang="en" class="ie8 js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="js templateIndex">
<!--<![endif]-->

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

<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<link rel="shortcut icon" href="favicon.png" type="image/png" />


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

<body class="templateIndex">

<?php
include("inc/db.php");
?>

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
<?php
include("inc/mobileversion.php");
?>
<div id="page-body">
   
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
        <!-- Begin Breadcrumb-->
        <!-- End Breadcrumb-->
        <!-- Begin Main Content -->
        <div id="main-content">
            <div class="main-content">

                <div id="home-main-content">

                    <!-- Begin Slideshow -->

                    <div class="home-slideshow-wrapper swiper-container" data-animation="cube">
                        <div id="home-slideshow" class="swiper-wrapper">


                            <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                            <div id="wowslider-container1">
                                <div class="ws_images">
                                    <ul>

                        <?php
                            $getslider = "Select * from slider where slider_status = 'published' ";
                            $run = mysqli_query($con , $getslider);
                            while ($row = mysqli_fetch_array($run)) {
                                
                               echo $sliderimage = $row['slider_image'];

                                $slidertext = $row['slider_text'];
                            

                        ?>

                            <li><a href="#"><img src="admin/images/slider/<?php echo "$sliderimage";?>" alt="/" title="<?php echo "$slidertext";?>" id="wows1_0" /></a></li>

                        <?php
                            }
                        ?>
                                    </ul>
                                </div>
                                <div class="ws_bullets">
                                    
                                </div>
                                <div class="ws_shadow"></div>
                            </div>

                            <!-- End WOWSlider.com BODY section -->

                        </div>

                        <!-- Add Arrows -->


                    </div>
                    <!-- End Slideshow -->
                    <!-- Begin Banner on Top -->

                    <div class="banner-top">
                        <div class="row">

                <?php
                    $gettile = "select * from tiles";
                    $run = mysqli_query($con,$gettile);

                    while ($row = mysqli_fetch_array($run)) {
                        $tileimage = $row['tile_image'];

                ?>
                            <div class="col-sm-4 col-xs-12">
                                <div class="banner-top-item">
                                    <a href="sdfsdf.html">
                                        <img src="admin/images/tiles/<?php echo "$tileimage";?>" alt="" />
                                    </a>
                                </div>
                            </div>

                <?php
                    }
                ?>

                        </div>
                    </div>

                    <!-- End Banner on Top -->

           <!-- Begin New Products -->

                    <div id="new-product">

                        <h4>New Arrivals</h4>
                        <div class="new-product">


<?php
    include("inc/db.php");

    $get_product = "select * from products order by item_id desc limit 8" ;
    $run = mysqli_query($con , $get_product);

    while ($row = mysqli_fetch_array($run)) {
        $productid = $row['item_id'];
        $productimage1 = $row['item_ist_view'];
        $productimage2 = $row['item_2nd_view'];
        $productname = $row['item_name'];
        $productprice = $row['item_price'];


?>

    <div class="product-wrapper">
        <div class="product-head">
            <div class="product-image">

                <div class="featured-img switch">
                    <a href="SingleProductDetails.php?var_id=<?php echo "$productid"; ?>">
                        <img class="featured-image front" src="admin/images/items/ist_image/main/<?php echo "$productimage1";?>" alt="product image" style="height: 197px;"/>
                        <span class="hidden-sm hidden-xs">
                            <img src="admin/images/items/2nd_image/main/<?php echo "$productimage2";?>" class="back" alt="Golddax Product Example" style="height: 197px;"/>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="product-content">
            <div class="pc-inner">
                <h5 class="product-name">
                    <a href="products/golddax-product-example.html"><?php echo "$productname"; ?></a>
                </h5>
                <div class="product-price">
                    <span class="price">
                        <span class='money'>Rs <?php echo "$productprice"; ?></span>
                    </span>
                </div>

    <div class="product-button">

        <div class="add-cart-button">
            <a data-id="<?= $productid?>" class="btn btn-default add_toCart select-options" title="Select options"><i  class="fa fa-shopping-cart"></i><span  class="hidden-desktop">Select options</span></a>
        </div>

        <div data-handle="golddax-product-example" data-id = "<?= $productid;?>" data-target="#quick-shop-popup" id="open_cart_dialog" class="quick_shop quick-shop-button btn-default hidden-sm hidden-xs" data-toggle="modal" title="Quick View">
            <i class="fa fa-expand"></i>
            <span class="json hide">
                
            </span>
        </div>
        <div class="product-wishlist">
            <button data-id="<?= $productid?>" type="button" class="btn btn-default add-to-wishlist" title="Add to wishlist"><i class="fa fa-heart"></i><span class="hidden-desktop">Add to wishlist</span></button>
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

                    <!-- End New Products -->


                    <!-- Begin Most Viewed Products -->

                    <div id="featured-product" class="home-carousel">

                        <h4>Most Viewed</h4>

                        <div class="featured-product">


<?php
    include("inc/db.php");

    $getmostviewed = "select * from products where views > 4";
    $run = mysqli_query($con , $getmostviewed);

    while($row = mysqli_fetch_array($run))
    {
        $get_id=$row['item_id'];
        $getmostviewedimg1 = $row['item_ist_view'];
        $getmostviewedimg2 = $row['item_2nd_view'];
        $getmostviewedtitle = $row['item_name'];
        $getmostviewedprice = $row['item_price'];

?>
                            <div class="product-wrapper">

                                <div class="product-head">
                                    <div class="product-image">
                                        <div class="featured-img switch">
                                            <a href="SingleProductDetails.php?var_id=<?php echo "$get_id";?>">
                                            <img class="featured-image front" src="admin/images/items/ist_image/main/<?php echo "$getmostviewedimg1";?>" alt="Product image" style="height: 197px"/>

                                                <span class="hidden-sm hidden-xs">
                                                    <img src="admin/images/items/2nd_image/main/<?php echo "$getmostviewedimg2";?>" class="back" alt="Product image" style="height: 197px"/>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-content">
                                    <div class="pc-inner">
                                        <h5 class="product-name">
                                            <a href="SingleProductDetails.php"><?=$getmostviewedtitle?></a>
                                        </h5>
                                        <div class="product-price">
                                            <span class="price">
                                                <span class='money'>Rs<?=$getmostviewedprice?></span>
                                            </span>
                                        </div>

<div class="product-button">

        <div class="add-cart-button">
            <a data-id="<?= $productid?>" class="btn btn-default add_toCart select-options" title="Select options"><i class="fa fa-shopping-cart"></i><span class="hidden-desktop">Select options</span></a>
        </div>

        <div data-handle="golddax-product-example" data-target="#quick-shop-popup" onclick="get_item_id(<?php echo "$get_id";?>);" class="quick_shop quick-shop-button btn-default hidden-sm hidden-xs" data-toggle="modal" title="Quick View">
            <i class="fa fa-expand"></i>
            <span class="json hide">
                
            </span>
        </div>


        <div class="product-wishlist">
            <button data-id="<?= $productid?>" type="button" class="btn btn-default add-to-wishlist" title="Add to wishlist"><i class="fa fa-heart"></i><span class="hidden-desktop">Add to wishlist</span></button>
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

                    <!-- End most viewed Products -->
         
                </div>

            </div>
        </div>
        <!-- End Main Content -->
    </div>

            </div>
        </div>
    </div>
        <br>
</div>

</div>

<?php
include("inc/footer.php");
?>

</div>


<div id="scroll-to-top" title="Up To Top">
    <a href="javascript:;"><i class="fa fa-angle-up"></i></a>
</div>


<div class="loading" style="display: none;"></div>

<!-- modal box for quick view -->

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
                        <h2 id="qs-product-title"></h2><hr>
                        <div id="qs-product-description"></div><hr>
                        <div id="qs-product-type" style="text-transform: capitalize;"></div>
                        <div id="qs-product-price"></div>
                        <div id="qs-action-wrapper">
                            <form action="" method="post" class="variants" id="qs-product-action" enctype="multipart/form-data">
                                <div class="quantity-product">
                                    <label>Quantity :</label>
                                    <div class="quantity"></div>
                                </div>
                                <div id="qs-product-variants" class="variants-wrapper"></div>
                                <div id="qs-product-price" class="detail-price"></div>
                                <div class="qs-product-button">
                                    <div class="qs-action">
                                        <button id="qs-add-cart" class="btn btn-default add_toCart add-to-cart" type="submit" name="add"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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


<div id="layer-addcart-modal" style="display: none; position: fixed;  top: 0%; left: 0%; width: 100%; height: 100%; ">
    <div class="layer-addcart-modal">
        <div class="addcart-overlay"></div>
        <div class="addcart-modal-box" style="display: none;">
            <p class="note">
                <i class="fa fa-check"></i>
                Product successfully added to<a href="cart.html" class="your_cart"> your Shopping Cart</a>
            </p>

            <div class="addcart-modal-product">
                <div class="addcart-modal-image"></div>
                <div class="addcart-modal-info">
                    <div class="addcart-modal-title"></div>
                    <div class="addcart-modal-variant"></div>
                    <div class="addcart-modal-qty"></div>
                    <div class="addcart-modal-price"></div>
                </div>
            </div>
            <div class="addcart-modal-action">
                <div class="addcart-modal-number"></div>
                <div class="addcart-modal-subtotal"></div>
                <div class="addcart-modal-button">
                    <div class="addcart-modal-continue">
                        <a href="javascript:void(null)" onclick="addcartModalHide()" class="btn btn-continue"><i class="fa fa-chevron-left left"></i>Continue Shopping</a>
                    </div>
                    <div class="addcart-modal-checkout">
                        <a class="btn btn-default" href="cart.html">Proceed to Checkout<i class="fa fa-chevron-right right"></i></a>
                    </div>
                </div>
            </div>
            <div class="addcart-modal-close" onclick="addcartModalHide()" title="Close"><i class="fa fa-times"></i></div>
        </div>
    </div>
</div>


<!-- modal box when page load for email supscription-->
<div id="mailchimp-popup" style="display:none;" data-expires="1">


    <div class="mailchimp-popup-content">

        <h4 class="title">Encourage the users to leave<br> their E-mails.</h4>


        <div class="mailchimp-caption-1">
            <span>Let them know what kind of content they will receive.</span>
        </div>


        <div class="mailchimp-caption-2">
            <span>Put in some details about your compaign and list the reasons to sign up.<br> Don't forget the final <span>call to action</span></span>
        </div>


        <form id="mc-form" action="" method="post" name="mc-embedded-subscribe-form" target="_blank">
            <i class="fa fa-envelope"></i>
            <input id="mc-email" class="input-block-level" type="email" name="EMAIL" placeholder="Your email..." required />
            <button class="btn btn-default" type="submit">Submit</button>
        </form>
    </div>
</div>


</div>

<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<script src="./js/custom_script.js"></script>




</body>

</html>



