
<?php
    include("inc/db.php");

if(!isset($_GET['var_id'])){

    header("location:index.php");
}
else
{
    $get_id = $_GET["var_id"];

?>

<!doctype html>
<!--[if IE 8]><html lang="en" class="ie8 js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="js">
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

<body class="templateProduct">


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

<!-- Begin Breadcrumb-->
<!-- End Breadcrumb-->
<!-- Begin Main Content -->

<div id="main-content">

    <div class="main-content">

        <div id="breadcrumb" class="breadcrumb-holder">

            <ul class="breadcrumb">

                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a itemprop="url" href="../index.php">
                        <span itemprop="title" class="hide"></span><i class="fa fa-home"></i>
                    </a>
                </li>

                <li class="active">Product Details</li>



            </ul>

        </div>

        <div itemscope itemtype="http://schema.org/Product">
            <span itemprop="name" class="hide">hello world</span>

            <!-- Begin #col-main -->

            <div id="col-main" class="page-product product-single">

                <div class="product">
                    <div class="row">

                        <!-- Begin #product-image -->

<?php
    $fetchproduct = "select * from products where item_id = $get_id";
    
    $update_mostviewed = "update products set views=views+1 where item_id = $get_id" ;
    $runupdate = mysqli_query($con , $update_mostviewed);

    $run = mysqli_query($con, $fetchproduct);
    $row = mysqli_fetch_array($run);

    $getproductname = $row['item_name'];
    $getproductdesc = $row['item_desc'];
    $getproductimage1 = $row['item_ist_view'];
    $getproductimage2 = $row['item_2nd_view'];
    $getproductimage3 = $row['item_3rd_view'];
    $getproductimage4 = $row['item_4th_view'];
    $getproductcategory = $row['item_main_category'];
    $getproductprice = $row['item_price'];
    

?>


                        <div id="product-image" class="col-sm-5 product-image">
                            <div class="product-image-inner row">

                                <a href="" class="featured-image elevatezoom">
        <img id="product-featured-image" class="magniflier zoom-image" src="admin/images/<?=$getproductimage1?>" data-zoom-image="" alt="product image" style="width: 100%;height: 300px" />
                                </a>

                            </div>
                        </div>

                        <!-- End #product-image /- -->
                        <!-- Begin #product-info -->

                        <div id="product-info" class="col-sm-7 product-info">

                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <h1 itemprop="name" content="product" class="page-heading"><?=$getproductname?></h1>
                                <div class="detail-deal">
                                </div>

                                <p class="product-des">
                                    <?=$getproductdesc?>
                                </p>

                                <p class="product-type">
                                    <span>Type :</span><?="$getproductcategory"?>
                                </p>

                                <div class="group-cw">
                                <form action="" method="post" class="product-action variants" enctype="multipart/form-data">
                                        <div id="product-action-3674856131" class="options">

                                            <div class="quantity-product">
                                                <label>Quantity :</label>
                                                <div class="quantity">
                                                    <input type="text" id="quantity" class="item-quantity" name="quantity" value="1" />
                                                    <span class="qty-wrapper">
                                                        <span class="qty-inner">

                                                            <span class="qty-up" id="qty-up" title="Increase" data-src="#quantity">
                                                                <i class="fa fa-plus"></i>
                                                            </span>

                                                            <span class="qty-down" id="qty-down" title="Decrease" data-src="#quantity">
                                                                <i class="fa fa-minus"></i>
                                                            </span>

                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="variants-wrapper clearfix">
                                                <select id="product-select-3674856131" name="id" style="display:none;">
                                                    <option selected="selected" value="10631437827">Default Title</option>
                                                </select>
                                            </div>
                                            <div id="purchase-3674856131" class="product-price">
                                                <div class="detail-price" itemprop="price">
                                                    <span class='money'>Rs <?=$getproductprice?></span>
                                                </div>
                                            </div>

                                            <div class="action-button">
                                                <button  data-id="<?=$get_id?>" id="add-to-cart" class="btn btn-default add_toCart select-options" type="button">Add to cart</button>
                                            </div>

                                        </div>
                                    </form>

                                    <button data-id="<?= $get_id?>" type="button" class="btn add-to-wishlist add-to-wishlist" title="Add to wishlist"><i class="fa fa-heart"></i>Add to wishlist</button>

                                </div>

                                <div class="shopify-product-reviews-badge" data-id="3674856131"></div>




                                <!-- endif product.avaiable /- -->

                            </div>

                        </div>

                        <!-- End #product-info /- -->

                    </div>
                </div>

                <!-- End .product /- -->

                <div class="product-simple-tab">


                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active"><a href="#tab_detail" aria-controls="tab_detail" role="tab" data-toggle="tab">More Info</a></li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="tab_detail">
                                <p><?php echo "$getproductdesc"; ?></p>
                            </div>

                        </div>

                    </div>


                </div>

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
        $get_id = $row['item_id'];
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
                                            <img class="featured-image front" src="admin/images/<?php echo "$getmostviewedimg1";?>" alt="Product image" style="height: 197px"/>

                                                <span class="hidden-sm hidden-xs">
                                                    <img src="admin/images/<?php echo "$getmostviewedimg2";?>" class="back" alt="Product image" style="height: 197px"/>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-content">
                                    <div class="pc-inner">
                                        <h5 class="product-name">
                                            <a href="SingleProductDetails.php?var_id=<?php echo "$get_id";?>"><?=$getmostviewedtitle?></a>
                                        </h5>
                                        <div class="product-price">
                                            <span class="price">
                                                <span class='money'>Rs <?=$getmostviewedprice?></span>
                                            </span>
                                        </div>

<div class="product-button">

        <div class="add-cart-button">
            <a data-id="<?=$get_id?>" id="add-to-cart" class="btn btn-default add_toCart select-options"><i class="fa fa-shopping-cart"></i><span class="hidden-desktop">Select options</span></a>
        </div>

        <div data-handle="golddax-product-example" data-target="#quick-shop-popup" onclick="get_item_id(<?php echo "$get_id";?>);" class="quick_shop quick-shop-button btn-default hidden-sm hidden-xs" data-toggle="modal" title="Quick View">
            <i class="fa fa-expand"></i>
            <span class="json hide">
                
            </span>
        </div>

<script type="text/javascript">
    function get_item_id(productid){
        
        var send_id = productid ; 
           
        $.post('cartDialog.php',{prod_id:send_id},function(data){
            data = JSON.parse(data);
            console.log(data.item_name);
            $("#qs-product-title").text(data.item_name);
            $("#qs-product-image").attr('src','admin/images/' + data.item_ist_view);
            $("#qs-product-description").text(data.item_desc);
            $("#qs-product-type").text(data.item_main_category);
            $("#qs-product-price").text(data.item_price);

        });

    }



</script>

        <div class="product-wishlist">
            <button data-id="<?=$get_id?>" type="button" class="btn btn-default add-to-wishlist" title="Add to wishlist"><i class="fa fa-heart"></i><span class="hidden-desktop">Add to wishlist</span></button>
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

            <!-- End #col-main /- -->

        </div>

    </div>

</div>

<!-- End Main Content -->

</div>

                    </div>
                </div>
            </div>


            <!-- Begin Footer -->
            <?php include("inc/footer.php") ?>

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