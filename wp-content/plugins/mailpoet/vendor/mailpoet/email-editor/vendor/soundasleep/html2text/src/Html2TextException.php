<?php
namespace Soundasleep;
if (!defined('ABSPATH')) exit;
class Html2TextException extends \Exception {
 public $more_info;
 public function __construct(string $message = "", string $more_info = "") {
 parent::__construct($message);
 $this->more_info = $more_info;
 }
}
