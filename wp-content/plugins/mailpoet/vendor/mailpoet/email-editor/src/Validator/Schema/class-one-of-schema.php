<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator\Schema;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema;
class One_Of_Schema extends Schema {
 protected $schema = array(
 'oneOf' => array(),
 );
 public function __construct(
 array $schemas
 ) {
 foreach ( $schemas as $schema ) {
 $this->schema['oneOf'][] = $schema->to_array();
 }
 }
 public function nullable(): self {
 $null = array( 'type' => 'null' );
 $one_of = $this->schema['oneOf'];
 $value = in_array( $null, $one_of, true ) ? $one_of : array_merge( $one_of, array( $null ) );
 return $this->update_schema_property( 'oneOf', $value );
 }
 public function non_nullable(): self {
 $null = array( 'type' => 'null' );
 $one_of = $this->schema['one_of'];
 $value = array_filter(
 $one_of,
 function ( $item ) use ( $null ) {
 return $item !== $null;
 }
 );
 return $this->update_schema_property( 'one_of', $value );
 }
}
