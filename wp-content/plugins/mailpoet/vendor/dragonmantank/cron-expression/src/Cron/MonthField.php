<?php
declare(strict_types=1);
namespace Cron;
if (!defined('ABSPATH')) exit;
use DateTimeInterface;
class MonthField extends AbstractField
{
 protected $rangeStart = 1;
 protected $rangeEnd = 12;
 protected $literals = [1 => 'JAN', 2 => 'FEB', 3 => 'MAR', 4 => 'APR', 5 => 'MAY', 6 => 'JUN', 7 => 'JUL',
 8 => 'AUG', 9 => 'SEP', 10 => 'OCT', 11 => 'NOV', 12 => 'DEC', ];
 public function isSatisfiedBy(DateTimeInterface $date, $value, bool $invert): bool
 {
 if ($value === '?') {
 return true;
 }
 $value = $this->convertLiterals($value);
 return $this->isSatisfied((int) $date->format('m'), $value);
 }
 public function increment(DateTimeInterface &$date, $invert = false, $parts = null): FieldInterface
 {
 if (! $invert) {
 $date = $date->modify('first day of next month');
 $date = $date->setTime(0, 0);
 } else {
 $date = $date->modify('last day of previous month');
 $date = $date->setTime(23, 59);
 }
 return $this;
 }
}
