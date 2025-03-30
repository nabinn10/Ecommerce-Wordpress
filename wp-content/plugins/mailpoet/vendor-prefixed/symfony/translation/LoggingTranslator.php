<?php
namespace MailPoetVendor\Symfony\Component\Translation;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Psr\Log\LoggerInterface;
use MailPoetVendor\Symfony\Component\Translation\Exception\InvalidArgumentException;
use MailPoetVendor\Symfony\Contracts\Translation\LocaleAwareInterface;
use MailPoetVendor\Symfony\Contracts\Translation\TranslatorInterface;
class LoggingTranslator implements TranslatorInterface, TranslatorBagInterface, LocaleAwareInterface
{
 private $translator;
 private $logger;
 public function __construct(TranslatorInterface $translator, LoggerInterface $logger)
 {
 if (!$translator instanceof TranslatorBagInterface || !$translator instanceof LocaleAwareInterface) {
 throw new InvalidArgumentException(\sprintf('The Translator "%s" must implement TranslatorInterface, TranslatorBagInterface and LocaleAwareInterface.', \get_debug_type($translator)));
 }
 $this->translator = $translator;
 $this->logger = $logger;
 }
 public function trans(?string $id, array $parameters = [], ?string $domain = null, ?string $locale = null)
 {
 $trans = $this->translator->trans($id = (string) $id, $parameters, $domain, $locale);
 $this->log($id, $domain, $locale);
 return $trans;
 }
 public function setLocale(string $locale)
 {
 $prev = $this->translator->getLocale();
 $this->translator->setLocale($locale);
 if ($prev === $locale) {
 return;
 }
 $this->logger->debug(\sprintf('The locale of the translator has changed from "%s" to "%s".', $prev, $locale));
 }
 public function getLocale()
 {
 return $this->translator->getLocale();
 }
 public function getCatalogue(?string $locale = null)
 {
 return $this->translator->getCatalogue($locale);
 }
 public function getCatalogues() : array
 {
 return $this->translator->getCatalogues();
 }
 public function getFallbackLocales()
 {
 if ($this->translator instanceof Translator || \method_exists($this->translator, 'getFallbackLocales')) {
 return $this->translator->getFallbackLocales();
 }
 return [];
 }
 public function __call(string $method, array $args)
 {
 return $this->translator->{$method}(...$args);
 }
 private function log(string $id, ?string $domain, ?string $locale)
 {
 if (null === $domain) {
 $domain = 'messages';
 }
 $catalogue = $this->translator->getCatalogue($locale);
 if ($catalogue->defines($id, $domain)) {
 return;
 }
 if ($catalogue->has($id, $domain)) {
 $this->logger->debug('Translation use fallback catalogue.', ['id' => $id, 'domain' => $domain, 'locale' => $catalogue->getLocale()]);
 } else {
 $this->logger->warning('Translation not found.', ['id' => $id, 'domain' => $domain, 'locale' => $catalogue->getLocale()]);
 }
 }
}
