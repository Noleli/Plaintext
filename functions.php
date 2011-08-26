<?php
// register the one sidebar
register_sidebar(array(
	'name' => 'Sidebar',
	'id' => 'sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));

// my simple search widget
function widget_mytheme_search() {
	get_search_form();
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'twentyten' ),
) );

// comment layout
function plaintext_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.') ?></em>
				<br />
			<?php endif; ?>

			

			<?php comment_text(); ?>
			<div class="comment-metadata">
				<span class="comment-left">
					<p><?php echo get_comment_author_link(); ?> on
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
							<?php printf(__('%1$s, %2$s'), get_comment_date(),  get_comment_time()) ?>
						</a>
					</p>
				</span>
			
				<span class="comment-right">
					<p><?php edit_comment_link(__('Edit'),'  ','') ?>&nbsp;
					<?php comment_reply_link(array_merge( $args, array('reply_text'=> "↩", 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
				</span>
			</div>
		</div>
<?php
}
?>