<?php
namespace MailPoetVendor\Symfony\Component\Translation\Provider;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Translation\Exception\InvalidArgumentException;
final class TranslationProviderCollection
{
 private $providers;
 public function __construct(iterable $providers)
 {
 $this->providers = \is_array($providers) ? $providers : \iterator_to_array($providers);
 }
 public function __toString() : string
 {
 return '[' . \implode(',', \array_keys($this->providers)) . ']';
 }
 public function has(string $name) : bool
 {
 return isset($this->providers[$name]);
 }
 public function get(string $name) : ProviderInterface
 {
 if (!$this->has($name)) {
 throw new InvalidArgumentException(\sprintf('Provider "%s" not found. Available: "%s".', $name, (string) $this));
 }
 return $this->providers[$name];
 }
 public function keys() : array
 {
 return \array_keys($this->providers);
 }
}
