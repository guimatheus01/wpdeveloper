    <footer class="row">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-5 footer_menuList">
                    <div class="heading row m0"><img src="<?php echo get_template_directory_uri(); ?>/images/logo/1.png" alt=""></div>
                    <div class="row menuList">
                        <ul class="firstOrderList nav">
                            <li class="active"><a href="#">home</a></li>
                            <li><a href="#">services</a></li>
                            <li><a href="#">doctors</a></li>
                            <li><a href="#">department</a></li>
                            <li><a href="#">pages</a></li>
                        </ul>
                        <ul class="secondOrderList nav">                                
                            <li><a href="#">blog</a></li>
                            <li><a href="#">contact</a></li>
                            <li><a href="#">shop</a></li>
                            <li><a href="#">faq</a></li>
                            <li><a href="#">shortcodes</a></li>
                        </ul>
                        <ul class="thirdOrderList nav">
                            <li><a href="#">terms &amp; condition</a></li>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="#">legal desclaimer</a></li>
                            <li><a href="#">sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6 col-lg-3 footer_address">
                    <div class="heading row m0"></div>
                    <div class="row address m0">
                        <div class="media address_line">
                            <div class="media-left icon"><i class="fa fa-map-marker"></i></div>
                            <div class="media-body address_text">Area  51 , Some near unknown, <br>USA 000000</div>
                        </div>
                        <div class="media address_line">
                            <div class="media-left icon"><i class="fa fa-envelope"></i></div>
                            <div class="media-body address_text">info@medicalprotheme.com</div>
                        </div>
                        <div class="media address_line">
                            <div class="media-left icon"><i class="fa fa-phone"></i></div>
                            <div class="media-body address_text">123 7890 456</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 newsletter">
                    <div class="heading row m0">
                        <h3>SIGNUP NEWSLETTER</h3>
                    </div>
                    <form action="#" class="row m0 newsletterForm">
                        <input type="text" class="form-control" placeholder="Your Name">
                        <input type="email" class="form-control" placeholder="Enter your Email Address">
                        <input type="submit" class="form-control" value="submit">
                    </form>
                </div>
            </div>
            <div class="row m0 footer_bottom">
                <ul class="list-inline social_menu m0 fleft">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
                <div class="fright copyright">&copy; <a href="index.html">medicalpro 2015</a>. Made with love for great people.</div>
            </div>
        </div>
    </footer>
    
    <div class="modal fade" id="appointmefnt_form_pop" tabindex="-1" role="dialog" aria-labelledby="appointmefnt_form_pop">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="#" class="row m0 appointment_home_form2">                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times-circle-o"></i>
                        </button>
                        <h2 class="title">BOOK<br>NOW</h2>
                        <div class="form_inputs row m0">
                            <div class="row m0 input_row">
                                <div class="col-sm-12 col-md-12 col-lg-6 p0">
                                    <label for="app_fname">First Name</label>
                                    <input type="text" class="form-control" id="app_fname" placeholder="Your First Name">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 p0">
                                    <label for="app_lname">Last Name</label>
                                    <input type="text" class="form-control" id="app_lname" placeholder="Your Last Name">
                                </div>
                            </div>
                            <div class="row m0 input_row">
                                <label for="app_email">Email Address</label>
                                <input type="email" class="form-control" id="app_email" placeholder="Enter your Email Address">
                            </div>
                            <div class="row m0 input_row">
                                <label for="app_phone">Phone Number</label>
                                <input type="tel" class="form-control" id="app_phone" placeholder="Enter your Phone Number">
                            </div>
                            <div class="row m0 input_row">
                                <label for="app_date">Booking Date</label>                                
                                <div class="input-append date">
                                    <input type="text" class="form-control" name="date" id="app_date" placeholder="Select the Appointment Date">
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                            <div class="row m0 input_row">
                                <label for="app_texts">Message</label>
                                <textarea  id="app_texts" class="form-control" placeholder="Write down the Message"></textarea>
                            </div>
                            <input type="submit" class="form-control" value="book your appointment now">
                        </div>
                        <div class="row m0 form_footer">
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/call-now3.png" alt="">123 7890 456</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    
    <!--jQuery, Bootstrap and other vendor JS-->
    
    <!--jQuery-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.3.min.js"></script>
    
    <!--Bootstrap JS-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    
    <!--Owl Carousel-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/owl.carousel/js/owl.carousel.min.js"></script>
    
    <!--Counter Up-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/counterup/jquery.counterup.min.js"></script>
    
    <!--Waypoints-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/waypoints/waypoints.min.js"></script>
    
    <!--Bootstrap Date-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    
    <!--FlexSlider-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/flexslider/jquery.flexslider-min.js"></script>
    
    <!--RV-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    
    <!--Strella JS-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/revs.js"></script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>