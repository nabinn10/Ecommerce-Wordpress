<?php
$entries = get_theme_mod('online_store_front_page_demo_repeater', array(
    array(
        'slider_img' => get_stylesheet_directory_uri() . '/img/demo/slider1.jpg',
        'slider_url' => '',
    ),
    array(
        'slider_img' => get_stylesheet_directory_uri() . '/img/demo/slider2.jpg',
        'slider_url' => '',
    ),
        )
        )
?>
<?php if ($entries) : ?>
    <div class="top-area row">      
        <div class="carousel slide" id="maxstore-slider">
            <ol class="carousel-indicators">                                
                <?php
                $j = 0;
                foreach ($entries as $key => $entry) :
                    ?>                                                                      
                    <li data-target="#maxstore-slider" data-slide-to="<?php echo $j; ?>" class="<?php if ($j == 0) echo 'active '; ?>"></li>                                  
                    <?php $j++; ?>                                
                <?php endforeach; ?>                            
            </ol>
            <div class="carousel-inner">
                <?php
                $i = 0;
                foreach ((array) $entries as $key => $entry) {
                    $img = $image_id = '';
                    $url = esc_url($entry['slider_url']);
                    $image_id = wp_get_attachment_image($entry['slider_img'], 'maxstore-slider');
                    ?>
                    <div class="item <?php if ($i == 0) echo 'active'; ?>">
                        <div class="top-slider-inner">
                            <a href="<?php echo $url; ?>">   
                                <?php
                                if ($image_id) {
                                    echo $image_id;
                                } else {
                                    echo '<img src="' . esc_url($entry['slider_img']) . '" alt="">';
                                }
                                ?>
                            </a>                        
                        </div>
                    </div>

                    <?php $i++; ?>
                <?php } ?>
            </div>
            <a class="left carousel-control" href="#maxstore-slider" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
            <a class="right carousel-control" href="#maxstore-slider" data-slide="next"><i class="fa fa-chevron-right"></i></a>
        </div> 
    </div>
<?php endif; ?>
