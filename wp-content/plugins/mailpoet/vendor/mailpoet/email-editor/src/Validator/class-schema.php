<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator;
if (!defined('ABSPATH')) exit;
use function wp_json_encode;
use function rest_get_allowed_schema_keywords;
abstract class Schema {
 protected $schema = array();
 public function nullable() {
 $type = $this->schema['type'] ?? array( 'null' );
 return $this->update_schema_property( 'type', is_array( $type ) ? $type : array( $type, 'null' ) );
 }
 public function non_nullable() {
 $type = $this->schema['type'] ?? null;
 return null === $type
 ? $this->unset_schema_property( 'type' )
 : $this->update_schema_property( 'type', is_array( $type ) ? $type[0] : $type );
 }
 public function required() {
 return $this->update_schema_property( 'required', true );
 }
 public function optional() {
 return $this->unset_schema_property( 'required' );
 }
 public function title( string $title ) {
 return $this->update_schema_property( 'title', $title );
 }
 public function description( string $description ) {
 return $this->update_schema_property( 'description', $description );
 }
 public function default( $default_value ) {
 return $this->update_schema_property( 'default', $default_value );
 }
 public function field( string $name, $value ) {
 if ( in_array( $name, $this->get_reserved_keywords(), true ) ) {
 throw new \Exception( \esc_html( "Field name '$name' is reserved" ) );
 }
 return $this->update_schema_property( $name, $value );
 }
 public function to_array(): array {
 return $this->schema;
 }
 public function to_string(): string {
 $json = wp_json_encode( $this->schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRESERVE_ZERO_FRACTION );
 $error = json_last_error();
 if ( $error || false === $json ) {
 throw new \Exception( \esc_html( json_last_error_msg() ), 0 );
 }
 return $json;
 }
 protected function update_schema_property( string $name, $value ) {
 $clone = clone $this;
 $clone->schema[ $name ] = $value;
 return $clone;
 }
 protected function unset_schema_property( string $name ) {
 $clone = clone $this;
 unset( $clone->schema[ $name ] );
 return $clone;
 }
 protected function get_reserved_keywords(): array {
 return rest_get_allowed_schema_keywords();
 }
 protected function validate_pattern( string $pattern ): void {
 $escaped = str_replace( '#', '\\#', $pattern );
 $regex = "#$escaped#u";
 if ( @preg_match( $regex, '' ) === false ) { // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
 throw new \Exception( \esc_html( "Invalid regular expression '$regex'" ) );
 }
 }
}
