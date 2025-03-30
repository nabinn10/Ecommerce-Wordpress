<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Integrations\Core\Renderer\Blocks;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Email_Editor;
use MailPoet\EmailEditor\Engine\Settings_Controller;
class Image_Test extends \MailPoetTest {
 private $image_renderer;
 private $image_content = '
 <figure class="wp-block-image alignleft size-full is-style-default">
 <img src="https://test.com/wp-content/uploads/2023/05/image.jpg" alt="" style="" srcset="https://test.com/wp-content/uploads/2023/05/image.jpg 1000w"/>
 </figure>
 ';
 private $parsed_image = array(
 'blockName' => 'core/image',
 'attrs' => array(
 'align' => 'left',
 'id' => 1,
 'scale' => 'cover',
 'sizeSlug' => 'full',
 'linkDestination' => 'none',
 'className' => 'is-style-default',
 'width' => '640px',
 ),
 'innerBlocks' => array(),
 'innerHTML' => '',
 'innerContent' => array(),
 );
 private $settings_controller;
 public function _before() {
 $this->di_container->get( Email_Editor::class )->initialize();
 $this->image_renderer = new Image();
 $this->settings_controller = $this->di_container->get( Settings_Controller::class );
 }
 public function testItRendersMandatoryImageStyles(): void {
 $parsed_image = $this->parsed_image;
 $parsed_image['innerHTML'] = $this->image_content; // To avoid repetition of the image content in the test we need to add it to the parsed block.
 $rendered = $this->image_renderer->render( $this->image_content, $parsed_image, $this->settings_controller );
 $this->assertStringNotContainsString( '<figure', $rendered );
 $this->assertStringNotContainsString( '<figcaption', $rendered );
 $this->assertStringNotContainsString( '</figure>', $rendered );
 $this->assertStringNotContainsString( '</figcaption>', $rendered );
 $this->assertStringNotContainsString( 'srcset', $rendered );
 $this->assertStringContainsString( 'width="640"', $rendered );
 $this->assertStringContainsString( 'width:640px;', $rendered );
 $this->assertStringContainsString( '<img ', $rendered );
 }
 public function testItRendersBorderRadiusStyle(): void {
 $parsed_image = $this->parsed_image;
 $parsed_image['attrs']['className'] = 'is-style-rounded';
 $parsed_image['innerHTML'] = $this->image_content; // To avoid repetition of the image content in the test we need to add it to the parsed block.
 $rendered = $this->image_renderer->render( $this->image_content, $parsed_image, $this->settings_controller );
 $this->assertStringNotContainsString( '<figure', $rendered );
 $this->assertStringNotContainsString( '<figcaption', $rendered );
 $this->assertStringNotContainsString( '</figure>', $rendered );
 $this->assertStringNotContainsString( '</figcaption>', $rendered );
 $this->assertStringContainsString( 'width="640"', $rendered );
 $this->assertStringContainsString( 'width:640px;', $rendered );
 $this->assertStringContainsString( '<img ', $rendered );
 $this->assertStringContainsString( 'border-radius: 9999px;', $rendered );
 }
 public function testItRendersCaption(): void {
 $image_content = str_replace( '</figure>', '<figcaption class="wp-element-caption">Caption</figcaption></figure>', $this->image_content );
 $parsed_image = $this->parsed_image;
 $parsed_image['innerHTML'] = $image_content; // To avoid repetition of the image content in the test we need to add it to the parsed block.
 $rendered = $this->image_renderer->render( $image_content, $parsed_image, $this->settings_controller );
 $this->assertStringContainsString( '>Caption</span>', $rendered );
 $this->assertStringContainsString( 'text-align:center;', $rendered );
 }
 public function testItRendersImageAlignment(): void {
 $image_content = str_replace( 'style=""', 'style="width:400px;height:300px;"', $this->image_content );
 $parsed_image = $this->parsed_image;
 $parsed_image['attrs']['align'] = 'center';
 $parsed_image['attrs']['width'] = '400px';
 $parsed_image['innerHTML'] = $image_content; // To avoid repetition of the image content in the test we need to add it to the parsed block.
 $rendered = $this->image_renderer->render( $image_content, $parsed_image, $this->settings_controller );
 $this->assertStringContainsString( 'align="center"', $rendered );
 $this->assertStringContainsString( 'width="400"', $rendered );
 $this->assertStringContainsString( 'height="300"', $rendered );
 $this->assertStringContainsString( 'height:300px;', $rendered );
 $this->assertStringContainsString( 'width:400px;', $rendered );
 }
 public function testItRendersBorders(): void {
 $image_content = $this->image_content;
 $parsed_image = $this->parsed_image;
 $parsed_image['attrs']['style']['border'] = array(
 'width' => '10px',
 'color' => '#000001',
 'radius' => '20px',
 );
 $rendered = $this->image_renderer->render( $image_content, $parsed_image, $this->settings_controller );
 $html = new \WP_HTML_Tag_Processor( $rendered );
 // Border is rendered on the wrapping table cell.
 $html->next_tag(
 array(
 'tag_name' => 'td',
 'class_name' => 'email-image-cell',
 )
 );
 $table_cell_style = $html->get_attribute( 'style' );
 $this->assertStringContainsString( 'border-color:#000001', $table_cell_style );
 $this->assertStringContainsString( 'border-radius:20px', $table_cell_style );
 $this->assertStringContainsString( 'border-style:solid;', $table_cell_style );
 $html->next_tag( array( 'tag_name' => 'img' ) );
 $img_style = $html->get_attribute( 'style' );
 $this->assertStringNotContainsString( 'border', $img_style );
 }
 public function testItMovesBorderRelatedClasses(): void {
 $image_content = str_replace( '<img', '<img class="custom-class has-border-color has-border-red-color"', $this->image_content );
 $parsed_image = $this->parsed_image;
 $parsed_image['attrs']['style']['border'] = array(
 'width' => '10px',
 'color' => '#000001',
 'radius' => '20px',
 );
 $rendered = $this->image_renderer->render( $image_content, $parsed_image, $this->settings_controller );
 $html = new \WP_HTML_Tag_Processor( $rendered );
 // Border is rendered on the wrapping table cell and the border classes are moved to the wrapping table cell.
 $html->next_tag(
 array(
 'tag_name' => 'td',
 'class_name' => 'email-image-cell',
 )
 );
 $table_cell_class = $html->get_attribute( 'class' );
 $this->assertStringContainsString( 'has-border-red-color', $table_cell_class );
 $this->assertStringContainsString( 'has-border-color', $table_cell_class );
 $this->assertStringNotContainsString( 'custom-class', $table_cell_class );
 }
}
