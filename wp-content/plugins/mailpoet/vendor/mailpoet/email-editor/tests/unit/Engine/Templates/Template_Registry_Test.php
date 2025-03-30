<?php
declare(strict_types=1);
if (!defined('ABSPATH')) exit;
use PHPUnit\Framework\TestCase;
use MailPoet\EmailEditor\Engine\Templates\Templates_Registry;
use MailPoet\EmailEditor\Engine\Templates\Template;
class TemplatesRegistryTest extends TestCase {
 private Templates_Registry $registry;
 protected function setUp(): void {
 $this->registry = new Templates_Registry();
 }
 public function testRegisterAndGetTemplateByName(): void {
 $template = $this->createMock( Template::class );
 $template->method( 'get_name' )->willReturn( 'mailpoet//email-general' );
 $template->method( 'get_title' )->willReturn( 'Email General' );
 $template->method( 'get_description' )->willReturn( 'A general email template.' );
 $template->method( 'get_content' )->willReturn( '<!-- wp:paragraph --> <p>Hello World</p> <!-- /wp:paragraph -->' );
 $template->method( 'get_post_types' )->willReturn( array( 'mailpoet_email' ) );
 // Register the template.
 $this->registry->register( $template );
 // Retrieve the template by name.
 $retrieved_template = $this->registry->get_by_name( 'mailpoet//email-general' );
 $this->assertNotNull( $retrieved_template );
 $this->assertSame( 'mailpoet//email-general', $retrieved_template->get_name() );
 $this->assertSame( 'Email General', $retrieved_template->get_title() );
 $this->assertSame( 'A general email template.', $retrieved_template->get_description() );
 $this->assertSame( '<!-- wp:paragraph --> <p>Hello World</p> <!-- /wp:paragraph -->', $retrieved_template->get_content() );
 $this->assertSame( array( 'mailpoet_email' ), $retrieved_template->get_post_types() );
 }
 public function testRegisterAndGetTemplateBySlug(): void {
 $template = $this->createMock( Template::class );
 $template->method( 'get_name' )->willReturn( 'mailpoet//email-general' );
 $template->method( 'get_slug' )->willReturn( 'email-general' );
 // Register the template.
 $this->registry->register( $template );
 // Retrieve the template by slug.
 $retrieved_template = $this->registry->get_by_slug( 'email-general' );
 $this->assertNotNull( $retrieved_template );
 $this->assertSame( 'email-general', $retrieved_template->get_slug() );
 }
 public function testRetrieveNonexistentTemplate(): void {
 $this->assertNull( $this->registry->get_by_name( 'nonexistent-template' ) );
 $this->assertNull( $this->registry->get_by_slug( 'nonexistent-slug' ) );
 }
 public function testRegisterMultipleTemplates(): void {
 $template1 = $this->createMock( Template::class );
 $template1->method( 'get_name' )->willReturn( 'mailpoet//template-1' );
 $template1->method( 'get_slug' )->willReturn( 'template-1' );
 $template2 = $this->createMock( Template::class );
 $template2->method( 'get_name' )->willReturn( 'mailpoet//template-2' );
 $template2->method( 'get_slug' )->willReturn( 'template-2' );
 // Register both templates.
 $this->registry->register( $template1 );
 $this->registry->register( $template2 );
 $all_templates = $this->registry->get_all();
 $this->assertCount( 2, $all_templates );
 $this->assertArrayHasKey( 'mailpoet//template-1', $all_templates );
 $this->assertArrayHasKey( 'mailpoet//template-2', $all_templates );
 }
 public function testRegisterDuplicateTemplate(): void {
 $template = $this->createMock( Template::class );
 $template->method( 'get_name' )->willReturn( 'mailpoet//email-general' );
 // Register the same template twice.
 $this->registry->register( $template );
 $this->registry->register( $template );
 // Registry should contain only one instance.
 $this->assertCount( 1, $this->registry->get_all() );
 }
 public function testInitializeAppliesFilter(): void {
 // Mock WordPress's `apply_filters` function.
 global $wp_filter_applied;
 $wp_filter_applied = false;
 add_filter(
 'mailpoet_email_editor_register_templates',
 function ( $registry ) use ( &$wp_filter_applied ) {
 $wp_filter_applied = true;
 return $registry;
 }
 );
 // Initialize the registry.
 $this->registry->initialize();
 // Assert that the filter was applied.
 $this->assertTrue( $wp_filter_applied );
 }
}
