<?php
declare(strict_types=1);
namespace Cron;
if (!defined('ABSPATH')) exit;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Exception;
use InvalidArgumentException;
use LogicException;
use RuntimeException;
use Webmozart\Assert\Assert;
class CronExpression
{
 public const MINUTE = 0;
 public const HOUR = 1;
 public const DAY = 2;
 public const MONTH = 3;
 public const WEEKDAY = 4;
 public const YEAR = 5;
 public const MAPPINGS = [
 '@yearly' => '0 0 1 1 *',
 '@annually' => '0 0 1 1 *',
 '@monthly' => '0 0 1 * *',
 '@weekly' => '0 0 * * 0',
 '@daily' => '0 0 * * *',
 '@midnight' => '0 0 * * *',
 '@hourly' => '0 * * * *',
 ];
 protected $cronParts;
 protected $fieldFactory;
 protected $maxIterationCount = 1000;
 protected static $order = [
 self::YEAR,
 self::MONTH,
 self::DAY,
 self::WEEKDAY,
 self::HOUR,
 self::MINUTE,
 ];
 private static $registeredAliases = self::MAPPINGS;
 public static function registerAlias(string $alias, string $expression): void
 {
 try {
 new self($expression);
 } catch (InvalidArgumentException $exception) {
 throw new LogicException("The expression `$expression` is invalid", 0, $exception);
 }
 $shortcut = strtolower($alias);
 if (1 !== preg_match('/^@\w+$/', $shortcut)) {
 throw new LogicException("The alias `$alias` is invalid. It must start with an `@` character and contain alphanumeric (letters, numbers, regardless of case) plus underscore (_).");
 }
 if (isset(self::$registeredAliases[$shortcut])) {
 throw new LogicException("The alias `$alias` is already registered.");
 }
 self::$registeredAliases[$shortcut] = $expression;
 }
 public static function unregisterAlias(string $alias): bool
 {
 $shortcut = strtolower($alias);
 if (isset(self::MAPPINGS[$shortcut])) {
 throw new LogicException("The alias `$alias` is a built-in alias; it can not be unregistered.");
 }
 if (!isset(self::$registeredAliases[$shortcut])) {
 return false;
 }
 unset(self::$registeredAliases[$shortcut]);
 return true;
 }
 public static function supportsAlias(string $alias): bool
 {
 return isset(self::$registeredAliases[strtolower($alias)]);
 }
 public static function getAliases(): array
 {
 return self::$registeredAliases;
 }
 public static function factory(string $expression, FieldFactoryInterface $fieldFactory = null): CronExpression
 {
 return new static($expression, $fieldFactory);
 }
 public static function isValidExpression(string $expression): bool
 {
 try {
 new CronExpression($expression);
 } catch (InvalidArgumentException $e) {
 return false;
 }
 return true;
 }
 public function __construct(string $expression, FieldFactoryInterface $fieldFactory = null)
 {
 $shortcut = strtolower($expression);
 $expression = self::$registeredAliases[$shortcut] ?? $expression;
 $this->fieldFactory = $fieldFactory ?: new FieldFactory();
 $this->setExpression($expression);
 }
 public function setExpression(string $value): CronExpression
 {
 $split = preg_split('/\s/', $value, -1, PREG_SPLIT_NO_EMPTY);
 Assert::isArray($split);
 $notEnoughParts = \count($split) < 5;
 $questionMarkInInvalidPart = array_key_exists(0, $split) && $split[0] === '?'
 || array_key_exists(1, $split) && $split[1] === '?'
 || array_key_exists(3, $split) && $split[3] === '?';
 $tooManyQuestionMarks = array_key_exists(2, $split) && $split[2] === '?'
 && array_key_exists(4, $split) && $split[4] === '?';
 if ($notEnoughParts || $questionMarkInInvalidPart || $tooManyQuestionMarks) {
 throw new InvalidArgumentException(
 $value . ' is not a valid CRON expression'
 );
 }
 $this->cronParts = $split;
 foreach ($this->cronParts as $position => $part) {
 $this->setPart($position, $part);
 }
 return $this;
 }
 public function setPart(int $position, string $value): CronExpression
 {
 if (!$this->fieldFactory->getField($position)->validate($value)) {
 throw new InvalidArgumentException(
 'Invalid CRON field value ' . $value . ' at position ' . $position
 );
 }
 $this->cronParts[$position] = $value;
 return $this;
 }
 public function setMaxIterationCount(int $maxIterationCount): CronExpression
 {
 $this->maxIterationCount = $maxIterationCount;
 return $this;
 }
 public function getNextRunDate($currentTime = 'now', int $nth = 0, bool $allowCurrentDate = false, $timeZone = null): DateTime
 {
 return $this->getRunDate($currentTime, $nth, false, $allowCurrentDate, $timeZone);
 }
 public function getPreviousRunDate($currentTime = 'now', int $nth = 0, bool $allowCurrentDate = false, $timeZone = null): DateTime
 {
 return $this->getRunDate($currentTime, $nth, true, $allowCurrentDate, $timeZone);
 }
 public function getMultipleRunDates(int $total, $currentTime = 'now', bool $invert = false, bool $allowCurrentDate = false, $timeZone = null): array
 {
 $timeZone = $this->determineTimeZone($currentTime, $timeZone);
 if ('now' === $currentTime) {
 $currentTime = new DateTime();
 } elseif ($currentTime instanceof DateTime) {
 $currentTime = clone $currentTime;
 } elseif ($currentTime instanceof DateTimeImmutable) {
 $currentTime = DateTime::createFromFormat('U', $currentTime->format('U'));
 } elseif (\is_string($currentTime)) {
 $currentTime = new DateTime($currentTime);
 }
 Assert::isInstanceOf($currentTime, DateTime::class);
 $currentTime->setTimezone(new DateTimeZone($timeZone));
 $matches = [];
 for ($i = 0; $i < $total; ++$i) {
 try {
 $result = $this->getRunDate($currentTime, 0, $invert, $allowCurrentDate, $timeZone);
 } catch (RuntimeException $e) {
 break;
 }
 $allowCurrentDate = false;
 $currentTime = clone $result;
 $matches[] = $result;
 }
 return $matches;
 }
 public function getExpression($part = null): ?string
 {
 if (null === $part) {
 return implode(' ', $this->cronParts);
 }
 if (array_key_exists($part, $this->cronParts)) {
 return $this->cronParts[$part];
 }
 return null;
 }
 public function getParts()
 {
 return $this->cronParts;
 }
 public function __toString(): string
 {
 return (string) $this->getExpression();
 }
 public function isDue($currentTime = 'now', $timeZone = null): bool
 {
 $timeZone = $this->determineTimeZone($currentTime, $timeZone);
 if ('now' === $currentTime) {
 $currentTime = new DateTime();
 } elseif ($currentTime instanceof DateTime) {
 $currentTime = clone $currentTime;
 } elseif ($currentTime instanceof DateTimeImmutable) {
 $currentTime = DateTime::createFromFormat('U', $currentTime->format('U'));
 } elseif (\is_string($currentTime)) {
 $currentTime = new DateTime($currentTime);
 }
 Assert::isInstanceOf($currentTime, DateTime::class);
 $currentTime->setTimezone(new DateTimeZone($timeZone));
 // drop the seconds to 0
 $currentTime->setTime((int) $currentTime->format('H'), (int) $currentTime->format('i'), 0);
 try {
 return $this->getNextRunDate($currentTime, 0, true)->getTimestamp() === $currentTime->getTimestamp();
 } catch (Exception $e) {
 return false;
 }
 }
 protected function getRunDate($currentTime = null, int $nth = 0, bool $invert = false, bool $allowCurrentDate = false, $timeZone = null): DateTime
 {
 $timeZone = $this->determineTimeZone($currentTime, $timeZone);
 if ($currentTime instanceof DateTime) {
 $currentDate = clone $currentTime;
 } elseif ($currentTime instanceof DateTimeImmutable) {
 $currentDate = DateTime::createFromFormat('U', $currentTime->format('U'));
 } elseif (\is_string($currentTime)) {
 $currentDate = new DateTime($currentTime);
 } else {
 $currentDate = new DateTime('now');
 }
 Assert::isInstanceOf($currentDate, DateTime::class);
 $currentDate->setTimezone(new DateTimeZone($timeZone));
 // Workaround for setTime causing an offset change: https://bugs.php.net/bug.php?id=81074
 $currentDate = DateTime::createFromFormat("!Y-m-d H:iO", $currentDate->format("Y-m-d H:iP"), $currentDate->getTimezone());
 if ($currentDate === false) {
 throw new \RuntimeException('Unable to create date from format');
 }
 $currentDate->setTimezone(new DateTimeZone($timeZone));
 $nextRun = clone $currentDate;
 // We don't have to satisfy * or null fields
 $parts = [];
 $fields = [];
 foreach (self::$order as $position) {
 $part = $this->getExpression($position);
 if (null === $part || '*' === $part) {
 continue;
 }
 $parts[$position] = $part;
 $fields[$position] = $this->fieldFactory->getField($position);
 }
 if (isset($parts[self::DAY]) && isset($parts[self::WEEKDAY])) {
 $domExpression = sprintf('%s %s %s %s *', $this->getExpression(0), $this->getExpression(1), $this->getExpression(2), $this->getExpression(3));
 $dowExpression = sprintf('%s %s * %s %s', $this->getExpression(0), $this->getExpression(1), $this->getExpression(3), $this->getExpression(4));
 $domExpression = new self($domExpression);
 $dowExpression = new self($dowExpression);
 $domRunDates = $domExpression->getMultipleRunDates($nth + 1, $currentTime, $invert, $allowCurrentDate, $timeZone);
 $dowRunDates = $dowExpression->getMultipleRunDates($nth + 1, $currentTime, $invert, $allowCurrentDate, $timeZone);
 if ($parts[self::DAY] === '?' || $parts[self::DAY] === '*') {
 $domRunDates = [];
 }
 if ($parts[self::WEEKDAY] === '?' || $parts[self::WEEKDAY] === '*') {
 $dowRunDates = [];
 }
 $combined = array_merge($domRunDates, $dowRunDates);
 usort($combined, function ($a, $b) {
 return $a->format('Y-m-d H:i:s') <=> $b->format('Y-m-d H:i:s');
 });
 if ($invert) {
 $combined = array_reverse($combined);
 }
 return $combined[$nth];
 }
 // Set a hard limit to bail on an impossible date
 for ($i = 0; $i < $this->maxIterationCount; ++$i) {
 foreach ($parts as $position => $part) {
 $satisfied = false;
 // Get the field object used to validate this part
 $field = $fields[$position];
 // Check if this is singular or a list
 if (false === strpos($part, ',')) {
 $satisfied = $field->isSatisfiedBy($nextRun, $part, $invert);
 } else {
 foreach (array_map('trim', explode(',', $part)) as $listPart) {
 if ($field->isSatisfiedBy($nextRun, $listPart, $invert)) {
 $satisfied = true;
 break;
 }
 }
 }
 // If the field is not satisfied, then start over
 if (!$satisfied) {
 $field->increment($nextRun, $invert, $part);
 continue 2;
 }
 }
 // Skip this match if needed
 if ((!$allowCurrentDate && $nextRun == $currentDate) || --$nth > -1) {
 $this->fieldFactory->getField(self::MINUTE)->increment($nextRun, $invert, $parts[self::MINUTE] ?? null);
 continue;
 }
 return $nextRun;
 }
 // @codeCoverageIgnoreStart
 throw new RuntimeException('Impossible CRON expression');
 // @codeCoverageIgnoreEnd
 }
 protected function determineTimeZone($currentTime, ?string $timeZone): string
 {
 if (null !== $timeZone) {
 return $timeZone;
 }
 if ($currentTime instanceof DateTimeInterface) {
 return $currentTime->getTimezone()->getName();
 }
 return date_default_timezone_get();
 }
}
