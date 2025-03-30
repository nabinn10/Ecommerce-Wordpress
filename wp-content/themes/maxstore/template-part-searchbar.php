<div class="header-line-search row <?php echo get_theme_mod( 'searchbar-mobile', 'hidden-xs' ); ?>">
	<div class="header-categories col-md-2">
		<ul class="accordion list-unstyled" id="view-all-guides">
			<li class="accordion-group list-unstyled">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#view-all-guides" href="#collapseOne"><?php esc_html_e( 'Shop by category', 'maxstore' ); ?></a>
				<div id="collapseOne" class="accordion-body collapse">
					<div class="accordion-inner">
						<ul class="list-unstyled">
							<?php wp_list_categories( 'title_li=&taxonomy=product_cat&show_count=1' ); ?>
						</ul>
					</div>
				</div>
			</li>
		</ul >
    </div>
	<?php
	if ( get_theme_mod( 'maxstore_socials', 0 ) == 1 ) {
		$row = '6';
	} else {
		$row = '10';
	}
	?>
    <div class="header-search-form col-md-<?php echo $row; ?>">
		<div class="header-search-title col-sm-2 col-xs-3">
			<?php esc_html_e( 'Search', 'maxstore' ); ?>
		</div>
		<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<select class="col-sm-3 col-xs-3" name="product_cat">
				<option value=""><?php esc_attr_e( 'All', 'maxstore' ); ?></option> 
				<?php
				$categories = get_categories( 'taxonomy=product_cat' );
				foreach ( $categories as $category ) {
					$option = '<option value="' . esc_attr( $category->category_nicename ) . '">';
					$option .= esc_html( $category->cat_name );
					$option .= ' (' . absint( $category->category_count ) . ')';
					$option .= '</option>';
					echo $option;
				}
				?>
			</select>
			<input type="hidden" name="post_type" value="product" />
			<input class="col-sm-7 col-xs-6" name="s" type="text" placeholder="<?php esc_attr_e( 'Search for products', 'maxstore' ); ?>"/>
			<button type="submit"><?php esc_html_e( 'Go', 'maxstore' ); ?></button>
		</form>
    </div>
	<?php if ( get_theme_mod( 'maxstore_socials', 0 ) == 1 ) : ?>
		<div class="social-section col-md-4">
			<span class="social-section-title hidden-md">
				<?php esc_html_e( 'Follow Us', 'maxstore' ); ?> 
			</span>
		<?php maxstore_social_links(); ?>              
		</div>
	<?php endif; ?> 
</div>