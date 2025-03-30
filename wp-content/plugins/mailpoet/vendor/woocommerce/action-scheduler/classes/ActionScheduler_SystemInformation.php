<?php
if (!defined('ABSPATH')) exit;
class ActionScheduler_SystemInformation {
 public static function active_source(): array {
 $plugins = get_plugins();
 $plugin_files = array_keys( $plugins );
 foreach ( $plugin_files as $plugin_file ) {
 $plugin_path = trailingslashit( WP_PLUGIN_DIR ) . dirname( $plugin_file );
 $plugin_file = trailingslashit( WP_PLUGIN_DIR ) . $plugin_file;
 if ( 0 !== strpos( dirname( __DIR__ ), $plugin_path ) ) {
 continue;
 }
 $plugin_data = get_plugin_data( $plugin_file );
 if ( ! is_array( $plugin_data ) || empty( $plugin_data['Name'] ) ) {
 continue;
 }
 return array(
 'type' => 'plugin',
 'name' => $plugin_data['Name'],
 );
 }
 $themes = (array) search_theme_directories();
 foreach ( $themes as $slug => $data ) {
 $needle = trailingslashit( $data['theme_root'] ) . $slug . '/';
 if ( 0 !== strpos( __FILE__, $needle ) ) {
 continue;
 }
 $theme = wp_get_theme( $slug );
 if ( ! is_object( $theme ) || ! is_a( $theme, \WP_Theme::class ) ) {
 continue;
 }
 return array(
 'type' => 'theme',
 // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
 'name' => $theme->Name,
 );
 }
 return array();
 }
 public static function active_source_path(): string {
 return trailingslashit( dirname( __DIR__ ) );
 }
 public static function get_sources() {
 $versions = ActionScheduler_Versions::instance();
 return method_exists( $versions, 'get_sources' ) ? $versions->get_sources() : array();
 }
}
