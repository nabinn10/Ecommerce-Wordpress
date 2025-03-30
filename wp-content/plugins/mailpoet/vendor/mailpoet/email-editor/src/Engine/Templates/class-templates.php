<?php
declare(strict_types = 1);
namespace MailPoet\EmailEditor\Engine\Templates;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Builder;
use WP_Block_Template;
class Templates {
 private string $template_prefix = 'mailpoet';
 private array $post_types = array();
 private string $template_directory = __DIR__ . DIRECTORY_SEPARATOR;
 private Templates_Registry $templates_registry;
 public function __construct( Templates_Registry $templates_registry ) {
 $this->templates_registry = $templates_registry;
 }
 public function initialize( array $post_types ): void {
 $this->post_types = $post_types;
 add_filter( 'theme_templates', array( $this, 'add_theme_templates' ), 10, 4 ); // Workaround needed when saving post – template association.
 add_filter( 'mailpoet_email_editor_register_templates', array( $this, 'register_templates' ) );
 $this->templates_registry->initialize();
 $this->register_post_types_to_api();
 }
 public function get_block_template( $template_slug ) {
 // Template id is always prefixed by active theme and get_stylesheet returns the active theme slug.
 $template_id = get_stylesheet() . '//' . $template_slug;
 return get_block_template( $template_id );
 }
 public function register_templates( Templates_Registry $templates_registry ): Templates_Registry {
 // Register basic blank template.
 $general_email_slug = 'email-general';
 $template_filename = $general_email_slug . '.html';
 $general_email = new Template(
 $this->template_prefix,
 $general_email_slug,
 __( 'General Email', 'mailpoet' ),
 __( 'A general template for emails.', 'mailpoet' ),
 (string) file_get_contents( $this->template_directory . $template_filename ),
 $this->post_types
 );
 $templates_registry->register( $general_email );
 return $templates_registry;
 }
 public function register_post_types_to_api(): void {
 $controller = new \WP_REST_Templates_Controller( 'wp_template' );
 $schema = $controller->get_item_schema();
 // Future compatibility check if the post_types property is already registered.
 if ( isset( $schema['properties']['post_types'] ) ) {
 return;
 }
 register_rest_field(
 'wp_template',
 'post_types',
 array(
 'get_callback' => array( $this, 'get_post_types' ),
 'update_callback' => null,
 'schema' => Builder::string()->to_array(),
 )
 );
 }
 public function get_post_types( $response_object ): array {
 $template = $this->templates_registry->get_by_slug( $response_object['slug'] ?? '' );
 if ( $template ) {
 return $template->get_post_types();
 }
 return $response_object['post_types'] ?? array();
 }
 public function add_theme_templates( $templates, $theme, $post, $post_type ) {
 if ( $post_type && ! in_array( $post_type, $this->post_types, true ) ) {
 return $templates;
 }
 $block_templates = get_block_templates();
 foreach ( $block_templates as $block_template ) {
 // Ideally we could check for supported post_types but there seems to be a bug and once a template has some edits and is stored in DB
 // the core returns null for post_types.
 if ( $block_template->plugin !== $this->template_prefix ) {
 continue;
 }
 $templates[ $block_template->slug ] = $block_template;
 }
 return $templates;
 }
}
