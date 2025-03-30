<?php declare(strict_types = 1);

namespace MailPoet\EmailEditor\Integrations\MailPoet;

if (!defined('ABSPATH')) exit;


class MailpoetCssInlinerFactory {
  public static function create(): MailPoetCssInliner {
    return new MailPoetCssInliner();
  }
}
