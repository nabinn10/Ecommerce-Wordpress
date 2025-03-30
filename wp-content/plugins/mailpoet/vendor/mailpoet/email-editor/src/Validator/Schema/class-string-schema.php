<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator\Schema;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema;
class String_Schema extends Schema {
 protected $schema = array(
 'type' => 'string',
 );
 public function minLength( int $value ): self {
 return $this->update_schema_property( 'minLength', $value );
 }
 public function maxLength( int $value ): self {
 return $this->update_schema_property( 'maxLength', $value );
 }
 public function pattern( string $pattern ): self {
 $this->validate_pattern( $pattern );
 return $this->update_schema_property( 'pattern', $pattern );
 }
 public function formatDateTime(): self {
 return $this->update_schema_property( 'format', 'date-time' );
 }
 public function formatEmail(): self {
 return $this->update_schema_property( 'format', 'email' );
 }
 public function formatHexColor(): self {
 return $this->update_schema_property( 'format', 'hex-color' );
 }
 public function formatIp(): self {
 return $this->update_schema_property( 'format', 'ip' );
 }
 public function formatUri(): self {
 return $this->update_schema_property( 'format', 'uri' );
 }
 public function formatUuid(): self {
 return $this->update_schema_property( 'format', 'uuid' );
 }
}
