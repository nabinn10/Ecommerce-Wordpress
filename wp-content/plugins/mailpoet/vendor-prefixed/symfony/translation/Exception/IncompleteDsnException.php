<?php
namespace MailPoetVendor\Symfony\Component\Translation\Exception;
if (!defined('ABSPATH')) exit;
class IncompleteDsnException extends InvalidArgumentException
{
 public function __construct(string $message, ?string $dsn = null, ?\Throwable $previous = null)
 {
 if ($dsn) {
 $message = \sprintf('Invalid "%s" provider DSN: ', $dsn) . $message;
 }
 parent::__construct($message, 0, $previous);
 }
}
