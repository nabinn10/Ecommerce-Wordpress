<?php
namespace MailPoetVendor\Symfony\Component\Translation\Provider;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Translation\Exception\IncompleteDsnException;
abstract class AbstractProviderFactory implements ProviderFactoryInterface
{
 public function supports(Dsn $dsn) : bool
 {
 return \in_array($dsn->getScheme(), $this->getSupportedSchemes(), \true);
 }
 protected abstract function getSupportedSchemes() : array;
 protected function getUser(Dsn $dsn) : string
 {
 if (null === ($user = $dsn->getUser())) {
 throw new IncompleteDsnException('User is not set.', $dsn->getScheme() . '://' . $dsn->getHost());
 }
 return $user;
 }
 protected function getPassword(Dsn $dsn) : string
 {
 if (null === ($password = $dsn->getPassword())) {
 throw new IncompleteDsnException('Password is not set.', $dsn->getOriginalDsn());
 }
 return $password;
 }
}
