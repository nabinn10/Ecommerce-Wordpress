<!-- start content container -->
<div class="row rsrc-content">    
	<?php //left sidebar ?>    
	<?php get_sidebar( 'left' ); ?>    
	<article class="col-md-<?php maxstore_main_content_width(); ?> rsrc-main">        
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>         
				<?php maxstore_breadcrumb(); ?>         
				<?php if ( has_post_thumbnail() ) : ?>                                
					<div class="single-thumbnail"><?php the_post_thumbnail( 'maxstore-single' ); ?></div>                                     
					<div class="clear">
					</div>                            
				<?php endif; ?>          
				<div <?php post_class( 'rsrc-post-content' ); ?>>                            
					<header>                              
						<h1 class="entry-title page-header">
							<?php the_title(); ?>
						</h1> 
						<time class="posted-on published" datetime="<?php the_time( 'Y-m-d' ); ?>"></time>                                                        
					</header>                            
					<div class="entry-content">                              
						<?php the_content(); ?>                            
					</div>                               
					<?php wp_link_pages(); ?>                                                                                   
					<?php comments_template(); ?>                         
				</div>        
			<?php endwhile; ?>        
		<?php else: ?>            
			<?php get_template_part( 'content', 'none' ); ?>        
		<?php endif; ?>    
	</article>    
	<?php //get the right sidebar ?>    
	<?php get_sidebar( 'right' ); ?>
</div>
<!-- end content container -->