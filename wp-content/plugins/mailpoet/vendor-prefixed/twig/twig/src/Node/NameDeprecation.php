<?php
namespace MailPoetVendor\Twig\Node;
if (!defined('ABSPATH')) exit;
class NameDeprecation
{
 private $package;
 private $version;
 private $newName;
 public function __construct(string $package = '', string $version = '', string $newName = '')
 {
 $this->package = $package;
 $this->version = $version;
 $this->newName = $newName;
 }
 public function getPackage() : string
 {
 return $this->package;
 }
 public function getVersion() : string
 {
 return $this->version;
 }
 public function getNewName() : string
 {
 return $this->newName;
 }
}
