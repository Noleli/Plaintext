<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Plaintext
 * @since Plaintext 1.0
 */

get_header(); ?>
<body>
	<!--[if lt IE 8]> <div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://http://www.mozilla.com/en-US/firefox/new/?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
	<div class="container_12">
		<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>

<div class="grid_3 push_9">
			<?php get_sidebar(); ?>
		</div><!-- end grid_3 -->
		<div class="grid_8 suffix_1 pull_3">
			<div id="content_area">
				<div id="head">
					<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					
					<?php
						wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'depth' => 1, 'menu' => 'main-nav' ) );
						wp_nav_menu( array( 'container_class' => 'submenu-header', 'theme_location' => 'primary', 'depth' => 0, 'menu' => 'main-nav', 'walker' => new Custom_Walker_Nav_Sub_Menu() ) );
					?>
					
				</div><!-- end head -->
				
				<div id="content">
					<div id="error">
						<h1>404‽</h1>
						<p>This ark has sailed. Find a better page to look at</p>
					</div><!-- end error -->
					<div id="bottom_nav">
						<div class="bottom_dot">■</div>
					</div>
				</div><!-- end content -->
			</div> <!-- end content_container -->
		</div><!-- end grid_8 -->

	</div> <!-- end container_12 -->
	<?php
		/* Always have wp_footer() just before the closing </body>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to reference JavaScript files.
		 */

		wp_footer();
	?>
</body>
</html>
