<?php
namespace MailPoetVendor\Symfony\Component\Translation\Provider;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Translation\TranslatorBag;
use MailPoetVendor\Symfony\Component\Translation\TranslatorBagInterface;
class FilteringProvider implements ProviderInterface
{
 private $provider;
 private $locales;
 private $domains;
 public function __construct(ProviderInterface $provider, array $locales, array $domains = [])
 {
 $this->provider = $provider;
 $this->locales = $locales;
 $this->domains = $domains;
 }
 public function __toString() : string
 {
 return (string) $this->provider;
 }
 public function write(TranslatorBagInterface $translatorBag) : void
 {
 $this->provider->write($translatorBag);
 }
 public function read(array $domains, array $locales) : TranslatorBag
 {
 $domains = !$this->domains ? $domains : \array_intersect($this->domains, $domains);
 $locales = \array_intersect($this->locales, $locales);
 return $this->provider->read($domains, $locales);
 }
 public function delete(TranslatorBagInterface $translatorBag) : void
 {
 $this->provider->delete($translatorBag);
 }
 public function getDomains() : array
 {
 return $this->domains;
 }
}
