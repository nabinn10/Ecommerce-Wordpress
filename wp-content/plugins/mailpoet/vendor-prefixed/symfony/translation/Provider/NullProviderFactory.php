<?php
namespace MailPoetVendor\Symfony\Component\Translation\Provider;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Translation\Exception\UnsupportedSchemeException;
final class NullProviderFactory extends AbstractProviderFactory
{
 public function create(Dsn $dsn) : ProviderInterface
 {
 if ('null' === $dsn->getScheme()) {
 return new NullProvider();
 }
 throw new UnsupportedSchemeException($dsn, 'null', $this->getSupportedSchemes());
 }
 protected function getSupportedSchemes() : array
 {
 return ['null'];
 }
}
