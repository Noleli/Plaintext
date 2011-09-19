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
					<?php while ( have_posts() ) : the_post(); ?>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<?php the_content(); ?>
						
						<?php if(!is_page()) : ?>
							<div class="post_footer">
								<div class="grid_2 alpha suffix_4">
									<p class="date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></p>
								</div>
								<div class="grid_2 omega">
									<p class="comment_count"><a href="<?php comments_link(); ?>"><?php comments_number('Comment'); ?></a></p>
								</div>
								<?php
									$withcomments = is_single();
									if($withcomments)
									{
										echo('<div class="clear"></div>');
										//echo('<div class="prefix_1 grid_6 suffix_5">');
										comments_template();
										//echo('</div> <!-- end comment grid container -->');
									}
									
								?>
							</div>
							
						<?php endif; ?>
						
						
					<?php endwhile; // End the loop. Whew. ?>
					
					<div id="bottom_nav">
						<div class="grid_2 alpha suffix_4">
							<p><?php previous_posts_link("«"); ?></p>
						</div>
						<div class="grid_2 omega">
							<p class="next_link"><?php next_posts_link("»"); ?></p>
						</div>
						<div class="bottom_dot">■</div>
					</div>
					
				</div><!-- end content -->
			</div> <!-- end content_container -->
		</div><!-- end grid_8 -->
