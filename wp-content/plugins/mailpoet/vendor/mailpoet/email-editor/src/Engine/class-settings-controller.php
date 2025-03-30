<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine;
if (!defined('ABSPATH')) exit;
class Settings_Controller {
 const ALLOWED_BLOCK_TYPES = array(
 'core/button',
 'core/buttons',
 'core/paragraph',
 'core/heading',
 'core/column',
 'core/columns',
 'core/image',
 'core/list',
 'core/list-item',
 'core/group',
 'core/spacer',
 );
 const DEFAULT_SETTINGS = array(
 'enableCustomUnits' => array( 'px', '%' ),
 );
 private Theme_Controller $theme_controller;
 private array $iframe_assets = array();
 public function __construct(
 Theme_Controller $theme_controller
 ) {
 $this->theme_controller = $theme_controller;
 }
 public function get_settings(): array {
 $this->init_iframe_assets();
 $core_default_settings = \get_default_block_editor_settings();
 $theme_settings = $this->theme_controller->get_settings();
 $settings = array_merge( $core_default_settings, self::DEFAULT_SETTINGS );
 $settings['allowedBlockTypes'] = self::ALLOWED_BLOCK_TYPES;
 // Assets for iframe editor (component styles, scripts, etc.).
 $settings['__unstableResolvedAssets'] = $this->iframe_assets;
 $editor_content_styles = file_get_contents( __DIR__ . '/content-editor.css' );
 $shares_content_styles = file_get_contents( __DIR__ . '/content-shared.css' );
 $settings['styles'] = array(
 array( 'css' => $editor_content_styles ),
 array( 'css' => $shares_content_styles ),
 );
 $settings['__experimentalFeatures'] = $theme_settings;
 // Controls which alignment options are available for blocks.
 $settings['supportsLayout'] = true; // Allow using default layouts.
 $settings['__unstableIsBlockBasedTheme'] = true; // For default setting this to true disables wide and full alignments.
 return $settings;
 }
 public function get_layout(): array {
 $layout_settings = $this->theme_controller->get_layout_settings();
 return array(
 'contentSize' => $layout_settings['contentSize'],
 'wideSize' => $layout_settings['wideSize'],
 );
 }
 public function get_email_styles(): array {
 $theme = $this->get_theme();
 return $theme->get_data()['styles'];
 }
 public function get_layout_width_without_padding(): string {
 $styles = $this->get_email_styles();
 $layout = $this->get_layout();
 $width = $this->parse_number_from_string_with_pixels( $layout['contentSize'] );
 $width -= $this->parse_number_from_string_with_pixels( $styles['spacing']['padding']['left'] );
 $width -= $this->parse_number_from_string_with_pixels( $styles['spacing']['padding']['right'] );
 return "{$width}px";
 }
 public function parse_styles_to_array( string $styles ): array {
 $styles = explode( ';', $styles );
 $parsed_styles = array();
 foreach ( $styles as $style ) {
 $style = explode( ':', $style );
 if ( count( $style ) === 2 ) {
 $parsed_styles[ trim( $style[0] ) ] = trim( $style[1] );
 }
 }
 return $parsed_styles;
 }
 public function parse_number_from_string_with_pixels( string $value ): float {
 return (float) str_replace( 'px', '', $value );
 }
 public function get_theme(): \WP_Theme_JSON {
 return $this->theme_controller->get_theme();
 }
 public function translate_slug_to_font_size( string $font_size ): string {
 return $this->theme_controller->translate_slug_to_font_size( $font_size );
 }
 public function translate_slug_to_color( string $color_slug ): string {
 return $this->theme_controller->translate_slug_to_color( $color_slug );
 }
 private function init_iframe_assets(): void {
 if ( ! empty( $this->iframe_assets ) ) {
 return;
 }
 $this->iframe_assets = _wp_get_iframed_editor_assets();
 // Remove layout styles and block library for classic themes. They are added only when a classic theme is active
 // and they add unwanted margins and paddings in the editor content.
 $cleaned_styles = array();
 foreach ( explode( "\n", (string) $this->iframe_assets['styles'] ) as $asset ) {
 if ( strpos( $asset, 'wp-editor-classic-layout-styles-css' ) !== false ) {
 continue;
 }
 if ( strpos( $asset, 'wp-block-library-theme-css' ) !== false ) {
 continue;
 }
 $cleaned_styles[] = $asset;
 }
 $this->iframe_assets['styles'] = implode( "\n", $cleaned_styles );
 }
}
