<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tamarindotransfers
 */

get_header(); ?>

	<section class="home">
	 	
	 	
		<div class="home-video">
			<video preload="" autobuffer="" loop="loop" autoplay="autoplay"><source src="<?php echo get_template_directory_uri();  ?>/img/video.mp4" type="video/mp4"></video>
		</div>
	 </section>

<?php
/*get_sidebar();*/
get_footer();
