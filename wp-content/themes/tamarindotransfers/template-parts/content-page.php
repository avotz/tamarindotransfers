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
				 <?php if ( has_post_thumbnail() ) :

	                  $id = get_post_thumbnail_id($post->ID);
	                  $thumb_url = wp_get_attachment_image_src($id,'tour-thumb', true);
	                  ?>
	                  
	              
	               <figure class="page-banner" style="background-image: url('<?php echo $thumb_url[0] ?>');">
			
				</figure>
	                
	              <?php endif; ?>
				
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
