<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Integrations\Core\Renderer\Blocks;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Email_Editor;
use MailPoet\EmailEditor\Engine\Settings_Controller;
class Paragraph_Test extends \MailPoetTest {
 private $paragraph_renderer;
 private $parsed_paragraph = array(
 'blockName' => 'core/paragraph',
 'attrs' => array(
 'style' => array(
 'typography' => array(
 'fontSize' => '16px',
 ),
 ),
 ),
 'innerBlocks' => array(),
 'innerHTML' => '<p>Lorem Ipsum</p>',
 'innerContent' => array(
 0 => '<p>Lorem Ipsum</p>',
 ),
 );
 private $settings_controller;
 public function _before() {
 $this->di_container->get( Email_Editor::class )->initialize();
 $this->paragraph_renderer = new Text();
 $this->settings_controller = $this->di_container->get( Settings_Controller::class );
 }
 public function testItRendersContent(): void {
 $rendered = $this->paragraph_renderer->render( '<p>Lorem Ipsum</p>', $this->parsed_paragraph, $this->settings_controller );
 $this->assertStringContainsString( 'width:100%', $rendered );
 $this->assertStringContainsString( 'Lorem Ipsum', $rendered );
 $this->assertStringContainsString( 'font-size:16px;', $rendered );
 $this->assertStringContainsString( 'text-align:left;', $rendered ); // Check the default text-align.
 $this->assertStringContainsString( 'align="left"', $rendered ); // Check the default align.
 }
 public function testItRendersContentWithPadding(): void {
 $parsed_paragraph = $this->parsed_paragraph;
 $parsed_paragraph['attrs']['style']['spacing']['padding']['top'] = '10px';
 $parsed_paragraph['attrs']['style']['spacing']['padding']['right'] = '20px';
 $parsed_paragraph['attrs']['style']['spacing']['padding']['bottom'] = '30px';
 $parsed_paragraph['attrs']['style']['spacing']['padding']['left'] = '40px';
 $parsed_paragraph['attrs']['align'] = 'center';
 $rendered = $this->paragraph_renderer->render( '<p>Lorem Ipsum</p>', $parsed_paragraph, $this->settings_controller );
 $this->assertStringContainsString( 'padding-top:10px;', $rendered );
 $this->assertStringContainsString( 'padding-right:20px;', $rendered );
 $this->assertStringContainsString( 'padding-bottom:30px;', $rendered );
 $this->assertStringContainsString( 'padding-left:40px;', $rendered );
 $this->assertStringContainsString( 'text-align:center;', $rendered );
 $this->assertStringContainsString( 'align="center"', $rendered );
 $this->assertStringContainsString( 'Lorem Ipsum', $rendered );
 }
 public function testItRendersBorders(): void {
 $parsed_paragraph = $this->parsed_paragraph;
 $parsed_paragraph['attrs']['style']['border']['width'] = '10px';
 $parsed_paragraph['attrs']['style']['border']['color'] = '#000001';
 $parsed_paragraph['attrs']['style']['border']['radius'] = '20px';
 $content = '<p class="has-border-color test-class has-red-border-color">Lorem Ipsum</p>';
 $parsed_paragraph['innerHTML'] = $content;
 $parsed_paragraph['innerContent'] = array( $content );
 $rendered = $this->paragraph_renderer->render( $content, $parsed_paragraph, $this->settings_controller );
 $html = new \WP_HTML_Tag_Processor( $rendered );
 $html->next_tag( array( 'tag_name' => 'table' ) );
 $table_style = $html->get_attribute( 'style' );
 // Table needs to have border-collapse: separate to make border-radius work.
 $this->assertStringContainsString( 'border-collapse: separate', $table_style );
 $html->next_tag( array( 'tag_name' => 'td' ) );
 $table_cell_style = $html->get_attribute( 'style' );
 // Border styles are applied to the table cell.
 $this->assertStringContainsString( 'border-color:#000001', $table_cell_style );
 $this->assertStringContainsString( 'border-radius:20px', $table_cell_style );
 $this->assertStringContainsString( 'border-width:10px', $table_cell_style );
 $table_cell_classes = $html->get_attribute( 'class' );
 $this->assertStringContainsString( 'has-border-color test-class has-red-border-color', $table_cell_classes );
 $html->next_tag( array( 'tag_name' => 'p' ) );
 // There are no border styles on the paragraph.
 $paragraph_style = $html->get_attribute( 'style' );
 $this->assertStringNotContainsString( 'border', $paragraph_style );
 }
 public function testItConvertsBlockTypography(): void {
 $parsed_paragraph = $this->parsed_paragraph;
 $parsed_paragraph['attrs']['style']['typography'] = array(
 'textTransform' => 'uppercase',
 'letterSpacing' => '1px',
 'textDecoration' => 'underline',
 'fontStyle' => 'italic',
 'fontWeight' => 'bold',
 'fontSize' => '20px',
 );
 $rendered = $this->paragraph_renderer->render( '<p>Lorem Ipsum</p>', $parsed_paragraph, $this->settings_controller );
 $this->assertStringContainsString( 'text-transform:uppercase;', $rendered );
 $this->assertStringContainsString( 'letter-spacing:1px;', $rendered );
 $this->assertStringContainsString( 'text-decoration:underline;', $rendered );
 $this->assertStringContainsString( 'font-style:italic;', $rendered );
 $this->assertStringContainsString( 'font-weight:bold;', $rendered );
 $this->assertStringContainsString( 'font-size:20px;', $rendered );
 $this->assertStringContainsString( 'Lorem Ipsum', $rendered );
 }
}
