<?php
namespace MailPoetVendor\Symfony\Component\DependencyInjection\Attribute;
if (!defined('ABSPATH')) exit;
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::IS_REPEATABLE)]
class Autoconfigure
{
 public function __construct(public ?array $tags = null, public ?array $calls = null, public ?array $bind = null, public bool|string|null $lazy = null, public ?bool $public = null, public ?bool $shared = null, public ?bool $autowire = null, public ?array $properties = null, public array|string|null $configurator = null)
 {
 }
}
