<?php
namespace MailPoetVendor\Symfony\Component\Translation\Exception;
if (!defined('ABSPATH')) exit;
interface ProviderExceptionInterface extends ExceptionInterface
{
 public function getDebug() : string;
}
