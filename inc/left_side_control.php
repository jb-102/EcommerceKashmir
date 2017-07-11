   


        <div id="left-coloum" class="col-md-3">
                    <!-- Begin Navigation -->

                    <div class="navigation hidden-sm hidden-xs">
                        <nav class="navbar" role="navigation">
                            <div class="collapse navbar-collapse">
                                <ul class="main-nav">


            <?php
                include("inc/db.php");
                    $getcategory = "select * from main_categories";
                    $run3 = mysqli_query($con , $getcategory);

                    while ($row = mysqli_fetch_array($run3)) 
                    {
                        $maincategory = $row['main_cat_name'];
                    
                    ?>           
                            <li class="dropdown mega-menu">

                                        <a href="products.php?var_name=<?php echo "$maincategory";?>" class="dropdown-link">
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
                                        <a href="products.php?var_name_cat=<?php echo "$subcategoryname";?>" class="dropdown-link">
                                            <span><?php echo "$subcategoryname";?></span>
                                        </a>

                                        <span class="expand">
                                            <i class="fa fa-angle-right hidden-xs hidden-sm"></i>
                                            <i class="fa fa-plus visible-xs visible-sm"></i>
                                        </span>

                                        <ul class="dropdown-menu dropdown-menu-sub">

                                        <?php
                                            $getproducts = "select * from sub_category where sub_cat_parent='$subcategoryname'";
                                            $run1 = mysqli_query($con , $getproducts);


                                             while ($row = mysqli_fetch_array($run1)) {
                                                $productname = $row['sub_cat_name'];


                                        ?>

                                            <li><a href="products.php"><?php echo "$productname"; ?></a></li>

                                        <?php
                                            }
                                        ?>



                                        </ul>
                                 </div>


                                 <?php
                                    if($row=mysqli_fetch_array($run)){
                                        $subcategoryname = $row['cat_name'];


                                 ?>
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
                                            $getproducts = "select * from sub_category where sub_cat_parent='$subcategoryname'";
                                            $run2 = mysqli_query($con , $getproducts);


                                             while ($row = mysqli_fetch_array($run2)) {
                                                $productname = $row['sub_cat_name'];


                                        ?>

                                            <li><a href="products.php"><?php echo "$productname"; ?></a></li>

                                        <?php

                                            }
                                        ?>



                                        </ul>
                                 </div>
                                <?php
                                      }

                                ?>

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
                        <div class="sb-best-seller">


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

<?php
    }
?>
                        </div>

                    </div>

                    <!-- End Best Seller -->
                    <!-- Begin Best Seller -->


                    <div id="sb-new-product" class="sb-wrapper hidden-sm hidden-xs">

                        <h4 class="sb-title">Kashmir Arts</h4>

                        <div class="sb-new-product">

<?php
	include("inc/db.php");
	$getkashmirart = "select * from products limit 4";
	$run = mysqli_query($con , $getkashmirart);
	while ($row = mysqli_fetch_array($run)) {
		$getid=$row['item_id'];
		$getimage = $row['item_ist_view'];
		$gettitle = $row['item_name'];
		$getprice = $row['item_price'];

?>
                            <div class="row">
                                <div class="sb-product-head col-sm-4 col-xs-4">
                                    <a href="SingleProductDetails.php">
                                        <img src="admin/images/<?php echo "$getimage";?>" alt="product image" />
                                    </a>
                                </div>
                                <div class="sb-product-content col-sm-8 col-xs-8">
                                    <div class="bp-content-inner">
                                        <a href="SingleProductDetails.php?var_id=<?php echo "$getid";?>"><?=$gettitle?></a>
                                        <div class="sb-price">


                                            <span class="price-sale"><span class='money'><?=$getprice?></span></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
<?php
	}
?>


                        </div>


                    </div>

                    <!-- End Best Seller -->
                    <!-- Begin Banner -->
                    <!-- End Banner -->
                </div>
