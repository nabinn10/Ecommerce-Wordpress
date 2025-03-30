<?php if ( is_active_sidebar( 'maxstore-footer-area' ) ) { ?>  				
	<div id="content-footer-section" class="row clearfix">    				
		<?php dynamic_sidebar( 'maxstore-footer-area' ) ?>  				
	</div>		
<?php } ?>         
<footer id="colophon" class="rsrc-footer" role="contentinfo">                
	<div class="row rsrc-author-credits">                                       
		<div class="text-center">
			<?php printf( __( 'Proudly powered by %s', 'maxstore' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'maxstore' ) ) . '">WordPress</a>' ); ?>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s', 'maxstore' ), '<a href="https://themes4wp.com/theme/maxstore" title="' . esc_attr__( 'Free WooCommerce WordPress Theme', 'maxstore' ) . '">MaxStore</a>', 'Themes4WP' ); ?>
		</div>
	</div>    
</footer>
<div id="back-top">  
	<a href="#top">
		<span></span>
	</a>
</div>
</div>
<!-- end main container -->
<?php wp_footer(); ?>
</body>
</html>