<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Settings_Controller;
class Dummy_Block_Renderer implements Block_Renderer {
 public function render( string $block_content, array $parsed_block, Settings_Controller $settings_controller ): string {
 return $parsed_block['innerHtml'];
 }
}
