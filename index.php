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
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 query_posts($query_string . 'cat=-'.get_category_by_slug('big-tweets')->cat_ID);
			 get_template_part( 'loop', 'index' );
			?>
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
