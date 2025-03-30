<?php
////////////////////////////////////////////////////////////////////
// Settig Theme-options
////////////////////////////////////////////////////////////////////
include_once( trailingslashit( get_template_directory() ) . 'lib/plugin-activation.php' );
include_once( trailingslashit( get_template_directory() ) . 'lib/theme-config.php' );
include_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes.php' );
include_once( trailingslashit( get_template_directory() ) . 'lib/include-kirki.php' );
require_once( trailingslashit( get_template_directory() ) . 'lib/customize-pro/class-customize.php' );

add_action( 'after_setup_theme', 'maxstore_setup' );

if ( !function_exists( 'maxstore_setup' ) ) :

	function maxstore_setup() {
		// Theme lang
		load_theme_textdomain( 'maxstore', get_template_directory() . '/languages' );

		// Add Title Tag Support
		add_theme_support( 'title-tag' );

		// Register Menus
		register_nav_menus(
			array(
				'main_menu' => __( 'Main Menu', 'maxstore' ),
			)
		);

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300, 300, true );
		add_image_size( 'maxstore-single', 848, 400, true );
		add_image_size( 'maxstore-home-top', 300, 300, true );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'woocommerce' );
		if ( get_theme_mod( 'woo_gallery_zoom', 0 ) == 1 ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}
		if ( get_theme_mod( 'woo_gallery_lightbox', 1 ) == 1 ) {
			add_theme_support( 'wc-product-gallery-lightbox' );
		}
		if ( get_theme_mod( 'woo_gallery_slider', 0 ) == 1 ) {
			add_theme_support( 'wc-product-gallery-slider' );
		}
	}

endif;

////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
function maxstore_theme_stylesheets() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.4', 'all' );
	wp_enqueue_style( 'maxstore-stylesheet', get_stylesheet_uri(), array(), '1.5.2', 'all' );
	// load Font Awesome css
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7' );
}

add_action( 'wp_enqueue_scripts', 'maxstore_theme_stylesheets' );

////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
function maxstore_theme_js() {
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '3.3.4' );
	wp_enqueue_script( 'maxstore-theme-js', get_template_directory_uri() . '/js/customscript.js', array( 'jquery' ), '1.5.2' );
}

add_action( 'wp_enqueue_scripts', 'maxstore_theme_js' );


////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

require_once(trailingslashit( get_template_directory() ) . 'lib/wp_bootstrap_navwalker.php');

////////////////////////////////////////////////////////////////////
// Register Widgets
////////////////////////////////////////////////////////////////////

add_action( 'widgets_init', 'maxstore_widgets_init' );

function maxstore_widgets_init() {
	register_sidebar(
	array(
		'name'			 => __( 'Right Sidebar', 'maxstore' ),
		'id'			 => 'maxstore-right-sidebar',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );

	register_sidebar(
	array(
		'name'			 => __( 'Left Sidebar', 'maxstore' ),
		'id'			 => 'maxstore-left-sidebar',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );
	register_sidebar(
	array(
		'name'			 => __( 'Footer Section', 'maxstore' ),
		'id'			 => 'maxstore-footer-area',
		'description'	 => __( 'Content Footer Section', 'maxstore' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s col-md-' . absint( get_theme_mod( 'footer-sidebar-size', 3 ) ) . '">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );
}

////////////////////////////////////////////////////////////////////
// Register hook and action to set Main content area col-md- width based on sidebar declarations
////////////////////////////////////////////////////////////////////

add_action( 'maxstore_main_content_width_hook', 'maxstore_main_content_width_columns' );

function maxstore_main_content_width_columns() {

	$columns = '12';

	if ( get_theme_mod( 'rigth-sidebar-check', 1 ) != 0 ) {
		$columns = $columns - absint( get_theme_mod( 'right-sidebar-size', 3 ) );
	}

	if ( get_theme_mod( 'left-sidebar-check', 0 ) != 0 ) {
		$columns = $columns - absint( get_theme_mod( 'left-sidebar-size', 3 ) );
	}

	echo $columns;
}

function maxstore_main_content_width() {
	do_action( 'maxstore_main_content_width_hook' );
}

////////////////////////////////////////////////////////////////////
// Set Content Width
////////////////////////////////////////////////////////////////////

function maxstore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'maxstore_content_width', 800 );
}
add_action( 'after_setup_theme', 'maxstore_content_width', 0 );

////////////////////////////////////////////////////////////////////
// Theme Info page
////////////////////////////////////////////////////////////////////

if ( is_admin() && !is_child_theme() ) {
	include_once(trailingslashit( get_template_directory() ) . 'lib/welcome/welcome-screen.php');
}

if ( !function_exists( 'maxstore_breadcrumb' ) ) :

////////////////////////////////////////////////////////////////////
// Breadcrumbs
////////////////////////////////////////////////////////////////////
	function maxstore_breadcrumb() {
		global $post, $wp_query;

		$home		 = esc_html_x( 'Home', 'breadcrumb', 'maxstore' );
		$delimiter	 = ' &raquo; ';
		$homeLink	 = home_url();
		if ( is_home() || is_front_page() ) {

			// no need for breadcrumbs in homepage
		} else {
			echo '<div id="breadcrumbs" >';
			echo '<div class="breadcrumbs-inner text-right">';

			// main breadcrumbs lead to homepage

			echo '<span><a href="' . esc_url( $homeLink ) . '">' . '<i class="fa fa-home"></i><span>' . $home . '</span>' . '</a></span>' . $delimiter . ' ';

			// if blog page exists

			if ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) ) {
				echo '<span><a href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '">' . '<span>' . esc_html__( 'Blog', 'maxstore' ) . '</span></a></span>' . $delimiter . ' ';
			}

			if ( is_category() ) {
				$thisCat = get_category( get_query_var( 'cat' ), false );
				if ( $thisCat->parent != 0 ) {
					$category_link = get_category_link( $thisCat->parent );
					echo '<span><a href="' . esc_url( $category_link ) . '">' . '<span>' . get_cat_name( $thisCat->parent ) . '</span>' . '</a></span>' . $delimiter . ' ';
				}

				$category_id	 = get_cat_ID( single_cat_title( '', false ) );
				$category_link	 = get_category_link( $category_id );
				echo '<span><a href="' . esc_url( $category_link ) . '">' . '<span>' . single_cat_title( '', false ) . '</span>' . '</a></span>';
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type	 = get_post_type_object( get_post_type() );
					$link		 = get_post_type_archive_link( get_post_type() );
					if ( $link ) {
						printf( '<span><a href="%s">%s</a></span>', esc_url( $link ), $post_type->labels->name );
						echo ' ' . $delimiter . ' ';
					}
					echo get_the_title();
				} else {
					$category = get_the_category();
					if ( $category ) {
						foreach ( $category as $cat ) {
							echo '<span><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . '<span>' . $cat->name . '</span>' . '</a></span>' . $delimiter . ' ';
						}
					}

					echo get_the_title();
				}
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_search() ) {
				$post_type = get_post_type_object( get_post_type() );
				echo $post_type->labels->singular_name;
			} elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				echo '<span><a href="' . esc_url( get_permalink( $parent ) ) . '">' . '<span>' . $parent->post_title . '</span>' . '</a></span>';
				echo ' ' . $delimiter . ' ' . get_the_title();
			} elseif ( is_page() && !$post->post_parent ) {
				echo '<span><a href="' . esc_url( get_permalink() ) . '">' . '<span>' . get_the_title() . '</span>' . '</a></span>';
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id	 = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page			 = get_post( $parent_id );
					$breadcrumbs[]	 = '<span><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . '<span>' . get_the_title( $page->ID ) . '</span>' . '</a></span>';
					$parent_id		 = $page->post_parent;
				}

				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					echo $breadcrumbs[ $i ];
					if ( $i != count( $breadcrumbs ) - 1 )
						echo ' ' . $delimiter . ' ';
				}

				echo $delimiter . '<span><a href="' . esc_url( get_permalink() ) . '">' . '<span>' . the_title_attribute( 'echo=0' ) . '</span>' . '</a></span>';
			}
			elseif ( is_tag() ) {
				$tag_id = get_term_by( 'name', single_cat_title( '', false ), 'post_tag' );
				if ( $tag_id ) {
					$tag_link = get_tag_link( $tag_id->term_id );
				}

				echo '<span><a href="' . esc_url( $tag_link ) . '">' . '<span>' . single_cat_title( '', false ) . '</span>' . '</a></span>';
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				echo '<span><a href="' . esc_url( get_author_posts_url( $userdata->ID ) ) . '">' . '<span>' . $userdata->display_name . '</span>' . '</a></span>';
			} elseif ( is_404() ) {
				echo esc_html__( 'Error 404', 'maxstore' );
			} elseif ( is_search() ) {
				echo esc_html__( 'Search results for', 'maxstore' ) . ' ' . get_search_query();
			} elseif ( is_day() ) {
				echo '<span><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . '<span>' . get_the_time( 'Y' ) . '</span>' . '</a></span>' . $delimiter . ' ';
				echo '<span><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . '<span>' . get_the_time( 'F' ) . '</span>' . '</a></span>' . $delimiter . ' ';
				echo '<span><a href="' . esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ) . '">' . '<span>' . get_the_time( 'd' ) . '</span>' . '</a></span>';
			} elseif ( is_month() ) {
				echo '<span><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . '<span>' . get_the_time( 'Y' ) . '</span>' . '</a></span>' . $delimiter . ' ';
				echo '<span><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . '<span>' . get_the_time( 'F' ) . '</span>' . '</a></span>';
			} elseif ( is_year() ) {
				echo '<span><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . '<span>' . get_the_time( 'Y' ) . '</span>' . '</a></span>';
			}

			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ' (';
				echo esc_html__( 'Page', 'maxstore' ) . ' ' . get_query_var( 'paged' );
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ')';
			}

			echo '</div></div>';
		}
	}

endif;

////////////////////////////////////////////////////////////////////
// Social links
////////////////////////////////////////////////////////////////////
if ( !function_exists( 'maxstore_social_links' ) ) :

	/**
	 * This function is for social links display on header
	 *
	 * Get links through Theme Options
	 */
	function maxstore_social_links() {
		$twp_social_links	 = array( 
			'twp_social_facebook'	 => 'facebook',
			'twp_social_twitter'	 => 'twitter', 
			'twp_social_google'		 => 'google-plus',
			'twp_social_instagram'	 => 'instagram',
			'twp_social_pin'		 => 'pinterest',
			'twp_social_youtube'	 => 'youtube',
			'twp_social_reddit'		 => 'reddit',
			'twp_social_linkedin'	 => 'linkedin',
			'twp_social_skype'		 => 'skype',
			'twp_social_vimeo'		 => 'vimeo',
			'twp_social_flickr'		 => 'flickr',
			'twp_social_dribble'	 => 'dribbble',
			'twp_social_envelope-o'	 => 'envelope-o',
			'twp_social_rss'		 => 'rss',
		);
		?>
		<div class="social-links">
			<ul>
				<?php
				$i					 = 0;
				$twp_links_output	 = '';
				foreach ( $twp_social_links as $key => $value ) {
					$link = get_theme_mod( $key, '' );
					if ( !empty( $link ) ) {
						$twp_links_output .=
						'<li><a href="' . esc_url( $link ) . '" target="_blank"><i class="fa fa-' . strtolower( $value ) . '"></i></a></li>';
					}
					$i++;
				}
				echo $twp_links_output;
				?>
			</ul>
		</div><!-- .social-links -->
		<?php
	}

endif;

////////////////////////////////////////////////////////////////////
// WooCommerce section
////////////////////////////////////////////////////////////////////
if ( class_exists( 'WooCommerce' ) ) {

////////////////////////////////////////////////////////////////////
// WooCommerce header cart
////////////////////////////////////////////////////////////////////
	if ( !function_exists( 'maxstore_cart_link' ) ) {

		function maxstore_cart_link() {
			if ( get_theme_mod( 'cart-top-icon', 1 ) == 1 ) {
				?>	
				<a class="cart-contents text-right" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'maxstore' ); ?>">
					<i class="fa fa-shopping-cart"><span class="count"><?php echo absint( WC()->cart->get_cart_contents_count() ); ?></span></i><span class="amount-title hidden-sm hidden-xs"><?php echo esc_html_e( 'Cart ', 'maxstore' ); ?></span><span class="amount-cart"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> 
				</a>
				<?php
			}
		}

	}
	if ( !function_exists( 'maxstore_head_wishlist' ) ) {

		function maxstore_head_wishlist() {
			if ( function_exists( 'YITH_WCWL' ) ) {
				$wishlist_url = YITH_WCWL()->get_wishlist_url();
				?>
				<div class="top-wishlist text-right">
					<a href="<?php echo esc_url( $wishlist_url ); ?>" title="<?php esc_attr_e( 'Wishlist', 'maxstore' ); ?>" data-toggle="tooltip" data-placement="top">
						<div class="fa fa-heart"><div class="count"><span><?php echo absint( yith_wcwl_count_products() ); ?></span></div></div>
					</a>
				</div>
				<?php
			}
		}

	}
	// Header wishlist icon ajax update
	add_action( 'wp_ajax_yith_wcwl_update_single_product_list', 'maxstore_head_wishlist' );
	add_action( 'wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'maxstore_head_wishlist' );

	if ( !function_exists( 'maxstore_header_cart' ) ) {

		function maxstore_header_cart() {
			?>
			<div class="header-cart-inner">
				<?php maxstore_cart_link(); ?>
				<ul class="site-header-cart menu list-unstyled">
					<li>
						<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					</li>
				</ul>
			</div>
			<?php
			if ( get_theme_mod( 'wishlist-top-icon', 0 ) != 0 ) {
				maxstore_head_wishlist();
			}
		}

	}
	if ( !function_exists( 'maxstore_header_add_to_cart_fragment' ) ) {
		add_filter( 'woocommerce_add_to_cart_fragments', 'maxstore_header_add_to_cart_fragment' );

		function maxstore_header_add_to_cart_fragment( $fragments ) {
			ob_start();

			maxstore_cart_link();

			$fragments[ 'a.cart-contents' ] = ob_get_clean();

			return $fragments;
		}

	}
////////////////////////////////////////////////////////////////////
// Change number of products displayed per page
////////////////////////////////////////////////////////////////////  
	add_filter( 'loop_shop_per_page', 'maxstore_new_loop_shop_per_page', 20 );

	function maxstore_new_loop_shop_per_page( $cols ) {
	  // $cols contains the current number of products per page based on the value stored on Options -> Reading
	  // Return the number of products you wanna show per page.
	  $cols = absint( get_theme_mod( 'archive_number_products', 24 ) );
	  return $cols;
	}
////////////////////////////////////////////////////////////////////
// Change number of products per row
////////////////////////////////////////////////////////////////////
	add_filter( 'loop_shop_columns', 'maxstore_loop_columns' );
	if ( !function_exists( 'maxstore_loop_columns' ) ) {

		function maxstore_loop_columns() {
			return absint( get_theme_mod( 'archive_number_columns', 4 ) );
		}

	}

////////////////////////////////////////////////////////////////////
// Archive product wishlist button
////////////////////////////////////////////////////////////////////  
	function maxstore_wishlist_products() {
		if ( function_exists( 'YITH_WCWL' ) ) {
			global $product;
			$url			 = add_query_arg( 'add_to_wishlist', $product->get_id() );
			$id				 = $product->get_id();
			$wishlist_url	 = YITH_WCWL()->get_wishlist_url();
			?>  
			<div class="add-to-wishlist-custom add-to-wishlist-<?php echo esc_attr( $id ); ?>">
				<div class="yith-wcwl-add-button show" style="display:block"> <a href="<?php echo esc_url( $url ); ?>" rel="nofollow" data-product-id="<?php echo esc_attr( $id ); ?>" data-product-type="simple" class="add_to_wishlist"><?php _e( 'Add to Wishlist', 'maxstore' ); ?></a><img src="<?php echo get_template_directory_uri() . '/img/loading.gif'; ?>" class="ajax-loading" alt="loading" width="16" height="16"></div>
				<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <span class="feedback"><?php esc_html_e( 'Added!', 'maxstore' ); ?></span> <a href="<?php echo esc_url( $wishlist_url ); ?>"><?php esc_html_e( 'View Wishlist', 'maxstore' ); ?></a></div>
				<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"> <span class="feedback"><?php esc_html_e( 'The product is already in the wishlist!', 'maxstore' ); ?></span> <a href="<?php echo esc_url( $wishlist_url ); ?>"><?php esc_html_e( 'Browse Wishlist', 'maxstore' ); ?></a></div>
				<div class="clear"></div>
				<div class="yith-wcwl-wishlistaddresponse"></div>
			</div>
			<?php
		}
	}

	add_action( 'woocommerce_before_shop_loop_item', 'maxstore_wishlist_products', 9 );
	
	function maxstore_woocommerce_breadcrumbs() {
		return array(
				'delimiter'   => ' &raquo; ',
				'wrap_before' => '<div id="breadcrumbs" ><div class="breadcrumbs-inner text-right">',
				'wrap_after'  => '</div></div>',
				'before'      => '',
				'after'       => '',
				'home'        => esc_html_x( 'Home', 'woocommerce breadcrumb', 'maxstore' ),
			);
	}
	
	add_filter( 'woocommerce_breadcrumb_defaults', 'maxstore_woocommerce_breadcrumbs' );
}
////////////////////////////////////////////////////////////////////
// WooCommerce end
////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
// Excerpt functions
////////////////////////////////////////////////////////////////////
function maxstore_excerpt_length( $length ) {
	if ( is_single() ) {
		return 15;
	} else {
		return 40;
	}
}

add_filter( 'excerpt_length', 'maxstore_excerpt_length', 999 );

function maxstore_excerpt_more( $more ) {
	return '&hellip;';
}

add_filter( 'excerpt_more', 'maxstore_excerpt_more' );

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     *
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         *
         */
        do_action( 'wp_body_open' );
    }
endif;

/**
 * Include a skip to content link at the top of the page so that users can bypass the header.
 */
function maxstore_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . esc_html__( 'Skip to the content', 'maxstore' ) . '</a>';
}

add_action( 'wp_body_open', 'maxstore_skip_link', 5 );