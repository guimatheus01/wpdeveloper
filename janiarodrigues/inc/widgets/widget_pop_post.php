<?php
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*======================================Widget Popular Posts======================================================================*/
class trueTopPostsWidget extends WP_Widget {
  function __construct() {
    parent::__construct(
      'popularpost',
      'Theme Popular Posts',
      array( 'description' => 'The most Popular Posts on your blog.' )
    );
  }
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $posts_per_page = $instance['posts_per_page'];
    print wp_kses_post( $args['before_widget'] );
    if ( ! empty( $title ) )
      print wp_kses_post( $args['before_title'] ). $title . $args['after_title'];

    $popularpost = new WP_Query( array( 'posts_per_page' => $posts_per_page, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC',  'post__not_in' => get_option( 'sticky_posts' )  ) );
    if( $popularpost->have_posts() ):
    ?>
      <ul class="wpp-list">
        <?php while( $popularpost->have_posts() ): $popularpost->the_post();?>
            <li>
            <?php 
              $image_id = get_post_thumbnail_id();
              $image_link  = wp_get_attachment_url($image_id);
              if($image_link){ print wp_kses_post( '<a href="'.get_the_permalink().'"><img class="wpp-thumbnail" src="'.$image_link.'" alt="image"></a>' );}
            ?>              
              <a href="<?php the_permalink() ?>" class="wpp-post-title"><?php the_title(); ?></a>
              <span class="post-stats"><span class="wpp-date">posted on <?php the_time('F j, Y'); ?></span></span>
            </li>
        <?php endwhile;?>
      </ul>
    <?php endif;
    wp_reset_postdata();


    print wp_kses_post( $args['after_widget'] );
  }
  // Widget Backend
  public function form( $instance ) {
    $title = $posts_per_page = '';
    if ( isset( $instance[ 'title' ] ) ) {$title = $instance[ 'title' ];}
    if ( isset( $instance[ 'posts_per_page' ] ) ) {$posts_per_page = $instance[ 'posts_per_page' ];}
    // Widget admin form
    ?>
    <p>
      <label for="<?php print wp_kses_post( $this->get_field_id( 'title' ) ); ?>">Title:</label> 
      <input class="widefat" id="<?php print wp_kses_post( $this->get_field_id( 'title' ) ); ?>" name="<?php print wp_kses_post( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php print esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php print wp_kses_post( $this->get_field_id( 'posts_per_page' ) ); ?>">Show up to:</label> 
      <input id="<?php print wp_kses_post( $this->get_field_id( 'posts_per_page' ) ); ?>" name="<?php print wp_kses_post( $this->get_field_name( 'posts_per_page' ) ); ?>" type="text" value="<?php print wp_kses_post( ($posts_per_page) ? esc_attr( $posts_per_page ) : '5' ); ?>" size="3" /> posts
    </p>
  <?php
  }
        
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '3';
    return $instance;
  }
} // Class wpb_widget ends here
 
// Register and load the widget
function true_top_posts_widget_load() {
  register_widget( 'trueTopPostsWidget' );
}
add_action( 'widgets_init', 'true_top_posts_widget_load' );