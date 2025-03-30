<?php
namespace MailPoetVendor\Symfony\Component\DependencyInjection\Attribute;
if (!defined('ABSPATH')) exit;
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::IS_REPEATABLE)]
class AutoconfigureTag extends Autoconfigure
{
 public function __construct(?string $name = null, array $attributes = [])
 {
 parent::__construct(tags: [[$name ?? 0 => $attributes]]);
 }
}
