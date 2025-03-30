<?php
namespace Cron;
if (!defined('ABSPATH')) exit;
interface FieldFactoryInterface
{
 public function getField(int $position): FieldInterface;
}
