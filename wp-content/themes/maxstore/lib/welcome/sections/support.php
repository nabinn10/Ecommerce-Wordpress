<?php
/**
 * Support
 */
$theme = wp_get_theme();
?>

<div id="support" class="maxstore-tab-pane">

	<h1><?php esc_html_e( 'Need more details?', 'maxstore' ); ?></h1>
		
	<p><?php printf( esc_html__( 'Please check our full documentation for detailed information on how to use %s.','maxstore'), $theme->get( 'Name' ) ); ?></p>

	<p>
		<a href="<?php echo esc_url( 'http://demo.themes4wp.com/documentation/category/' . $theme->get( 'TextDomain' ) ); ?>" class="button button-primary"><?php printf( esc_html__( '%s documentation', 'maxstore' ), $theme->get( 'Name' ) ); ?></a>
	</p>
	
</div>