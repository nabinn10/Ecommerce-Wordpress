<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine;
if (!defined('ABSPATH')) exit;
use Codeception\Stub\Expected;
use MailPoet\EmailEditor\Engine\Renderer\Renderer;
use MailPoet\WP\Functions as WPFunctions;
class Send_Preview_Email_Test extends \MailPoetTest {
 private $send_preview_email;
 private $renderer_mock;
 public function _before() {
 parent::_before();
 $this->renderer_mock = $this->createMock( Renderer::class );
 $this->renderer_mock->method( 'render' )->willReturn(
 array(
 'html' => 'test html',
 'text' => 'test text',
 )
 );
 $this->send_preview_email = $this->getServiceWithOverrides(
 Send_Preview_Email::class,
 array(
 'renderer' => $this->renderer_mock,
 )
 );
 }
 public function testItSendsPreviewEmail(): void {
 $spe = $this->make(
 Send_Preview_Email::class,
 array(
 'renderer' => $this->renderer_mock,
 'send_email' => Expected::once( true ),
 'set_personalize_content' => function ( $param ) {
 return $param;
 },
 )
 );
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button">Button</a></div><!-- /wp:button -->',
 )
 );
 $post_data = array(
 'newsletterId' => 2,
 'email' => 'hello@example.com',
 'postId' => $email_post->ID,
 );
 $result = $spe->send_preview_email( $post_data );
 verify( $result )->equals( true );
 }
 public function testItReturnsTheStatusOfSendMail(): void {
 $mailing_status = false;
 $spe = $this->make(
 Send_Preview_Email::class,
 array(
 'renderer' => $this->renderer_mock,
 'send_email' => Expected::once( $mailing_status ),
 'set_personalize_content' => function ( $param ) {
 return $param;
 },
 )
 );
 $email_post = $this->tester->create_post(
 array(
 'post_content' => '<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button">Button</a></div><!-- /wp:button -->',
 )
 );
 $post_data = array(
 'newsletterId' => 2,
 'email' => 'hello@example.com',
 'postId' => $email_post->ID,
 );
 $result = $spe->send_preview_email( $post_data );
 verify( $result )->equals( $mailing_status );
 }
 public function testItThrowsAnExceptionWithInvalidEmail(): void {
 $this->expectException( \InvalidArgumentException::class );
 $this->expectExceptionMessage( 'Invalid email' );
 $post_data = array(
 'newsletterId' => 2,
 'email' => 'hello@example',
 'postId' => 4,
 );
 $this->send_preview_email->send_preview_email( $post_data );
 }
 public function testItThrowsAnExceptionWhenPostIdIsNotProvided(): void {
 $this->expectException( \InvalidArgumentException::class );
 $this->expectExceptionMessage( 'Missing required data' );
 $post_data = array(
 'newsletterId' => 2,
 'email' => 'hello@example.com',
 'postId' => null,
 );
 $this->send_preview_email->send_preview_email( $post_data );
 }
 public function testItThrowsAnExceptionWhenPostCannotBeFound(): void {
 $this->expectException( \Exception::class );
 $this->expectExceptionMessage( 'Invalid post' );
 $post_data = array(
 'newsletterId' => 2,
 'email' => 'hello@example.com',
 'postId' => 100,
 );
 $this->send_preview_email->send_preview_email( $post_data );
 }
}
