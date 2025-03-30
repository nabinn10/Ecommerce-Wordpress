<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine;
if (!defined('ABSPATH')) exit;
class Email_Editor_Test extends \MailPoetTest {
 private $email_editor;
 private $post_register_callback;
 public function _before() {
 parent::_before();
 $this->email_editor = $this->di_container->get( Email_Editor::class );
 $this->post_register_callback = function ( $post_types ) {
 $post_types[] = array(
 'name' => 'custom_email_type',
 'args' => array(),
 'meta' => array(),
 );
 return $post_types;
 };
 add_filter( 'mailpoet_email_editor_post_types', $this->post_register_callback );
 $this->email_editor->initialize();
 }
 public function testItRegistersCustomPostTypeAddedViaHook() {
 $post_types = get_post_types();
 $this->assertArrayHasKey( 'custom_email_type', $post_types );
 }
 public function _after() {
 parent::_after();
 remove_filter( 'mailpoet_email_editor_post_types', $this->post_register_callback );
 }
}
