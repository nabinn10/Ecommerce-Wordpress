<?php
namespace MailPoetVendor\Symfony\Contracts\Translation;
if (!defined('ABSPATH')) exit;
interface TranslatableInterface
{
 public function trans(TranslatorInterface $translator, ?string $locale = null) : string;
}
