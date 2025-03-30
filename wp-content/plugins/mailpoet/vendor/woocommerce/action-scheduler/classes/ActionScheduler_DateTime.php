<?php
if (!defined('ABSPATH')) exit;
class ActionScheduler_DateTime extends DateTime {
 protected $utcOffset = 0; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.PropertyNotSnakeCase
 #[\ReturnTypeWillChange]
 public function getTimestamp() {
 return method_exists( 'DateTime', 'getTimestamp' ) ? parent::getTimestamp() : $this->format( 'U' );
 }
 public function setUtcOffset( $offset ) {
 $this->utcOffset = intval( $offset ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
 }
 #[\ReturnTypeWillChange]
 public function getOffset() {
 return $this->utcOffset ? $this->utcOffset : parent::getOffset(); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
 }
 #[\ReturnTypeWillChange]
 public function setTimezone( $timezone ) {
 $this->utcOffset = 0; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
 parent::setTimezone( $timezone );
 return $this;
 }
 public function getOffsetTimestamp() {
 return $this->getTimestamp() + $this->getOffset();
 }
}
