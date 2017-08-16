
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
                                            <a href="index.html">Home</a>
                                        </li>

                                        <li>
                                            <a href="index.html">Collection</a>
                                        </li>

                                        <li>
                                            <a href="pages/contact-us.html">Contact Us</a>
                                        </li>

                                        <li>
                                            <a href="pages/about-us.html">About Us</a>
                                        </li>

                                    </ul>

                                </div>
                            </div>

                            <div id="footer-custom" class="col-md-3 col-sm-3 col-xs-6">
                                <div class="footer-block">
                                    <h4>Custom Block</h4>
                                    <ul class="list-links list-unstyled">
                                        <li>
                                            <a href="account/login.html">Privacy Policy</a>
                                        </li>

                                        <li>
                                            <a href="pages/wishlist.html">Terms and Condition</a>
                                        </li>

                                        <li>
                                            <a href="cart.html">Return Policy</a>
                                        </li>

                                        <li>
                                            <a href="blogs/news.html">Register</a>
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
                                        <form method="post" id="mc-embedded-subscribe-form" class="form-inline form-subscribe">
                                            <input class="form-control" type="email" required placeholder="Enter your e-mail" name="email" id="email-input" />
                                            <button id="email-submit" name="subscribe" type="submit" title="Subscibe" class="btn btn-default btn-subscribe">Subscribe</button>
                                        </form>
<?php
    include("db.php");

    if(isset($_POST['subscribe']))
    {
        $get_email = $_POST['email'];
        $insert = "insert into subscription (sub_email) values('$get_email')";
        $run = mysqli_query($con , $insert);
        if($run)
        {
            echo "
                <script>
                    alert('You have successfully subscribe to our Newsletter');
                </script>
            ";
        }
    }

?>

                                    </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End  Footer Top -->
<div class="footer-top" style="border-top: 1px solid grey;">
                    <div class="container">
                        <div class="row">
                            <div id="footer-info" class="col-md-12 col-sm-3 col-xs-6">
                                <div class="footer-block">

                                    <p>&nbsp;</p>
                                   
                                </div>
                            </div>

                           

                        </div>
                    </div>
                </div>


                <div id="checkLayout">
                    <span class="visible-xs-block"></span>
                    <span class="visible-sm-block"></span>
                    <span class="visible-md-block"></span>
                    <span class="visible-lg-block"></span>
                </div>

            </footer>

            <!-- End Footer -->