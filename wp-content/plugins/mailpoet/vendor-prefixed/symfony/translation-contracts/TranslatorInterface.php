<?php
namespace MailPoetVendor\Symfony\Contracts\Translation;
if (!defined('ABSPATH')) exit;
interface TranslatorInterface
{
 public function trans(string $id, array $parameters = [], ?string $domain = null, ?string $locale = null);
}
