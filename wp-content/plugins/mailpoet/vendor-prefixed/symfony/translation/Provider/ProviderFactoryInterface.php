<?php
namespace MailPoetVendor\Symfony\Component\Translation\Provider;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Translation\Exception\IncompleteDsnException;
use MailPoetVendor\Symfony\Component\Translation\Exception\UnsupportedSchemeException;
interface ProviderFactoryInterface
{
 public function create(Dsn $dsn) : ProviderInterface;
 public function supports(Dsn $dsn) : bool;
}
