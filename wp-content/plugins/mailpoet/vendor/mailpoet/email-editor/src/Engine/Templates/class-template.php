<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Templates;
if (!defined('ABSPATH')) exit;
class Template {
 private string $plugin_uri;
 private string $slug;
 private string $name;
 private string $title;
 private string $description;
 private string $content;
 private array $post_types;
 public function __construct(
 string $plugin_uri,
 string $slug,
 string $title,
 string $description,
 string $content,
 array $post_types = array()
 ) {
 $this->plugin_uri = $plugin_uri;
 $this->slug = $slug;
 $this->name = "{$plugin_uri}//{$slug}"; // The template name is composed from the namespace and the slug.
 $this->title = $title;
 $this->description = $description;
 $this->content = $content;
 $this->post_types = $post_types;
 }
 public function get_pluginuri(): string {
 return $this->plugin_uri;
 }
 public function get_slug(): string {
 return $this->slug;
 }
 public function get_name(): string {
 return $this->name;
 }
 public function get_title(): string {
 return $this->title;
 }
 public function get_description(): string {
 return $this->description;
 }
 public function get_content(): string {
 return $this->content;
 }
 public function get_post_types(): array {
 return $this->post_types;
 }
}
