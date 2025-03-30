<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator\Schema;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema;
class Array_Schema extends Schema {
 protected $schema = array(
 'type' => 'array',
 );
 public function items( Schema $schema ): self {
 return $this->update_schema_property( 'items', $schema->to_array() );
 }
 public function minItems( int $value ): self {
 return $this->update_schema_property( 'minItems', $value );
 }
 public function maxItems( int $value ): self {
 return $this->update_schema_property( 'maxItems', $value );
 }
 public function uniqueItems(): self {
 return $this->update_schema_property( 'uniqueItems', true );
 }
}
