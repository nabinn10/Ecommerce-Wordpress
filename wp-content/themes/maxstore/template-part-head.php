<div class="container rsrc-container" role="main">
	<?php
	if ( is_front_page() || is_home() || is_404() ) {
		$heading = 'h1';
		$desc	 = 'h2';
	} else {
		$heading = 'h2';
		$desc	 = 'h3';
	}
	?> 
	<?php if ( get_theme_mod( 'infobox-text-right', '' ) != '' || get_theme_mod( 'infobox-text-left', '' ) != '' ) : ?>
		<div class="top-section row"> 
			<div class="top-infobox text-left col-xs-6">
				<?php
				if ( get_theme_mod( 'infobox-text-left', '' ) != '' ) {
					echo wp_kses_post( get_theme_mod( 'infobox-text-left' ) );
				}
				?> 
			</div> 
			<div class="top-infobox text-right col-xs-6">
				<?php
				if ( get_theme_mod( 'infobox-text-right', '' ) != '' ) {
					echo wp_kses_post( get_theme_mod( 'infobox-text-right' ) );
				}
				?> 
			</div>               
		</div>
	<?php endif; ?>
	<div class="row" >
		<?php // Site title/logo  ?>
		<header id="site-header" class="col-sm-4 hidden-xs rsrc-header text-center col-sm-push-4" role="banner"> 
			<?php if ( get_theme_mod( 'header-logo', '' ) != '' ) : ?>
				<div class="rsrc-header-img">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'header-logo' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
				</div>
			<?php else : ?>
				<div class="rsrc-header-text">
					<<?php echo $heading ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></<?php echo $heading ?>>
					<<?php echo $desc ?> class="site-desc"><?php esc_attr( bloginfo( 'description' ) ); ?></<?php echo $desc ?>>
				</div>
			<?php endif; ?>   
		</header> 
		<div class="header-login col-sm-4 col-xs-4 col-sm-pull-4"> 
			<?php if ( class_exists( 'WooCommerce' ) && get_theme_mod( 'my-account-link', 1 ) == 1 ) { // Login Register  ?>
				<?php if ( is_user_logged_in() ) { ?>
					<a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="<?php esc_attr_e( 'My Account', 'maxstore' ); ?>"><?php esc_html_e( 'My Account', 'maxstore' ); ?></a>
				<?php } else { ?>
					<a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="<?php esc_attr_e( 'Login / Register', 'maxstore' ); ?>"><?php esc_html_e( 'Login / Register', 'maxstore' ); ?></a>
				<?php } ?> 
			<?php } ?>
		</div>
		<?php // Shopping Cart   ?>
		<?php if ( function_exists( 'maxstore_header_cart' ) ) { ?> 
			<div class="header-cart text-right col-sm-4 col-xs-8">
				<?php maxstore_header_cart(); ?>
			</div>
		<?php } ?>
	</div>
	<?php // if ( has_nav_menu( 'main_menu' ) ) : ?>
	<div class="rsrc-top-menu row" >
		<nav id="site-navigation" class="navbar navbar-inverse" role="navigation">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
					<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'maxstore' ); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<header class="visible-xs-block" role="banner"> 
					<?php if ( get_theme_mod( 'header-logo', '' ) != '' ) : ?>
						<div class="rsrc-header-img menu-img text-left">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'header-logo' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
						</div>
					<?php else : ?>
						<div class="rsrc-header-text menu-text">
							<<?php echo $heading ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></<?php echo $heading ?>>
						</div>
					<?php endif; ?>   
				</header>
			</div>
			<?php
			wp_nav_menu( array(
				'theme_location'	 => 'main_menu',
				'depth'				 => 3,
				'container'			 => 'div',
				'container_class'	 => 'collapse navbar-collapse navbar-1-collapse',
				'menu_class'		 => 'nav navbar-nav',
				'fallback_cb'		 => 'wp_bootstrap_navwalker::fallback',
				'walker'			 => new wp_bootstrap_navwalker() )
			);
			?>
		</nav>
	</div>
	<?php // endif; ?>
	<?php if ( get_theme_mod( 'search-bar-check', 1 ) == 1 && class_exists( 'WooCommerce' ) ) : ?> 
		<?php get_template_part( 'template-part', 'searchbar' ); ?>
	<?php endif; ?>
        <div id="site-content" ></div>
    
