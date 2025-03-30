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

/* newsletter/templates/components/sidebar/styles.hbs */
class __TwigTemplate_e73b2cb637db2bcb6f40e724fb0d13365d1675cbb501f971890ea259b1a77054 extends Template
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
        yield "<div class=\"handlediv\" title=\"";
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Click to toggle");
        yield "\"><br></div>
<h3>";
        // line 2
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Styles");
        yield "</h3>
<div class=\"mailpoet_region_content\">
    <form id=\"mailpoet_newsletter_styles\" class=\"mailpoet_newsletter_styles\" action=\"\" method=\"post\" accept-charset=\"utf-8\">
        <div id='mailpoet_brand_styles'></div>
        {{#if isWoocommerceTransactional}}
            <div class=\"mailpoet_form_field\">
                <span>
                    <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"wc-branding-color\" value=\"{{ model.woocommerce.brandingColor }}\" id=\"mailpoet_wc_branding_color\"></span>
                </span>";
        // line 10
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Branding color");
        yield "
            </div>
            <hr />
        {{/if}}
        <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
            <label for=\"mailpoet_text_font_family\">
                {{#if isWoocommerceTransactional}}
                    ";
        // line 17
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Text font styles");
        yield "
                {{else}}
                    ";
        // line 19
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Text");
        yield "
                {{/if}}
            </label>
            <span>
                <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"text-color\" value=\"{{ model.text.fontColor }}\" id=\"mailpoet_text_font_color\"></span>
            </span>
            <select id=\"mailpoet_text_font_family\" name=\"text-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
            <optgroup label=\"";
        // line 26
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Standard fonts");
        yield "\">
            {{#each availableStyles.fonts.standard}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.text.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </optgroup>
            {{#if availableStyles.fonts.custom.length}}
            <optgroup label=\"";
        // line 32
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Custom fonts");
        yield "\">
            {{#each availableStyles.fonts.custom}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.text.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </optgroup>
            {{/if}}
            </select>
            <select id=\"mailpoet_text_font_size\" name=\"text-size\" class=\"mailpoet_font_size mailpoet_select mailpoet_select_small\">
            {{#each availableStyles.textSizes}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.text.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </select>
        </div>
        {{#if isWoocommerceTransactional}}
            <hr />
            <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
                <label for=\"mailpoet_text_font_size\">
                    ";
        // line 49
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Heading font styles");
        yield "
                </label>
                <span>
                    <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"woocommerce-content-heading-color\" value=\"{{ model.woocommerce.contentHeadingFontColor }}\" id=\"mailpoet_wc_content_heading_font_color\"></span>
                </span>
                <select id=\"mailpoet_wc_heading_font_family\" name=\"woo-heading-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
                    <optgroup label=\"";
        // line 55
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Standard fonts");
        yield "\">
                    {{#each availableStyles.fonts.standard}}
                        <option value=\"{{ this }}\" {{#ifCond this '==' ../model.woocommerce.headingFontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
                    {{/each}}
                    </optgroup>
                    {{#if availableStyles.fonts.custom.length}}
                    <optgroup label=\"";
        // line 61
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Custom fonts");
        yield "\">
                    {{#each availableStyles.fonts.custom}}
                        <option value=\"{{ this }}\" {{#ifCond this '==' ../model.woocommerce.headingFontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
                    {{/each}}
                    </optgroup>
                    {{/if}}
                </select>
            </div>
        {{/if}}
        <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
            <label for=\"mailpoet_h1_font_size\">
                ";
        // line 72
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Heading 1");
        yield "
            </label>
            {{#unless isWoocommerceTransactional}}
                <span>
                    <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"h1-color\" value=\"{{ model.h1.fontColor }}\" id=\"mailpoet_h1_font_color\"></span>
                </span>
                <select id=\"mailpoet_h1_font_family\" name=\"h1-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
                <optgroup label=\"";
        // line 79
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Standard fonts");
        yield "\">
                {{#each availableStyles.fonts.standard}}
                    <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h1.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
                {{/each}}
                </optgroup>
                {{#if availableStyles.fonts.custom.length}}
                <optgroup label=\"";
        // line 85
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Custom fonts");
        yield "\">
                {{#each availableStyles.fonts.custom}}
                    <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h1.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
                {{/each}}
                </optgroup>
                {{/if}}
                </select>
            {{/unless}}
            <select id=\"mailpoet_h1_font_size\" name=\"h1-size\" class=\"mailpoet_font_size mailpoet_select mailpoet_select_small\">
            {{#each availableStyles.headingSizes}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h1.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </select>
        </div>
        <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
            <label for=\"mailpoet_h2_font_size\">
                ";
        // line 101
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Heading 2");
        yield "
            </label>
            {{#unless isWoocommerceTransactional}}
                <span>
                    <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"h2-color\" value=\"{{ model.h2.fontColor }}\" id=\"mailpoet_h2_font_color\"></span>
                </span>
                <select id=\"mailpoet_h2_font_family\" name=\"h2-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
                <optgroup label=\"";
        // line 108
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Standard fonts");
        yield "\">
                {{#each availableStyles.fonts.standard}}
                    <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h2.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
                {{/each}}
                </optgroup>
                {{#if availableStyles.fonts.custom.length}}
                <optgroup label=\"";
        // line 114
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Custom fonts");
        yield "\">
                {{#each availableStyles.fonts.custom}}
                    <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h2.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
                {{/each}}
                </optgroup>
                {{/if}}
                </select>
            {{/unless}}
            <select id=\"mailpoet_h2_font_size\" name=\"h2-size\" class=\"mailpoet_font_size mailpoet_select mailpoet_select_small\">
            {{#each availableStyles.headingSizes}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h2.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </select>
        </div>
        <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
            <label for=\"mailpoet_h3_font_size\">
                ";
        // line 130
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Heading 3");
        yield "
            </label>
            {{#unless isWoocommerceTransactional}}
                <span>
                    <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"h3-color\" value=\"{{ model.h3.fontColor }}\" id=\"mailpoet_h3_font_color\"></span>
                </span>
                <select id=\"mailpoet_h3_font_family\" name=\"h3-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
                <optgroup label=\"";
        // line 137
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Standard fonts");
        yield "\">
                {{#each availableStyles.fonts.standard}}
                    <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h3.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
                {{/each}}
                </optgroup>
                {{#if availableStyles.fonts.custom.length}}
                <optgroup label=\"";
        // line 143
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Custom fonts");
        yield "\">
                {{#each availableStyles.fonts.custom}}
                    <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h3.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
                {{/each}}
                </optgroup>
                {{/if}}
                </select>
            {{/unless}}
            <select id=\"mailpoet_h3_font_size\" name=\"h3-size\" class=\"mailpoet_font_size mailpoet_select mailpoet_select_small\">
            {{#each availableStyles.headingSizes}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h3.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </select>
        </div>
        {{#unless isWoocommerceTransactional}}
          <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
            <label>
                ";
        // line 160
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Links");
        yield "
            </label>
            <span>
               <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"link-color\" value=\"{{ model.link.fontColor }}\" id=\"mailpoet_a_font_color\"></span>
            </span><input type=\"checkbox\" name=\"underline\" value=\"underline\" id=\"mailpoet_a_font_underline\" {{#ifCond model.link.textDecoration '==' 'underline'}}CHECKED{{/ifCond}} class=\"mailpoet_option_offset_left_small\"/> ";
        // line 164
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Underline");
        yield "</label>
          </div>
          <hr />
          <div class=\"mailpoet_form_field\">
              <label for=\"mailpoet_text_line_height\">
                  ";
        // line 169
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Text line height");
        yield "
              </label>
              <select id=\"mailpoet_text_line_height\" name=\"text-line-height\">
              {{#each availableStyles.lineHeights}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.text.lineHeight}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </select>

          </div>
          <div class=\"mailpoet_form_field\">
              <label for=\"mailpoet_heading_line_height\">
                  ";
        // line 180
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Heading line height");
        yield "
              </label>
              <select id=\"mailpoet_heading_line_height\" name=\"heading-line-height\">
              {{#each availableStyles.lineHeights}}
                  {{!-- Checking against h1 only since all headings have the same line height value. --}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h1.lineHeight}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </select>
          </div>
        {{/unless}}
        <hr />
        <div class=\"mailpoet_form_field\">
            <span>
                <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"newsletter-color\" value=\"{{ model.wrapper.backgroundColor }}\" id=\"mailpoet_newsletter_background_color\"></span>
            </span>";
        // line 194
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Content background");
        yield "
        </div>
        <div class=\"mailpoet_form_field\">
            <span>
                <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"background-color\" value=\"{{ model.body.backgroundColor }}\" id=\"mailpoet_background_color\"></span>
            </span>";
        // line 199
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Global background");
        yield "
        </div>
    </form>
    <p class=\"mailpoet_settings_notice\">";
        // line 202
        yield MailPoet\Util\Helpers::replaceLinkTags($this->extensions['MailPoet\Twig\I18n']->translate("If an email client [link]does not support a custom web font[/link], a similar standard font will be used instead."), "https://kb.mailpoet.com/article/176-which-fonts-can-be-used-in-mailpoet#custom-web-fonts", ["target" => "_blank"]);
        yield "</p>
</div>
<script type=\"text/javascript\">
    fontsSelect('.mailpoet_font_family.mailpoet_select');
</script>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "newsletter/templates/components/sidebar/styles.hbs";
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
        return array (  315 => 202,  309 => 199,  301 => 194,  284 => 180,  270 => 169,  262 => 164,  255 => 160,  235 => 143,  226 => 137,  216 => 130,  197 => 114,  188 => 108,  178 => 101,  159 => 85,  150 => 79,  140 => 72,  126 => 61,  117 => 55,  108 => 49,  88 => 32,  79 => 26,  69 => 19,  64 => 17,  54 => 10,  43 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/components/sidebar/styles.hbs", "/home/circleci/mailpoet/mailpoet/views/newsletter/templates/components/sidebar/styles.hbs");
    }
}
