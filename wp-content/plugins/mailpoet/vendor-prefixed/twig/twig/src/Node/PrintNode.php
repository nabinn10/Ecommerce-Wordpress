<?php
namespace MailPoetVendor\Twig\Node;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Attribute\YieldReady;
use MailPoetVendor\Twig\Compiler;
use MailPoetVendor\Twig\Node\Expression\AbstractExpression;
#[YieldReady]
class PrintNode extends Node implements NodeOutputInterface
{
 public function __construct(AbstractExpression $expr, int $lineno, ?string $tag = null)
 {
 parent::__construct(['expr' => $expr], [], $lineno, $tag);
 }
 public function compile(Compiler $compiler) : void
 {
 $expr = $this->getNode('expr');
 $compiler->addDebugInfo($this)->write($expr->isGenerator() ? 'yield from ' : 'yield ')->subcompile($expr)->raw(";\n");
 }
}
