<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\UnexpectedValueException;
use WP_Error;
class Validation_Exception extends UnexpectedValueException {
 protected $wp_error;
 public static function create_from_wp_error( WP_Error $wp_error ): self {
 $exception = self::create()
 ->withMessage( $wp_error->get_error_message() );
 $exception->wp_error = $wp_error;
 return $exception;
 }
 public function get_wp_error(): WP_Error {
 return $this->wp_error;
 }
}
