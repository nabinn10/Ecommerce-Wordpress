<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Templates;
if (!defined('ABSPATH')) exit;
class Templates_Test extends \MailPoetTest {
 private Templates $templates;
 public function _before() {
 parent::_before();
 $this->templates = $this->di_container->get( Templates::class );
 }
 public function testItCanFetchBlockTemplate(): void {
 $this->templates->initialize( array( 'mailpoet_email' ) );
 $template = $this->templates->get_block_template( 'email-general' );
 self::assertInstanceOf( \WP_Block_Template::class, $template );
 verify( $template->slug )->equals( 'email-general' );
 verify( $template->id )->stringContainsString( 'email-general' );
 verify( $template->title )->equals( 'General Email' );
 verify( $template->description )->equals( 'A general template for emails.' );
 }
 public function testItTriggersActionForRegisteringTemplates(): void {
 $trigger_check = false;
 add_filter(
 'mailpoet_email_editor_register_templates',
 function ( $registry ) use ( &$trigger_check ) {
 $trigger_check = true;
 return $registry;
 }
 );
 $this->templates->initialize( array( 'mailpoet_email' ) );
 verify( $trigger_check )->true();
 }
}
