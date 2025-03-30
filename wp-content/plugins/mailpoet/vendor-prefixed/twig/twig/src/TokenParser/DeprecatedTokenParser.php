<?php
namespace MailPoetVendor\Twig\TokenParser;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Error\SyntaxError;
use MailPoetVendor\Twig\Node\DeprecatedNode;
use MailPoetVendor\Twig\Node\Node;
use MailPoetVendor\Twig\Token;
final class DeprecatedTokenParser extends AbstractTokenParser
{
 public function parse(Token $token) : Node
 {
 $stream = $this->parser->getStream();
 $expressionParser = $this->parser->getExpressionParser();
 $expr = $expressionParser->parseExpression();
 $node = new DeprecatedNode($expr, $token->getLine(), $this->getTag());
 while ($stream->test(Token::NAME_TYPE)) {
 $k = $stream->getCurrent()->getValue();
 $stream->next();
 $stream->expect(Token::OPERATOR_TYPE, '=');
 switch ($k) {
 case 'package':
 $node->setNode('package', $expressionParser->parseExpression());
 break;
 case 'version':
 $node->setNode('version', $expressionParser->parseExpression());
 break;
 default:
 throw new SyntaxError(\sprintf('Unknown "%s" option.', $k), $stream->getCurrent()->getLine(), $stream->getSourceContext());
 }
 }
 $stream->expect(Token::BLOCK_END_TYPE);
 return $node;
 }
 public function getTag() : string
 {
 return 'deprecated';
 }
}
