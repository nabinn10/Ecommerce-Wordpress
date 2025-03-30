<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Postprocessors;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Theme_Controller;
class Variables_Postprocessor implements Postprocessor {
 private Theme_Controller $theme_controller;
 public function __construct(
 Theme_Controller $theme_controller
 ) {
 $this->theme_controller = $theme_controller;
 }
 public function postprocess( string $html ): string {
 $variables = $this->theme_controller->get_variables_values_map();
 $replacements = array();
 foreach ( $variables as $name => $value ) {
 $var_pattern = '/' . preg_quote( 'var(' . $name . ')', '/' ) . '/i';
 $replacements[ $var_pattern ] = $value;
 }
 // Pattern to match style attributes and their values.
 $callback = function ( $matches ) use ( $replacements ) {
 // For each match, replace CSS variables with their values.
 $style = $matches[1];
 $style = preg_replace( array_keys( $replacements ), array_values( $replacements ), $style );
 return 'style="' . esc_attr( $style ) . '"';
 };
 // We want to replace the CSS variables only in the style attributes to avoid replacing the actual content.
 $style_pattern = '/style="(.*?)"/i';
 $style_pattern_alt = "/style='(.*?)'/i";
 $html = (string) preg_replace_callback( $style_pattern, $callback, $html );
 $html = (string) preg_replace_callback( $style_pattern_alt, $callback, $html );
 return $html;
 }
}
