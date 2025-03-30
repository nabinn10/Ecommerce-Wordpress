<?php
namespace MailPoetVendor\Twig\Node\Expression\Filter;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Compiler;
use MailPoetVendor\Twig\Node\Expression\ConstantExpression;
use MailPoetVendor\Twig\Node\Expression\FilterExpression;
use MailPoetVendor\Twig\Node\Node;
class RawFilter extends FilterExpression
{
 public function __construct(Node $node, ?ConstantExpression $filterName = null, ?Node $arguments = null, int $lineno = 0, ?string $tag = null)
 {
 if (null === $filterName) {
 $filterName = new ConstantExpression('raw', $node->getTemplateLine());
 }
 if (null === $arguments) {
 $arguments = new Node();
 }
 parent::__construct($node, $filterName, $arguments, $lineno ?: $node->getTemplateLine(), $tag ?: $node->getNodeTag());
 }
 public function compile(Compiler $compiler) : void
 {
 $compiler->subcompile($this->getNode('node'));
 }
}
