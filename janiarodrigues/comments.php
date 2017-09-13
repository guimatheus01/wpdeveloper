<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Comments Template
 *
 * This template file handles the display of comments, pingbacks and trackbacks.
 *
 * External functions are used to display the various types of comments.
 *
 * @package ttFramework
 * @subpackage Template
 */

// Do not delete these lines
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'Please do not load this page directly. Thanks!' );
} ?>


<div>
        <h3 class="h5 md title font-fam-2"><?php esc_html_e( 'Comments', 'floris' ); ?> (<?php comments_number( esc_html__( 'No Responses', 'floris' ), esc_html__( 'One Response', 'floris' ), esc_html__( '% Responses', 'floris' ) ); ?> )</h3>
<?php if ( post_password_required() ) { ?>
	<p class="nocomments"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'floris' ); ?></p>
</div><!-- ending .comments-box soon, if we return here -->
<?php return; } ?>

<?php $comments_by_type = separate_comments( $comments ); ?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) { ?>

	<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
		<?php 
			$args = array(
				'callback' => 'floris_cust_cmnt',
				'type'	 => 'comment',
				'avatar_size' => 130
			);
			wp_list_comments($args); ?>

		<nav class="navigation fix">
			<div class="fl"><?php previous_comments_link(); ?></div>
			<div class="fr"><?php next_comments_link(); ?></div>
		</nav><!-- /.navigation -->
	<?php } ?>

	<?php if ( ! empty( $comments_by_type['pings'] ) ) { ?>

		<h3 class="h5 md title font-fam-2"><?php esc_html_e( 'Trackbacks/Pingbacks', 'floris' ); ?></h3>

        <ol class="pinglist">
            <?php wp_list_comments( 'type=pings&callback=floris_list_pings' ); ?>
        </ol>

	<?php }; ?>

<?php } else { // this is displayed if there are no comments so far ?>


	<?php
		// If there are no comments and comments are closed, let's leave a little note, shall we?
		if ( comments_open() && is_singular() ) { ?>
			<div id="comments">
				<h5 class="nocomments"><?php esc_html_e( 'No comments yet.', 'floris' ); ?></h5>
			</div>
		<?php } ?>

<?php
	} // End IF Statement

	/* The Respond Form. Uses filters in the theme-functions.php file to customise the form HTML. */
	$custom_comment_form = array( 
		'comment_field' => '<textarea name="comment" placeholder="' . esc_html__('Your Comment Here','floris') . '" id="comment" aria-required="true" rows="3"></textarea>', 
		'fields' => apply_filters( 'comment_form_default_fields', array( 
			'author' => '<div class="col-sm-12 col-md-6"><input type="text" id="author" name="author" required placeholder="' . esc_html__('Name *','floris') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" /></div>', 
			'email' => '<input name="email" type="text" id="email" required placeholder="' . esc_html__('Email *','floris') . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" />', 
			'url' => '') 
		), 
		'title_reply' => '',
		'title_reply_before' => '',
		'title_reply_after' => '',
		'cancel_reply_before' => '',
		'cancel_reply_after' => '',
		'cancel_reply_link' => esc_html__( 'Cancel' , 'floris' ), 
		'comment_notes_before' => '', 
		'comment_notes_after' => '', 
		'label_submit' => esc_html__( 'Submit' , 'floris' ) 
	);
	if ( comments_open() )
		comment_form($custom_comment_form);
?>
<div class="fix"></div>
</div><!-- /.comments-box -->
<!-- Yes there is intentional extra div on this page/ see line 24 -->