<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header(); 


/*$categories = get_terms( array(
            'taxonomy' => 'tour_category',
            'hide_empty' => false
            
        ) );*/

$categorySelected = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'slug' => get_query_var('product_cat')
            
        ) );



?>

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
		                          'terms' => get_query_var('product_cat')
		                        )
		                      )
		                      
		                    );
		                    $items = new WP_Query( $args );
		                    
		                    if( $items->have_posts() ) {
		                      while( $items->have_posts() ) {
		                         $items->the_post();
		                       
		                        ?>
								  
								  <a href="<?php the_permalink(); ?>" class="item">
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
													View more
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

get_footer(); 