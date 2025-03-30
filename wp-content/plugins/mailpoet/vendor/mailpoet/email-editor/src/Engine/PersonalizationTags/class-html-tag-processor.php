<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\PersonalizationTags;
if (!defined('ABSPATH')) exit;
use WP_HTML_Tag_Processor;
use WP_HTML_Text_Replacement;
class HTML_Tag_Processor extends WP_HTML_Tag_Processor {
 private $deferred_updates = array();
 public function replace_token( string $new_content ): void {
 $this->set_bookmark( 'here' );
 $here = $this->bookmarks['here'];
 $this->deferred_updates[] = new WP_HTML_Text_Replacement(
 $here->start,
 $here->length,
 $new_content
 );
 }
 public function flush_updates(): void {
 foreach ( $this->deferred_updates as $key => $update ) {
 $this->lexical_updates[] = $update;
 unset( $this->deferred_updates[ $key ] );
 }
 }
}
