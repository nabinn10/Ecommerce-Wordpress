<?php
declare( strict_types = 1 );
namespace MailPoet\EmailEditor\Validator;
if (!defined('ABSPATH')) exit;
use MailPoet\EmailEditor\Validator\Schema\Any_Of_Schema;
use MailPoet\EmailEditor\Validator\Schema\Array_Schema;
use MailPoet\EmailEditor\Validator\Schema\Boolean_Schema;
use MailPoet\EmailEditor\Validator\Schema\Integer_Schema;
use MailPoet\EmailEditor\Validator\Schema\Null_Schema;
use MailPoet\EmailEditor\Validator\Schema\Number_Schema;
use MailPoet\EmailEditor\Validator\Schema\Object_Schema;
use MailPoet\EmailEditor\Validator\Schema\One_Of_Schema;
use MailPoet\EmailEditor\Validator\Schema\String_Schema;
class Builder {
 public static function string(): String_Schema {
 return new String_Schema();
 }
 public static function number(): Number_Schema {
 return new Number_Schema();
 }
 public static function integer(): Integer_Schema {
 return new Integer_Schema();
 }
 public static function boolean(): Boolean_Schema {
 return new Boolean_Schema();
 }
 public static function null(): Null_Schema {
 return new Null_Schema();
 }
 public static function array( Schema $items = null ): Array_Schema {
 $array = new Array_Schema();
 return $items ? $array->items( $items ) : $array;
 }
 public static function object( array $properties = null ): Object_Schema {
 $object = new Object_Schema();
 return null === $properties ? $object : $object->properties( $properties );
 }
 public static function one_of( array $schemas ): One_Of_Schema {
 return new One_Of_Schema( $schemas );
 }
 public static function any_of( array $schemas ): Any_Of_Schema {
 return new Any_Of_Schema( $schemas );
 }
}
