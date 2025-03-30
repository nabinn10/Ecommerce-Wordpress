<?php
/**
 * Contribute
 */
?>

<div id="contribute" class="maxstore-tab-pane">

	<h1><?php esc_html_e( 'How can I contribute?', 'maxstore' ); ?></h1>

	<hr/>

	<div class="maxstore-tab-pane-half maxstore-tab-pane-first-half">

		<p><strong><?php esc_html_e( 'Found a bug? Want to contribute with a fix?','maxstore'); ?></strong></p>

		<p><?php esc_html_e( 'Contact form is the place to go!','maxstore' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'http://themes4wp.com/contact/' ); ?>" class="contribute-button button button-primary"><?php printf( esc_html__( '%s contact form', 'maxstore' ), 'MaxStore' ); ?></a>
		</p>

		<hr>

	</div>
	<div class="maxstore-tab-pane-half">

		<p><strong><?php printf( esc_html__( 'Are you a polyglot? Want to translate %s into your own language?', 'maxstore' ), 'MaxStore' ); ?></strong></p>

		<p><?php esc_html_e( 'Get involved at WordPress.org.', 'maxstore' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/maxstore/' ); ?>" class="translate-button button button-primary"><?php printf( esc_html__( 'Translate %s', 'maxstore' ), 'MaxStore' ); ?></a>
		</p>

	</div>

	<div>

		<h4><?php printf( esc_html__( 'Are you enjoying %s?', 'maxstore' ), 'MaxStore' ); ?></h4>

		<p class="review-link"><?php printf( esc_html__( 'Rate our theme on %s. We\'d really appreciate it!', 'maxstore' ), '<a href="https://wordpress.org/support/view/theme-reviews/maxstore?filter=5">' . esc_html( 'WordPress.org', 'maxstore' ) . '</a>' ); ?></p>

		<p><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>

	</div>

</div>
