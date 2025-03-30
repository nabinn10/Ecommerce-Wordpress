<?php
namespace MailPoetVendor\Twig\Node;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Attribute\YieldReady;
use MailPoetVendor\Twig\Compiler;
#[YieldReady]
class CheckSecurityCallNode extends Node
{
 public function compile(Compiler $compiler)
 {
 $compiler->write("\$this->sandbox = \$this->extensions[SandboxExtension::class];\n")->write("\$this->checkSecurity();\n");
 }
}
