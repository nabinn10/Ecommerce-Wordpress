<?php
namespace MailPoetVendor\Symfony\Component\Translation\Provider;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Translation\TranslatorBag;
use MailPoetVendor\Symfony\Component\Translation\TranslatorBagInterface;
class NullProvider implements ProviderInterface
{
 public function __toString() : string
 {
 return 'null';
 }
 public function write(TranslatorBagInterface $translatorBag, bool $override = \false) : void
 {
 }
 public function read(array $domains, array $locales) : TranslatorBag
 {
 return new TranslatorBag();
 }
 public function delete(TranslatorBagInterface $translatorBag) : void
 {
 }
}
