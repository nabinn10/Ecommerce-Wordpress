<?php
namespace MailPoetVendor\Symfony\Component\Translation\Provider;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Translation\TranslatorBag;
use MailPoetVendor\Symfony\Component\Translation\TranslatorBagInterface;
interface ProviderInterface
{
 public function __toString() : string;
 public function write(TranslatorBagInterface $translatorBag) : void;
 public function read(array $domains, array $locales) : TranslatorBag;
 public function delete(TranslatorBagInterface $translatorBag) : void;
}
