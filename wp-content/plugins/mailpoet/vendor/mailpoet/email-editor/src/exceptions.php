<?php declare(strict_types = 1);
// phpcs:ignoreFile PSR1.Classes.ClassDeclaration
namespace MailPoet\EmailEditor;
if (!defined('ABSPATH')) exit;
interface HttpAwareException {
 public function getHttpStatusCode(): int;
}
abstract class Exception extends \Exception {
 private $errors = [];
 final public function __construct(string $message = '', int $code = 0, \Throwable $previous = null) {
 parent::__construct($message, $code, $previous);
 }
 public static function create(\Throwable $previous = null) {
 return new static('', 0, $previous);
 }
 public function withMessage(string $message) {
 $this->message = $message;
 return $this;
 }
 public function withCode(int $code) {
 $this->code = $code;
 return $this;
 }
 public function withErrors(array $errors) {
 $this->errors = $errors;
 return $this;
 }
 public function withError(string $id, string $error) {
 $this->errors[$id] = $error;
 return $this;
 }
 public function getErrors(): array {
 return $this->errors;
 }
}
class RuntimeException extends Exception {}
class UnexpectedValueException extends RuntimeException implements HttpAwareException {
 public function getHttpStatusCode(): int {
 return 400;
 }
}
class AccessDeniedException extends UnexpectedValueException implements HttpAwareException {
 public function getHttpStatusCode(): int {
 return 403;
 }
}
class NotFoundException extends UnexpectedValueException implements HttpAwareException {
 public function getHttpStatusCode(): int {
 return 404;
 }
}
class ConflictException extends UnexpectedValueException implements HttpAwareException {
 public function getHttpStatusCode(): int {
 return 409;
 }
}
class InvalidStateException extends RuntimeException {}
class NewsletterProcessingException extends Exception {}
