<?php get_header(); ?>

<?php get_template_part( 'template-part', 'head' ); ?>

<!-- start content container -->
<div class="row rsrc-content">

	<?php //left sidebar ?>
	<?php get_sidebar( 'left' ); ?>

    <div class="col-md-<?php maxstore_main_content_width(); ?> rsrc-main">
		<?php if ( have_posts() ) : ?>
			<?php maxstore_breadcrumb(); ?>
			<h1 class="page-title text-center">
				<?php the_archive_title(); ?>
			</h1>

			<?php
			while ( have_posts() ) : the_post();

				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );


			endwhile;

			the_posts_pagination();

		else:

			get_template_part( 'content', 'none' );

		endif;
		?>

	</div>

<?php //get the right sidebar  ?>
<?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>

