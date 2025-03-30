<?php
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Polyfill\Intl\Normalizer as p;
if (\PHP_VERSION_ID >= 80000) {
 return require __DIR__ . '/bootstrap80.php';
}
if (!\function_exists('normalizer_is_normalized')) {
 function mailpoet_normalizer_is_normalized($string, $form = p\Normalizer::FORM_C)
 {
 return p\Normalizer::isNormalized($string, $form);
 }
}
if (!\function_exists('normalizer_normalize')) {
 function mailpoet_normalizer_normalize($string, $form = p\Normalizer::FORM_C)
 {
 return p\Normalizer::normalize($string, $form);
 }
}
