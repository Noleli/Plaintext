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
	'primary' => __( 'Primary Navigation', 'plaintext' ),
) );



/**
 * Custom Walker to extract current sub-menu - via squarecandy http://pastebin.com/Jk7n20mB
 */

class Custom_Walker_Nav_Sub_Menu extends Walker_Nav_Menu {

  var $found_parents = array();

function start_el(&$output, $item, $depth, $args) {

		global $wp_query;
		
		//this only works for second level sub navigations
		$parent_item_id = 0;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;	

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		
		
	 if ( ($item->menu_item_parent==0) && (strpos($class_names, 'current-menu-parent')) ) { 
		 $output.= '
<li>';
		 }


		// Checks if the current element is in the current selection
		if (strpos($class_names, 'current-menu-item')
			|| strpos($class_names, 'current-menu-parent')
			|| strpos($class_names, 'current-menu-ancestor')
			|| (is_array($this->found_parents) && in_array( $item->menu_item_parent, $this->found_parents )) ) {

			// Keep track of all selected parents
			$this->found_parents[] = $item->ID;

			//check if the item_parent matches the current item_parent
			if($item->menu_item_parent!=$parent_item_id){

				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;
				
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
			
			
		}
	}
	
	function end_el(&$output, $item, $depth) {
	  // Closes only the opened li
	  if ( is_array($this->found_parents) && in_array( $item->ID, $this->found_parents ) ) {
	      $output .= "</li>\n";
    }
  }

  function end_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    // If the sub-menu is empty, strip the opening tag, else closes it
    if (substr($output, -22)=="<ul class=\"sub-menu\">\n") {
      $output = substr($output, 0, strlen($output)-23);
    } else {
      $output .= "$indent</ul>\n";
    }
  }
  
}




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