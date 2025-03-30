<?php
namespace Action_Scheduler\WP_CLI\Action;
if (!defined('ABSPATH')) exit;
class Delete_Command extends \ActionScheduler_WPCLI_Command {
 protected $action_ids = array();
 protected $action_counts = array(
 'deleted' => 0,
 'failed' => 0,
 'total' => 0,
 );
 public function __construct( array $args, array $assoc_args ) {
 parent::__construct( $args, $assoc_args );
 $this->action_ids = array_map( 'absint', $args );
 $this->action_counts['total'] = count( $this->action_ids );
 add_action( 'action_scheduler_deleted_action', array( $this, 'on_action_deleted' ) );
 }
 public function execute() {
 $store = \ActionScheduler::store();
 $progress_bar = \WP_CLI\Utils\make_progress_bar(
 sprintf(
 _n( 'Deleting %d action', 'Deleting %d actions', $this->action_counts['total'], 'action-scheduler' ),
 number_format_i18n( $this->action_counts['total'] )
 ),
 $this->action_counts['total']
 );
 foreach ( $this->action_ids as $action_id ) {
 try {
 $store->delete_action( $action_id );
 } catch ( \Exception $e ) {
 $this->action_counts['failed']++;
 \WP_CLI::warning( $e->getMessage() );
 }
 $progress_bar->tick();
 }
 $progress_bar->finish();
 $format = _n( 'Deleted %1$d action', 'Deleted %1$d actions', $this->action_counts['deleted'], 'action-scheduler' ) . ', ';
 $format .= _n( '%2$d failure.', '%2$d failures.', $this->action_counts['failed'], 'action-scheduler' );
 \WP_CLI::success(
 sprintf(
 $format,
 number_format_i18n( $this->action_counts['deleted'] ),
 number_format_i18n( $this->action_counts['failed'] )
 )
 );
 }
 public function on_action_deleted( $action_id ) {
 if ( 'action_scheduler_deleted_action' !== current_action() ) {
 return;
 }
 $action_id = absint( $action_id );
 if ( ! in_array( $action_id, $this->action_ids, true ) ) {
 return;
 }
 $this->action_counts['deleted']++;
 \WP_CLI::debug( sprintf( 'Action %d was deleted.', $action_id ) );
 }
}
