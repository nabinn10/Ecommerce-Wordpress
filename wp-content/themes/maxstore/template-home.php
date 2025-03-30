<?php
/**
 *
 * Template name: Homepage
 * The template for displaying homepage.
 *
 * @package maxstore
 */
get_header();

get_template_part( 'template-part', 'head' ); ?>

<!-- start content container -->
<div class="row rsrc-fullwidth-home">      
	<div class="rsrc-home" >        
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php $section_on = get_post_meta( get_the_ID(), 'maxstore_first_image_on', true ); ?>                                 
				<div <?php post_class( 'rsrc-post-content' ); ?>>                                                      
					<div class="entry-content"> 
						<?php if ( $section_on == 'on' && class_exists( 'WooCommerce' ) ) { ?>
							<?php get_template_part( 'template-part', 'home-cats' ); ?>
						<?php } ?>                           
						<?php the_content(); ?>                            
					</div>                                                       
				</div>        
			<?php endwhile; ?>        
		<?php else: ?>            
			<?php get_template_part( 'content', 'none' ); ?>        
		<?php endif; ?>    
	</div>    
</div>
<!-- end content container -->
<?php get_footer(); ?>
