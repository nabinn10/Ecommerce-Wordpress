<?php
/**
*
* Metaboxes
*
*/

add_action( 'cmb2_init', 'online_store_homepage_template_metaboxes' );

function online_store_homepage_template_metaboxes() {

    $prefix = 'maxstore';
    
    $cmb_slider = new_cmb2_box( array(
        'id'            => 'homepage_metabox_slider',
        'title'         => __( 'Homepage Options', 'online-store' ),
        'object_types'  => array( 'page' ), // Post type 
        'show_on'       => array( 'key' => 'page-template', 'value' => array('template-home-slider.php') ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );
    $cmb_slider->add_field( array(
        'name'   => __( 'Slider', 'online-store' ),
    		'desc'   => __( 'Enable or disable slider.', 'online-store' ),
    		'id'     => $prefix .'_slider_on',
    		'default' => 'off',
        'type'    => 'radio_inline',
        'options' => array(
            'off'   => __( 'Off', 'online-store' ),
            'fullwidth' => __( 'on', 'online-store' ),
        ),
    ) );
    $group_field_id = $cmb_slider->add_field( array(
		'id'          => $prefix .'_home_slider',
		'type'        => 'group',
		'description' => __( 'Generate slider', 'online-store' ),
		'options'     => array(
			'group_title'   => __( 'Slide {#}', 'online-store' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add another slide', 'online-store' ),
			'remove_button' => __( 'Remove slide', 'online-store' ),
			'sortable'      => true, 
		),
  	) );
    $cmb_slider->add_group_field( $group_field_id, array(
  		'name'   => __( 'Image', 'online-store' ),
  		'id'     => $prefix .'_image',
  		'description' => __( 'Ideal image size: 1140x488px', 'online-store' ),
  		'type' => 'file',
      'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  	) );
  	$cmb_slider->add_group_field( $group_field_id, array(
  		'name'   => __( 'Slider Title', 'online-store' ),
  		'id'     => $prefix .'_title',
  		'type'   => 'text',
  	) );
  	$cmb_slider->add_group_field( $group_field_id, array(
  		'name' => __( 'Slider Description', 'online-store' ),
  		'id'   => $prefix .'_desc',
  		'type' => 'textarea_code',
  	) );
  	$cmb_slider->add_group_field( $group_field_id, array(
  		'name' => __( 'Button Text', 'online-store' ),
  		'id'   => $prefix .'_button_text',
  		'type' => 'text',
  	) );
  	$cmb_slider->add_group_field( $group_field_id, array(
  		'name' => __( 'Button URL', 'online-store' ),
  		'id'   => $prefix .'_url',
  		'type' => 'text_url',
  	) );
}