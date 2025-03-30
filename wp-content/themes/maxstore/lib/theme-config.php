<?php

/**
 * Kirki Advanced Customizer
 * @package maxstore
 */
// Early exit if Kirki is not installed
if ( !class_exists( 'Kirki' ) ) {
	return;
}
/* Register Kirki config */
Kirki::add_config( 'maxstore_settings', array(
	'capability'	 => 'edit_theme_options',
	'option_type'	 => 'theme_mod',
) );

load_theme_textdomain( 'maxstore', get_template_directory() . '/languages' );

/**
 * Add sections
 */
if ( class_exists( 'WooCommerce' ) && get_option( 'show_on_front' ) != 'page' && !is_child_theme() ) {
	Kirki::add_section( 'maxstore_woo_demo_section', array(
		'title'		 => __( 'WooCommerce Homepage Demo', 'maxstore' ),
		'priority'	 => 10,
	) );
}
Kirki::add_section( 'sidebar_section', array(
	'title'			 => __( 'Sidebars', 'maxstore' ),
	'priority'		 => 10,
	'description'	 => __( 'Sidebar layouts.', 'maxstore' ),
) );

Kirki::add_section( 'layout_section', array(
	'title'			 => __( 'Main styling', 'maxstore' ),
	'priority'		 => 10,
	'description'	 => __( 'Define theme layout', 'maxstore' ),
) );

Kirki::add_section( 'top_bar_section', array(
	'title'			 => __( 'Top Bar', 'maxstore' ),
	'priority'		 => 10,
	'description'	 => __( 'Top bar text', 'maxstore' ),
) );

Kirki::add_section( 'search_bar_section', array(
	'title'			 => __( 'Search Bar & Social', 'maxstore' ),
	'priority'		 => 10,
	'description'	 => __( 'Search and social icons', 'maxstore' ),
) );

Kirki::add_section( 'site_bg_section', array(
	'title'		 => __( 'Site Background', 'maxstore' ),
	'priority'	 => 10,
) );

Kirki::add_section( 'colors_section', array(
	'title'		 => __( 'Colors', 'maxstore' ),
	'priority'	 => 10,
) );

if ( class_exists( 'WooCommerce' ) ) {
	Kirki::add_section( 'woo_section', array(
		'title'		 => __( 'WooCommerce', 'maxstore' ),
		'priority'	 => 10,
	) );
}
Kirki::add_section( 'links_section', array(
	'title'		 => __( 'Theme Important Links', 'maxstore' ),
	'priority'	 => 190,
) );

Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'switch',
	'settings'		 => 'demo_front_page',
	'label'			 => __( 'Enable Demo Homepage?', 'maxstore' ),
	'description'	 => sprintf( __( 'When the theme is first installed and WooCommerce plugin activated, the demo mode would be turned on. This will display some sample/example content to show you how the website can be possibly set up. When you are comfortable with the theme options, you should turn this off. You can create your own unique homepage - Check the %s page for more informations.', 'maxstore' ), '<a href="' . admin_url( 'themes.php?page=maxstore-welcome' ) . '"><strong>' . __( 'Theme info', 'maxstore' ) . '</strong></a>' ),
	'section'		 => 'maxstore_woo_demo_section',
	'default'		 => 1,
	'priority'		 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'radio-buttonset',
	'settings'			 => 'front_page_demo_style',
	'label'				 => esc_html__( 'Homepage Demo Styles', 'maxstore' ),
	'description'		 => sprintf( __( 'The demo homepage is enabled. You can choose from some predefined layouts or make your own %s.', 'maxstore' ), '<a href="' . admin_url( 'themes.php?page=maxstore-welcome' ) . '"><strong>' . __( 'custom homepage template', 'maxstore' ) . '</strong></a>' ),
	'section'			 => 'maxstore_woo_demo_section',
	'default'			 => 'style-one',
	'priority'			 => 10,
	'choices'			 => array(
		'style-one'	 => __( 'Layout one', 'maxstore' ),
		'style-two'	 => __( 'Layout two', 'maxstore' ),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'demo_front_page',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'switch',
	'settings'			 => 'front_page_demo_banner',
	'label'				 => __( 'Homepage top section', 'maxstore' ),
	'description'		 => esc_html__( 'Enable or disable demo homepage top section with custom image and random category products.', 'maxstore' ),
	'section'			 => 'maxstore_woo_demo_section',
	'default'			 => 1,
	'priority'			 => 10,
	'active_callback'	 => array(
		array(
			'setting'	 => 'demo_front_page',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'image',
	'settings'			 => 'front_page_demo_banner_img',
	'label'				 => __( 'Banner image', 'maxstore' ),
	'section'			 => 'maxstore_woo_demo_section',
	'default'			 => get_template_directory_uri() . '/template-parts/demo-img/demo-image-top.jpg',
	'priority'			 => 10,
	'active_callback'	 => array(
		array(
			'setting'	 => 'front_page_demo_banner',
			'operator'	 => '==',
			'value'		 => 1,
		),
		array(
			'setting'	 => 'demo_front_page',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'text',
	'settings'			 => 'front_page_demo_banner_title',
	'label'				 => __( 'Banner title', 'maxstore' ),
	'default'			 => __( 'MaxStore', 'maxstore' ),
	'section'			 => 'maxstore_woo_demo_section',
	'priority'			 => 10,
	'active_callback'	 => array(
		array(
			'setting'	 => 'front_page_demo_banner',
			'operator'	 => '==',
			'value'		 => 1,
		),
		array(
			'setting'	 => 'demo_front_page',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'text',
	'settings'			 => 'front_page_demo_banner_desc',
	'label'				 => __( 'Banner description', 'maxstore' ),
	'default'			 => __( 'Edit this section in customizer', 'maxstore' ),
	'section'			 => 'maxstore_woo_demo_section',
	'priority'			 => 10,
	'active_callback'	 => array(
		array(
			'setting'	 => 'front_page_demo_banner',
			'operator'	 => '==',
			'value'		 => 1,
		),
		array(
			'setting'	 => 'demo_front_page',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'text',
	'settings'			 => 'front_page_demo_banner_url',
	'label'				 => __( 'Banner url', 'maxstore' ),
	'default'			 => '#',
	'section'			 => 'maxstore_woo_demo_section',
	'priority'			 => 10,
	'active_callback'	 => array(
		array(
			'setting'	 => 'front_page_demo_banner',
			'operator'	 => '==',
			'value'		 => 1,
		),
		array(
			'setting'	 => 'demo_front_page',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'custom',
	'settings'			 => 'demo_page_intro',
	'label'				 => __( 'Products', 'maxstore' ),
	'section'			 => 'maxstore_woo_demo_section',
	'description'		 => esc_html__( 'If you dont see any products or categories on your homepage, you dont have any products probably. Create some products and categories first.', 'maxstore' ),
	'priority'			 => 10,
	'active_callback'	 => array(
		array(
			'setting'	 => 'demo_front_page',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'custom',
	'settings'		 => 'demo_dummy_content',
	'label'			 => __( 'Need Dummy Products?', 'maxstore' ),
	'section'		 => 'maxstore_woo_demo_section',
	'description'	 => sprintf( esc_html__( 'When the theme is first installed, you dont have any products probably. You can easily import dummy products with only few clicks. Check %s tutorial.', 'maxstore' ), '<a href="' . esc_url( 'https://docs.woocommerce.com/document/importing-woocommerce-dummy-data/' ) . '" target="_blank"><strong>' . __( 'THIS', 'maxstore' ) . '</strong></a>' ),
	'priority'		 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'custom',
	'settings'		 => 'demo_pro_features',
	'label'			 => __( 'Need More Features?', 'maxstore' ),
	'section'		 => 'maxstore_woo_demo_section',
	'description'	 => '<a href="' . esc_url( 'http://themes4wp.com/product/maxstore-pro/' ) . '" target="_blank" class="button button-primary">' . sprintf( esc_html__( 'Learn more about %s PRO', 'maxstore' ), 'MaxStore' ) . '</a>',
	'priority'		 => 10,
) );

Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'switch',
	'settings'		 => 'rigth-sidebar-check',
	'label'			 => __( 'Right Sidebar', 'maxstore' ),
	'description'	 => __( 'Enable the Right Sidebar', 'maxstore' ),
	'section'		 => 'sidebar_section',
	'default'		 => 1,
	'priority'		 => 10,
) );

Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'radio-buttonset',
	'settings'	 => 'right-sidebar-size',
	'label'		 => __( 'Right Sidebar Size', 'maxstore' ),
	'section'	 => 'sidebar_section',
	'default'	 => '3',
	'priority'	 => 10,
	'choices'	 => array(
		'1'	 => '1',
		'2'	 => '2',
		'3'	 => '3',
		'4'	 => '4',
	),
) );

Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'switch',
	'settings'		 => 'left-sidebar-check',
	'label'			 => __( 'Left Sidebar', 'maxstore' ),
	'description'	 => __( 'Enable the Left Sidebar', 'maxstore' ),
	'section'		 => 'sidebar_section',
	'default'		 => 0,
	'priority'		 => 10,
) );

Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'radio-buttonset',
	'settings'	 => 'left-sidebar-size',
	'label'		 => __( 'Left Sidebar Size', 'maxstore' ),
	'section'	 => 'sidebar_section',
	'default'	 => '3',
	'priority'	 => 10,
	'choices'	 => array(
		'1'	 => '1',
		'2'	 => '2',
		'3'	 => '3',
		'4'	 => '4',
	),
) );

Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'radio-buttonset',
	'settings'	 => 'footer-sidebar-size',
	'label'		 => __( 'Footer Widget Area Columns', 'maxstore' ),
	'section'	 => 'sidebar_section',
	'default'	 => '3',
	'priority'	 => 10,
	'choices'	 => array(
		'12' => '1',
		'6'	 => '2',
		'4'	 => '3',
		'3'	 => '4',
	),
) );

Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'image',
	'settings'		 => 'header-logo',
	'label'			 => __( 'Logo', 'maxstore' ),
	'description'	 => __( 'Upload your logo', 'maxstore' ),
	'section'		 => 'layout_section',
	'default'		 => '',
	'priority'		 => 10,
) );


Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'textarea',
	'settings'			 => 'infobox-text-left',
	'label'				 => __( 'Top bar left', 'maxstore' ),
	'description'		 => __( 'Top bar left text area', 'maxstore' ),
	'help'				 => __( 'You can add custom text. Only text allowed!', 'maxstore' ),
	'section'			 => 'top_bar_section',
	'sanitize_callback'	 => 'wp_kses_post',
	'default'			 => '',
	'priority'			 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'				 => 'textarea',
	'settings'			 => 'infobox-text-right',
	'label'				 => __( 'Top bar right', 'maxstore' ),
	'description'		 => __( 'Top bar right text area', 'maxstore' ),
	'help'				 => __( 'You can add custom text. Only text allowed!', 'maxstore' ),
	'section'			 => 'top_bar_section',
	'sanitize_callback'	 => 'wp_kses_post',
	'default'			 => '',
	'priority'			 => 10,
) );

Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'switch',
	'settings'		 => 'search-bar-check',
	'label'			 => __( 'Search bar', 'maxstore' ),
	'description'	 => __( 'Enable search bar with social icons', 'maxstore' ),
	'section'		 => 'search_bar_section',
	'default'		 => 1,
	'priority'		 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'radio-buttonset',
	'settings'		 => 'searchbar-mobile',
	'label'			 => __( 'Search bar on mobile devices', 'maxstore' ),
	'description'	 => __( 'Enable or disable Search bar on mobile devices', 'maxstore' ),
	'section'		 => 'search_bar_section',
	'default'		 => 'hidden-xs',
	'priority'		 => 10,
	'choices'		 => array(
		'visible'	 => __( 'Visible', 'maxstore' ),
		'hidden-xs'	 => __( 'Hidden', 'maxstore' ),
	),
	'required'		 => array(
		array(
			'setting'	 => 'search-bar-check',
			'operator'	 => '==',
			'value'		 => 1,
		),
	)
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'switch',
	'settings'		 => 'maxstore_socials',
	'label'			 => __( 'Social Icons', 'maxstore' ),
	'description'	 => __( 'Enable or Disable the social icons. Use max 6 icons.', 'maxstore' ),
	'section'		 => 'search_bar_section',
	'default'		 => 0,
	'priority'		 => 10,
	'required'		 => array(
		array(
			'setting'	 => 'search-bar-check',
			'operator'	 => '==',
			'value'		 => 1,
		),
	)
) );
$s_social_links = array(
	'twp_social_facebook'	 => __( 'Facebook', 'maxstore' ),
	'twp_social_twitter'	 => __( 'Twitter', 'maxstore' ),
	'twp_social_google'		 => __( 'Google-Plus', 'maxstore' ),
	'twp_social_instagram'	 => __( 'Instagram', 'maxstore' ),
	'twp_social_pin'		 => __( 'Pinterest', 'maxstore' ),
	'twp_social_youtube'	 => __( 'YouTube', 'maxstore' ),
	'twp_social_reddit'		 => __( 'Reddit', 'maxstore' ),
	'twp_social_linkedin'	 => __( 'LinkedIn', 'maxstore' ),
	'twp_social_skype'		 => __( 'Skype', 'maxstore' ),
	'twp_social_vimeo'		 => __( 'Vimeo', 'maxstore' ),
	'twp_social_flickr'		 => __( 'Flickr', 'maxstore' ),
	'twp_social_dribble'	 => __( 'Dribbble', 'maxstore' ),
	'twp_social_envelope-o'	 => __( 'Email', 'maxstore' ),
	'twp_social_rss'		 => __( 'Rss', 'maxstore' ),
);

foreach ( $s_social_links as $keys => $values ) {
	Kirki::add_field( 'maxstore_settings', array(
		'type'			 => 'text',
		'settings'		 => $keys,
		'label'			 => $values,
		'description'	 => sprintf( __( 'Insert your custom link to show the %s icon.', 'maxstore' ), $values ),
		'help'			 => __( 'Leave blank to hide icon.', 'maxstore' ),
		'section'		 => 'search_bar_section',
		'default'		 => '',
		'priority'		 => 10,
		'required'		 => array(
			array(
				'setting'	 => 'search-bar-check',
				'operator'	 => '==',
				'value'		 => 1,
			),
		)
	) );
}

Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'color',
	'settings'	 => 'color_site_title',
	'label'		 => __( 'Site title color', 'maxstore' ),
	'help'		 => __( 'Site title text color, if not defined logo.', 'maxstore' ),
	'section'	 => 'colors_section',
	'default'	 => '#222',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.rsrc-header-text a',
			'property'	 => 'color',
			'units'		 => ' !important',
		),
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'color',
	'settings'	 => 'color_site_desc',
	'label'		 => __( 'Site description color', 'maxstore' ),
	'help'		 => __( 'Site description text color, if not defined logo.', 'maxstore' ),
	'section'	 => 'colors_section',
	'default'	 => '#B6B6B6',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'h2.site-desc, h3.site-desc',
			'property'	 => 'color',
		),
	),
) );

if ( function_exists( 'YITH_WCWL' ) ) {
	Kirki::add_field( 'maxstore_settings', array(
		'type'			 => 'toggle',
		'settings'		 => 'wishlist-top-icon',
		'label'			 => __( 'Header Wishlist icon', 'maxstore' ),
		'description'	 => __( 'Enable or disable heart icon with counter in header', 'maxstore' ),
		'section'		 => 'woo_section',
		'default'		 => 0,
		'priority'		 => 10,
	) );
}
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'toggle',
	'settings'		 => 'cart-top-icon',
	'label'			 => __( 'Header Cart', 'maxstore' ),
	'description'	 => __( 'Enable or disable header cart', 'maxstore' ),
	'section'		 => 'woo_section',
	'default'		 => 1,
	'priority'		 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'toggle',
	'settings'		 => 'my-account-link',
	'label'			 => __( 'My Account/Login link', 'maxstore' ),
	'description'	 => __( 'Enable or disable header My Account/Login/Register link', 'maxstore' ),
	'section'		 => 'woo_section',
	'default'		 => 1,
	'priority'		 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'toggle',
	'settings'		 => 'woo-breadcrumbs',
	'label'			 => __( 'Breadcrumbs', 'maxstore' ),
	'description'	 => __( 'Enable or disable breadcrumbs on WooCommerce pages', 'maxstore' ),
	'section'		 => 'woo_section',
	'default'		 => 0,
	'priority'		 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_gallery_zoom',
	'label'		 => esc_attr__( 'Gallery zoom', 'maxstore' ),
	'section'	 => 'woo_section',
	'default'	 => 0,
	'priority'	 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_gallery_lightbox',
	'label'		 => esc_attr__( 'Gallery lightbox', 'maxstore' ),
	'section'	 => 'woo_section',
	'default'	 => 1,
	'priority'	 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_gallery_slider',
	'label'		 => esc_attr__( 'Gallery slider', 'maxstore' ),
	'section'	 => 'woo_section',
	'default'	 => 0,
	'priority'	 => 10,
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'slider',
	'settings'		 => 'archive_number_products',
	'label'			 => __( 'Number of products', 'maxstore' ),
	'description'	 => __( 'Change number of products displayed per page in archive(shop) page.', 'maxstore' ),
	'section'		 => 'woo_section',
	'default'		 => 24,
	'priority'		 => 10,
	'choices'		 => array(
		'min'	 => 2,
		'max'	 => 60,
		'step'	 => 1
	),
) );
Kirki::add_field( 'maxstore_settings', array(
	'type'			 => 'slider',
	'settings'		 => 'archive_number_columns',
	'label'			 => __( 'Number of products per row', 'maxstore' ),
	'description'	 => __( 'Change the number of product columns per row in archive(shop) page.', 'maxstore' ),
	'section'		 => 'woo_section',
	'default'		 => 4,
	'priority'		 => 10,
	'choices'		 => array(
		'min'	 => 2,
		'max'	 => 5,
		'step'	 => 1
	),
) );


Kirki::add_field( 'maxstore_settings', array(
	'type'		 => 'background',
	'settings'	 => 'background_site',
	'label'		 => __( 'Background', 'maxstore' ),
	'section'	 => 'site_bg_section',
	'default'	 => array(
		'background-color'		 => '#fff',
		'background-image'		 => '',
		'background-repeat'	 => 'no-repeat',
		'background-size'		 => 'cover',
		'background-attachment'	 => 'fixed',
		'background-position'	 => 'center-top',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'body',
		),
	),
) );
$theme_links = array(
	'documentation'	 => array(
		'link'		 => esc_url( 'http://demo.themes4wp.com/documentation/category/maxstore/' ),
		'text'		 => __( 'Documentation', 'maxstore' ),
		'settings'	 => 'theme-docs',
	),
	'support'		 => array(
		'link'		 => esc_url( 'http://support.themes4wp.com/' ),
		'text'		 => __( 'Support', 'maxstore' ),
		'settings'	 => 'theme-support',
	),
	'demo'			 => array(
		'link'		 => esc_url( 'http://demo.themes4wp.com/maxstore/' ),
		'text'		 => __( 'View Demo', 'maxstore' ),
		'settings'	 => 'theme-demo',
	),
	'rating'		 => array(
		'link'		 => esc_url( 'https://wordpress.org/support/view/theme-reviews/maxstore?filter=5' ),
		'text'		 => __( 'Rate This Theme', 'maxstore' ),
		'settings'	 => 'theme-rate',
	)
);

foreach ( $theme_links as $theme_link ) {
	Kirki::add_field( 'maxstore_settings', array(
		'type'		 => 'custom',
		'settings'	 => $theme_link[ 'settings' ],
		'section'	 => 'links_section',
		'default'	 => '<div style="padding: 10px; text-align: center; font-size: 22px; font-weight: bold;"><a target="_blank" href="' . $theme_link[ 'link' ] . '" >' . esc_attr( $theme_link[ 'text' ] ) . ' </a></div>',
		'priority'	 => 10,
	) );
}

function maxstore_configuration() {

	$config[ 'color_back' ]		 = '#192429';
	$config[ 'color_accent' ]	 = '#0085ba';
	$config[ 'width' ]			 = '25%';

	return $config;
}

add_filter( 'kirki/config', 'maxstore_configuration' );

/**
 * Add custom CSS styles
 */
function maxstore_enqueue_header_css() {

	$columns = get_theme_mod( 'archive_number_columns', 4 );

	if ( $columns == '2' ) {
		$css = '@media only screen and (min-width: 769px) {.archive .rsrc-content .woocommerce ul.products li.product{width: 48.05%}}';
	} elseif ( $columns == '3' ) {
		$css = '@media only screen and (min-width: 769px) {.archive .rsrc-content .woocommerce ul.products li.product{width: 30.75%;}}';
	} elseif ( $columns == '5' ) {
		$css = '@media only screen and (min-width: 769px) {.archive .rsrc-content .woocommerce ul.products li.product{width: 16.95%;}}';
	} else {
		$css = '';
	}
	wp_add_inline_style( 'kirki-styles-maxstore_settings', $css );
}

add_action( 'wp_enqueue_scripts', 'maxstore_enqueue_header_css', 9999 );
