<?php

/**
 *
 * Metaboxes
 *
 */
add_action( 'cmb2_admin_init', 'maxstore_homepage_template_metaboxes' );

function maxstore_homepage_template_metaboxes() {

	if ( class_exists( 'WooCommerce' ) ) {
		$prefix = 'maxstore';


		$cmb = new_cmb2_box( array(
			'id'			 => 'homepage_metabox',
			'title'			 => __( 'Homepage Options', 'maxstore' ),
			'object_types'	 => array( 'page', ), // Post type 
			'show_on'		 => array( 'key' => 'page-template', 'value' => 'template-home.php' ),
			'context'		 => 'normal',
			'priority'		 => 'high',
			'show_names'	 => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
		) );
		$cmb->add_field( array(
			'name'		 => __( 'Top section', 'maxstore' ),
			'desc'		 => __( 'Enable or disable top section', 'maxstore' ),
			'id'		 => $prefix . '_first_image_on',
			'default'	 => 'off',
			'type'		 => 'radio_inline',
			'options'	 => array(
				'on'	 => __( 'On', 'maxstore' ),
				'off'	 => __( 'Off', 'maxstore' ),
			),
		) );
		$cmb->add_field( array(
			'name'	 => __( 'Upload first image', 'maxstore' ),
			'desc'	 => __( 'Upload first image. 600x600px', 'maxstore' ),
			'id'	 => $prefix . '_first_image',
			'type'	 => 'file',
		) );
		$cmb->add_field( array(
			'name'	 => __( 'Title', 'maxstore' ),
			'desc'	 => __( 'Title', 'maxstore' ),
			'id'	 => $prefix . '_first_img_title',
			'type'	 => 'text',
		) );
		$cmb->add_field( array(
			'name'	 => __( 'Description', 'maxstore' ),
			'desc'	 => __( 'Description', 'maxstore' ),
			'id'	 => $prefix . '_first_img_desc',
			'type'	 => 'text',
		) );
		$cmb->add_field( array(
			'name'	 => __( 'Button text', 'maxstore' ),
			'id'	 => $prefix . '_first_img_button',
			'type'	 => 'text',
		) );
		$cmb->add_field( array(
			'name'		 => __( 'Button URL', 'maxstore' ),
			'id'		 => $prefix . '_first_img_button_url',
			'type'		 => 'text_url',
			'protocols'	 => array( 'http', 'https', 'mailto' ), // Array of allowed protocols
		) );
		$cmb->add_field( array(
			'name'				 => __( 'Secondary category', 'maxstore' ),
			'desc'				 => __( 'Select an option', 'maxstore' ),
			'id'				 => $prefix . '_second_cat',
			'type'				 => 'select',
			'show_option_none'	 => true,
			'default'			 => '',
			'options'			 => maxstore_get_cats(),
		) );
	}
}

function maxstore_get_cats() {
	/* GET LIST OF CATEGORIES */
	$args		 = array(
		'taxonomy'	 => 'product_cat',
		'orderby'	 => 'name',
		'show_count' => 1,
	);
	$layercats	 = get_categories( $args );
	$newList	 = array();
	foreach ( $layercats as $category ) {
		$newList[ $category->term_id ] = $category->cat_name;
	}
	return $newList;
}
