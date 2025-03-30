<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator\Schema;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema;
class Boolean_Schema extends Schema {
 protected $schema = array(
 'type' => 'boolean',
 );
}
