<?php get_header(); ?>
    <section class="row bannercontainer p0">
        <div class="preloader"><img src="<?php echo get_template_directory_uri(); ?>/vendors/rs-plugin/assets/loader.gif" alt=""></div>
        <div class="row m0 banner main_slider">
            <ul>
                <?php
                    $args = array( 'post_type' => 'slider_banner', 'showposts' => -1);
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $large_image_url_zoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                ?>
                <li data-transition="random" data-slotamount="<?php echo get_the_id(); ?>" data-masterspeed="200" class="first-slide">
                    <img src="<?php echo $large_image_url_zoom[0];  ?>" alt="<?php echo get_the_title(); ?>" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
    
    <section class="row quick_blocks_row quick_blocks_row_home2">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 quick_block emmergency">
                    <div class="row m0 inner">
                        <div class="row heading m0">
                            <h5>Acesse agora</h5>
                            <h3>Resultados de Exames</h3>
                        </div>
                        <p>Veja o resultado de seus exames. Disponiveis para os medicos e pacientes.</p>
                        <a href="contact.html">Veja Agora</a>
                    </div>
                </div>
                <div class="col-sm-4 quick_block branches">
                    <div class="row m0 inner">
                        <div class="row heading m0">
                            <h5>Localização</h5>
                            <h3>Saiba onde Estamos</h3>
                        </div>
                        <p>Entre em contato com a cadim, estamos esperando por você.</p>
                        <a href="/contato">entrar em contato</a>
                    </div>
                </div>
                <div class="col-sm-4 quick_block bill_payments">
                    <div class="row m0 inner">
                        <div class="row heading m0">
                            <h5>Dúvidas ?</h5>
                            <h3>Tire seuas Dúvidas</h3>
                        </div>
                        <p>Reunimos as duvidas mais frequentes para você.</p>
                        <a href="/duvidas">Tirar Dúvidas</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="row service_tab">
        <div class="container">
            <div class="row titleRow">
                <h5>GET WELL SOON</h5>
                <h2>MEDICALPRO SERVICES</h2>
            </div>
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist" id="service_tab">
                    <li role="presentation" class="active"><a href="#heart_surgery" aria-controls="heart_surgery" role="tab" data-toggle="tab"><span></span>heart surgery</a></li>
                    <li role="presentation"><a href="#dna_testing" aria-controls="dna_testing" role="tab" data-toggle="tab"><span></span>dna testing</a></li>
                    <li role="presentation"><a href="#gen_treatment" aria-controls="gen_treatment" role="tab" data-toggle="tab"><span></span>gen treatment</a></li>
                    <li role="presentation"><a href="#emergency_care" aria-controls="emergency_care" role="tab" data-toggle="tab"><span></span>emergency care</a></li>
                    <li role="presentation"><a href="#ear_treatment" aria-controls="ear_treatment" role="tab" data-toggle="tab"><span></span>ear treatment</a></li>
                    <li role="presentation"><a href="#dental_care" aria-controls="dental_care" role="tab" data-toggle="tab"><span></span>dental care</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="heart_surgery">
                        <div class="col-sm-6">
                            <div class="row m0">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/pages/service/tab.png" alt="" class="img-responsive">
                                <div class="ts">trusted services</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row m0">
                                <h3>HEART SURGERY</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit sque quis varius raesent lacinia elit nec nisl.</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                <a href="single-service.html" class="view_all">read more</a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="dna_testing">
                        <div class="col-sm-6">
                            <div class="row m0">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/pages/service/tab.png" alt="" class="img-responsive">
                                <div class="ts">trusted services</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row m0">
                                <h3>Dna Testing</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit sque quis varius raesent lacinia elit nec nisl.</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                <a href="single-service.html" class="view_all">read more</a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="gen_treatment">
                        <div class="col-sm-6">
                            <div class="row m0">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/pages/service/tab.png" alt="" class="img-responsive">
                                <div class="ts">trusted services</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row m0">
                                <h3>General Treatment</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit sque quis varius raesent lacinia elit nec nisl.</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                <a href="single-service.html" class="view_all">read more</a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="emergency_care">
                        <div class="col-sm-6">
                            <div class="row m0">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/pages/service/tab.png" alt="" class="img-responsive">
                                <div class="ts">trusted services</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row m0">
                                <h3>Emergency Care</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit sque quis varius raesent lacinia elit nec nisl.</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                <a href="single-service.html" class="view_all">read more</a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ear_treatment">
                        <div class="col-sm-6">
                            <div class="row m0">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/pages/service/tab.png" alt="" class="img-responsive">
                                <div class="ts">trusted services</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row m0">
                                <h3>Ear Treatment</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit sque quis varius raesent lacinia elit nec nisl.</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                <a href="single-service.html" class="view_all">read more</a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="dental_care">
                        <div class="col-sm-6">
                            <div class="row m0">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/pages/service/tab.png" alt="" class="img-responsive">
                                <div class="ts">trusted services</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row m0">
                                <h3>Dental Care</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit sque quis varius raesent lacinia elit nec nisl.</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                <a href="single-service.html" class="view_all">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row recentpost_acc contentRowPad">
        <div class="container">           
            <div class="row m0 titleRow">
                <h5>recent posts</h5>
                <h2>from our blog</h2>
            </div>
            <div class="row recent_post_home recent_post_home3">
                <div class="col-sm-12 col-md-6">
                    <div class="media">
                        <div class="media-left">
                            <a href="single-post.html"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/1.jpg" alt="" class="img-reponsive"></a>
                        </div>
                        <div class="media-body">
                            <a href="single-post.html"><h4>We are having new department added to us</h4></a>
                            <div class="row m0 meta">By : <a href="#">John Doe</a> &nbsp; on : <a href="#">29th June 2015</a></div>
                            <p>Lorem ipsum dolor sit amet, conseings ctetur adipiscing elit. </p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="single-post.html"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/1.jpg" alt="" class="img-reponsive"></a>
                        </div>
                        <div class="media-body">
                            <a href="single-post.html"><h4>We are having new department added to us</h4></a>
                            <div class="row m0 meta">By : <a href="#">John Doe</a> &nbsp; on : <a href="#">29th June 2015</a></div>
                            <p>Lorem ipsum dolor sit amet, conseings ctetur adipiscing elit. </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="media">
                        <div class="media-left">
                            <a href="single-post.html"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/1.jpg" alt="" class="img-reponsive"></a>
                        </div>
                        <div class="media-body">
                            <a href="single-post.html"><h4>We are having new department added to us</h4></a>
                            <div class="row m0 meta">By : <a href="#">John Doe</a> &nbsp; on : <a href="#">29th June 2015</a></div>
                            <p>Lorem ipsum dolor sit amet, conseings ctetur adipiscing elit. </p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="single-post.html"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/1.jpg" alt="" class="img-reponsive"></a>
                        </div>
                        <div class="media-body">
                            <a href="single-post.html"><h4>We are having new department added to us</h4></a>
                            <div class="row m0 meta">By : <a href="#">John Doe</a> &nbsp; on : <a href="#">29th June 2015</a></div>
                            <p>Lorem ipsum dolor sit amet, conseings ctetur adipiscing elit. </p>
                        </div>
                    </div>
                </div>
                <a href="blog.html" class="view_all">view all posts</a>
             </div>
         </div>
    </section>
     
    <section class="row about_medicalpro_row">
        <div class="container">
            <div class="row titleRow">
                <h5>Variety of Services</h5>
                <h2>Our Departments</h2>
            </div>
            <div class="row">
                <ul class="nav nav-tabs department_tab" role="tablist">
                    <li role="presentation" class="active"><a href="#dept1" aria-controls="dept1" role="tab" data-toggle="tab">general health care</a></li>
                    <li role="presentation"><a href="#dept2" aria-controls="dept2" role="tab" data-toggle="tab">rehabilitation center</a></li>
                    <li role="presentation"><a href="#dept3" aria-controls="dept3" role="tab" data-toggle="tab">cancer care</a></li>
                    <li role="presentation"><a href="#dept4" aria-controls="dept4" role="tab" data-toggle="tab">cardiac clinic</a></li>
                    <li role="presentation"><a href="#dept5" aria-controls="dept5" role="tab" data-toggle="tab">nurology</a></li>
                    <li role="presentation"><a href="#dept6" aria-controls="dept6" role="tab" data-toggle="tab">dental care</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="dept1">
                        <div class="row m0 about_medicalpro">
                            <div class="row m0 inner">
                                <div class="col-sm-12 col-md-6 img">
                                    <div class="row">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/pages/about/about2.png" alt="" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 content">
                                    <div class="row">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis varius Praesent lacinia elit nec nisl.</h3>
                                        <p>Fusce ut velit semper, semper arcu quis, aliquam magna. Etiam sed justo et sem varius euismod. In ac justo urna. Donec tincid unt nisl semper sapien ullamcorper, <br><br>Nec imperdiet augue pretium. Curabitur eu ligula euismod, inter dum libero at, tincidunt sem. Integer ut lacus.</p>
                                        <a href="about.html" class="view_all">about medicalpro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="dept2">
                        <div class="row m0 about_medicalpro">
                            <div class="row m0 inner">
                                <div class="col-sm-12 col-md-6 img">
                                    <div class="row">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/pages/about/about2.png" alt="" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 content">
                                    <div class="row">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis varius Praesent lacinia elit nec nisl.</h3>
                                        <p>Fusce ut velit semper, semper arcu quis, aliquam magna. Etiam sed justo et sem varius euismod. In ac justo urna. Donec tincid unt nisl semper sapien ullamcorper, <br><br>Nec imperdiet augue pretium. Curabitur eu ligula euismod, inter dum libero at, tincidunt sem. Integer ut lacus.</p>
                                        <a href="about.html" class="view_all">about medicalpro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="dept3">
                        <div class="row m0 about_medicalpro">
                            <div class="row m0 inner">
                                <div class="col-sm-12 col-md-6 img">
                                    <div class="row">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/pages/about/about2.png" alt="" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 content">
                                    <div class="row">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis varius Praesent lacinia elit nec nisl.</h3>
                                        <p>Fusce ut velit semper, semper arcu quis, aliquam magna. Etiam sed justo et sem varius euismod. In ac justo urna. Donec tincid unt nisl semper sapien ullamcorper, <br><br>Nec imperdiet augue pretium. Curabitur eu ligula euismod, inter dum libero at, tincidunt sem. Integer ut lacus.</p>
                                        <a href="about.html" class="view_all">about medicalpro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="dept4">
                        <div class="row m0 about_medicalpro">
                            <div class="row m0 inner">
                                <div class="col-sm-12 col-md-6 img">
                                    <div class="row">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/pages/about/about2.png" alt="" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 content">
                                    <div class="row">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis varius Praesent lacinia elit nec nisl.</h3>
                                        <p>Fusce ut velit semper, semper arcu quis, aliquam magna. Etiam sed justo et sem varius euismod. In ac justo urna. Donec tincid unt nisl semper sapien ullamcorper, <br><br>Nec imperdiet augue pretium. Curabitur eu ligula euismod, inter dum libero at, tincidunt sem. Integer ut lacus.</p>
                                        <a href="about.html" class="view_all">about medicalpro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="dept5">
                        <div class="row m0 about_medicalpro">
                            <div class="row m0 inner">
                                <div class="col-sm-12 col-md-6 img">
                                    <div class="row">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/pages/about/about2.png" alt="" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 content">
                                    <div class="row">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis varius Praesent lacinia elit nec nisl.</h3>
                                        <p>Fusce ut velit semper, semper arcu quis, aliquam magna. Etiam sed justo et sem varius euismod. In ac justo urna. Donec tincid unt nisl semper sapien ullamcorper, <br><br>Nec imperdiet augue pretium. Curabitur eu ligula euismod, inter dum libero at, tincidunt sem. Integer ut lacus.</p>
                                        <a href="about.html" class="view_all">about medicalpro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="dept6">
                        <div class="row m0 about_medicalpro">
                            <div class="row m0 inner">
                                <div class="col-sm-12 col-md-6 img">
                                    <div class="row">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/pages/about/about2.png" alt="" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 content">
                                    <div class="row">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis varius Praesent lacinia elit nec nisl.</h3>
                                        <p>Fusce ut velit semper, semper arcu quis, aliquam magna. Etiam sed justo et sem varius euismod. In ac justo urna. Donec tincid unt nisl semper sapien ullamcorper, <br><br>Nec imperdiet augue pretium. Curabitur eu ligula euismod, inter dum libero at, tincidunt sem. Integer ut lacus.</p>
                                        <a href="about.html" class="view_all">about medicalpro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="row team_section bgf">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3 team_menu">
                    <div class="row titleRow text-left">
                        <h5>our doctors</h5>
                        <h2>experienced team</h2>
                    </div>
                    <div class="row">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active media"><a href="#doctor1" aria-controls="doctor1" role="tab" data-toggle="tab">
                                <div class="media-left"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.png" alt=""></div>
                                <div class="media-body media-middle">
                                    <h5>Johnathan doe</h5>
                                    <div class="row designation">Orthopedic Surgen</div>
                                </div>
                            </a></li>
                            <li role="presentation" class="media"><a href="#doctor2" aria-controls="doctor2" role="tab" data-toggle="tab">
                                <div class="media-left"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.png" alt=""></div>
                                <div class="media-body media-middle">
                                    <h5>Angelina johnson</h5>
                                    <div class="row designation">Nurology</div>
                                </div>
                            </a></li>
                            <li role="presentation" class="media"><a href="#doctor3" aria-controls="doctor3" role="tab" data-toggle="tab">
                                <div class="media-left"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.png" alt=""></div>
                                <div class="media-body media-middle">
                                    <h5>Sandra Anderson</h5>
                                    <div class="row designation">Cancer Care</div>
                                </div>
                            </a></li>
                            <li role="presentation" class="media"><a href="#doctor4" aria-controls="doctor4" role="tab" data-toggle="tab">
                                <div class="media-left"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.png" alt=""></div>
                                <div class="media-body media-middle">
                                    <h5>Becca Adkins</h5>
                                    <div class="row designation">Health Care</div>
                                </div>
                            </a></li>
                        </ul>
                        <a href="doctors.html" class="view_all">view all doctors</a>
                    </div>
                </div>
               <div class="col-sm-8 col-md-9 team_descss">
                    <div class="row">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane media active" id="doctor1">
                                <div class="media-left media-bottom">
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="media-body">
                                    <div class="row titleRow text-left">
                                        <h2>Johnathan doe</h2>
                                        <h5>orthopedic surgon</h5>
                                    </div>
                                    <p>Fusce ut velit semper, semper arcu quis, aliquam sed justo et sem varius euismod. In ac justo urna unt nisl semper sapien  <br><br> Nec imperdiet augue pretium. Curabitur eu ligula dum libero at, tincidunt sem.</p>
                                    <ul class="social_list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!-- Doctor about-->
                            <div role="tabpanel" class="tab-pane media" id="doctor2">
                                <div class="media-left media-bottom">
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="media-body">
                                    <div class="row titleRow text-left">
                                        <h2>Angelina Johnson</h2>
                                        <h5>nurology</h5>
                                    </div>
                                   <p>Fusce ut velit semper, semper arcu quis, aliquam sed justo et sem varius euismod. In ac justo urna unt nisl semper sapien  <br><br> Nec imperdiet augue pretium. Curabitur eu ligula dum libero at, tincidunt sem.</p>
                                    <ul class="social_list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!-- Doctor about-->
                            <div role="tabpanel" class="tab-pane media" id="doctor3">
                                <div class="media-left media-bottom">
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="media-body">
                                    <div class="row titleRow text-left">
                                        <h2>Sandra Anderson</h2>
                                        <h5>Cancer Care</h5>
                                    </div>
                                    <p>Fusce ut velit semper, semper arcu quis, aliquam sed justo et sem varius euismod. In ac justo urna unt nisl semper sapien  <br><br> Nec imperdiet augue pretium. Curabitur eu ligula dum libero at, tincidunt sem.</p>
                                    <ul class="social_list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!-- Doctor about-->
                            <div role="tabpanel" class="tab-pane media" id="doctor4">
                                <div class="media-left media-bottom">
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="media-body">
                                    <div class="row titleRow text-left">
                                        <h2>Becca Adkins</h2>
                                        <h5>Health Care</h5>
                                    </div>
                                   <p>Fusce ut velit semper, semper arcu quis, aliquam sed justo et sem varius euismod. In ac justo urna unt nisl semper sapien  <br><br> Nec imperdiet augue pretium. Curabitur eu ligula dum libero at, tincidunt sem.</p>
                                    <ul class="social_list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!-- Doctor about-->
                        </div>
                        <div class="visible-xs view_all_btn_4_mobile">
                            <a href="doctors.html" class="view_all">view all doctors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="row recent_post_home2">
        <div class="container">
            <div class="row titleRow">
                <h5>What People Say</h5>
                <h2>Our Testimonials</h2>
            </div>
            <div class="row">
                <div class="col-sm-4 recent_post">
                    <div class="row m0 inner">
                        <div class="postText row m0">
                            Etiam tristique sagittis pulvinar. Cras scelerisque dui ut, bibendum ante. dit neque eget lobortis. Nam eleifend sollicitudin nulla quis Interdum et malesuada fames.
                        </div>
                        <div class="media authorMeta">
                            <div class="media-left"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.png" alt=""></div>
                            <div class="media-body media-middle">
                                <h5>Johnathan doe</h5>
                                <div class="row designation">www.themedesigner.in</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 recent_post">
                    <div class="row m0 inner">
                        <div class="postText row m0">
                            Etiam tristique sagittis pulvinar. Cras scelerisque dui ut, bibendum ante. dit neque eget lobortis. Nam eleifend sollicitudin nulla quis Interdum et malesuada fames.
                        </div>
                        <div class="media authorMeta">
                            <div class="media-left"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.png" alt=""></div>
                            <div class="media-body media-middle">
                                <h5>Angelina johnson</h5>
                                <div class="row designation">www.themeforest.net</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 recent_post">
                    <div class="row m0 inner">
                        <div class="postText row m0">
                            Etiam tristique sagittis pulvinar. Cras scelerisque dui ut, bibendum ante. dit neque eget lobortis. Nam eleifend sollicitudin nulla quis Interdum et malesuada fames.
                        </div>
                        <div class="media authorMeta">
                            <div class="media-left"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.png" alt=""></div>
                            <div class="media-body media-middle">
                                <h5>bekka adkins</h5>
                                <div class="row designation">www.themedesigner.in</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="row book_banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="row m0">
                        <h3 class="bannerTitle">ONLINE HASSLE FREE Appointment BOOKING</h3>
                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia, ipsum eu vulputate pulvinar,</h5>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="row m0">
                        <a href="#" data-toggle="modal" data-target="#appointmefnt_form_pop" class="view_all">book your appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
