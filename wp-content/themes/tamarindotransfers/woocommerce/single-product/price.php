<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$categories = get_the_terms( $product->ID, 'product_cat' );
$cat = 'shuttle';

foreach ($categories as $category) {
if($category->parent == 0){
   $cat = $category->slug;
}

}

?>
<p class="price"><?php echo $product->get_price_html(); ?> per person</p>
<?php if($cat == 'tour') : ?>
	<p><a href="#tour-popup" class="btn btn-yellow tour-popup-link" data-title="<?php echo $product->get_name(); ?>">inquery Now</a></p>
<?php else: ?>
	<p><a href="#transfer-popup" class="btn btn-yellow transfer-popup-link" data-title="<?php echo $product->get_name(); ?>" data-arrivals="<?php echo get_post_meta( $product->get_id(), 'notes_arrivals', true ); ?>" data-departures="<?php echo get_post_meta( $product->get_id(), 'notes_departures', true ); ?>" data-others="<?php echo get_post_meta( $product->get_id(), 'notes_others', true ); ?>">inquery Now</a></p>
<?php endif; ?>
