<?php
/**
 *
 * Template name: Homepage with slider
 * The template for displaying homepage with slider.
 *
 * @package online-store
 */
get_header();
get_template_part('template-part', 'head');
?>

<!-- start content container -->
<div class="row rsrc-fullwidth-home">

    <?php
    $slider = get_post_meta($post->ID, 'maxstore_slider_on', true);
    if ($slider == 'fullwidth') {
        get_template_part('template-part', 'home-slider');
    }
    ?>    

    <div class="rsrc-home" >        
        <?php
        // theloop
        if (have_posts()) : while (have_posts()) : the_post();
                ?>                                
                <div <?php post_class('rsrc-post-content'); ?>>                                                      
                    <div class="entry-content">                        
                        <?php the_content(); ?>                            
                    </div>                                                       
                </div>        
            <?php endwhile; ?>        
        <?php else: ?>            
            <?php get_404_template(); ?>        
        <?php endif; ?>    
    </div>

</div>
<!-- end content container -->
<?php get_footer(); ?>