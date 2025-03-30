<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator\Schema;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema;
class Number_Schema extends Schema {
 protected $schema = array(
 'type' => 'number',
 );
 public function minimum( float $value ): self {
 return $this->update_schema_property( 'minimum', $value )
 ->unset_schema_property( 'exclusiveMinimum' );
 }
 public function exclusiveMinimum( float $value ): self {
 return $this->update_schema_property( 'minimum', $value )
 ->update_schema_property( 'exclusiveMinimum', true );
 }
 public function maximum( float $value ): self {
 return $this->update_schema_property( 'maximum', $value )
 ->unset_schema_property( 'exclusiveMaximum' );
 }
 public function exclusiveMaximum( float $value ): self {
 return $this->update_schema_property( 'maximum', $value )
 ->update_schema_property( 'exclusiveMaximum', true );
 }
 public function multipleOf( float $value ): self {
 return $this->update_schema_property( 'multipleOf', $value );
 }
}
