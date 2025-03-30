<?php
namespace MailPoet\EmailEditor\Engine\Renderer;
if (!defined('ABSPATH')) exit;
interface Css_Inliner {
 public function from_html( string $unprocessed_html ): self;
 public function inline_css( string $css = '' ): self;
 public function render(): string;
}
