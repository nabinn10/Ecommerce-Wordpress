<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator\Schema;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema;
class Object_Schema extends Schema {
 protected $schema = array(
 'type' => 'object',
 );
 public function properties( array $properties ): self {
 return $this->update_schema_property(
 'properties',
 array_map(
 function ( Schema $property ) {
 return $property->to_array();
 },
 $properties
 )
 );
 }
 public function additionalProperties( Schema $schema ): self {
 return $this->update_schema_property( 'additionalProperties', $schema->to_array() );
 }
 public function disableAdditionalProperties(): self {
 return $this->update_schema_property( 'additionalProperties', false );
 }
 public function patternProperties( array $properties ): self {
 $pattern_properties = array();
 foreach ( $properties as $key => $value ) {
 $this->validate_pattern( $key );
 $pattern_properties[ $key ] = $value->to_array();
 }
 return $this->update_schema_property( 'patternProperties', $pattern_properties );
 }
 public function minProperties( int $value ): self {
 return $this->update_schema_property( 'minProperties', $value );
 }
 public function maxProperties( int $value ): self {
 return $this->update_schema_property( 'maxProperties', $value );
 }
}
