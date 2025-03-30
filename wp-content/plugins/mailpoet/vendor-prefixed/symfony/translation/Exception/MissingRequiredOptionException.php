<?php
namespace MailPoetVendor\Symfony\Component\Translation\Exception;
if (!defined('ABSPATH')) exit;
class MissingRequiredOptionException extends IncompleteDsnException
{
 public function __construct(string $option, ?string $dsn = null, ?\Throwable $previous = null)
 {
 $message = \sprintf('The option "%s" is required but missing.', $option);
 parent::__construct($message, $dsn, $previous);
 }
}
