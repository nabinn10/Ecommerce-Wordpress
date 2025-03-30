<?php
namespace Action_Scheduler\Migration;
if (!defined('ABSPATH')) exit;
use ActionScheduler_Logger;
class LogMigrator {
 private $source;
 private $destination;
 public function __construct( ActionScheduler_Logger $source_logger, ActionScheduler_Logger $destination_logger ) {
 $this->source = $source_logger;
 $this->destination = $destination_logger;
 }
 public function migrate( $source_action_id, $destination_action_id ) {
 $logs = $this->source->get_logs( $source_action_id );
 foreach ( $logs as $log ) {
 if ( absint( $log->get_action_id() ) === absint( $source_action_id ) ) {
 $this->destination->log( $destination_action_id, $log->get_message(), $log->get_date() );
 }
 }
 }
}
