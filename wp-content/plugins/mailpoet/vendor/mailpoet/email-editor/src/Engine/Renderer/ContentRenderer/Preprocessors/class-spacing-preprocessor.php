<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Preprocessors;
if (!defined('ABSPATH')) exit;
class Spacing_Preprocessor implements Preprocessor {
 public function preprocess( array $parsed_blocks, array $layout, array $styles ): array {
 $parsed_blocks = $this->add_block_gaps( $parsed_blocks, $styles['spacing']['blockGap'] ?? '', null );
 return $parsed_blocks;
 }
 private function add_block_gaps( array $parsed_blocks, string $gap = '', $parent_block = null ): array {
 foreach ( $parsed_blocks as $key => $block ) {
 $parent_block_name = $parent_block['blockName'] ?? '';
 // Ensure that email_attrs are set.
 $block['email_attrs'] = $block['email_attrs'] ?? array();
 if ( 0 !== $key && $gap && 'core/buttons' !== $parent_block_name ) {
 $block['email_attrs']['margin-top'] = $gap;
 }
 $block['innerBlocks'] = $this->add_block_gaps( $block['innerBlocks'] ?? array(), $gap, $block );
 $parsed_blocks[ $key ] = $block;
 }
 return $parsed_blocks;
 }
}
