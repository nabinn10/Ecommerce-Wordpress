<?php
declare(strict_types=1);
namespace Cron;
if (!defined('ABSPATH')) exit;
use DateTimeInterface;
interface FieldInterface
{
 public function isSatisfiedBy(DateTimeInterface $date, $value, bool $invert): bool;
 public function increment(DateTimeInterface &$date, $invert = false, $parts = null): FieldInterface;
 public function validate(string $value): bool;
}
