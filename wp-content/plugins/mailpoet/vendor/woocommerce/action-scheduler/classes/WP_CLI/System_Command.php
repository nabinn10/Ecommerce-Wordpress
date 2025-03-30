<?php
namespace Action_Scheduler\WP_CLI;
if (!defined('ABSPATH')) exit;
// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaping output is not necessary in WP CLI.
use ActionScheduler_SystemInformation;
use WP_CLI;
use function \WP_CLI\Utils\get_flag_value;
class System_Command {
 protected $store;
 public function __construct() {
 $this->store = \ActionScheduler::store();
 }
 public function datastore( array $args, array $assoc_args ) {
 echo $this->get_current_datastore();
 }
 public function runner( array $args, array $assoc_args ) {
 echo $this->get_current_runner();
 }
 public function status( array $args, array $assoc_args ) {
 $runner_enabled = has_action( 'action_scheduler_run_queue', array( \ActionScheduler::runner(), 'run' ) );
 \WP_CLI::line( sprintf( 'Data store: %s', $this->get_current_datastore() ) );
 \WP_CLI::line( sprintf( 'Runner: %s%s', $this->get_current_runner(), ( $runner_enabled ? '' : ' (disabled)' ) ) );
 \WP_CLI::line( sprintf( 'Version: %s', $this->get_latest_version() ) );
 $rows = array();
 $action_counts = $this->store->action_counts();
 $oldest_and_newest = $this->get_oldest_and_newest( array_keys( $action_counts ) );
 foreach ( $action_counts as $status => $count ) {
 $rows[] = array(
 'status' => $status,
 'count' => $count,
 'oldest' => $oldest_and_newest[ $status ]['oldest'],
 'newest' => $oldest_and_newest[ $status ]['newest'],
 );
 }
 $formatter = new \WP_CLI\Formatter( $assoc_args, array( 'status', 'count', 'oldest', 'newest' ) );
 $formatter->display_items( $rows );
 }
 public function version( array $args, array $assoc_args ) {
 $all = (bool) get_flag_value( $assoc_args, 'all' );
 $latest = $this->get_latest_version();
 if ( ! $all ) {
 echo $latest;
 \WP_CLI::halt( 0 );
 }
 $instance = \ActionScheduler_Versions::instance();
 $versions = $instance->get_versions();
 $rows = array();
 foreach ( $versions as $version => $callback ) {
 $active = $version === $latest;
 $rows[ $version ] = array(
 'version' => $version,
 'callback' => $callback,
 'active' => $active ? 'yes' : 'no',
 );
 }
 uksort( $rows, 'version_compare' );
 $formatter = new \WP_CLI\Formatter( $assoc_args, array( 'version', 'callback', 'active' ) );
 $formatter->display_items( $rows );
 }
 public function source( array $args, array $assoc_args ) {
 $all = (bool) get_flag_value( $assoc_args, 'all' );
 $fullpath = (bool) get_flag_value( $assoc_args, 'fullpath' );
 $source = ActionScheduler_SystemInformation::active_source_path();
 $path = $source;
 if ( ! $fullpath ) {
 $path = str_replace( ABSPATH, '', $path );
 }
 if ( ! $all ) {
 echo $path;
 \WP_CLI::halt( 0 );
 }
 $sources = ActionScheduler_SystemInformation::get_sources();
 if ( empty( $sources ) ) {
 WP_CLI::log( __( 'Detailed information about registered sources is not currently available.', 'action-scheduler' ) );
 return;
 }
 $rows = array();
 foreach ( $sources as $check_source => $version ) {
 $active = dirname( $check_source ) === $source;
 $path = $check_source;
 if ( ! $fullpath ) {
 $path = str_replace( ABSPATH, '', $path );
 }
 $rows[ $check_source ] = array(
 'source' => $path,
 'version' => $version,
 'active' => $active ? 'yes' : 'no',
 );
 }
 ksort( $rows );
 \WP_CLI::log( PHP_EOL . 'Please note there can only be one unique registered instance of Action Scheduler per ' . PHP_EOL . 'version number, so this list may not include all the currently present copies of ' . PHP_EOL . 'Action Scheduler.' . PHP_EOL );
 $formatter = new \WP_CLI\Formatter( $assoc_args, array( 'source', 'version', 'active' ) );
 $formatter->display_items( $rows );
 }
 protected function get_current_datastore() {
 return get_class( $this->store );
 }
 protected function get_latest_version( $instance = null ) {
 if ( is_null( $instance ) ) {
 $instance = \ActionScheduler_Versions::instance();
 }
 return $instance->latest_version();
 }
 protected function get_current_runner() {
 return get_class( \ActionScheduler::runner() );
 }
 protected function get_oldest_and_newest( $status_keys ) {
 $oldest_and_newest = array();
 foreach ( $status_keys as $status ) {
 $oldest_and_newest[ $status ] = array(
 'oldest' => '&ndash;',
 'newest' => '&ndash;',
 );
 if ( 'in-progress' === $status ) {
 continue;
 }
 $oldest_and_newest[ $status ]['oldest'] = $this->get_action_status_date( $status, 'oldest' );
 $oldest_and_newest[ $status ]['newest'] = $this->get_action_status_date( $status, 'newest' );
 }
 return $oldest_and_newest;
 }
 protected function get_action_status_date( $status, $date_type = 'oldest' ) {
 $order = 'oldest' === $date_type ? 'ASC' : 'DESC';
 $args = array(
 'claimed' => false,
 'status' => $status,
 'per_page' => 1,
 'order' => $order,
 );
 $action = $this->store->query_actions( $args );
 if ( ! empty( $action ) ) {
 $date_object = $this->store->get_date( $action[0] );
 $action_date = $date_object->format( 'Y-m-d H:i:s O' );
 } else {
 $action_date = '&ndash;';
 }
 return $action_date;
 }
}
