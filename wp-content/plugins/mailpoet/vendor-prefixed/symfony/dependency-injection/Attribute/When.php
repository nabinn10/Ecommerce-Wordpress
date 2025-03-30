<?php
namespace MailPoetVendor\Symfony\Component\DependencyInjection\Attribute;
if (!defined('ABSPATH')) exit;
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::TARGET_FUNCTION | \Attribute::IS_REPEATABLE)]
class When
{
 public function __construct(public string $env)
 {
 }
}
