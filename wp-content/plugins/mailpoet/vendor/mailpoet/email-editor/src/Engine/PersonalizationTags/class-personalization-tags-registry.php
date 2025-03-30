<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\PersonalizationTags;
if (!defined('ABSPATH')) exit;
class Personalization_Tags_Registry {
 private $tags = array();
 public function initialize(): void {
 apply_filters( 'mailpoet_email_editor_register_personalization_tags', $this );
 }
 public function register( Personalization_Tag $tag ): void {
 if ( isset( $this->tags[ $tag->get_token() ] ) ) {
 return;
 }
 $this->tags[ $tag->get_token() ] = $tag;
 }
 public function get_by_token( string $token ): ?Personalization_Tag {
 return $this->tags[ $token ] ?? null;
 }
 public function get_all() {
 return $this->tags;
 }
}
