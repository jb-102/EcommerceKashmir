 <!-- Begin Mobile -->
<?php
    include("inc/db.php");
?>

            <div class="mobile-version visible-xs">
                <div class="h-logo">
                    <a href="index.php" title="logo">
                        <img class="mobile-logo visible-xs" src="../data1/images/lighthouse.jpg" alt="Megashop Theme" />
                    </a>
                </div>
            </div>

            <!-- End Mobile -->
            <!-- Begin Header -->

            <header class="header-content" data-stick="false" data-distance-top="">
                <div class="header-top">
                    <div class="container">
                        <div id="tptnhtmlbox1">
                            <ul class="tptnhtml1 list-unstyled">
                                <li style="">Don't miss our Exclusive Offers on weekends</li>
                                <li style="display: none;">Call Now: +0-123-456-7890 (10:00 - 18:30)</li>
                                <li style="display: none;">Winter Collection for Women at 20% discount</li>
                            </ul>
                        </div>


                        <div class="wishlist-block-top">
                            <a href="my_account.php" title="Wishlist">
                                <span>My Wishlist</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="header-middle">
                    <div class="container">
                        <div class="row">
                            <div class="header-logo col-sm-4 hidden-xs">
                                <a href="index.php" title="Megashop Theme" class="logo-site">

                                    <img class="logo" src="logo.png" alt="" style="width: 175px" />

                                </a>
                            </div>
      
        <div class="searchbox col-sm-4">
            <form id="search" action="product_search.php" class="navbar-form search" method="POST">
                <input id="input-ajax-search" type="text" name="search_box" class="form-control" placeholder="Search" autocomplete="off" />
                <!-- <a name="search_button" >helo</a> -->
                <button type="submit" name="SE" class="btn btn-submit btn-default"></button>

            </form>               
          

                        <div id="result-ajax-search" class="hidden-sm hidden-xs"><ul class="list-unstyled search-results"></ul></div>
                    </div>



                            <div class="customer-links col-sm-4">
                                <ul class="list-inline">

                                
                                <?php
                                    $id = 'customer_register_link';
                                    $name = 'Register/Sign In';
                                    $icon = 'fa fa-sign-in left';

                                    if(isset($_SESSION['user']))
                                    {
                                        $id = 'customer_logout_link';
                                        $name = 'Logout';
                                        $icon = 'fa fa-sign-out left';
                                    } 
                                ?>

                                

                                    <li>
                                        <a id="<?= $id; ?>">
                                        
                                            <span><i class="<?= $icon; ?>"></i><?= $name; ?></span>
                                        </a>


                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="logo-stick col-md-3 hidden-sm hidden-xs">
                                <a href="index.php" title="Megashop Theme" class="logo-site">
                                    <img class="logo" src="" alt="kashmir trend" />
                                </a>
                            </div>
                            <div class="navbar navbar-responsive-menu visible-sm visible-xs">
                                <div class="btn-navbar responsive-menu" data-toggle="offcanvas">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="top-categ col-md-3 hidden-sm hidden-xs">
                                <span>Categories</span>
                            </div>
                            <div class="topmenu col-md-8 hidden-sm hidden-xs">

                                <ul class="list-topmenu list-inline">


                                    <li class="active">
                                        <a href="index.php">
                                            <span>Home</span>
                                        </a>
                                    </li>


                                    <li class="">
                                        <a href="collections.php">
                                            <span>Collection</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="contact.php">
                                            <span>Contact Us</span>
                                        </a>
                                    </li>
                                     <li class="">
                                        <a href="about.php">
                                            <span>About Us</span>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                            <?php
                                $count = 0;

                                if(isset($_SESSION['user']))
                                {
                                    $count_data = $con->query("SELECT COUNT(*) FROM user_cart WHERE user_email = '".$_SESSION['user']."'");
                                    $count_data = $count_data -> fetch_assoc();
                                    $count = $count_data['COUNT(*)'];
                                } 
                            ?>
                            <div class="cart-target col-md-1">
                                <a style="cursor: pointer;" onclick="window.location.href='cart.php'" class="hidden-xs num-items-in-cart dropdown-toggle dropdown-link" id="cartNumber" title="cart" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="cart-icon"><span class="number"><?= $count; ?></span></span>
                                </a>
        <div class="cart-dd dropdown-menu">
          <div id="cart-info">
            <h1>Your Cart</h1>
            <div id="cart-content" class="cart-content"><div class="items"><div class="items-inner">                                     
            <div class="cart-item-image">        
               <a href="/products/hot-com-product-sample?variant=10631504707"> 
               <img src="https://cdn.shopify.com/s/files/1/1009/3778/products/p3_small.jpg" alt="">                                        
               </a>
            </div> 

               <div class="cart-item-info">
               <div class="cart-item-title">
               <a href="/products/hot-com-product-sample?variant=10631504707">1<span class="x"> x </span>Hot Com Product Sample</a> 
               </div>
            <div class="cart-item-price"><span class="money" data-currency-usd="$225.00" data-currency="USD">$225.00</span></div> 
            </div>
            <a class="cart-close" href="javascript:;" data-cart-remove="1"><i class="fa fa-trash-o" title="Remove"></i></a>                                    </div>
            </div>
            <div class="subtotal"><span>Total</span><span class="cart-item-total-price"><span class="money" data-currency-usd="$225.00" data-currency="USD">$225.00</span></span>
            </div>
            <div class="action"><a href="cart.php" class="btn btn-default">View Cart</a><br><button class="btn btn-default" onclick="window.location.href='checkout.php'">Checkout</button>
            </div>
            </div>
          </div>
        </div>
                               
                            </div>

                        </div>
                    </div>
                </div>
            </header>
