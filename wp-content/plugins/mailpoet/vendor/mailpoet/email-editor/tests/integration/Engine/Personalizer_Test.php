<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\PersonalizationTags\Personalization_Tag;
use MailPoet\EmailEditor\Engine\PersonalizationTags\Personalization_Tags_Registry;
class Personalizer_Test extends \MailPoetTest {
 private Personalizer $personalizer;
 private Personalization_Tags_Registry $tags_registry;
 protected function _before(): void {
 parent::_before();
 $this->tags_registry = new Personalization_Tags_Registry();
 $this->personalizer = new Personalizer( $this->tags_registry );
 }
 public function testPersonalizeContentWithSingleTag(): void {
 // Register a tag in the registry.
 $this->tags_registry->register(
 new Personalization_Tag(
 'first_name',
 'user-firstname',
 'User',
 function ( $context, $args ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed -- The $args parameter is not used in this test.
 return $context['subscriber_name'] ?? 'Default Name';
 }
 )
 );
 $this->personalizer->set_context( array( 'subscriber_name' => 'John' ) );
 $html_content = '<p>Hello, <!--[user-firstname]-->!</p>';
 $this->assertSame( '<p>Hello, John!</p>', $this->personalizer->personalize_content( $html_content ) );
 }
 public function testPersonalizeContentWithMultipleTags(): void {
 // Register multiple tags in the registry.
 $this->tags_registry->register(
 new Personalization_Tag(
 'first_name',
 '[user/firstname]',
 'Subscriber Info',
 function ( $context, $args ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed -- The $args parameter is not used in this test.
 return $context['subscriber_name'] ?? 'Default Name';
 }
 )
 );
 $this->tags_registry->register(
 new Personalization_Tag(
 'email',
 'user/email',
 'Subscriber Info',
 function ( $context, $args ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed -- The $args parameter is not used in this test.
 return $context['subscriber_email'] ?? 'unknown@example.com';
 }
 )
 );
 // Set the context for personalization.
 $this->personalizer->set_context(
 array(
 'subscriber_name' => 'John',
 'subscriber_email' => 'john@example.com',
 )
 );
 $html_content = '
 <div>
 <h1>Hello, <!--[user/firstname]-->!</h1>
 <p>Your email is <!--[user/email]-->.</p>
 </div>
 ';
 $personalized_content = $this->personalizer->personalize_content( $html_content );
 $this->assertSame(
 '
 <div>
 <h1>Hello, John!</h1>
 <p>Your email is john@example.com.</p>
 </div>
 ',
 $personalized_content
 );
 }
 public function testMissingTagInRegistry(): void {
 $html_content = '<p>Hello, <!--[mailpoet/unknown-tag]-->!</p>';
 $personalized_content = $this->personalizer->personalize_content( $html_content );
 $this->assertSame( '<p>Hello, <!--[mailpoet/unknown-tag]-->!</p>', $personalized_content );
 }
 public function testTagWithArguments(): void {
 $this->tags_registry->register(
 new Personalization_Tag(
 'default_name',
 '[user/firstname]',
 'Subscriber Info',
 function ( $context, $args ) {
 return $args['default'] ?? 'Default Name';
 }
 )
 );
 $html_content = '<p>Hello, <!--[user/firstname default="Guest"]-->!</p>';
 $this->assertSame( '<p>Hello, Guest!</p>', $this->personalizer->personalize_content( $html_content ) );
 }
 public function testPersonalizationInTitle(): void {
 $this->tags_registry->register(
 new Personalization_Tag(
 'default_name',
 '[user/firstname]',
 'Subscriber Info',
 function ( $context, $args ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed -- The $args parameter is not used in this test.
 return $context['user_name'] ?? 'Default Name';
 }
 )
 );
 $html_content = '
 <html>
 <head>
 <title>Welcome, <!--[user/firstname default="Guest"]-->!</title>
 </head>
 <body>
 <p>Hello, <!--[user/firstname default="Guest"]-->!</p>
 </html>
 ';
 $this->personalizer->set_context( array( 'user_name' => 'John' ) );
 $this->assertSame(
 '
 <html>
 <head>
 <title>Welcome, John!</title>
 </head>
 <body>
 <p>Hello, John!</p>
 </html>
 ',
 $this->personalizer->personalize_content( $html_content )
 );
 }
}
