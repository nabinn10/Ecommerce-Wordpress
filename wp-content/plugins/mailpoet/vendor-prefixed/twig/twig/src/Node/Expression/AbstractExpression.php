<?php
namespace MailPoetVendor\Twig\Node\Expression;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Node\Node;
abstract class AbstractExpression extends Node
{
 public function isGenerator() : bool
 {
 return $this->hasAttribute('is_generator') && $this->getAttribute('is_generator');
 }
}
