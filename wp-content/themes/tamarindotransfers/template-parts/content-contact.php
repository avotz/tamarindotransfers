<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tamarindotransfers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="entry-content">
		<div class="entry-page-container">
			<div class="page-media">
				 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.5272185820954!2d-85.84378268474619!3d10.299624992646104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f9e393637477f7b%3A0x68b4dde7ce6cc8be!2sTamarindo+Transfers+%26+Tours!5e0!3m2!1ses-419!2scr!4v1495065710521" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				
			</div>
			<div class="page-info">
				<div class="page-content">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<?php
						the_content();

	
					?>
				</div>
				
				
			</div>
		</div>
		
	</div><!-- .entry-content -->


</article><!-- #post-## -->
