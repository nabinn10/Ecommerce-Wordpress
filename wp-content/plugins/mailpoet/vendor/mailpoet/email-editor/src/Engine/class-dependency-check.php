<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine;
if (!defined('ABSPATH')) exit;
class Dependency_Check {
 public const MIN_WP_VERSION = '6.7';
 public function are_dependencies_met(): bool {
 if ( ! $this->is_wp_version_compatible() ) {
 return false;
 }
 return true;
 }
 private function is_wp_version_compatible(): bool {
 return version_compare( get_bloginfo( 'version' ), self::MIN_WP_VERSION, '>=' );
 }
}
