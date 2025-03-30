<?php
namespace MailPoetVendor\Symfony\Component\Translation\Test;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\PHPUnit\Framework\TestCase;
use MailPoetVendor\Psr\Log\LoggerInterface;
use MailPoetVendor\Symfony\Component\HttpClient\MockHttpClient;
use MailPoetVendor\Symfony\Component\Translation\Dumper\XliffFileDumper;
use MailPoetVendor\Symfony\Component\Translation\Loader\LoaderInterface;
use MailPoetVendor\Symfony\Component\Translation\Provider\ProviderInterface;
use MailPoetVendor\Symfony\Contracts\HttpClient\HttpClientInterface;
abstract class ProviderTestCase extends TestCase
{
 protected $client;
 protected $logger;
 protected $defaultLocale;
 protected $loader;
 protected $xliffFileDumper;
 public static abstract function createProvider(HttpClientInterface $client, LoaderInterface $loader, LoggerInterface $logger, string $defaultLocale, string $endpoint) : ProviderInterface;
 public static abstract function toStringProvider() : iterable;
 public function testToString(ProviderInterface $provider, string $expected)
 {
 $this->assertSame($expected, (string) $provider);
 }
 protected function getClient() : MockHttpClient
 {
 return $this->client ?? ($this->client = new MockHttpClient());
 }
 protected function getLoader() : LoaderInterface
 {
 return $this->loader ?? ($this->loader = $this->createMock(LoaderInterface::class));
 }
 protected function getLogger() : LoggerInterface
 {
 return $this->logger ?? ($this->logger = $this->createMock(LoggerInterface::class));
 }
 protected function getDefaultLocale() : string
 {
 return $this->defaultLocale ?? ($this->defaultLocale = 'en');
 }
 protected function getXliffFileDumper() : XliffFileDumper
 {
 return $this->xliffFileDumper ?? ($this->xliffFileDumper = $this->createMock(XliffFileDumper::class));
 }
}
