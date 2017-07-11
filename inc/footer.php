
            <!-- Begin Footer -->

            <footer id="footer-content">
                <!-- Begin  Footer Top -->
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div id="footer-info" class="col-md-3 col-sm-3 col-xs-6">
                                <div class="footer-block">

                                    <h4>Information</h4>
                                    <ul class="list-links list-unstyled">

                                        <li>
                                            <a href="index.html">Special</a>
                                        </li>

                                        <li>
                                            <a href="index.html">Top sellers</a>
                                        </li>

                                        <li>
                                            <a href="pages/contact-us.html">Contact Us</a>
                                        </li>

                                        <li>
                                            <a href="pages/about-us.html">About Us</a>
                                        </li>

                                        <li>
                                            <a href="blogs/news.html">Blog</a>
                                        </li>

                                    </ul>

                                </div>
                            </div>

                            <div id="footer-custom" class="col-md-3 col-sm-3 col-xs-6">
                                <div class="footer-block">
                                    <h4>Custom Block</h4>
                                    <ul class="list-links list-unstyled">
                                        <li>
                                            <a href="account/login.html">Account</a>
                                        </li>

                                        <li>
                                            <a href="pages/wishlist.html">Wishlist</a>
                                        </li>

                                        <li>
                                            <a href="cart.html">Shopping Cart</a>
                                        </li>

                                        <li>
                                            <a href="blogs/news.html">News</a>
                                        </li>

                                        <li>
                                            <a href="collections.html">Collections</a>
                                        </li>

                                    </ul>

                                </div>
                            </div>


                            <div id="footer-contact" class="col-md-3 col-sm-3 col-xs-12">
                                <div class="footer-block">
                                    <h4>Contact Us</h4>
                                    <ul class="list-links list-unstyled">
                                        <li class="address">Srinagar, India, 190001.</li>
                                        <li class="phone">7006121212</li>
                                        <li class="phone">7006121212</li>
                                        <li class="mail"><a href="javascript:;">info@shoppingsite.com</a></li>
                                    </ul>
                                </div>
                            </div>



                <div id="widget-newsletter" class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-block">

                        <h4>Newsletter</h4>

                        <ul class="list-links list-unstyled">


                            <li>Subscribe to our newsletter and receive the latest offers, discounts and updates</li>

                            <li>


                                <?php
                                include("inc/db.php");
                                if(isset($_POST['submit'])){
                                    $getemail = $_POST['email'];
                                    $insert = "INSERT INTO subscription (sub_email) VALUES('$getemail')";
                                    $run = mysqli_query($con , $insert);
                                    if($run){
                                        echo "You have successfully subscribed to our Newsletter";
                                    }


                                }

                                ?>

                                <form action="" method="post" id="mc-embedded-subscribe-form" class="form-inline form-subscribe" name="mc-embedded-subscribe-form">
                                    <input class="form-control" type="email" name="email" required placeholder="Enter your e-mail" id="email-input" />
                                    <button id="email-submit" type="submit" name="submit" title="Subscibe" class="btn btn-default btn-subscribe">Subscribe</button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>

                        </div>
                    </div>
                </div>
                <!-- End  Footer Top -->

                <div id="checkLayout">
                    <span class="visible-xs-block"></span>
                    <span class="visible-sm-block"></span>
                    <span class="visible-md-block"></span>
                    <span class="visible-lg-block"></span>
                </div>

            </footer>

            <!-- End Footer -->