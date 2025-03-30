<?php
namespace MailPoetVendor\Twig\Node;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Attribute\YieldReady;
use MailPoetVendor\Twig\Compiler;
use MailPoetVendor\Twig\Node\Expression\AbstractExpression;
use MailPoetVendor\Twig\Node\Expression\ConstantExpression;
#[YieldReady]
class DeprecatedNode extends Node
{
 public function __construct(AbstractExpression $expr, int $lineno, ?string $tag = null)
 {
 parent::__construct(['expr' => $expr], [], $lineno, $tag);
 }
 public function compile(Compiler $compiler) : void
 {
 $compiler->addDebugInfo($this);
 $expr = $this->getNode('expr');
 if (!$expr instanceof ConstantExpression) {
 $varName = $compiler->getVarName();
 $compiler->write(\sprintf('$%s = ', $varName))->subcompile($expr)->raw(";\n");
 }
 $compiler->write('trigger_deprecation(');
 if ($this->hasNode('package')) {
 $compiler->subcompile($this->getNode('package'));
 } else {
 $compiler->raw("''");
 }
 $compiler->raw(', ');
 if ($this->hasNode('version')) {
 $compiler->subcompile($this->getNode('version'));
 } else {
 $compiler->raw("''");
 }
 $compiler->raw(', ');
 if ($expr instanceof ConstantExpression) {
 $compiler->subcompile($expr);
 } else {
 $compiler->write(\sprintf('$%s', $varName));
 }
 $compiler->raw(".")->string(\sprintf(' in "%s" at line %d.', $this->getTemplateName(), $this->getTemplateLine()))->raw(");\n");
 }
}
