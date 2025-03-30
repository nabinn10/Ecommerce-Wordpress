<?php
namespace MailPoetVendor\Symfony\Component\DependencyInjection\Attribute;
if (!defined('ABSPATH')) exit;
#[\Attribute(\Attribute::TARGET_PARAMETER)]
class TaggedIterator
{
 public function __construct(public string $tag, public ?string $indexAttribute = null, public ?string $defaultIndexMethod = null, public ?string $defaultPriorityMethod = null)
 {
 }
}
