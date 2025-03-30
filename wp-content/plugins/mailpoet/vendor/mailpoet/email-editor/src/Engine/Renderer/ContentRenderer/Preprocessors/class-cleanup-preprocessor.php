<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Preprocessors;
if (!defined('ABSPATH')) exit;
class Cleanup_Preprocessor implements Preprocessor {
 public function preprocess( array $parsed_blocks, array $layout, array $styles ): array {
 foreach ( $parsed_blocks as $key => $block ) {
 // https://core.trac.wordpress.org/ticket/45312
 // \WP_Block_Parser::parse_blocks() sometimes add a block with name null that can cause unexpected spaces in rendered content
 // This behavior was reported as an issue, but it was closed as won't fix.
 if ( null === $block['blockName'] ) {
 unset( $parsed_blocks[ $key ] );
 }
 }
 return array_values( $parsed_blocks );
 }
}
