<?php $entries = get_post_meta(get_the_ID(), 'maxstore_home_slider', true); ?>
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
                    $img = $title = $desc = $button = $button_url = '';
                    if (isset($entry['maxstore_title']))
                        $title = esc_html($entry['maxstore_title']);
                    if (isset($entry['maxstore_desc']))
                        $desc = wpautop($entry['maxstore_desc']);
                    if (isset($entry['maxstore_button_text']))
                        $button = esc_html($entry['maxstore_button_text']);
                    if (isset($entry['maxstore_url']))
                        $button_url = esc_url($entry['maxstore_url']);
                    if (isset($entry['maxstore_image_id'])) {
                        $img = wp_get_attachment_image($entry['maxstore_image_id'], 'maxstore-slider');
                    }
                    ?>
                    <div class="item <?php if ($i == 0) echo 'active'; ?>">
                        <div class="top-slider-inner">   
                            <a href="<?php echo $button_url; ?>">
                                <?php echo $img; ?>
                            </a>
                            <?php if ($title != '' || $desc != '' || $button != '' || $button_url != '') { ?>
                                <div class="carousel-caption">
                                    <div class="home-content">
                                        <?php if ($title != '') { ?>
                                            <header>		
                                                <h2 class="title">
                                                    <?php echo $title; ?>    
                                                </h2>
                                            </header><!--.header-->
                                        <?php } ?>	
                                        <?php if ($desc != '') { ?>
                                            <div class="slider-description hidden-xs">
                                                <?php echo $desc; ?>       
                                            </div>
                                        <?php } ?> 
                                    </div>
                                    <?php if ($button_url != '' && $button != '') { ?> 
                                        <a class="btn btn-primary btn-md outline" href="<?php echo $button_url; ?>"><?php echo $button; ?></a>
                                    <?php } ?>        
                                </div>
                            <?php } ?>                          
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
