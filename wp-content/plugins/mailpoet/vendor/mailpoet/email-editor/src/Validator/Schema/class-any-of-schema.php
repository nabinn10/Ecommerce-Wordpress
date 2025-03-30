<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator\Schema;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema;
class Any_Of_Schema extends Schema {
 protected $schema = array(
 'anyOf' => array(),
 );
 public function __construct(
 array $schemas
 ) {
 foreach ( $schemas as $schema ) {
 $this->schema['anyOf'][] = $schema->to_array();
 }
 }
 public function nullable(): self {
 $null = array( 'type' => 'null' );
 $any_of = $this->schema['anyOf'];
 $value = in_array( $null, $any_of, true ) ? $any_of : array_merge( $any_of, array( $null ) );
 return $this->update_schema_property( 'anyOf', $value );
 }
 public function non_nullable(): self {
 $null = array( 'type' => 'null' );
 $any_of = $this->schema['any_of'];
 $value = array_filter(
 $any_of,
 function ( $item ) use ( $null ) {
 return $item !== $null;
 }
 );
 return $this->update_schema_property( 'any_of', $value );
 }
}
