<?php
namespace Action_Scheduler\WP_CLI\Action;
if (!defined('ABSPATH')) exit;
use function \WP_CLI\Utils\get_flag_value;
class Generate_Command extends \ActionScheduler_WPCLI_Command {
 public function execute() {
 $hook = $this->args[0];
 $schedule_start = $this->args[1];
 $callback_args = get_flag_value( $this->assoc_args, 'args', array() );
 $group = get_flag_value( $this->assoc_args, 'group', '' );
 $interval = (int) get_flag_value( $this->assoc_args, 'interval', 0 ); // avoid absint() to support negative intervals
 $count = absint( get_flag_value( $this->assoc_args, 'count', 1 ) );
 if ( ! empty( $callback_args ) ) {
 $callback_args = json_decode( $callback_args, true );
 }
 $schedule_start = as_get_datetime_object( $schedule_start );
 $function_args = array(
 'start' => absint( $schedule_start->format( 'U' ) ),
 'interval' => $interval,
 'count' => $count,
 'hook' => $hook,
 'callback_args' => $callback_args,
 'group' => $group,
 );
 $function_args = array_values( $function_args );
 try {
 $actions_added = $this->generate( ...$function_args );
 } catch ( \Exception $e ) {
 $this->print_error( $e );
 }
 $num_actions_added = count( (array) $actions_added );
 $this->print_success( $num_actions_added, 'single' );
 }
 protected function generate( $schedule_start, $interval, $count, $hook, array $args = array(), $group = '' ) {
 $actions_added = array();
 $progress_bar = \WP_CLI\Utils\make_progress_bar(
 sprintf(
 _n( 'Creating %d action', 'Creating %d actions', $count, 'action-scheduler' ),
 number_format_i18n( $count )
 ),
 $count
 );
 for ( $i = 0; $i < $count; $i++ ) {
 $actions_added[] = as_schedule_single_action( $schedule_start + ( $i * $interval ), $hook, $args, $group );
 $progress_bar->tick();
 }
 $progress_bar->finish();
 return $actions_added;
 }
 protected function print_success( $actions_added, $action_type ) {
 \WP_CLI::success(
 sprintf(
 _n( '%1$d %2$s action scheduled.', '%1$d %2$s actions scheduled.', $actions_added, 'action-scheduler' ),
 number_format_i18n( $actions_added ),
 $action_type
 )
 );
 }
 protected function print_error( \Exception $e ) {
 \WP_CLI::error(
 sprintf(
 __( 'There was an error creating the scheduled action: %s', 'action-scheduler' ),
 $e->getMessage()
 )
 );
 }
}
