<?php declare(strict_types = 1);

namespace MailPoet\Doctrine\WPDB;

if (!defined('ABSPATH')) exit;


use MailPoetVendor\Doctrine\DBAL\Driver\AbstractMySQLDriver;

class Driver extends AbstractMySQLDriver {
  public function connect(array $params): Connection {
    return new Connection();
  }
}
