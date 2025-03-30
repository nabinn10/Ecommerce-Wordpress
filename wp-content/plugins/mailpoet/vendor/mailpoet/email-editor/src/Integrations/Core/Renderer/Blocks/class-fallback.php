<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Integrations\Core\Renderer\Blocks;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Settings_Controller;
class Fallback extends Abstract_Block_Renderer {
 protected function render_content( $block_content, array $parsed_block, Settings_Controller $settings_controller ): string {
 return $block_content;
 }
}
