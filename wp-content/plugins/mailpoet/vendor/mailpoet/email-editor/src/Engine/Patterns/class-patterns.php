<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Patterns;
if (!defined('ABSPATH')) exit;
class Patterns {
 public function initialize(): void {
 $this->register_block_pattern_categories();
 }
 private function register_block_pattern_categories(): void {
 $categories = array(
 array(
 'name' => 'email-contents',
 'label' => _x( 'Email Contents', 'Block pattern category', 'mailpoet' ),
 'description' => __( 'A collection of email content layouts.', 'mailpoet' ),
 ),
 );
 foreach ( $categories as $category ) {
 register_block_pattern_category(
 $category['name'],
 array(
 'label' => $category['label'],
 'description' => $category['description'] ?? '',
 )
 );
 }
 }
}
