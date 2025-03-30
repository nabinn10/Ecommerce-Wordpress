<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Renderer\ContentRenderer;
if (!defined('ABSPATH')) exit;
use WP_Block_Parser;
class Blocks_Parser extends WP_Block_Parser {
 public $output;
 public function parse( $document ) {
 parent::parse( $document );
 return apply_filters( 'mailpoet_blocks_renderer_parsed_blocks', $this->output );
 }
}
