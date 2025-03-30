<?php
declare(strict_types=1);
namespace Cron;
if (!defined('ABSPATH')) exit;
use InvalidArgumentException;
class FieldFactory implements FieldFactoryInterface
{
 private $fields = [];
 public function getField(int $position): FieldInterface
 {
 return $this->fields[$position] ?? $this->fields[$position] = $this->instantiateField($position);
 }
 private function instantiateField(int $position): FieldInterface
 {
 switch ($position) {
 case CronExpression::MINUTE:
 return new MinutesField();
 case CronExpression::HOUR:
 return new HoursField();
 case CronExpression::DAY:
 return new DayOfMonthField();
 case CronExpression::MONTH:
 return new MonthField();
 case CronExpression::WEEKDAY:
 return new DayOfWeekField();
 }
 throw new InvalidArgumentException(
 ($position + 1) . ' is not a valid position'
 );
 }
}
