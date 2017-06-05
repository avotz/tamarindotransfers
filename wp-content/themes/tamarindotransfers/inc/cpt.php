<?php
add_filter( 'rwmb_meta_boxes', 'tamarindotransfers_register_meta_boxes' );

function tamarindotransfers_register_meta_boxes( $meta_boxes ) {
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Gallery',
                'desc'  => 'Format: Image File',
                'id'    => $prefix . 'gallery_thumb',
                'type'  => 'image_advanced',
                'std'   => '',
                'class' => 'custom-class'
                
            ),
            
           
        )
    );
   
    return $meta_boxes;
}

