<?php
namespace MailPoetVendor\Symfony\Component\Translation;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Contracts\Translation\TranslatableInterface;
use MailPoetVendor\Symfony\Contracts\Translation\TranslatorInterface;
class TranslatableMessage implements TranslatableInterface
{
 private $message;
 private $parameters;
 private $domain;
 public function __construct(string $message, array $parameters = [], ?string $domain = null)
 {
 $this->message = $message;
 $this->parameters = $parameters;
 $this->domain = $domain;
 }
 public function __toString() : string
 {
 return $this->getMessage();
 }
 public function getMessage() : string
 {
 return $this->message;
 }
 public function getParameters() : array
 {
 return $this->parameters;
 }
 public function getDomain() : ?string
 {
 return $this->domain;
 }
 public function trans(TranslatorInterface $translator, ?string $locale = null) : string
 {
 return $translator->trans($this->getMessage(), \array_map(static function ($parameter) use($translator, $locale) {
 return $parameter instanceof TranslatableInterface ? $parameter->trans($translator, $locale) : $parameter;
 }, $this->getParameters()), $this->getDomain(), $locale);
 }
}
