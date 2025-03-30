<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Patterns;
if (!defined('ABSPATH')) exit;
abstract class Abstract_Pattern {
 protected $name = '';
 protected $namespace = '';
 protected $block_types = array();
 protected $template_types = array();
 protected $inserter = true;
 protected $source = 'plugin';
 protected $categories = array();
 protected $viewport_width = 620;
 public function get_name(): string {
 return $this->name;
 }
 public function get_namespace(): string {
 return $this->namespace;
 }
 public function get_properties(): array {
 return array(
 'title' => $this->get_title(),
 'content' => $this->get_content(),
 'description' => $this->get_description(),
 'categories' => $this->categories,
 'inserter' => $this->inserter,
 'blockTypes' => $this->block_types,
 'templateTypes' => $this->template_types,
 'source' => $this->source,
 'viewportWidth' => $this->viewport_width,
 );
 }
 abstract protected function get_content(): string;
 abstract protected function get_title(): string;
 protected function get_description(): string {
 return '';
 }
}
