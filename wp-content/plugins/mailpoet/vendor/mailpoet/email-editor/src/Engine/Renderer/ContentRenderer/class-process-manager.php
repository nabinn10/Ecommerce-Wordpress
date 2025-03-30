<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Postprocessors\Highlighting_Postprocessor;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Postprocessors\Postprocessor;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Postprocessors\Variables_Postprocessor;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Preprocessors\Blocks_Width_Preprocessor;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Preprocessors\Cleanup_Preprocessor;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Preprocessors\Preprocessor;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Preprocessors\Spacing_Preprocessor;
use MailPoet\EmailEditor\Engine\Renderer\ContentRenderer\Preprocessors\Typography_Preprocessor;
class Process_Manager {
 private $preprocessors = array();
 private $postprocessors = array();
 public function __construct(
 Cleanup_Preprocessor $cleanup_preprocessor,
 Blocks_Width_Preprocessor $blocks_width_preprocessor,
 Typography_Preprocessor $typography_preprocessor,
 Spacing_Preprocessor $spacing_preprocessor,
 Highlighting_Postprocessor $highlighting_postprocessor,
 Variables_Postprocessor $variables_postprocessor
 ) {
 $this->register_preprocessor( $cleanup_preprocessor );
 $this->register_preprocessor( $blocks_width_preprocessor );
 $this->register_preprocessor( $typography_preprocessor );
 $this->register_preprocessor( $spacing_preprocessor );
 $this->register_postprocessor( $highlighting_postprocessor );
 $this->register_postprocessor( $variables_postprocessor );
 }
 public function preprocess( array $parsed_blocks, array $layout, array $styles ): array {
 foreach ( $this->preprocessors as $preprocessor ) {
 $parsed_blocks = $preprocessor->preprocess( $parsed_blocks, $layout, $styles );
 }
 return $parsed_blocks;
 }
 public function postprocess( string $html ): string {
 foreach ( $this->postprocessors as $postprocessor ) {
 $html = $postprocessor->postprocess( $html );
 }
 return $html;
 }
 public function register_preprocessor( Preprocessor $preprocessor ): void {
 $this->preprocessors[] = $preprocessor;
 }
 public function register_postprocessor( Postprocessor $postprocessor ): void {
 $this->postprocessors[] = $postprocessor;
 }
}
