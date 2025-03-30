<?php
namespace MailPoetVendor\Symfony\Contracts\Translation;
if (!defined('ABSPATH')) exit;
interface LocaleAwareInterface
{
 public function setLocale(string $locale);
 public function getLocale();
}
