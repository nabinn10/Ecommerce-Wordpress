<?php declare(strict_types = 1);

namespace MailPoet\Doctrine\Middlewares;

if (!defined('ABSPATH')) exit;


use MailPoetVendor\Doctrine\DBAL\Driver\Connection;
use MailPoetVendor\Doctrine\DBAL\Driver\Middleware\AbstractDriverMiddleware;

class PostConnectMiddleware extends AbstractDriverMiddleware {
  public function connect(array $params): Connection {
    $connection = parent::connect($params);
    $connection->exec('SET time_zone = "+00:00"');
    return $connection;
  }
}
