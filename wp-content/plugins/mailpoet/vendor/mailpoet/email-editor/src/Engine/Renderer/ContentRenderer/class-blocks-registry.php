<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer;
if (!defined('ABSPATH')) exit;
class Blocks_Registry {
 private $fallback_renderer = null;
 private array $block_renderers_map = array();
 public function add_block_renderer( string $block_name, Block_Renderer $renderer ): void {
 $this->block_renderers_map[ $block_name ] = $renderer;
 }
 public function add_fallback_renderer( Block_Renderer $renderer ): void {
 $this->fallback_renderer = $renderer;
 }
 public function has_block_renderer( string $block_name ): bool {
 return isset( $this->block_renderers_map[ $block_name ] );
 }
 public function get_block_renderer( string $block_name ): ?Block_Renderer {
 return $this->block_renderers_map[ $block_name ] ?? null;
 }
 public function get_fallback_renderer(): ?Block_Renderer {
 return $this->fallback_renderer;
 }
 public function remove_all_block_renderers(): void {
 foreach ( array_keys( $this->block_renderers_map ) as $block_name ) {
 $this->remove_block_renderer( $block_name );
 }
 }
 private function remove_block_renderer( string $block_name ): void {
 unset( $this->block_renderers_map[ $block_name ] );
 }
}
