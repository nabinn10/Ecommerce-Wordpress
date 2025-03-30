<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\PersonalizationTags;
if (!defined('ABSPATH')) exit;
class Personalization_Tag {
 private string $name;
 private string $token;
 private string $category;
 private $callback;
 private array $attributes;
 private string $value_to_insert;
 public function __construct(
 string $name,
 string $token,
 string $category,
 callable $callback,
 array $attributes = array(),
 ?string $value_to_insert = null
 ) {
 $this->name = $name;
 // Because Gutenberg does not wrap the token with square brackets, we need to add them here.
 $this->token = strpos( $token, '[' ) === 0 ? $token : "[$token]";
 $this->category = $category;
 $this->callback = $callback;
 $this->attributes = $attributes;
 // Composing token to insert based on the token and attributes if it is not set.
 if ( ! $value_to_insert ) {
 if ( $this->attributes ) {
 $value_to_insert = substr( $this->token, 0, -1 ) . ' ' .
 implode(
 ' ',
 array_map(
 function ( $key ) {
 return $key . '="' . esc_attr( $this->attributes[ $key ] ) . '"';
 },
 array_keys( $this->attributes )
 )
 ) . ']';
 } else {
 $value_to_insert = $this->token;
 }
 }
 $this->value_to_insert = $value_to_insert;
 }
 public function get_name(): string {
 return $this->name;
 }
 public function get_token(): string {
 return $this->token;
 }
 public function get_category(): string {
 return $this->category;
 }
 public function get_attributes(): array {
 return $this->attributes;
 }
 public function get_value_to_insert(): string {
 return $this->value_to_insert;
 }
 public function execute_callback( $context, $args = array() ): string {
 return call_user_func( $this->callback, ...array_merge( array( $context ), array( $args ) ) );
 }
}
