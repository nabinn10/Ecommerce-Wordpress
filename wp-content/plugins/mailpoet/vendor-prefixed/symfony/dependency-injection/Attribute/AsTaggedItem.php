<?php
namespace MailPoetVendor\Symfony\Component\DependencyInjection\Attribute;
if (!defined('ABSPATH')) exit;
#[\Attribute(\Attribute::TARGET_CLASS)]
class AsTaggedItem
{
 public function __construct(public ?string $index = null, public ?int $priority = null)
 {
 }
}
