<?php

/**
 * Welcome Screen Class
 */
class maxstore_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {
		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'maxstore_welcome_register_menu' ) );
		/* activation notice */
		add_action( 'admin_enqueue_scripts', array( $this, 'maxstore_welcome_style_and_scripts' ) );

		/* load welcome screen */
		add_action( 'maxstore_welcome', array( $this, 'maxstore_welcome_getting_started' ), 10 );
		add_action( 'maxstore_welcome', array( $this, 'maxstore_welcome_actions_required' ), 20 );
		add_action( 'maxstore_welcome', array( $this, 'maxstore_welcome_contribute' ), 30 );
		add_action( 'maxstore_welcome', array( $this, 'maxstore_welcome_support' ), 40 );
		add_action( 'maxstore_welcome', array( $this, 'maxstore_welcome_free_pro' ), 50 );
		add_action( 'maxstore_welcome', array( $this, 'maxstore_welcome_woo_themes' ), 60 );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'maxstore_activation_admin_notice' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 */
	public function maxstore_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET[ 'activated' ] ) ) {
			add_action( 'admin_notices', array( $this, 'maxstore_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 */
	public function maxstore_welcome_admin_notice() {
		// Get Theme Details from style.css
		$theme = wp_get_theme();
		?>
		<div class="updated notice is-dismissible">
			<p><?php printf( esc_html( 'Welcome! Thank you for choosing %1s! To fully take advantage of the best our theme can offer please make sure you visit our %2s.', 'maxstore' ), $theme->get( 'Name' ), '<a href="' . esc_url( admin_url( 'themes.php?page=maxstore-welcome' ) ) . '">' . esc_html( 'welcome page', 'maxstore' ) . '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=maxstore-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php printf( esc_html( 'Get started with %1s', 'maxstore' ), $theme->get( 'Name' ) ); ?></a></p>
		</div>
		<?php
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 */
	public function maxstore_welcome_register_menu() {
		// Get Theme Details from style.css
		$theme = wp_get_theme();
		add_theme_page( 'About MaxStore', sprintf( __( 'About %s', 'maxstore' ), $theme->get( 'Name' ) ), 'activate_plugins', 'maxstore-welcome', array( $this, 'maxstore_welcome_screen' ) );
	}

	/**
	 * Load welcome screen css and javascript
	 */
	public function maxstore_welcome_style_and_scripts( $hook_suffix ) {
		if ( 'appearance_page_maxstore-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'maxstore-welcome-screen-css', get_template_directory_uri() . '/lib/welcome/css/welcome.css' );
			wp_enqueue_script( 'maxstore-welcome-screen-js', get_template_directory_uri() . '/lib/welcome/js/welcome.js', array( 'jquery' ) );
		}
	}

	/**
	 * Welcome screen content
	 */
	public function maxstore_welcome_screen( $counter ) {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		global $counter;
		?>

		<ul class="maxstore-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started', 'maxstore' ); ?></a></li>
			<li role="presentation" class="maxstore-tab maxstore-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions recommended', 'maxstore' ); ?></a></li>
			<li role="presentation"><a href="#contribute" aria-controls="contribute" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute', 'maxstore' ); ?></a></li>
			<li role="presentation"><a href="#support" aria-controls="support" role="tab" data-toggle="tab"><?php esc_html_e( 'Support', 'maxstore' ); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO', 'maxstore' ); ?></a></li>
			<li role="presentation"><a href="#woo_themes" aria-controls="woo_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Woo Themes', 'maxstore' ); ?></a></li>
		</ul>

		<div class="maxstore-tab-content">

		<?php do_action( 'maxstore_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 */
	public function maxstore_welcome_getting_started() {
		require_once( get_template_directory() . '/lib/welcome/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 */
	public function maxstore_welcome_actions_required() {
		require_once( get_template_directory() . '/lib/welcome/sections/actions-required.php' );
	}

	/**
	 * Contribute
	 */
	public function maxstore_welcome_contribute() {
		require_once( get_template_directory() . '/lib/welcome/sections/contribute.php' );
	}

	/**
	 * Support
	 */
	public function maxstore_welcome_support() {
		require_once( get_template_directory() . '/lib/welcome/sections/support.php' );
	}

	/**
	 * Free vs PRO
	 */
	public function maxstore_welcome_free_pro() {
		require_once( get_template_directory() . '/lib/welcome/sections/free_pro.php' );
	}

	/**
	 * Woo themes
	 */
	public function maxstore_welcome_woo_themes() {
		require_once( get_template_directory() . '/lib/welcome/sections/woo-themes.php' );
	}

}

$GLOBALS[ 'maxstore_Welcome' ] = new maxstore_Welcome();
