<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage PlainText
 * @since PlainText 1.0
 */
?>
<div id="sidebar">
	<?php dynamic_sidebar('sidebar'); ?>
	<div id="footer">
		<p><a href="http://creativecommons.org/licenses/by-nc-sa/3.0/us/"><img src="<?php bloginfo('template_directory'); ?>/images/cc-by-nc-sa.png" alt="Creative Commons Attribution-NonCommercial-ShareAlike"></a></p>
		<p><a href="https://github.com/Noleli/Plaintext">Plaintext</a>, a <a href="http://noahliebman.com/">.nl</a> production</p>
	</div>
</div><!-- end sidebar -->
