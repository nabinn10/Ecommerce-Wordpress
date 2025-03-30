<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor;
if (!defined('ABSPATH')) exit;
class Container {
 protected array $services = array();
 protected array $instances = array();
 public function set( string $name, callable $callback ): void {
 $this->services[ $name ] = $callback;
 }
 public function get( $name ) {
 // Check if the service is already instantiated.
 if ( isset( $this->instances[ $name ] ) ) {
 return $this->instances[ $name ];
 }
 // Check if the service is registered.
 if ( ! isset( $this->services[ $name ] ) ) {
 throw new \Exception( esc_html( "Service not found: $name" ) );
 }
 $this->instances[ $name ] = $this->services[ $name ]( $this );
 return $this->instances[ $name ];
 }
}
