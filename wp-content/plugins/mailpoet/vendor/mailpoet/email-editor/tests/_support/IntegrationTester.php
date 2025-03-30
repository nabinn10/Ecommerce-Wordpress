<?php
declare(strict_types=1);
if (!defined('ABSPATH')) exit;
class IntegrationTester extends \Codeception\Actor {
 use _generated\IntegrationTesterActions;
 private $wp_term_ids = array();
 private $created_comment_ids = array();
 private $posts = array();
 public function create_post( array $params ): \WP_Post {
 $post_id = wp_insert_post( $params );
 if ( $post_id instanceof WP_Error ) {
 throw new \Exception( 'Failed to create post' );
 }
 $post = get_post( $post_id );
 if ( ! $post instanceof WP_Post ) {
 throw new \Exception( 'Failed to fetch the post' );
 }
 $this->posts[] = $post;
 return $post;
 }
 public function cleanup(): void {
 $this->delete_posts();
 $this->unregister_block_templates();
 }
 public function cleanup_user_theme_post(): void {
 $post = get_page_by_path( 'wp-global-styles-mailpoet-email', OBJECT, 'wp_global_styles' );
 if ( $post ) {
 wp_delete_post( $post->ID, true );
 }
 }
 private function delete_posts(): void {
 foreach ( $this->posts as $post ) {
 wp_delete_post( $post->ID, true );
 }
 $this->cleanup_user_theme_post();
 }
 private function unregister_block_templates(): void {
 $registry = WP_Block_Templates_Registry::get_instance();
 $templates = $registry->get_all_registered();
 foreach ( $templates as $name => $template ) {
 if ( 'mailpoet' === $template->plugin && $registry->is_registered( $name ) ) {
 $registry->unregister( $name );
 }
 }
 }
}
