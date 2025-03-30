<?php
namespace Action_Scheduler\WP_CLI;
if (!defined('ABSPATH')) exit;
class Action_Command extends \WP_CLI_Command {
 public function cancel( array $args, array $assoc_args ) {
 require_once 'Action/Cancel_Command.php';
 $command = new Action\Cancel_Command( $args, $assoc_args );
 $command->execute();
 }
 public function create( array $args, array $assoc_args ) {
 require_once 'Action/Create_Command.php';
 $command = new Action\Create_Command( $args, $assoc_args );
 $command->execute();
 }
 public function delete( array $args, array $assoc_args ) {
 require_once 'Action/Delete_Command.php';
 $command = new Action\Delete_Command( $args, $assoc_args );
 $command->execute();
 }
 public function generate( array $args, array $assoc_args ) {
 require_once 'Action/Generate_Command.php';
 $command = new Action\Generate_Command( $args, $assoc_args );
 $command->execute();
 }
 public function get( array $args, array $assoc_args ) {
 require_once 'Action/Get_Command.php';
 $command = new Action\Get_Command( $args, $assoc_args );
 $command->execute();
 }
 public function subcommand_list( array $args, array $assoc_args ) {
 require_once 'Action/List_Command.php';
 $command = new Action\List_Command( $args, $assoc_args );
 $command->execute();
 }
 public function logs( array $args ) {
 $command = sprintf( 'action-scheduler action get %d --field=log_entries', $args[0] );
 WP_CLI::runcommand( $command );
 }
 public function next( array $args, array $assoc_args ) {
 require_once 'Action/Next_Command.php';
 $command = new Action\Next_Command( $args, $assoc_args );
 $command->execute();
 }
 public function run( array $args, array $assoc_args ) {
 require_once 'Action/Run_Command.php';
 $command = new Action\Run_Command( $args, $assoc_args );
 $command->execute();
 }
}
