<div class="container rsrc-container" role="main">
    <?php
    if (is_front_page() || is_home() || is_404()) {
        $heading = 'h1';
        $desc = 'h2';
    } else {
        $heading = 'h2';
        $desc = 'h3';
    }
    $include = get_theme_mod('search-bar-cat-select');
    if ($include != '') {
        $result = implode(', ', $include);
    } else {
        $result = $include;
    };
    ?>
    <?php if (get_theme_mod('my-account-link', 1) == 1 || get_theme_mod('infobox-text-left', '') != '') : ?>
        <div class="top-section row"> 
            <div class="top-infobox text-left col-xs-6">
                <?php
                if (get_theme_mod('infobox-text-left', '') != '') {
                    echo wp_kses_post(get_theme_mod('infobox-text-left'));
                }
                ?> 
            </div> 
            <div class="top-infobox text-right col-xs-6">
                <?php if (class_exists('WooCommerce') && get_theme_mod('my-account-link', 1) == 1) { // Login Register   ?>
                    <?php if (is_user_logged_in()) { ?>
                        <a class="my-account-link" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" title="<?php esc_attr_e('My Account', 'online-store'); ?>"><?php esc_html_e('My Account', 'online-store'); ?></a>
                    <?php } else { ?>
                        <a class="my-account-link" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" title="<?php esc_attr_e('Login / Register', 'online-store'); ?>"><?php esc_html_e('Login / Register', 'online-store'); ?></a>
                    <?php } ?> 
                <?php } ?>
                <?php if (get_theme_mod('maxstore_socials', 0) == 1) : ?>
                    <div class="social-section social-alt-2 text-right">
                        <?php maxstore_social_links(); ?>              
                    </div>
                <?php endif; ?> 		
            </div>               
        </div>
    <?php endif; ?>
    <div class="header-section header-alt header-alt-2 row" >
        <?php // Site title/logo ?>
        <header id="site-header" class="col-sm-4 hidden-xs rsrc-header text-left" role="banner"> 
            <?php if (get_theme_mod('header-logo', '') != '') : ?>
                <div class="rsrc-header-img">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_mod('header-logo')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" /></a>
                </div>
            <?php else : ?>
                <div class="rsrc-header-text">
                    <<?php echo $heading ?> class="site-title" ><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></a></<?php echo $heading ?>>
                    <<?php echo $desc ?> class="site-desc" ><?php esc_attr(bloginfo('description')); ?></<?php echo $desc ?>>
                </div>
            <?php endif; ?>   
        </header>
        <?php // Shopping Cart  ?>
        <?php if (function_exists('maxstore_header_cart')) { ?> 
            <div class="header-cart text-right col-sm-2 col-sm-push-6">
                <?php maxstore_header_cart(); ?>
            </div>
        <?php } ?>
        <div class="header-search-alt-2 col-sm-6 col-xs-12 col-sm-pull-2"> 
            <?php if (get_theme_mod('search-bar-check', 1) == 1 && class_exists('WooCommerce')) : ?> 
                <div class="header-line-search row <?php echo get_theme_mod('searchbar-mobile', 'hidden-xs'); ?>">
                    <div class="header-categories col-md-3 col-xs-4">
                        <ul class="accordion list-unstyled" id="view-all-guides">
                            <li class="accordion-group list-unstyled">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#view-all-guides" href="#collapseOne"><?php esc_html_e('Shop by category', 'online-store'); ?></a>
                                <div id="collapseOne" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <ul class="list-unstyled">
                                            <?php wp_list_categories('title_li=&taxonomy=product_cat&show_count=1&include=' . $result); ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul >
                    </div>
                    <div class="header-search-form col-md-9 col-xs-8">
                        <div class="header-search-title col-sm-2 col-xs-3">
                            <?php esc_html_e('Search', 'online-store'); ?>
                        </div>
                        <form role="search" method="get" action="<?php echo get_permalink(wc_get_page_id('shop')); ?>">
                            <select class="col-sm-3 col-xs-3" name="product_cat">
                                <option value=""><?php esc_html_e('All', 'online-store'); ?></option> 
                                <?php
                                $categories = get_categories('taxonomy=product_cat');
                                foreach ($categories as $category) {
                                    $option = '<option value="' . esc_attr($category->category_nicename) . '">';
                                    $option .= esc_html($category->cat_name);
                                    $option .= ' (' . absint($category->category_count) . ')';
                                    $option .= '</option>';
                                    echo $option;
                                }
                                ?>
                            </select>
                            <input type="hidden" name="post_type" value="product" />
                            <input class="col-sm-7 col-xs-6" name="s" type="text" placeholder="<?php esc_attr_e('Search for products', 'online-store'); ?>"/>
                            <button type="submit"><?php esc_html_e('Go', 'online-store'); ?></button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div> 
    </div>
    <div class="rsrc-top-menu row" >
        <nav id="site-navigation" class="navbar navbar-inverse" role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                    <span class="sr-only"><?php esc_html_e('Toggle navigation', 'online-store'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <header class="visible-xs-block" role="banner"> 
                    <?php if (get_theme_mod('header-logo', '') != '') : ?>
                        <div class="rsrc-header-img menu-img text-left">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_mod('header-logo')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" /></a>
                        </div>
                    <?php else : ?>
                        <div class="rsrc-header-text menu-text">
                            <<?php echo $heading ?> class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></a></<?php echo $heading ?>>
                        </div>
                    <?php endif; ?>   
                </header>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'depth' => 3,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse navbar-1-collapse',
                'menu_class' => 'nav navbar-nav',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker' => new wp_bootstrap_navwalker())
            );
            ?>
        </nav>
    </div>