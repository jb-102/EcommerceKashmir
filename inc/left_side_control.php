   


        <div id="left-coloum" class="col-md-3">
                    <!-- Begin Navigation -->

                    <div class="navigation hidden-sm hidden-xs">
                        <nav class="navbar" role="navigation">
                            <div class="collapse navbar-collapse">
                                <ul class="main-nav">


            <?php
                include("inc/db.php");
                    $getcategory = "select * from main_categories";
                    $run = mysqli_query($con , $getcategory);

                    while ($row = mysqli_fetch_array($run)) 
                    {
                        $get_name =$row['main_cat_name'];
                        $maincategory = $row['main_cat_name'];
                    
                    ?>           
                            <li class="dropdown mega-menu">

                                        <a href="products.php?var_name=<?php echo "$get_name";?>" class="dropdown-link">
                                                <span><?php echo "$maincategory" ?></span>
                                        </a>
            

                                        <span class="expand">
                                            <i class="fa fa-angle-right hidden-xs hidden-sm"></i>
                                            <i class="fa fa-plus visible-xs visible-sm"></i>
                                        </span>

                        <div class="dropdown-menu dropdown-menu-1 column-4" style="min-height: 300px; ">
                            <div class="row">

                                

                        <?php

                            $getsubcategory = "select * from category WHERE main_category = '$maincategory'";
                            $run = mysqli_query($con , $getsubcategory);

                            while($row = mysqli_fetch_array($run))
                            {
                                 $subcategoryname = $row['cat_name'];      

                        ?>

                               <div class="mega-col mega-col-1 col-sm-3">
                                                                                  
                                    
                                    <div class="dropdown mega-sub-link">
                                        <a href="index.html" class="dropdown-link">
                                            <span><?php echo "$subcategoryname";?></span>
                                        </a>

                                        <span class="expand">
                                            <i class="fa fa-angle-right hidden-xs hidden-sm"></i>
                                            <i class="fa fa-plus visible-xs visible-sm"></i>
                                        </span>

                                        <ul class="dropdown-menu dropdown-menu-sub">

<?php
    $getproducts = "select * from products where item_sub_category='$subcategoryname'";
    $run = mysqli_query($con , $getproducts);

    while ($row = mysqli_fetch_array($run)) {
        $productname = $run['item_name'];


?>

                                            <li><a href="products.php"><?php echo "$productname"; ?></a></li>

<?php
    }
?>



                                        </ul>
                                 </div>
      

                        </div>
                                <?php
                                      }
                                ?>


                                            </div>
                                        </div>

                                    </li>
                                  <?php 
                                        } 
                                  ?>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!-- End Navigation -->
                    <!-- Begin Sidebar Blog -->
                    <!-- End Sidebar Blog -->
                    <!-- Begin Sidebar Catalog -->
                    <!-- End Sidebar Catalog -->
                    <!-- Begin Best Seller -->


                    <div id="sb-best-seller" class="sb-wrapper hidden-sm hidden-xs">

                        <h4 class="sb-title">Popular Products</h4>


<?php
    include("inc/db.php");

    $getpopular = "select * from products where is_popular='yes' limit 4 ";
    $run = mysqli_query($con , $getpopular);

    while ($row = mysqli_fetch_array($run)) {
        $productid = $row['item_id'];
        $productimg = $row['item_ist_view'];
        $productname = $row['item_name'];
        $productprice = $row['item_price'];
        
?>

                        <div class="sb-best-seller">
                            <div class="row">
                                <div class="sb-product-head col-sm-4 col-xs-4">
                                    <a href="SingleProductDetails.php?var_id=<?php echo "$productid"; ?>">
                                        <img src="admin/images/<?php echo "$productimg";?>" alt="popular product" style="height: 57px"/>
                                    </a>                 
                                </div>
                                <div class="sb-product-content col-sm-8 col-xs-8">
                                    <div class="bp-content-inner">
                                        <a href="SingleProductDetails.php?var_id=<?php echo "$productid"; ?>"><?php echo "$productname";?></a>
                                        <div class="sb-price">


                                            <span class="price">

                                                <span class='money'>Rs <?php echo "$productprice"; ?></span>

                                            </span>


                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>

<?php
    }
?>

                    </div>

                    <!-- End Best Seller -->
                    <!-- Begin Best Seller -->


                    <div id="sb-new-product" class="sb-wrapper hidden-sm hidden-xs">

                        <h4 class="sb-title">New Products</h4>

                        <div class="sb-new-product">

                            <div class="row">
                                <div class="sb-product-head col-sm-4 col-xs-4">
                                    <a href="products/condimentum-turpis.html">
                                        <img src="cdn.shopify.com/s/files/1/1009/3778/products/18_1024x1024_1107cded-b35d-477d-90d3-2aab0d24149a_small1a38.jpg?v=1447414867" alt="Kinla Product Sample" />
                                    </a>
                                </div>
                                <div class="sb-product-content col-sm-8 col-xs-8">
                                    <div class="bp-content-inner">
                                        <a href="products/condimentum-turpis.html">Kinla Product Sample</a>
                                        <div class="sb-price">


                                            <span class="price-sale"><span class='money'>$150.00</span></span>
                                            <span class="price-compare"> <span class='money'>$229.00</span></span>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End Best Seller -->
                    <!-- Begin Banner -->
                    <!-- End Banner -->
                </div>
