<?php
namespace MailPoetVendor\Symfony\Component\Translation\Test;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\PHPUnit\Framework\TestCase;
use MailPoetVendor\Psr\Log\LoggerInterface;
use MailPoetVendor\Symfony\Component\HttpClient\MockHttpClient;
use MailPoetVendor\Symfony\Component\Translation\Dumper\XliffFileDumper;
use MailPoetVendor\Symfony\Component\Translation\Exception\IncompleteDsnException;
use MailPoetVendor\Symfony\Component\Translation\Exception\UnsupportedSchemeException;
use MailPoetVendor\Symfony\Component\Translation\Loader\LoaderInterface;
use MailPoetVendor\Symfony\Component\Translation\Provider\Dsn;
use MailPoetVendor\Symfony\Component\Translation\Provider\ProviderFactoryInterface;
use MailPoetVendor\Symfony\Contracts\HttpClient\HttpClientInterface;
abstract class ProviderFactoryTestCase extends TestCase
{
 protected $client;
 protected $logger;
 protected $defaultLocale;
 protected $loader;
 protected $xliffFileDumper;
 public abstract function createFactory() : ProviderFactoryInterface;
 public static abstract function supportsProvider() : iterable;
 public static abstract function createProvider() : iterable;
 public static function unsupportedSchemeProvider() : iterable
 {
 return [];
 }
 public static function incompleteDsnProvider() : iterable
 {
 return [];
 }
 public function testSupports(bool $expected, string $dsn)
 {
 $factory = $this->createFactory();
 $this->assertSame($expected, $factory->supports(new Dsn($dsn)));
 }
 public function testCreate(string $expected, string $dsn)
 {
 $factory = $this->createFactory();
 $provider = $factory->create(new Dsn($dsn));
 $this->assertSame($expected, (string) $provider);
 }
 public function testUnsupportedSchemeException(string $dsn, ?string $message = null)
 {
 $factory = $this->createFactory();
 $dsn = new Dsn($dsn);
 $this->expectException(UnsupportedSchemeException::class);
 if (null !== $message) {
 $this->expectExceptionMessage($message);
 }
 $factory->create($dsn);
 }
 public function testIncompleteDsnException(string $dsn, ?string $message = null)
 {
 $factory = $this->createFactory();
 $dsn = new Dsn($dsn);
 $this->expectException(IncompleteDsnException::class);
 if (null !== $message) {
 $this->expectExceptionMessage($message);
 }
 $factory->create($dsn);
 }
 protected function getClient() : HttpClientInterface
 {
 return $this->client ?? ($this->client = new MockHttpClient());
 }
 protected function getLogger() : LoggerInterface
 {
 return $this->logger ?? ($this->logger = $this->createMock(LoggerInterface::class));
 }
 protected function getDefaultLocale() : string
 {
 return $this->defaultLocale ?? ($this->defaultLocale = 'en');
 }
 protected function getLoader() : LoaderInterface
 {
 return $this->loader ?? ($this->loader = $this->createMock(LoaderInterface::class));
 }
 protected function getXliffFileDumper() : XliffFileDumper
 {
 return $this->xliffFileDumper ?? ($this->xliffFileDumper = $this->createMock(XliffFileDumper::class));
 }
}
