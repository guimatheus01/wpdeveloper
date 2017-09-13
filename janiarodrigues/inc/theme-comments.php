<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Fist full of comments
if ( ! function_exists( 'floris_cust_cmnt' ) ) {
	function floris_cust_cmnt( $comment, $args, $depth ) {
	   $GLOBALS['comment'] = $comment; ?>

	   	<div class="comment-box">
      		<?php if( get_comment_type() == 'comment' ) { ?>
	            <?php print wp_kses_post( get_avatar( $comment, apply_filters( 'floris_comment_avatar_size', $size = 130 ) ) ); ?>
            <?php } ?>
            <span class="comment-date"><?php print wp_kses_post( get_comment_date('F j, Y') ); ?></span>
            <h3 class="comment-title"><?php print wp_kses_post( get_comment_author() ); ?></h3>
            <div class="comment-entry" id="comment-<?php comment_ID(); ?>">
				<?php comment_text(); ?>
				<?php if ( $comment->comment_approved == '0' ) { ?>
	                <p class='unapproved'><?php esc_html_e( 'Your comment is awaiting moderation.', 'floris' ); ?></p>
	            <?php } ?>
			</div><!-- /comment-entry -->
            <?php $floris_reply_text = ''; $floris_reply_text = esc_html__( 'Reply', 'floris' ); ?>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => $floris_reply_text,  'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- /.reply -->

		</div>
	<?php
	}
}

// PINGBACK / TRACKBACK OUTPUT
if ( ! function_exists( 'floris_list_pings' ) ) {
	function floris_list_pings( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment; ?>

		<li id="comment-<?php comment_ID(); ?>">
			<span class="author"><?php comment_author_link(); ?></span> -
			<span class="date"><?php print wp_kses_post( get_comment_date( get_option( 'date_format' ) ) ); ?></span>
			<span class="pingcontent"><?php comment_text(); ?></span>

	<?php
	} // End list_pings()
}

if ( ! function_exists( 'floris_commenter_link' ) ) {
	function floris_commenter_link() {
	    $commenter = get_comment_author_link();
	    print wp_kses_post($commenter);
	}
}
?>