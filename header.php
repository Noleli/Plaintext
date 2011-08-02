<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage PlainText
 * @since PlainText 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );
	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="<?php bloginfo('template_url'); ?>/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url'); ?>/960.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css" />

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />


<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script('cooquery', get_bloginfo('template_url').'/jquery.cooquery.js', array('jquery')); ?>
<?php wp_enqueue_script('plaintext', get_bloginfo('template_url').'/plaintext.js', array('jquery')); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

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
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
