<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\PersonalizationTags\HTML_Tag_Processor;
use MailPoet\EmailEditor\Engine\PersonalizationTags\Personalization_Tags_Registry;
class Personalizer {
 private Personalization_Tags_Registry $tags_registry;
 private array $context;
 public function __construct( Personalization_Tags_Registry $tags_registry ) {
 $this->tags_registry = $tags_registry;
 $this->context = array();
 }
 public function set_context( array $context ) {
 $this->context = $context;
 }
 public function personalize_content( string $content ): string {
 $content_processor = new HTML_Tag_Processor( $content );
 while ( $content_processor->next_token() ) {
 if ( $content_processor->get_token_type() === '#comment' ) {
 $token = $this->parse_token( $content_processor->get_modifiable_text() );
 $tag = $this->tags_registry->get_by_token( $token['token'] );
 if ( ! $tag ) {
 continue;
 }
 $value = $tag->execute_callback( $this->context, $token['arguments'] );
 $content_processor->replace_token( $value );
 } elseif ( $content_processor->get_token_type() === '#tag' && $content_processor->get_tag() === 'TITLE' ) {
 // The title tag contains the subject of the email which should be personalized. HTML_Tag_Processor does parse the header tags.
 $title = $this->personalize_content( $content_processor->get_modifiable_text() );
 $content_processor->set_modifiable_text( $title );
 } elseif ( $content_processor->get_token_type() === '#tag' && $content_processor->get_tag() === 'A' && $content_processor->get_attribute( 'data-link-href' ) ) {
 // The anchor tag contains the data-link-href attribute which should be personalized.
 $href = $content_processor->get_attribute( 'data-link-href' );
 $token = $this->parse_token( $href );
 $tag = $this->tags_registry->get_by_token( $token['token'] );
 if ( ! $tag ) {
 continue;
 }
 $value = $tag->execute_callback( $this->context, $token['arguments'] );
 $value = $this->replace_link_href( $href, $tag->get_token(), $value );
 if ( $value ) {
 $content_processor->set_attribute( 'href', $value );
 $content_processor->remove_attribute( 'data-link-href' );
 $content_processor->remove_attribute( 'contenteditable' );
 }
 }
 }
 $content_processor->flush_updates();
 return $content_processor->get_updated_html();
 }
 private function parse_token( string $token ): array {
 $result = array(
 'token' => '',
 'arguments' => array(),
 );
 // Step 1: Separate the tag and attributes.
 if ( preg_match( '/^\[([a-zA-Z0-9\-\/]+)\s*(.*?)\]$/', trim( $token ), $matches ) ) {
 $result['token'] = "[{$matches[1]}]"; // The tag part (e.g., "[mailpoet/subscriber-firstname]").
 $attributes_string = $matches[2]; // The attributes part (e.g., 'default="subscriber"').
 // Step 2: Extract attributes from the attribute string.
 if ( preg_match_all( '/(\w+)=["\']([^"\']+)["\']/', $attributes_string, $attribute_matches, PREG_SET_ORDER ) ) {
 foreach ( $attribute_matches as $attribute ) {
 $result['arguments'][ $attribute[1] ] = $attribute[2];
 }
 }
 }
 return $result;
 }
 private function replace_link_href( string $content, string $token, string $replacement ) {
 // Escape the shortcode name for safe regex usage and strip the brackets.
 $escaped_shortcode = preg_quote( substr( $token, 1, strlen( $token ) - 2 ), '/' );
 // Create a regex pattern dynamically.
 $pattern = '/\[' . $escaped_shortcode . '(?:\s+[^\]]+)?\]/';
 return trim( (string) preg_replace( $pattern, $replacement, $content ) );
 }
}
