<?php
namespace MailPoetVendor\Symfony\Component\Translation;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Config\Resource\ResourceInterface;
interface MessageCatalogueInterface
{
 public const INTL_DOMAIN_SUFFIX = '+intl-icu';
 public function getLocale();
 public function getDomains();
 public function all(?string $domain = null);
 public function set(string $id, string $translation, string $domain = 'messages');
 public function has(string $id, string $domain = 'messages');
 public function defines(string $id, string $domain = 'messages');
 public function get(string $id, string $domain = 'messages');
 public function replace(array $messages, string $domain = 'messages');
 public function add(array $messages, string $domain = 'messages');
 public function addCatalogue(self $catalogue);
 public function addFallbackCatalogue(self $catalogue);
 public function getFallbackCatalogue();
 public function getResources();
 public function addResource(ResourceInterface $resource);
}
