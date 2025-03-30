<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Integrations\Core\Renderer\Blocks\Text;
require_once __DIR__ . '/Dummy_Block_Renderer.php';
class Blocks_Registry_Test extends \MailPoetTest {
 private $registry;
 public function _before() {
 parent::_before();
 $this->registry = $this->di_container->get( Blocks_Registry::class );
 }
 public function testItReturnsNullForUnknownRenderer() {
 $stored_renderer = $this->registry->get_block_renderer( 'test' );
 verify( $stored_renderer )->null();
 }
 public function testItStoresAddedRenderer() {
 $renderer = new Text();
 $this->registry->add_block_renderer( 'test', $renderer );
 $stored_renderer = $this->registry->get_block_renderer( 'test' );
 verify( $stored_renderer )->equals( $renderer );
 }
 public function testItReportsWhichRenderersAreRegistered() {
 $renderer = new Text();
 $this->registry->add_block_renderer( 'test', $renderer );
 verify( $this->registry->has_block_renderer( 'test' ) )->true();
 verify( $this->registry->has_block_renderer( 'unknown' ) )->false();
 }
}
