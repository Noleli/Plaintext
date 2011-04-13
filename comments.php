<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Plaintext
 * @since Plaintext 1.0
 */
?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'twentyten' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ul class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use twentyten_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define twentyten_comment() and that will be used instead.
					 * See twentyten_comment() in twentyten/functions.php for more.
					 */
					wp_list_comments('callback=plaintext_comment');
				?>
			</ul>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'twentyten' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'twentyten' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php
	$the_name = ($commenter['comment_author'] != '') ? esc_attr($commenter['comment_author']) : 'Name';
	$the_email = ($commenter['comment_author_email'] != '') ? esc_attr($commenter['comment_author_email']) : 'Email – will not be published';
	$the_url = ($commenter['comment_author_url'] != '') ? esc_attr($commenter['comment_author_url']) : 'URL';
	
	$fields = array(
	'author' => '<div class="comment-form-author">'.
	            '<input id="author" name="author" type="text" value="'.$the_name.'" size="30"' . $aria_req . ' /></div>',
	'email'  => '<div class="comment-form-email"><label for="email">'.
	            '<input id="email" name="email" type="text" value="'.$the_email. '" size="30"' . $aria_req . ' /></div>',
	'url'    => '<div class="comment-form-url"><input id="url" name="url" type="text" value="'.$the_url.'" size="30" /></div>',
);
	$comment_form_args = array( "comment_field" => '<div id="comment-textarea-container"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
								"comment_notes_before" => '',
								"comment_notes_after" => '',
								"title_reply" => '',
								"fields" => $fields);
	comment_form($comment_form_args);
?>

</div><!-- #comments -->
