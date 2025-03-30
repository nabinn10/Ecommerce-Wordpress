<?php
if (!defined('ABSPATH')) exit;
class ActionScheduler_Versions {
 private static $instance = null;
 private $versions = array();
 private $sources = array();
 public function register( $version_string, $initialization_callback ) {
 if ( isset( $this->versions[ $version_string ] ) ) {
 return false;
 }
 // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_debug_backtrace
 $backtrace = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS );
 $source = $backtrace[0]['file'];
 $this->versions[ $version_string ] = $initialization_callback;
 $this->sources[ $source ] = $version_string;
 return true;
 }
 public function get_versions() {
 return $this->versions;
 }
 public function get_sources() {
 return $this->sources;
 }
 public function latest_version() {
 $keys = array_keys( $this->versions );
 if ( empty( $keys ) ) {
 return false;
 }
 uasort( $keys, 'version_compare' );
 return end( $keys );
 }
 public function latest_version_callback() {
 $latest = $this->latest_version();
 if ( empty( $latest ) || ! isset( $this->versions[ $latest ] ) ) {
 return '__return_null';
 }
 return $this->versions[ $latest ];
 }
 public static function instance() {
 if ( empty( self::$instance ) ) {
 self::$instance = new self();
 }
 return self::$instance;
 }
 public static function initialize_latest_version() {
 $self = self::instance();
 call_user_func( $self->latest_version_callback() );
 }
 public function active_source(): array {
 _deprecated_function( __METHOD__, '3.9.2', 'ActionScheduler_SystemInformation::active_source()' );
 return ActionScheduler_SystemInformation::active_source();
 }
 public function active_source_path(): string {
 _deprecated_function( __METHOD__, '3.9.2', 'ActionScheduler_SystemInformation::active_source_path()' );
 return ActionScheduler_SystemInformation::active_source_path();
 }
}
