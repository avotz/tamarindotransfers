<?php

/** woocommerce **/
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 2; // 4 related products
    $args['columns'] = 2; // arranged in 2 columns
    return $args;
}
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_address_1']);
     unset($fields['billing']['billing_address_2']);
     unset($fields['billing']['billing_country']);
     unset($fields['billing']['billing_city']);
	 unset($fields['billing']['billing_postcode']);
	 unset($fields['billing']['billing_state']);
	 unset($fields['billing']['billing_company']);

	 $fields['order']['order_comments']['placeholder'] = 'e.g. child seats';
	  $fields['order']['order_comments']['label'] = 'Important Notes';
     

     return $fields;
}


/**
 * Add the field to the checkout
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {

    echo '<div id="tour_pickup_hotel">';

    woocommerce_form_field( 'tour_pickup_hotel', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Pick up hotel'),
        'placeholder'   => __('Hotel'),
        'required'  => true,
        ), $checkout->get_value( 'tour_pickup_hotel' ));

    /*woocommerce_form_field( 'tour_date', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Tour date'),
        'placeholder'   => __('dd/mm/yyyy'),
        'required'  => true,
        'input_class' => array('datepicker')
        ), $checkout->get_value( 'tour_date' ));*/

    echo '</div>';

}
/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['tour_pickup_hotel'] )
        wc_add_notice( __( '<strong>Pick up hotel</strong> is a required field.' ), 'error' );

     /*if ( ! $_POST['tour_date'] )
        wc_add_notice( __( '<strong>Tour date</strong> is a required field.' ), 'error' );*/
}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['tour_pickup_hotel'] ) ) {
        update_post_meta( $order_id, 'Pick up hotel', sanitize_text_field( $_POST['tour_pickup_hotel'] ) );
    }
    /* if ( ! empty( $_POST['tour_date'] ) ) {
        update_post_meta( $order_id, 'Tour date', sanitize_text_field( $_POST['tour_date'] ) );
    }*/
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Pick up hotel').':</strong> ' . get_post_meta( $order->id, 'Pick up hotel', true ) . '</p>';
    //*echo '<p><strong>'.__('Tour date').':</strong> ' . get_post_meta( $order->id, 'Tour date', true ) . '</p>';**/
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

//remove short description from sigle page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

//add description to sigle page without tab
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
        return '';
    }
function woocommerce_template_product_description() {
  woocommerce_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );


function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] ); 	
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}
