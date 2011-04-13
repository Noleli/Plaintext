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
	<noscript>
		<style type="text/css">
			#sidebar {
		        filter:alpha(opacity=100);
		        -moz-opacity:1;
		        -khtml-opacity: 1;
		        opacity: 1;
			}
		</style>
	</noscript>
	<!--[if lt IE 8]> <div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://http://www.mozilla.com/en-US/firefox/new/?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
	<div class="container_12">
		<div class="grid_3 push_9">
			<div id="sidebar">
				<?php dynamic_sidebar('sidebar'); ?>
				<div id="footer">
					<p><a href="http://creativecommons.org/licenses/by-nc-sa/3.0/us/" alt="Creative Commons Attribution-NonCommercial-ShareAlike"><img src="<?php bloginfo('template_directory'); ?>/images/cc-by-nc-sa.png"></a></p>
					<p>Inspired by <a href="http://www.hogbaysoftware.com/products/plaintext">PlainText</a></p>
				</div>
			</div><!-- end sidebar -->
		</div><!-- end grid_3 -->
		<div class="grid_8 suffix_1 pull_3">
			<div id="content_area">
				<div id="head">
					<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<ul id="parent_pages" class="pages">
						<?php $is_page = is_page(); ?>
						<li<?php if(!$is_page) echo ' class="current_page_item"'; ?>><a href="<?php echo home_url(); ?>">Blog</a></li>
						<?php wp_list_pages(array("depth"=>1, "title_li"=>"")); ?>
					</ul>
					
					<?php
						if($post->ancestors)
						{
							echo('<ul id="child_pages" class="pages">');
							$children = wp_list_pages("title_li=&child_of=".end($post->ancestors));
							echo('</ul>');
						}
					?>
					
				</div><!-- end head -->
				
				<div id="content">
					<div id="error">
						<h1>404‽</h1>
						<p>This ark has sailed. Find a better page to look at</p>
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
