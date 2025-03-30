<?php
namespace MailPoetVendor\Twig\Cache;
if (!defined('ABSPATH')) exit;
final class ChainCache implements CacheInterface
{
 private $caches;
 public function __construct(iterable $caches)
 {
 $this->caches = $caches;
 }
 public function generateKey(string $name, string $className) : string
 {
 return $className . '#' . $name;
 }
 public function write(string $key, string $content) : void
 {
 $splitKey = $this->splitKey($key);
 foreach ($this->caches as $cache) {
 $cache->write($cache->generateKey(...$splitKey), $content);
 }
 }
 public function load(string $key) : void
 {
 [$name, $className] = $this->splitKey($key);
 foreach ($this->caches as $cache) {
 $cache->load($cache->generateKey($name, $className));
 if (\class_exists($className, \false)) {
 break;
 }
 }
 }
 public function getTimestamp(string $key) : int
 {
 $splitKey = $this->splitKey($key);
 foreach ($this->caches as $cache) {
 if (0 < ($timestamp = $cache->getTimestamp($cache->generateKey(...$splitKey)))) {
 return $timestamp;
 }
 }
 return 0;
 }
 private function splitKey(string $key) : array
 {
 return \array_reverse(\explode('#', $key, 2));
 }
}
