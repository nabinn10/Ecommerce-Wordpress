<div class="postauthor-container">			  
	<div class="postauthor-title">				  
		<h4>
			<?php _e( 'About The Author', 'maxstore' ); ?>
		</h4>				
	</div>        	
	<div class="postauthor-content">	             
		<?php echo get_avatar( get_the_author_meta( 'email' ), '100' ); ?> 						
		<h5 class="vcard">
			<span class="fn">
				<?php the_author_posts_link(); ?>
			</span>
		</h5>            
		<p>
			<?php the_author_meta( 'description' ) ?>
		</p>					
	</div>	 		
</div>