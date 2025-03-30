<?php
declare(strict_types = 1);
if (!defined('ABSPATH')) exit;
// Dummy WP classes.
// phpcs:disable Generic.Files.OneObjectStructurePerFile.MultipleFound
if ( ! class_exists( \WP_Theme_JSON::class ) ) {
 class WP_Theme_JSON {
 public function get_data() {
 return array();
 }
 public function get_settings() {
 return array();
 }
 }
}
if ( ! class_exists( \WP_Block_Templates_Registry::class ) ) {
 class WP_Block_Templates_Registry {
 private static array $registered_templates = array();
 private static ?self $instance = null;
 public static function get_instance(): self {
 if ( null === self::$instance ) {
 self::$instance = new self();
 }
 return self::$instance;
 }
 public function is_registered( string $name ): bool {
 return isset( self::$registered_templates[ $name ] );
 }
 }
}
