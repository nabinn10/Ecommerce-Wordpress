<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator\Schema;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema;
class Null_Schema extends Schema {
 protected $schema = array(
 'type' => 'null',
 );
}
