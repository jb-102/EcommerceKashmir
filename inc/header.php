 <!-- Begin Mobile -->
<?php
    include("inc/db.php");
?>

            <div class="mobile-version visible-xs">
                <div class="h-logo">
                    <a href="index.php" title="logo">
                        <img class="mobile-logo visible-xs" src="../data1/images/lighthouse.jpg" alt="" />
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
                                <li style="display: none;">Call Now: +11111111111 (10:00 - 6:30)</li>
                            </ul>
                        </div>


                        <div class="wishlist-block-top">
                            <a href="my_account.php" title="Wishlist">
                                <span style="color:white;"><i class="fa fa-heart"></i> &nbsp;My Wishlist</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="header-middle">
                    <div class="container">
                        <div class="row">
                            <div class="header-logo col-sm-4 hidden-xs">
                                <a href="index.php" title="" class="logo-site">

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
                                        
                                            <span style="cursor: pointer;color:white;"><i class="<?= $icon; ?>"></i><?= $name; ?></span>
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
                                <a href="index.php" title="" class="logo-site">
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
    <div class="cart-dd dropdown-menu" style="margin-left:-200px;width:285px;">
      <div id="cart-info">
            <h1>Your Cart</h1>


        <?php
            include("inc/db.php");
            $subTotal = 0;
            $get_item_id = "select * from user_cart where user_email = '".$_SESSION['user']."'";
            $run = mysqli_query($con , $get_item_id);
            while($row = mysqli_fetch_array($run)) {
                
                $get_id = $row['item_id'];
                $get_quantity = $row['total_quantity'];
            $get_product_info ="select * from products where item_id ='$get_id'";
            $run1 = mysqli_query($con , $get_product_info);
            $row1 = mysqli_fetch_array($run1); 
                
                $get_product_img = $row1['item_ist_view'];
                $get_product_name = $row1['item_name'];
                $get_product_price = $row1['item_price'];
                
                $product_total = $get_product_price * $get_quantity ;
                $increment =1 ;
            
        ?>
            <div id="cart-content" class="cart-content"><div class="items"><div class="items-inner">                                     
                <div class="cart-item-image">        
                   <a href="/products/hot-com-product-sample?variant=10631504707"> 
                   <img src="admin/images/items/2nd_image/main/<?php echo "$get_product_img";?>" alt="" style="width:100px;height:100px;">    
                   </a>
                </div> 

               <div class="cart-item-info">
                   <div class="cart-item-title">
                        <a href="SingleProductDetails.php">1<span class="x"></span><?=$get_product_name?></a> 
                   </div>
                    <div class="cart-item-price"><span class="money" data-currency="USD"><?=$get_product_price?></span></div> 
            </div>
            </div>
        </div>
          </div>
        <?php
            $subTotal += $product_total;
            $increment++;
            }
        ?>

        <div class="subtotal"><span>Total</span><span class="cart-item-total-price">
            <span class="money" data-currency-usd="$225.00" data-currency="USD"><?=$product_total?></span>
        </span>
        </div>
        <div class="action">
                        <a href="cart.php" class="btn btn-default">View Cart</a><br>
                        <button class="btn btn-default" onclick="window.location.href='checkout.php'">Checkout</button>
        </div>


                </div>                               
    </div>

                        </div>
                    </div>
                </div>
            </header>
