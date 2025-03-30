<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Integrations\Core;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Blocks_Registry;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Layout\Flex_Layout_Renderer;
class Initializer {
 public function initialize(): void {
 add_action( 'mailpoet_blocks_renderer_initialized', array( $this, 'register_core_blocks_renderers' ), 10, 1 );
 add_filter( 'mailpoet_email_editor_theme_json', array( $this, 'adjust_theme_json' ), 10, 1 );
 add_filter( 'safe_style_css', array( $this, 'allow_styles' ) );
 }
 public function register_core_blocks_renderers( Blocks_Registry $blocks_registry ): void {
 $blocks_registry->add_block_renderer( 'core/paragraph', new Renderer\Blocks\Text() );
 $blocks_registry->add_block_renderer( 'core/heading', new Renderer\Blocks\Text() );
 $blocks_registry->add_block_renderer( 'core/column', new Renderer\Blocks\Column() );
 $blocks_registry->add_block_renderer( 'core/columns', new Renderer\Blocks\Columns() );
 $blocks_registry->add_block_renderer( 'core/list', new Renderer\Blocks\List_Block() );
 $blocks_registry->add_block_renderer( 'core/list-item', new Renderer\Blocks\List_Item() );
 $blocks_registry->add_block_renderer( 'core/image', new Renderer\Blocks\Image() );
 $blocks_registry->add_block_renderer( 'core/buttons', new Renderer\Blocks\Buttons( new Flex_Layout_Renderer() ) );
 $blocks_registry->add_block_renderer( 'core/button', new Renderer\Blocks\Button() );
 $blocks_registry->add_block_renderer( 'core/group', new Renderer\Blocks\Group() );
 // Render used for all other blocks.
 $blocks_registry->add_fallback_renderer( new Renderer\Blocks\Fallback() );
 }
 public function adjust_theme_json( \WP_Theme_JSON $editor_theme_json ): \WP_Theme_JSON {
 $theme_json = (string) file_get_contents( __DIR__ . '/theme.json' );
 $theme_json = json_decode( $theme_json, true );
 $editor_theme_json->merge( new \WP_Theme_JSON( $theme_json, 'default' ) );
 return $editor_theme_json;
 }
 public function allow_styles( ?array $allowed_styles ): array {
 // The styles can be null in some cases.
 if ( ! is_array( $allowed_styles ) ) {
 $allowed_styles = array();
 }
 $allowed_styles[] = 'display';
 $allowed_styles[] = 'mso-padding-alt';
 $allowed_styles[] = 'mso-font-width';
 $allowed_styles[] = 'mso-text-raise';
 return $allowed_styles;
 }
}
