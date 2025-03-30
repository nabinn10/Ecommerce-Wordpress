<?php
namespace MailPoetVendor\Symfony\Component\Translation\Util;
if (!defined('ABSPATH')) exit;
class ArrayConverter
{
 public static function expandToTree(array $messages)
 {
 $tree = [];
 foreach ($messages as $id => $value) {
 $referenceToElement =& self::getElementByPath($tree, self::getKeyParts($id));
 $referenceToElement = $value;
 unset($referenceToElement);
 }
 return $tree;
 }
 private static function &getElementByPath(array &$tree, array $parts)
 {
 $elem =& $tree;
 $parentOfElem = null;
 foreach ($parts as $i => $part) {
 if (isset($elem[$part]) && \is_string($elem[$part])) {
 $elem =& $elem[\implode('.', \array_slice($parts, $i))];
 break;
 }
 $parentOfElem =& $elem;
 $elem =& $elem[$part];
 }
 if ($elem && \is_array($elem) && $parentOfElem) {
 self::cancelExpand($parentOfElem, $part, $elem);
 }
 return $elem;
 }
 private static function cancelExpand(array &$tree, string $prefix, array $node)
 {
 $prefix .= '.';
 foreach ($node as $id => $value) {
 if (\is_string($value)) {
 $tree[$prefix . $id] = $value;
 } else {
 self::cancelExpand($tree, $prefix . $id, $value);
 }
 }
 }
 private static function getKeyParts(string $key) : array
 {
 $parts = \explode('.', $key);
 $partsCount = \count($parts);
 $result = [];
 $buffer = '';
 foreach ($parts as $index => $part) {
 if (0 === $index && '' === $part) {
 $buffer = '.';
 continue;
 }
 if ($index === $partsCount - 1 && '' === $part) {
 $buffer .= '.';
 $result[] = $buffer;
 continue;
 }
 if (isset($parts[$index + 1]) && '' === $parts[$index + 1]) {
 $buffer .= $part;
 continue;
 }
 if ($buffer) {
 $result[] = $buffer . $part;
 $buffer = '';
 continue;
 }
 $result[] = $part;
 }
 return $result;
 }
}
