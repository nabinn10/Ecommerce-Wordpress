<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Integrations\Core\Renderer;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Email_Editor;
use MailPoet\EmailEditor\Engine\Renderer\Renderer;
use MailPoet\EmailEditor\Integrations\Core\Initializer;
class Renderer_Test extends \MailPoetTest {
 private $renderer;
 public function _before() {
 parent::_before();
 $this->renderer = $this->di_container->get( Renderer::class );
 $this->di_container->get( Email_Editor::class )->initialize();
 $this->di_container->get( Initializer::class )->initialize();
 }
 public function testItInlinesButtonDefaultStyles() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button">Button</a></div><!-- /wp:button -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 $button_html = $this->extractBlockHtml( $rendered['html'], 'wp-block-button', 'td' );
 verify( $button_html )->stringContainsString( 'color: #fff' );
 verify( $button_html )->stringContainsString( 'padding-bottom: .7em;' );
 verify( $button_html )->stringContainsString( 'padding-left: 1.4em;' );
 verify( $button_html )->stringContainsString( 'padding-right: 1.4em;' );
 verify( $button_html )->stringContainsString( 'padding-top: .7em;' );
 verify( $button_html )->stringContainsString( 'background-color: #32373c' );
 }
 public function testButtonDefaultStylesDontOverwriteUserSetStyles() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:button {"backgroundColor":"white","textColor":"vivid-cyan-blue"} --><div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button">Button</a></div><!-- /wp:button -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 $button_html = $this->extractBlockHtml( $rendered['html'], 'wp-block-button', 'td' );
 verify( $button_html )->stringContainsString( 'color: #0693e3' );
 verify( $button_html )->stringContainsString( 'background-color: #ffffff' );
 }
 public function testItInlinesHeadingFontSize() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"large"}}} --><h1 class="wp-block-heading">Hello</h1><!-- /wp:heading -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 verify( $rendered['text'] )->stringContainsString( 'Hello' );
 }
 public function testItInlinesHeadingColors() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:heading {"level":1, "backgroundColor":"black", "textColor":"luminous-vivid-orange"} --><h1 class="wp-block-heading has-luminous-vivid-orange-color has-black-background-color">Hello</h1><!-- /wp:heading -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 $heading_wrapper_style = $this->extractBlockStyle( $rendered['html'], 'has-luminous-vivid-orange-color', 'td' );
 verify( $heading_wrapper_style )->stringContainsString( 'color: #ff6900' ); // luminous-vivid-orange is #ff6900.
 verify( $heading_wrapper_style )->stringContainsString( 'background-color: #000' ); // black is #000.
 }
 public function testItInlinesParagraphColors() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:paragraph {style":{"color":{"background":"black", "text":"luminous-vivid-orange"}}} --><p class="has-luminous-vivid-orange-color has-black-background-color">Hello</p><!-- /wp:paragraph -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 $paragraph_wrapper_style = $this->extractBlockStyle( $rendered['html'], 'has-luminous-vivid-orange-color', 'td' );
 verify( $paragraph_wrapper_style )->stringContainsString( 'color: #ff6900' ); // luminous-vivid-orange is #ff6900.
 verify( $paragraph_wrapper_style )->stringContainsString( 'background-color: #000' ); // black is #000.
 }
 public function testItInlinesListColors() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:list {"backgroundColor":"black","textColor":"luminous-vivid-orange","style":{"elements":{"link":{"color":{"text":"var:preset|color|vivid-red"}}}}} -->
 <ul class="has-black-background-color has-luminous-vivid-orange-color has-text-color has-background has-link-color"><!-- wp:list-item -->
 <li>Item 1</li>
 <!-- /wp:list-item -->
 <!-- wp:list-item -->
 <li>Item 2</li>
 <!-- /wp:list-item --></ul>
 <!-- /wp:list -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 $list_style = $this->extractBlockStyle( $rendered['html'], 'has-luminous-vivid-orange-color', 'ul' );
 verify( $list_style )->stringContainsString( 'color: #ff6900' ); // luminous-vivid-orange is #ff6900.
 verify( $list_style )->stringContainsString( 'background-color: #000' ); // black is #000.
 }
 public function testItInlinesColumnsColors() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:columns {"backgroundColor":"vivid-green-cyan", "textColor":"black"} -->
 <div class="wp-block-columns has-black-background-color has-luminous-vivid-orange-color"><!-- wp:column --><!-- /wp:column --></div>
 <!-- /wp:columns -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 $style = $this->extractBlockStyle( $rendered['html'], 'wp-block-columns', 'table' );
 verify( $style )->stringContainsString( 'color: #ff6900' ); // luminous-vivid-orange is #ff6900.
 verify( $style )->stringContainsString( 'background-color: #000' ); // black is #000.
 }
 public function testItRendersTextVersion() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:columns {"backgroundColor":"vivid-green-cyan", "textColor":"black"} -->
 <div class="wp-block-columns has-black-background-color has-luminous-vivid-orange-color"><!-- wp:column --><!-- /wp:column --></div>
 <!-- /wp:columns -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 $style = $this->extractBlockStyle( $rendered['html'], 'wp-block-columns', 'table' );
 verify( $style )->stringContainsString( 'color: #ff6900' ); // luminous-vivid-orange is #ff6900.
 verify( $style )->stringContainsString( 'background-color: #000' ); // black is #000.
 }
 public function testItInlinesColumnColors() {
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '
 <!-- wp:column {"verticalAlignment":"stretch","backgroundColor":"black","textColor":"luminous-vivid-orange"} -->
 <div class="wp-block-column-test wp-block-column is-vertically-aligned-stretch has-luminous-vivid-orange-color has-black-background-color has-text-color has-background"></div>
 <!-- /wp:column -->',
 )
 );
 $rendered = $this->renderer->render( $email_post, 'Subject', '', 'en' );
 $style = $this->extractBlockStyle( $rendered['html'], 'wp-block-column-test', 'td' );
 verify( $style )->stringContainsString( 'color: #ff6900' ); // luminous-vivid-orange is #ff6900.
 verify( $style )->stringContainsString( 'background-color: #000' ); // black is #000.
 }
 private function extractBlockHtml( string $html, string $block_class, string $tag ): string {
 $doc = new \DOMDocument();
 $doc->loadHTML( $html );
 $xpath = new \DOMXPath( $doc );
 $nodes = $xpath->query( '//' . $tag . '[contains(@class, "' . $block_class . '")]' );
 $block = null;
 if ( ( $nodes instanceof \DOMNodeList ) && $nodes->length > 0 ) {
 $block = $nodes->item( 0 );
 }
 $this->assertInstanceOf( \DOMElement::class, $block );
 $this->assertInstanceOf( \DOMDocument::class, $block->ownerDocument ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
 return (string) $block->ownerDocument->saveHTML( $block ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
 }
 private function extractBlockStyle( string $html, string $block_class, string $tag ): string {
 $doc = new \DOMDocument();
 $doc->loadHTML( $html );
 $xpath = new \DOMXPath( $doc );
 $nodes = $xpath->query( '//' . $tag . '[contains(@class, "' . $block_class . '")]' );
 $block = null;
 if ( ( $nodes instanceof \DOMNodeList ) && $nodes->length > 0 ) {
 $block = $nodes->item( 0 );
 }
 $this->assertInstanceOf( \DOMElement::class, $block );
 return $block->getAttribute( 'style' );
 }
}
