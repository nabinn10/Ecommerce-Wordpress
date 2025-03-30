<?php
if (!defined('ABSPATH')) exit;
abstract class ActionScheduler_WPCLI_Command extends \WP_CLI_Command {
 const DATE_FORMAT = 'Y-m-d H:i:s O';
 protected $args;
 protected $assoc_args;
 public function __construct( array $args, array $assoc_args ) {
 if ( ! defined( 'WP_CLI' ) || ! constant( 'WP_CLI' ) ) {
 throw new \Exception( sprintf( __( 'The %s class can only be run within WP CLI.', 'action-scheduler' ), get_class( $this ) ) );
 }
 $this->args = $args;
 $this->assoc_args = $assoc_args;
 }
 abstract public function execute();
 protected function get_schedule_display_string( ActionScheduler_Schedule $schedule ) {
 $schedule_display_string = '';
 if ( ! $schedule->get_date() ) {
 return '0000-00-00 00:00:00';
 }
 $next_timestamp = $schedule->get_date()->getTimestamp();
 $schedule_display_string .= $schedule->get_date()->format( static::DATE_FORMAT );
 return $schedule_display_string;
 }
 protected function process_csv_arguments_to_arrays() {
 foreach ( $this->assoc_args as $k => $v ) {
 if ( false !== strpos( $k, '__' ) ) {
 $this->assoc_args[ $k ] = explode( ',', $v );
 }
 }
 }
}
