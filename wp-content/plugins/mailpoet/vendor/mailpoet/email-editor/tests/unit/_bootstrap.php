<?php
declare(strict_types = 1);
if (!defined('ABSPATH')) exit;
require_once __DIR__ . '/../../vendor/autoload.php';
$console = new \Codeception\Lib\Console\Output( array() );
if ( ! function_exists( 'register_block_template' ) ) {
 function register_block_template( $name, $attr ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
 return $name;
 }
}
if ( ! function_exists( 'esc_attr' ) ) {
 function esc_attr( $attr ) {
 return $attr;
 }
}
if ( ! function_exists( 'esc_html' ) ) {
 function esc_html( $text ) {
 return $text;
 }
}
if ( ! function_exists( 'add_filter' ) ) {
 function add_filter( $tag, $callback, $priority = 10, $accepted_args = 1 ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
 global $wp_filters;
 if ( ! isset( $wp_filters ) ) {
 $wp_filters = array();
 }
 $wp_filters[ $tag ][] = $callback;
 return true;
 }
}
if ( ! function_exists( 'apply_filters' ) ) {
 function apply_filters( $tag, $value, ...$args ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
 global $wp_filters;
 if ( isset( $wp_filters[ $tag ] ) ) {
 foreach ( $wp_filters[ $tag ] as $callback ) {
 $value = call_user_func( $callback, $value );
 }
 }
 return $value;
 }
}
abstract class MailPoetUnitTest extends \Codeception\TestCase\Test {
 protected $runTestInSeparateProcess = false; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.PropertyNotSnakeCase
 protected $preserveGlobalState = false; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.PropertyNotSnakeCase
}
require '_stubs.php';
