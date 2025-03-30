<?php get_header(); ?>

<?php get_template_part( 'template-part', 'head' ); ?>

<?php get_template_part( 'template-part', 'topnav' ); ?>

<!-- start content container -->
<div class="row rsrc-content">

	<?php //left sidebar ?>
	<?php get_sidebar( 'left' ); ?>


    <div class="col-md-<?php maxstore_main_content_width(); ?> rsrc-main">
        <div class="woocommerce">
			<?php if ( get_theme_mod( 'woo-breadcrumbs', 0 ) != 0 ) : ?>
				<?php woocommerce_breadcrumb(); ?>
			<?php endif; ?>
			<?php woocommerce_content(); ?>
        </div>
    </div><!-- /#content -->      

	<?php //get the right sidebar ?>
	<?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>

