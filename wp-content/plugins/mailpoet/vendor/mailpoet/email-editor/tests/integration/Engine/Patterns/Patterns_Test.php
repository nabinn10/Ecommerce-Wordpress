<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Patterns;
if (!defined('ABSPATH')) exit;
class Patterns_Test extends \MailPoetTest {
 private $patterns;
 public function _before() {
 parent::_before();
 $this->patterns = $this->di_container->get( Patterns::class );
 $this->cleanup_patterns();
 }
 public function testItRegistersPatternCategories() {
 $this->patterns->initialize();
 $categories = \WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();
 // phpcs:ignore
 $category = array_pop( $categories );
 $this->assertEquals( 'email-contents', $category['name'] );
 $this->assertEquals( 'Email Contents', $category['label'] );
 $this->assertEquals( 'A collection of email content layouts.', $category['description'] );
 }
 private function cleanup_patterns() {
 $categories_registry = \WP_Block_Pattern_Categories_Registry::get_instance();
 $categories = $categories_registry->get_all_registered();
 foreach ( $categories as $category ) {
 $categories_registry->unregister( $category['name'] );
 }
 }
}
