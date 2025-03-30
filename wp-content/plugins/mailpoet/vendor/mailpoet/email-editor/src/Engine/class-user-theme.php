<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine;
if (!defined('ABSPATH')) exit;
use WP_Post;
use WP_Theme_JSON;
class User_Theme {
 private const USER_THEME_POST_NAME = 'wp-global-styles-mailpoet-email';
 private const INITIAL_THEME_DATA = array(
 'version' => 3,
 'isGlobalStylesUserThemeJSON' => true,
 );
 private ?WP_Post $user_theme_post = null;
 public function get_theme(): WP_Theme_JSON {
 $post = $this->get_user_theme_post();
 $theme_data = json_decode( $post->post_content, true );
 if ( ! is_array( $theme_data ) ) {
 $theme_data = self::INITIAL_THEME_DATA;
 }
 return new WP_Theme_JSON( $theme_data, 'custom' );
 }
 public function get_user_theme_post(): WP_Post {
 $this->ensure_theme_post();
 if ( ! $this->user_theme_post instanceof WP_Post ) {
 throw new \Exception( 'Error creating user theme post' );
 }
 return $this->user_theme_post;
 }
 private function ensure_theme_post(): void {
 if ( $this->user_theme_post ) {
 return;
 }
 $this->user_theme_post = get_page_by_path( self::USER_THEME_POST_NAME, OBJECT, 'wp_global_styles' );
 if ( $this->user_theme_post instanceof WP_Post ) {
 return;
 }
 $post_data = array(
 'post_title' => __( 'Custom Email Styles', 'mailpoet' ),
 'post_name' => self::USER_THEME_POST_NAME,
 'post_content' => (string) wp_json_encode( self::INITIAL_THEME_DATA, JSON_FORCE_OBJECT ),
 'post_status' => 'publish',
 'post_type' => 'wp_global_styles',
 );
 $post_id = wp_insert_post( $post_data );
 if ( is_wp_error( $post_id ) ) {
 throw new \Exception( 'Error creating user theme post: ' . esc_html( $post_id->get_error_message() ) );
 }
 $this->user_theme_post = get_post( $post_id );
 }
}
