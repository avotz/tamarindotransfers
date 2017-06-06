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
    Template Name: Page Shuttle 
     
 */

get_header(); ?>
	
	<section class="section">
	 	
	 	<div class="container">
	 		<div class="menu">
				<div class="items">
					<div class="items-arrow items-arrow-left is-visible" data-scroll-modifier="-1"><i class="fa fa-arrow-left"></i></div>
					<div class="items-arrow items-arrow-right is-visible" data-scroll-modifier="1"><i class="fa fa-arrow-right"></i></div>
					<div class="items-container">
						

						<?php
		                    $args = array(
		                      'post_type' => 'product',
		                      'order' => 'ASC',
		                      'orderby' =>'title',
		                      'posts_per_page' => -1,
		                     'tax_query' => array(
		                        array(
		                          'taxonomy' => 'product_cat',
		                          'field' => 'slug',
		                          'terms' => 'shuttle'
		                        )
		                      )
		                      
		                    );
		                    $items = new WP_Query( $args );
		                    
		                    if( $items->have_posts() ) {
		                      while( $items->have_posts() ) {
		                         $items->the_post();
		                       
		                        ?>
								  
								  <a href="#transfer-popup" class="item transfer-popup-link" data-title="<?php the_title(); ?>" data-arrivals="<?php echo get_post_meta( $post->ID, 'notes_arrivals', true ); ?>" data-departures="<?php echo get_post_meta( $post->ID, 'notes_departures', true ); ?>" data-others="<?php echo get_post_meta( $post->ID, 'notes_others', true ); ?>">
										<div class="item-img">
											 <?php if ( has_post_thumbnail() ) :

		                                      $id = get_post_thumbnail_id($post->ID);
		                                      $thumb_url = wp_get_attachment_image_src($id,'tour-thumb', true);
		                                      ?>
		                                      
		                                   <div style="background-image: url('<?php echo $thumb_url[0] ?>');"></div>
		                                    
		                                  <?php endif; ?>
											
										</div>
										<div class="item-content base">
											<div class="item-title">
												<span class="item-name"><?php the_title(); ?></span>
												<div class="item-bar"></div>
											</div>
											<span class="item-price"><?php  woocommerce_template_loop_price(); ?> per person</span>
											<div class="item-description">
												<?php the_excerpt() ?>
											</div>
										</div>
										<div class="item-content hover">
											<div class="item-content-container">
												<div class="item-title">
													<span class="item-name"><?php the_title(); ?></span>
													<div class="item-bar"></div>
												</div>
												<span class="item-price"><?php  woocommerce_template_loop_price(); ?> per person</span>
												<div class="item-description">
													<?php the_excerpt() ?>

												</div>
												<div class="item-link">
													Book Now
												</div>
											</div>
										</div>
									</a>
		                         
		                          
		                        <?php
		                         
		                      }
		                    }
		                  ?>
						
						<div class="overlay"></div>
					</div>
					
				
				
					
				</div>
			</div>
		</div>
	</section>


<?php
/*get_sidebar();*/
get_footer();
