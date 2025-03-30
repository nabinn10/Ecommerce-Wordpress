<?php

if (!defined('ABSPATH')) exit;


use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Extension\CoreExtension;
use MailPoetVendor\Twig\Extension\SandboxExtension;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* woocommerce/settings_overlay.html */
class __TwigTemplate_c96deca159bff652d060c28604f142c91e89f1bcbd66cfad37714d1bb440dcae extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        yield "<style>
  /* Hide WooCommerce section with template styling */
  .wc-settings-email-color-palette-header,
  .wc-settings-email-color-palette-header + .form-table,
  .wc-settings-email-color-palette-title,
  .wc-settings-email-color-palette-buttons,
  .wc-settings-email-color-palette-buttons + .form-table,
  #email_template_options-description,
  #email_template_options-description + .form-table {
    opacity: 0.1;
    pointer-events: none;
  }

  /* Used as an anchor for the overlay */
  .mailpoet-woocommerce-email-overlay-container {
    position: relative;
  }

  /* Position MailPoet buttons over hidden table */
  .mailpoet-woocommerce-email-overlay {
    left: 0;
    max-width: 100%;
    text-align: left;
    position: absolute;
    text-align: center;
    top: 200px;
    width: 640px;
    z-index: 1;
  }
</style>

<div class=\"mailpoet-woocommerce-email-overlay-container\">
  <div class=\"mailpoet-woocommerce-email-overlay\">
    <a class=\"button button-primary\"
      href=\"?page=mailpoet-newsletter-editor&id=";
        // line 35
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape(($context["woocommerce_template_id"] ?? null), "html", null, true);
        yield "\"
      data-automation-id=\"mailpoet_woocommerce_customize\"
    >
      ";
        // line 38
        yield $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Customize with MailPoet", "Button in WooCommerce settings page");
        yield "
    </a>
    <br>
    <br>
    <a href=\"?page=mailpoet-settings#woocommerce\" data-automation-id=\"mailpoet_woocommerce_disable\">
      ";
        // line 43
        yield $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Disable MailPoet customizer", "Link from WooCommerce plugin to MailPoet");
        yield "
    </a>
  </div>
</div>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "woocommerce/settings_overlay.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  88 => 43,  80 => 38,  74 => 35,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "woocommerce/settings_overlay.html", "/home/circleci/mailpoet/mailpoet/views/woocommerce/settings_overlay.html");
    }
}
