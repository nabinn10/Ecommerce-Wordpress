<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Engine\PersonalizationTags\Personalization_Tag;
use MailPoet\EmailEditor\Engine\PersonalizationTags\Personalization_Tags_Registry;
use MailPoet\EmailEditor\Validator\Builder;
use WP_Post;
use WP_REST_Request;
use WP_REST_Response;
class Email_Api_Controller {
 private Personalization_Tags_Registry $personalization_tags_registry;
 public function __construct( Personalization_Tags_Registry $personalization_tags_registry ) {
 $this->personalization_tags_registry = $personalization_tags_registry;
 }
 public function get_email_data(): array {
 // Here comes code getting Email specific data that will be passed on 'email_data' attribute.
 return array();
 }
 public function save_email_data( array $data, WP_Post $email_post ): void {
 // Here comes code saving of Email specific data that will be passed on 'email_data' attribute.
 }
 public function send_preview_email_data( WP_REST_Request $request ): WP_REST_Response {
 $data = $request->get_params();
 try {
 $result = apply_filters( 'mailpoet_email_editor_send_preview_email', $data );
 return new WP_REST_Response(
 array(
 'success' => (bool) $result,
 'result' => $result,
 ),
 $result ? 200 : 400
 );
 } catch ( \Exception $exception ) {
 return new WP_REST_Response( array( 'error' => $exception->getMessage() ), 400 );
 }
 }
 public function get_personalization_tags(): WP_REST_Response {
 $tags = $this->personalization_tags_registry->get_all();
 return new WP_REST_Response(
 array(
 'success' => true,
 'result' => array_values(
 array_map(
 function ( Personalization_Tag $tag ) {
 return array(
 'name' => $tag->get_name(),
 'token' => $tag->get_token(),
 'category' => $tag->get_category(),
 'attributes' => $tag->get_attributes(),
 'valueToInsert' => $tag->get_value_to_insert(),
 );
 },
 $tags
 ),
 ),
 ),
 200
 );
 }
 public function get_email_data_schema(): array {
 return Builder::object()->to_array();
 }
}
