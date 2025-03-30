<?php
namespace Action_Scheduler\WP_CLI\Action;
if (!defined('ABSPATH')) exit;
use function \WP_CLI\Utils\get_flag_value;
class Cancel_Command extends \ActionScheduler_WPCLI_Command {
 public function execute() {
 $hook = '';
 $group = get_flag_value( $this->assoc_args, 'group', '' );
 $callback_args = get_flag_value( $this->assoc_args, 'args', null );
 $all = get_flag_value( $this->assoc_args, 'all', false );
 if ( ! empty( $this->args[0] ) ) {
 $hook = $this->args[0];
 }
 if ( ! empty( $callback_args ) ) {
 $callback_args = json_decode( $callback_args, true );
 }
 if ( $all ) {
 $this->cancel_all( $hook, $callback_args, $group );
 return;
 }
 $this->cancel_single( $hook, $callback_args, $group );
 }
 protected function cancel_single( $hook, $callback_args, $group ) {
 if ( empty( $hook ) ) {
 \WP_CLI::error( __( 'Please specify hook of action to cancel.', 'action-scheduler' ) );
 }
 try {
 $result = as_unschedule_action( $hook, $callback_args, $group );
 } catch ( \Exception $e ) {
 $this->print_error( $e, false );
 }
 if ( null === $result ) {
 $e = new \Exception( __( 'Unable to cancel scheduled action: check the logs.', 'action-scheduler' ) );
 $this->print_error( $e, false );
 }
 $this->print_success( false );
 }
 protected function cancel_all( $hook, $callback_args, $group ) {
 if ( empty( $hook ) && empty( $group ) ) {
 \WP_CLI::error( __( 'Please specify hook and/or group of actions to cancel.', 'action-scheduler' ) );
 }
 try {
 $result = as_unschedule_all_actions( $hook, $callback_args, $group );
 } catch ( \Exception $e ) {
 $this->print_error( $e, $multiple );
 }
 \WP_CLI::success( __( 'Request to cancel scheduled actions completed.', 'action-scheduler' ) );
 }
 protected function print_success() {
 \WP_CLI::success( __( 'Scheduled action cancelled.', 'action-scheduler' ) );
 }
 protected function print_error( \Exception $e, $multiple ) {
 \WP_CLI::error(
 sprintf(
 __( 'There was an error cancelling the %1$s: %2$s', 'action-scheduler' ),
 $multiple ? __( 'scheduled actions', 'action-scheduler' ) : __( 'scheduled action', 'action-scheduler' ),
 $e->getMessage()
 )
 );
 }
}
