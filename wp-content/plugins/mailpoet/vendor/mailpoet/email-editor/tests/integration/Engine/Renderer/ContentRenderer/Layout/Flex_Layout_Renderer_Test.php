<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Layout;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Dummy_Block_Renderer;
use MailPoet\EmailEditor\Engine\Settings_Controller;
require_once __DIR__ . '/../Dummy_Block_Renderer.php';
class Flex_Layout_Renderer_Test extends \MailPoetTest {
 private $renderer;
 private $settings_controller;
 public function _before(): void {
 parent::_before();
 $this->settings_controller = $this->di_container->get( Settings_Controller::class );
 $this->renderer = new Flex_Layout_Renderer();
 register_block_type( 'dummy/block', array() );
 add_filter( 'render_block', array( $this, 'renderDummyBlock' ), 10, 2 );
 }
 public function testItRendersInnerBlocks(): void {
 $parsed_block = array(
 'innerBlocks' => array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 ),
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 2',
 ),
 ),
 'email_attrs' => array(),
 );
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 verify( $output )->stringContainsString( 'Dummy 1' );
 verify( $output )->stringContainsString( 'Dummy 2' );
 }
 public function testItHandlesJustification(): void {
 $parsed_block = array(
 'innerBlocks' => array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 ),
 ),
 'email_attrs' => array(),
 );
 // Default justification is left.
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 verify( $output )->stringContainsString( 'text-align: left' );
 verify( $output )->stringContainsString( 'align="left"' );
 // Right justification.
 $parsed_block['attrs']['layout']['justifyContent'] = 'right';
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 verify( $output )->stringContainsString( 'text-align: right' );
 verify( $output )->stringContainsString( 'align="right"' );
 // Center justification.
 $parsed_block['attrs']['layout']['justifyContent'] = 'center';
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 verify( $output )->stringContainsString( 'text-align: center' );
 verify( $output )->stringContainsString( 'align="center"' );
 }
 public function testItEscapesAttributes(): void {
 $parsed_block = array(
 'innerBlocks' => array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 ),
 ),
 'email_attrs' => array(),
 );
 $parsed_block['attrs']['layout']['justifyContent'] = '"> <script>alert("XSS")</script><div style="text-align: right';
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 verify( $output )->stringNotContainsString( '<script>alert("XSS")</script>' );
 }
 public function testInComputesProperWidthsForReasonableSettings(): void {
 $parsed_block = array(
 'innerBlocks' => array(),
 'email_attrs' => array(
 'width' => '640px',
 ),
 );
 // 50% and 25%
 $parsed_block['innerBlocks'] = array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 'attrs' => array( 'width' => '50' ),
 ),
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 2',
 'attrs' => array( 'width' => '25' ),
 ),
 );
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 $flex_items = $this->getFlexItemsFromOutput( $output );
 verify( $flex_items[0] )->stringContainsString( 'width:312px;' );
 verify( $flex_items[1] )->stringContainsString( 'width:148px;' );
 // 25% and 25% and auto
 $parsed_block['innerBlocks'] = array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 'attrs' => array( 'width' => '25' ),
 ),
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 2',
 'attrs' => array( 'width' => '25' ),
 ),
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 3',
 'attrs' => array(),
 ),
 );
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 $flex_items = $this->getFlexItemsFromOutput( $output );
 verify( $flex_items[0] )->stringContainsString( 'width:148px;' );
 verify( $flex_items[1] )->stringContainsString( 'width:148px;' );
 verify( $flex_items[2] )->stringNotContainsString( 'width:' );
 // 50% and 50%
 $parsed_block['innerBlocks'] = array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 'attrs' => array( 'width' => '50' ),
 ),
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 2',
 'attrs' => array( 'width' => '50' ),
 ),
 );
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 $flex_items = $this->getFlexItemsFromOutput( $output );
 verify( $flex_items[0] )->stringContainsString( 'width:312px;' );
 verify( $flex_items[1] )->stringContainsString( 'width:312px;' );
 }
 public function testInComputesWidthsForStrangeSettingsValues(): void {
 $parsed_block = array(
 'innerBlocks' => array(),
 'email_attrs' => array(
 'width' => '640px',
 ),
 );
 // 100% and 25%
 $parsed_block['innerBlocks'] = array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 'attrs' => array( 'width' => '100' ),
 ),
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 2',
 'attrs' => array( 'width' => '25' ),
 ),
 );
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 $flex_items = $this->getFlexItemsFromOutput( $output );
 verify( $flex_items[0] )->stringContainsString( 'width:508px;' );
 verify( $flex_items[1] )->stringContainsString( 'width:105px;' );
 // 100% and 100%
 $parsed_block['innerBlocks'] = array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 'attrs' => array( 'width' => '100' ),
 ),
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 2',
 'attrs' => array( 'width' => '100' ),
 ),
 );
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 $flex_items = $this->getFlexItemsFromOutput( $output );
 verify( $flex_items[0] )->stringContainsString( 'width:312px;' );
 verify( $flex_items[1] )->stringContainsString( 'width:312px;' );
 // 100% and auto
 $parsed_block['innerBlocks'] = array(
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 1',
 'attrs' => array( 'width' => '100' ),
 ),
 array(
 'blockName' => 'dummy/block',
 'innerHtml' => 'Dummy 2',
 'attrs' => array(),
 ),
 );
 $output = $this->renderer->render_inner_blocks_in_layout( $parsed_block, $this->settings_controller );
 $flex_items = $this->getFlexItemsFromOutput( $output );
 verify( $flex_items[0] )->stringContainsString( 'width:508px;' );
 verify( $flex_items[1] )->stringNotContainsString( 'width:' );
 }
 private function getFlexItemsFromOutput( string $output ): array {
 $matches = array();
 preg_match_all( '/<td class="layout-flex-item" style="(.*)">/', $output, $matches );
 return explode( '><', $matches[0][0] ?? array() );
 }
 public function renderDummyBlock( $block_content, $parsed_block ): string {
 $dummy_renderer = new Dummy_Block_Renderer();
 return $dummy_renderer->render( $block_content, $parsed_block, $this->settings_controller );
 }
 public function _after(): void {
 parent::_after();
 unregister_block_type( 'dummy/block' );
 remove_filter( 'render_block', array( $this, 'renderDummyBlock' ), 10 );
 }
}
