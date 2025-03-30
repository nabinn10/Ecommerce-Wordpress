<?php
namespace MailPoetVendor\Symfony\Component\Translation\Exception;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Contracts\HttpClient\ResponseInterface;
class ProviderException extends RuntimeException implements ProviderExceptionInterface
{
 private $response;
 private $debug;
 public function __construct(string $message, ResponseInterface $response, int $code = 0, ?\Exception $previous = null)
 {
 $this->response = $response;
 $this->debug = $response->getInfo('debug') ?? '';
 parent::__construct($message, $code, $previous);
 }
 public function getResponse() : ResponseInterface
 {
 return $this->response;
 }
 public function getDebug() : string
 {
 return $this->debug;
 }
}
