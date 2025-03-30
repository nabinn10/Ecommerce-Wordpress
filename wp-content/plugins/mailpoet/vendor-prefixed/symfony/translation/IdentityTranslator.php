<?php
namespace MailPoetVendor\Symfony\Component\Translation;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Contracts\Translation\LocaleAwareInterface;
use MailPoetVendor\Symfony\Contracts\Translation\TranslatorInterface;
use MailPoetVendor\Symfony\Contracts\Translation\TranslatorTrait;
class IdentityTranslator implements TranslatorInterface, LocaleAwareInterface
{
 use TranslatorTrait;
}
