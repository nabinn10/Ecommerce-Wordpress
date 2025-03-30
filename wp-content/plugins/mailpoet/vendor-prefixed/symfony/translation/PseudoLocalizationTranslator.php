<?php
namespace MailPoetVendor\Symfony\Component\Translation;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Contracts\Translation\TranslatorInterface;
final class PseudoLocalizationTranslator implements TranslatorInterface
{
 private const EXPANSION_CHARACTER = '~';
 private $translator;
 private $accents;
 private $expansionFactor;
 private $brackets;
 private $parseHTML;
 private $localizableHTMLAttributes;
 public function __construct(TranslatorInterface $translator, array $options = [])
 {
 $this->translator = $translator;
 $this->accents = $options['accents'] ?? \true;
 if (1.0 > ($this->expansionFactor = $options['expansion_factor'] ?? 1.0)) {
 throw new \InvalidArgumentException('The expansion factor must be greater than or equal to 1.');
 }
 $this->brackets = $options['brackets'] ?? \true;
 $this->parseHTML = $options['parse_html'] ?? \false;
 if ($this->parseHTML && !$this->accents && 1.0 === $this->expansionFactor) {
 $this->parseHTML = \false;
 }
 $this->localizableHTMLAttributes = $options['localizable_html_attributes'] ?? [];
 }
 public function trans(string $id, array $parameters = [], ?string $domain = null, ?string $locale = null) : string
 {
 $trans = '';
 $visibleText = '';
 foreach ($this->getParts($this->translator->trans($id, $parameters, $domain, $locale)) as [$visible, $localizable, $text]) {
 if ($visible) {
 $visibleText .= $text;
 }
 if (!$localizable) {
 $trans .= $text;
 continue;
 }
 $this->addAccents($trans, $text);
 }
 $this->expand($trans, $visibleText);
 $this->addBrackets($trans);
 return $trans;
 }
 public function getLocale() : string
 {
 return $this->translator->getLocale();
 }
 private function getParts(string $originalTrans) : array
 {
 if (!$this->parseHTML) {
 return [[\true, \true, $originalTrans]];
 }
 $html = \mb_encode_numericentity($originalTrans, [0x80, 0x10ffff, 0, 0x1fffff], \mb_detect_encoding($originalTrans, null, \true) ?: 'UTF-8');
 $useInternalErrors = \libxml_use_internal_errors(\true);
 $dom = new \DOMDocument();
 $dom->loadHTML('<trans>' . $html . '</trans>');
 \libxml_clear_errors();
 \libxml_use_internal_errors($useInternalErrors);
 return $this->parseNode($dom->childNodes->item(1)->childNodes->item(0)->childNodes->item(0));
 }
 private function parseNode(\DOMNode $node) : array
 {
 $parts = [];
 foreach ($node->childNodes as $childNode) {
 if (!$childNode instanceof \DOMElement) {
 $parts[] = [\true, \true, $childNode->nodeValue];
 continue;
 }
 $parts[] = [\false, \false, '<' . $childNode->tagName];
 foreach ($childNode->attributes as $attribute) {
 $parts[] = [\false, \false, ' ' . $attribute->nodeName . '="'];
 $localizableAttribute = \in_array($attribute->nodeName, $this->localizableHTMLAttributes, \true);
 foreach (\preg_split('/(&(?:amp|quot|#039|lt|gt);+)/', \htmlspecialchars($attribute->nodeValue, \ENT_QUOTES, 'UTF-8'), -1, \PREG_SPLIT_DELIM_CAPTURE) as $i => $match) {
 if ('' === $match) {
 continue;
 }
 $parts[] = [\false, $localizableAttribute && 0 === $i % 2, $match];
 }
 $parts[] = [\false, \false, '"'];
 }
 $parts[] = [\false, \false, '>'];
 $parts = \array_merge($parts, $this->parseNode($childNode, $parts));
 $parts[] = [\false, \false, '</' . $childNode->tagName . '>'];
 }
 return $parts;
 }
 private function addAccents(string &$trans, string $text) : void
 {
 $trans .= $this->accents ? \strtr($text, [' ' => ' ', '!' => '¡', '"' => '″', '#' => '♯', '$' => '€', '%' => '‰', '&' => '⅋', '\'' => '´', '(' => '{', ')' => '}', '*' => '⁎', '+' => '⁺', ',' => '،', '-' => '‐', '.' => '·', '/' => '⁄', '0' => '⓪', '1' => '①', '2' => '②', '3' => '③', '4' => '④', '5' => '⑤', '6' => '⑥', '7' => '⑦', '8' => '⑧', '9' => '⑨', ':' => '∶', ';' => '⁏', '<' => '≤', '=' => '≂', '>' => '≥', '?' => '¿', '@' => '՞', 'A' => 'Å', 'B' => 'Ɓ', 'C' => 'Ç', 'D' => 'Ð', 'E' => 'É', 'F' => 'Ƒ', 'G' => 'Ĝ', 'H' => 'Ĥ', 'I' => 'Î', 'J' => 'Ĵ', 'K' => 'Ķ', 'L' => 'Ļ', 'M' => 'Ṁ', 'N' => 'Ñ', 'O' => 'Ö', 'P' => 'Þ', 'Q' => 'Ǫ', 'R' => 'Ŕ', 'S' => 'Š', 'T' => 'Ţ', 'U' => 'Û', 'V' => 'Ṽ', 'W' => 'Ŵ', 'X' => 'Ẋ', 'Y' => 'Ý', 'Z' => 'Ž', '[' => '⁅', '\\' => '∖', ']' => '⁆', '^' => '˄', '_' => '‿', '`' => '‵', 'a' => 'å', 'b' => 'ƀ', 'c' => 'ç', 'd' => 'ð', 'e' => 'é', 'f' => 'ƒ', 'g' => 'ĝ', 'h' => 'ĥ', 'i' => 'î', 'j' => 'ĵ', 'k' => 'ķ', 'l' => 'ļ', 'm' => 'ɱ', 'n' => 'ñ', 'o' => 'ö', 'p' => 'þ', 'q' => 'ǫ', 'r' => 'ŕ', 's' => 'š', 't' => 'ţ', 'u' => 'û', 'v' => 'ṽ', 'w' => 'ŵ', 'x' => 'ẋ', 'y' => 'ý', 'z' => 'ž', '{' => '(', '|' => '¦', '}' => ')', '~' => '˞']) : $text;
 }
 private function expand(string &$trans, string $visibleText) : void
 {
 if (1.0 >= $this->expansionFactor) {
 return;
 }
 $visibleLength = $this->strlen($visibleText);
 $missingLength = (int) \ceil($visibleLength * $this->expansionFactor) - $visibleLength;
 if ($this->brackets) {
 $missingLength -= 2;
 }
 if (0 >= $missingLength) {
 return;
 }
 $words = [];
 $wordsCount = 0;
 foreach (\preg_split('/ +/', $visibleText, -1, \PREG_SPLIT_NO_EMPTY) as $word) {
 $wordLength = $this->strlen($word);
 if ($wordLength >= $missingLength) {
 continue;
 }
 if (!isset($words[$wordLength])) {
 $words[$wordLength] = 0;
 }
 ++$words[$wordLength];
 ++$wordsCount;
 }
 if (!$words) {
 $trans .= 1 === $missingLength ? self::EXPANSION_CHARACTER : ' ' . \str_repeat(self::EXPANSION_CHARACTER, $missingLength - 1);
 return;
 }
 \arsort($words, \SORT_NUMERIC);
 $longestWordLength = \max(\array_keys($words));
 while (\true) {
 $r = \mt_rand(1, $wordsCount);
 foreach ($words as $length => $count) {
 $r -= $count;
 if ($r <= 0) {
 break;
 }
 }
 $trans .= ' ' . \str_repeat(self::EXPANSION_CHARACTER, $length);
 $missingLength -= $length + 1;
 if (0 === $missingLength) {
 return;
 }
 while ($longestWordLength >= $missingLength) {
 $wordsCount -= $words[$longestWordLength];
 unset($words[$longestWordLength]);
 if (!$words) {
 $trans .= 1 === $missingLength ? self::EXPANSION_CHARACTER : ' ' . \str_repeat(self::EXPANSION_CHARACTER, $missingLength - 1);
 return;
 }
 $longestWordLength = \max(\array_keys($words));
 }
 }
 }
 private function addBrackets(string &$trans) : void
 {
 if (!$this->brackets) {
 return;
 }
 $trans = '[' . $trans . ']';
 }
 private function strlen(string $s) : int
 {
 return \false === ($encoding = \mb_detect_encoding($s, null, \true)) ? \strlen($s) : \mb_strlen($s, $encoding);
 }
}
