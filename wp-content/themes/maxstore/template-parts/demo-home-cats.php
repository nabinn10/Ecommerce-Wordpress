<?php
$first_img				 = get_theme_mod( 'front_page_demo_banner_img', get_template_directory_uri() . '/template-parts/demo-img/demo-image-top.jpg' );
$first_img_title		 = get_theme_mod( 'front_page_demo_banner_title', __( 'MaxStore', 'maxstore' ) );
$first_img_desc			 = get_theme_mod( 'front_page_demo_banner_desc', __( 'Edit this section in customizer', 'maxstore' ) );
$first_img_button		 = __( 'View More', 'maxstore' );
$first_img_button_url	 = get_theme_mod( 'front_page_demo_banner_url', '#' );
$second_cat				 = get_terms( 'product_cat' );
if ( !empty( $second_cat ) && !is_wp_error( $second_cat ) ) {
	?> 
	<div class="top-area row no-gutter">       
		<div class="topfirst-img col-sm-6">     
			<div class="top-grid-img">
				<?php if ( $first_img ) { ?>  
					<img width="600" height="600" src="<?php echo esc_url( $first_img ); ?>" title="<?php echo esc_attr( $first_img_title ); ?>" alt="<?php echo esc_attr( $first_img_desc ); ?>"> 
				<?php } else { ?>  
					<img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" width="600px" height="600px" />
				<?php } ?>  
			</div>
			<div class="top-grid-heading">
				<?php if ( $first_img_title != '' ) { ?>
					<h2>
						<?php echo esc_html( $first_img_title ); ?>
					</h2>
				<?php } ?>  
				<?php if ( $first_img_desc != '' ) { ?>
					<p>
						<?php echo esc_html( $first_img_desc ); ?>
					</p>
				<?php } ?> 
				<?php if ( $first_img_button_url != '' && $first_img_button != '' ) { ?>
					<p>                                      
					<div class="btn btn-primary btn-md outline">
						<a href="<?php echo esc_url( $first_img_button_url ); ?>">
							<?php echo esc_html( $first_img_button ); ?>
						</a>
					</div>                                  
					</p>
				<?php } ?>   
			</div>    
		</div>

		<div class="topsecond-img col-sm-6">
			<?php
			// Random order.
			shuffle( $second_cat );
			// Get first $max items.
			$terms = array_slice( $second_cat, 0, 1 );
			foreach ( $terms as $term ) {
				$random_term_id[]			 = $term->term_id;
				$random_term_name[]			 = $term->name;
				$random_term_slug[]			 = $term->slug;
				$random_term_desc[]			 = $term->description;
				$random_term_category_link[] = get_term_link( $random_term_id[ 0 ] );
				$random_term_thumb_id[]		 = get_term_meta( $random_term_id[ 0 ], 'thumbnail_id', true );
				$random_term_term_img[]		 = wp_get_attachment_image( $random_term_thumb_id[ 0 ], 'maxstore-home-top' );
			}
			?>
			<div class="top-grid-cat col-xs-6">
				<a href="<?php echo esc_url( $random_term_category_link[ 0 ] ); ?>"> 
					<div class="top-grid-img">
						<?php
						if ( $random_term_term_img[ 0 ] ) {
							echo $random_term_term_img[ 0 ];
						} else {
							echo '<img src="' . wc_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />';
						}
						?>
					</div>
					<div class="top-grid-heading">
						<h2>
							<?php
							if ( $random_term_name[ 0 ] ) {
								echo esc_html( $random_term_name[ 0 ] );
							}
							?>
						</h2>
						<p>
							<?php
							if ( $random_term_desc[ 0 ] ) {
								echo esc_html( substr( $random_term_desc[ 0 ], 0, 30 ) ), '...';
							}
							?>
						</p>
					</div>
				</a> 
			</div>
			<div class="top-grid-products">
				<ul class="list-unstyled">
					<?php
					$args	 = array(
						'post_type'		 => 'product',
						'posts_per_page' => 3,
						'product_cat'	 => $random_term_slug[ 0 ],
						'tax_query'		 => array(
							array(
								'taxonomy'	 => 'product_visibility',
								'field'		 => 'name',
								'terms'		 => 'exclude-from-catalog',
								'operator'	 => 'NOT IN',
							),
						),
					);
					$loop	 = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
						?>
						<li class="product-cats col-xs-6">    
							<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php the_title_attribute(); ?>">
								<?php woocommerce_show_product_sale_flash( $post, $product ); ?>
								<div class="top-grid-img">  
									<?php
									if ( has_post_thumbnail( $loop->post->ID ) ) {
										echo get_the_post_thumbnail( $loop->post->ID, 'maxstore-home-top' );
									} else {
										echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />';
									}
									?>
								</div>
								<div class="top-grid-heading">
									<h2><?php the_title(); ?></h2>
									<span class="price"><?php echo $product->get_price_html(); ?></span>
								</div>                    
							</a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</ul>
			</div>    
		</div>   
	</div>
<?php } ?>
