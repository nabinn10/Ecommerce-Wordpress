<?php
namespace MailPoetVendor\Symfony\Component\Translation;
if (!defined('ABSPATH')) exit;
interface MetadataAwareInterface
{
 public function getMetadata(string $key = '', string $domain = 'messages');
 public function setMetadata(string $key, $value, string $domain = 'messages');
 public function deleteMetadata(string $key = '', string $domain = 'messages');
}
