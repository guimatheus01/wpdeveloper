<?php
//Title with separator shortcode for VC
$title = $subtitle = $instagram_type = $instagram_userid = $instagram_access_token = $img_limit = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

    
    if($instagram_userid || $instagram_access_token){
        $inst_id = uniqid();?>
        <div class="animation-img <?php print esc_html($css_class); ?>">
            <?php if($instagram_type == 'type_1'){ $img_limit = '7';?>
                <div class="images-block">
                    <div class="images-block-title">
                        <?php if (!empty($title)) { print wp_kses_post( '<h3 class="title">'.$title.'</h3>' );}?>
                        <?php if (!empty($subtitle)) { print wp_kses_post( '<p>'.$subtitle.'</p>' );}?>
                    </div>
                    <div class="top-img top1"></div>
                </div>  
                <div class="bottom-img bottom2">

                </div>
                
            <?php } elseif($instagram_type == 'type_2') { $img_limit = '3';?>
                <div class="images-block">
                    <div class="images-block-title">
                        <?php if (!empty($title)) { print wp_kses_post( '<h3 class="title">'.$title.'</h3>' );}?>
                        <?php if (!empty($subtitle)) { print wp_kses_post( '<p>'.$subtitle.'</p>' );}?>
                    </div>
                    <div class="top-img">
                        <div id="<?php print esc_html( $inst_id );?>" class="instagram-item"></div>
                    </div>
                </div>
            <?php } elseif($instagram_type == 'type_3'){ $img_limit = '4';?>
                <div class="images-block">
                    <div class="images-block-title">
                        <?php if (!empty($title)) { print wp_kses_post( '<h3 class="title">'.$title.'</h3>' );}?>
                        <?php if (!empty($subtitle)) { print wp_kses_post( '<p>'.$subtitle.'</p>' );}?>
                    </div>
                </div>  
                <div class="bottom-img">
                    <div id="<?php print esc_html( $inst_id );?>" class="instagram-item"></div>
                </div>
            <?php } ?>
            <div id="<?php print esc_html( $inst_id );?>" class="instagram-item" style="display:none;"></div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                //Instagram
                try{Typekit.load();}catch(e){}
                var feed = new Instafeed({
                        get: 'user',
                        userId: '<?php print esc_html( $instagram_userid ); ?>',
                        'limit': '<?php print esc_html( $img_limit ); ?>',
                        accessToken: '<?php print esc_html( $instagram_access_token ); ?>',
                        template: '<a class="image" href="{{link}}"><img src="{{image}}" alt="instagram"></a>',
                        target: '<?php print esc_html( $inst_id );?>',
                        resolution: 'standard_resolution',
                        after: function() {
                            $('.instagram-item a').each(function(index, el) {
                                if(index < 3){
                                    $('.top1').append($(this));
                                }else{
                                    $('.bottom2').append($(this));
                                }                              
                            });
                        }
                });
                feed.run();
            });
        </script>
<?php } ?>