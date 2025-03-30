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

/* newsletter/editor.html */
class __TwigTemplate_aa06caf4713b6d5ac2d6909b4a0a21f60afeea73e802e676faab4d7dcfdcb31a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'templates' => [$this, 'block_templates'],
            'content' => [$this, 'block_content'],
            'after_javascript' => [$this, 'block_after_javascript'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html", "newsletter/editor.html", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_templates($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        yield "  ";
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_tools_generic", "newsletter/templates/blocks/base/toolsGeneric.hbs");
        // line 7
        yield "
  ";
        // line 8
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_block", "newsletter/templates/blocks/automatedLatestContent/block.hbs");
        // line 11
        yield "
  ";
        // line 12
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_widget", "newsletter/templates/blocks/automatedLatestContent/widget.hbs");
        // line 15
        yield "
  ";
        // line 16
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_settings", "newsletter/templates/blocks/automatedLatestContent/settings.hbs");
        // line 19
        yield "
  ";
        // line 20
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_layout_block", "newsletter/templates/blocks/automatedLatestContentLayout/block.hbs");
        // line 23
        yield "
  ";
        // line 24
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_layout_widget", "newsletter/templates/blocks/automatedLatestContentLayout/widget.hbs");
        // line 27
        yield "
  ";
        // line 28
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_layout_settings", "newsletter/templates/blocks/automatedLatestContentLayout/settings.hbs");
        // line 31
        yield "
  ";
        // line 32
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_button_block", "newsletter/templates/blocks/button/block.hbs");
        // line 35
        yield "
  ";
        // line 36
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_button_widget", "newsletter/templates/blocks/button/widget.hbs");
        // line 39
        yield "
  ";
        // line 40
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_button_settings", "newsletter/templates/blocks/button/settings.hbs");
        // line 43
        yield "
  ";
        // line 44
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_block", "newsletter/templates/blocks/container/block.hbs");
        // line 47
        yield "
  ";
        // line 48
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_block_empty", "newsletter/templates/blocks/container/emptyBlock.hbs");
        // line 51
        yield "
  ";
        // line 52
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_one_column_widget", "newsletter/templates/blocks/container/oneColumnLayoutWidget.hbs");
        // line 55
        yield "
  ";
        // line 56
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_two_column_widget", "newsletter/templates/blocks/container/twoColumnLayoutWidget.hbs");
        // line 59
        yield "
  ";
        // line 60
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_two_column_12_widget", "newsletter/templates/blocks/container/twoColumnLayoutWidget12.hbs");
        // line 63
        yield "
  ";
        // line 64
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_two_column_21_widget", "newsletter/templates/blocks/container/twoColumnLayoutWidget21.hbs");
        // line 67
        yield "
  ";
        // line 68
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_three_column_widget", "newsletter/templates/blocks/container/threeColumnLayoutWidget.hbs");
        // line 71
        yield "
  ";
        // line 72
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_settings", "newsletter/templates/blocks/container/settings.hbs");
        // line 75
        yield "
  ";
        // line 76
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_container_column_settings", "newsletter/templates/blocks/container/columnSettings.hbs");
        // line 79
        yield "
  ";
        // line 80
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_divider_block", "newsletter/templates/blocks/divider/block.hbs");
        // line 83
        yield "
  ";
        // line 84
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_divider_widget", "newsletter/templates/blocks/divider/widget.hbs");
        // line 87
        yield "
  ";
        // line 88
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_divider_settings", "newsletter/templates/blocks/divider/settings.hbs");
        // line 91
        yield "
  ";
        // line 92
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_footer_block", "newsletter/templates/blocks/footer/block.hbs");
        // line 95
        yield "
  ";
        // line 96
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_footer_widget", "newsletter/templates/blocks/footer/widget.hbs");
        // line 99
        yield "
  ";
        // line 100
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_footer_settings", "newsletter/templates/blocks/footer/settings.hbs");
        // line 103
        yield "
  ";
        // line 104
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_header_block", "newsletter/templates/blocks/header/block.hbs");
        // line 107
        yield "
  ";
        // line 108
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_header_widget", "newsletter/templates/blocks/header/widget.hbs");
        // line 111
        yield "
  ";
        // line 112
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_header_settings", "newsletter/templates/blocks/header/settings.hbs");
        // line 115
        yield "
  ";
        // line 116
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_image_block", "newsletter/templates/blocks/image/block.hbs");
        // line 119
        yield "
  ";
        // line 120
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_image_widget", "newsletter/templates/blocks/image/widget.hbs");
        // line 123
        yield "
  ";
        // line 124
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_image_settings", "newsletter/templates/blocks/image/settings.hbs");
        // line 127
        yield "
  ";
        // line 128
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_posts_block", "newsletter/templates/blocks/posts/block.hbs");
        // line 131
        yield "
  ";
        // line 132
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_posts_widget", "newsletter/templates/blocks/posts/widget.hbs");
        // line 135
        yield "
  ";
        // line 136
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings", "newsletter/templates/blocks/posts/settings.hbs");
        // line 139
        yield "
  ";
        // line 140
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings_display_options", "newsletter/templates/blocks/posts/settingsDisplayOptions.hbs");
        // line 143
        yield "
  ";
        // line 144
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings_selection", "newsletter/templates/blocks/posts/settingsSelection.hbs");
        // line 147
        yield "
  ";
        // line 148
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings_selection_empty", "newsletter/templates/blocks/posts/settingsSelectionEmpty.hbs");
        // line 151
        yield "
  ";
        // line 152
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings_single_post", "newsletter/templates/blocks/posts/settingsSinglePost.hbs");
        // line 155
        yield "
  ";
        // line 156
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_products_block", "newsletter/templates/blocks/products/block.hbs");
        // line 159
        yield "
  ";
        // line 160
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_products_widget", "newsletter/templates/blocks/products/widget.hbs");
        // line 163
        yield "
  ";
        // line 164
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_products_settings", "newsletter/templates/blocks/products/settings.hbs");
        // line 167
        yield "
  ";
        // line 168
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_products_settings_display_options", "newsletter/templates/blocks/products/settingsDisplayOptions.hbs");
        // line 171
        yield "
  ";
        // line 172
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_products_settings_selection", "newsletter/templates/blocks/products/settingsSelection.hbs");
        // line 175
        yield "
  ";
        // line 176
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_products_settings_selection_empty", "newsletter/templates/blocks/products/settingsSelectionEmpty.hbs");
        // line 179
        yield "
  ";
        // line 180
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_products_settings_single_post", "newsletter/templates/blocks/products/settingsSinglePost.hbs");
        // line 183
        yield "
  ";
        // line 184
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_acc_block", "newsletter/templates/blocks/abandonedCartContent/block.hbs");
        // line 187
        yield "
  ";
        // line 188
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_acc_widget", "newsletter/templates/blocks/abandonedCartContent/widget.hbs");
        // line 191
        yield "
  ";
        // line 192
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_acc_settings", "newsletter/templates/blocks/abandonedCartContent/settings.hbs");
        // line 195
        yield "
  ";
        // line 196
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_acc_settings_display_options", "newsletter/templates/blocks/abandonedCartContent/settingsDisplayOptions.hbs");
        // line 199
        yield "
  ";
        // line 200
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_social_block", "newsletter/templates/blocks/social/block.hbs");
        // line 203
        yield "
  ";
        // line 204
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_social_block_icon", "newsletter/templates/blocks/social/blockIcon.hbs");
        // line 207
        yield "
  ";
        // line 208
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_social_widget", "newsletter/templates/blocks/social/widget.hbs");
        // line 211
        yield "
  ";
        // line 212
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_social_settings", "newsletter/templates/blocks/social/settings.hbs");
        // line 215
        yield "
  ";
        // line 216
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_social_settings_icon", "newsletter/templates/blocks/social/settingsIcon.hbs");
        // line 219
        yield "
  ";
        // line 220
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_social_settings_icon_selector", "newsletter/templates/blocks/social/settingsIconSelector.hbs");
        // line 223
        yield "
  ";
        // line 224
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_social_settings_styles", "newsletter/templates/blocks/social/settingsStyles.hbs");
        // line 227
        yield "
  ";
        // line 228
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_spacer_block", "newsletter/templates/blocks/spacer/block.hbs");
        // line 231
        yield "
  ";
        // line 232
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_spacer_widget", "newsletter/templates/blocks/spacer/widget.hbs");
        // line 235
        yield "
  ";
        // line 236
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_spacer_settings", "newsletter/templates/blocks/spacer/settings.hbs");
        // line 239
        yield "
  ";
        // line 240
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_text_block", "newsletter/templates/blocks/text/block.hbs");
        // line 243
        yield "
  ";
        // line 244
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_text_widget", "newsletter/templates/blocks/text/widget.hbs");
        // line 247
        yield "
  ";
        // line 248
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_text_settings", "newsletter/templates/blocks/text/settings.hbs");
        // line 251
        yield "
  ";
        // line 252
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_heading", "newsletter/templates/components/heading.hbs");
        // line 255
        yield "
  ";
        // line 256
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_history", "newsletter/templates/components/history.hbs");
        // line 259
        yield "
  ";
        // line 260
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_save", "newsletter/templates/components/save.hbs");
        // line 263
        yield "
  ";
        // line 264
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_styles", "newsletter/templates/components/styles.hbs");
        // line 267
        yield "
  ";
        // line 268
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_newsletter_preview", "newsletter/templates/components/newsletterPreview.hbs");
        // line 271
        yield "
  ";
        // line 272
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_sidebar", "newsletter/templates/components/sidebar/sidebar.hbs");
        // line 275
        yield "
  ";
        // line 276
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_sidebar_content", "newsletter/templates/components/sidebar/content.hbs");
        // line 279
        yield "
  ";
        // line 280
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_sidebar_layout", "newsletter/templates/components/sidebar/layout.hbs");
        // line 283
        yield "
  ";
        // line 284
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_sidebar_styles", "newsletter/templates/components/sidebar/styles.hbs");
        // line 287
        yield "
  ";
        // line 288
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_new_account_content", "newsletter/templates/blocks/woocommerceContent/new_account.hbs");
        // line 291
        yield "
  ";
        // line 292
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_processing_order_content", "newsletter/templates/blocks/woocommerceContent/processing_order.hbs");
        // line 295
        yield "
  ";
        // line 296
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_completed_order_content", "newsletter/templates/blocks/woocommerceContent/completed_order.hbs");
        // line 299
        yield "
  ";
        // line 300
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_customer_note_content", "newsletter/templates/blocks/woocommerceContent/customer_note.hbs");
        // line 303
        yield "
  ";
        // line 304
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_new_account_content_improved", "newsletter/templates/blocks/woocommerceContentImproved/new_account.hbs");
        // line 307
        yield "
  ";
        // line 308
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_processing_order_content_improved", "newsletter/templates/blocks/woocommerceContentImproved/processing_order.hbs");
        // line 311
        yield "
  ";
        // line 312
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_completed_order_content_improved", "newsletter/templates/blocks/woocommerceContentImproved/completed_order.hbs");
        // line 315
        yield "
  ";
        // line 316
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_customer_note_content_improved", "newsletter/templates/blocks/woocommerceContentImproved/customer_note.hbs");
        // line 319
        yield "
  ";
        // line 320
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_content_widget", "newsletter/templates/blocks/woocommerceContent/widget.hbs");
        // line 323
        yield "
  ";
        // line 324
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_heading_block", "newsletter/templates/blocks/woocommerceHeading/block.hbs");
        // line 327
        yield "
  ";
        // line 328
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_woocommerce_heading_widget", "newsletter/templates/blocks/woocommerceHeading/widget.hbs");
        // line 331
        yield "
  ";
        // line 332
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_unknown_block_fallback_block", "newsletter/templates/blocks/unknownBlockFallback/block.hbs");
        // line 335
        yield "
  ";
        // line 336
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_unknown_block_fallback_widget", "newsletter/templates/blocks/unknownBlockFallback/widget.hbs");
        // line 339
        yield "
  ";
        // line 340
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_coupon_block", "newsletter/templates/blocks/coupon/block.hbs");
        // line 343
        yield "
  ";
        // line 344
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_coupon_widget", "newsletter/templates/blocks/coupon/widget.hbs");
        // line 347
        yield "
  ";
        // line 348
        yield $this->extensions['MailPoet\Twig\Handlebars']->generatePartial($this->env, $context, "newsletter_editor_template_coupon_settings", "newsletter/templates/blocks/coupon/settings.hbs");
        // line 351
        yield "
";
        return; yield '';
    }

    // line 354
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 355
        yield "<!-- Hidden heading for notices to appear under -->
<h1 style=\"display:none\">";
        // line 356
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Newsletter Editor");
        yield "</h1>
<div id=\"mailpoet_editor\">
  <div id=\"mailpoet_editor_steps_heading\"></div>
  <div class=\"clearfix\"></div>
  <div id=\"mailpoet_editor_heading_left\">
    <div id=\"mailpoet_editor_heading\"></div>
  </div>
  <div id=\"mailpoet_editor_heading_right\">
    <div id=\"mailpoet_editor_top\"></div>
  </div>
  <div class=\"clearfix\"></div>
  <div id=\"mailpoet_editor_main_wrapper\">
    <div id=\"mailpoet_editor_styles\"></div>
    <div id=\"mailpoet_editor_content_container\">
      <div class=\"mailpoet_newsletter_wrapper\">
        <div id=\"mailpoet_editor_content\"></div>
      </div>
    </div>
    <div id=\"mailpoet_editor_sidebar\"></div>
    <div class=\"clear\"></div>
  </div>
  <div id=\"mailpoet_editor_bottom\"></div>

  <div class=\"mailpoet_layer_overlay\" style=\"display:none;\"></div>
</div>

<script type=\"text/javascript\">
  var mailpoet_email_editor_tutorial_seen  = '";
        // line 383
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape(($context["editor_tutorial_seen"] ?? null), "html", null, true);
        yield "';
  var mailpoet_email_editor_tutorial_url = '";
        // line 384
        yield $this->extensions['MailPoet\Twig\Assets']->generateCdnUrl("newsletter-editor/editor-drag-demo.20190226-1505.mp4");
        yield "';
  var mailpoet_installed_at = '";
        // line 385
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "installed_at", [], "any", false, false, false, 385), "html", null, true);
        yield "';
</script>

";
        // line 388
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["brand_styles"] ?? null), "available", [], "any", false, false, false, 388)) {
            // line 389
            yield "<script type=\"text/javascript\">
  var mailpoet_brand_styles = {
    available: true
  };
</script>
";
        }
        // line 395
        yield "
";
        return; yield '';
    }

    // line 398
    public function block_after_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 399
        yield "
  ";
        // line 400
        yield do_action("mailpoet_newsletter_editor_after_javascript");
        yield "

  <script type=\"text/javascript\">
    function renderWithFont(node) {
      if (!node.element) return node.text;
      var \$wrapper = jQuery('<span></span>');
      \$wrapper.css({'font-family': Handlebars.helpers.fontWithFallback(node.element.value)});
      \$wrapper.text(node.text);
      return \$wrapper;
    }
    function fontsSelect(selector) {
      jQuery(selector).select2({
        minimumResultsForSearch: Infinity,
        templateSelection: renderWithFont,
        templateResult: renderWithFont
      });
    }

    var templates = {
      styles: Handlebars.compile(
        jQuery('#newsletter_editor_template_styles').html()
      ),
      save: Handlebars.compile(
        jQuery('#newsletter_editor_template_save').html()
      ),
      heading: Handlebars.compile(
        jQuery('#newsletter_editor_template_heading').html()
      ),
      history: Handlebars.compile(
        jQuery('#newsletter_editor_template_history').html()
      ),

      sidebar: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar').html()
      ),
      sidebarContent: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar_content').html()
      ),
      sidebarLayout: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar_layout').html()
      ),
      sidebarStyles: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar_styles').html()
      ),
      newsletterPreview: Handlebars.compile(
        jQuery('#newsletter_editor_template_newsletter_preview').html()
      ),

      genericBlockTools: Handlebars.compile(
        jQuery('#newsletter_editor_template_tools_generic').html()
      ),

      containerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_block').html()
      ),
      containerEmpty: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_block_empty').html()
      ),
      oneColumnLayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_one_column_widget').html()
      ),
      twoColumnLayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_two_column_widget').html()
      ),
      twoColumn12LayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_two_column_12_widget').html()
      ),
      twoColumn21LayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_two_column_21_widget').html()
      ),
      threeColumnLayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_three_column_widget').html()
      ),
      containerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_settings').html()
      ),
      containerBlockColumnSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_column_settings').html()
      ),

      buttonBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_button_block').html()
      ),
      buttonInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_button_widget').html()
      ),
      buttonBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_button_settings').html()
      ),

      dividerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_divider_block').html()
      ),
      dividerInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_divider_widget').html()
      ),
      dividerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_divider_settings').html()
      ),

      footerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_footer_block').html()
      ),
      footerInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_footer_widget').html()
      ),
      footerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_footer_settings').html()
      ),

      headerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_header_block').html()
      ),
      headerInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_header_widget').html()
      ),
      headerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_header_settings').html()
      ),

      imageBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_image_block').html()
      ),
      imageInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_image_widget').html()
      ),
      imageBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_image_settings').html()
      ),

      socialBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_block').html()
      ),
      socialIconBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_block_icon').html()
      ),
      socialInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_widget').html()
      ),
      socialBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_settings').html()
      ),
      socialSettingsIconSelector: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_settings_icon_selector').html()
      ),
      socialSettingsIcon: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_settings_icon').html()
      ),
      socialSettingsStyles: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_settings_styles').html()
      ),

      spacerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_spacer_block').html()
      ),
      spacerInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_spacer_widget').html()
      ),
      spacerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_spacer_settings').html()
      ),

      automatedLatestContentBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_block').html()
      ),
      automatedLatestContentInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_widget').html()
      ),
      automatedLatestContentBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_settings').html()
      ),

      automatedLatestContentLayoutBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_layout_block').html()
      ),
      automatedLatestContentLayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_layout_widget').html()
      ),
      automatedLatestContentLayoutBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_layout_settings').html()
      ),

      postsBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_block').html()
      ),
      postsInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_widget').html()
      ),
      postsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings').html()
      ),
      postSelectionPostsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings_selection').html()
      ),
      emptyPostPostsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings_selection_empty').html()
      ),
      singlePostPostsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings_single_post').html()
      ),
      displayOptionsPostsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings_display_options').html()
      ),

      productsBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_products_block').html()
      ),
      productsInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_products_widget').html()
      ),
      productsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_products_settings').html()
      ),
      postSelectionProductsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_products_settings_selection').html()
      ),
      emptyPostProductsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_products_settings_selection_empty').html()
      ),
      singlePostProductsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_products_settings_single_post').html()
      ),
      displayOptionsProductsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_products_settings_display_options').html()
      ),

      abandonedCartContentBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_acc_block').html()
      ),
      abandonedCartContentInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_acc_widget').html()
      ),
      abandonedCartContentBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_acc_settings').html()
      ),
      displayOptionsAbandonedCartContentBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_acc_settings_display_options').html()
      ),

      textBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_text_block').html()
      ),
      textInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_text_widget').html()
      ),
      textBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_text_settings').html()
      ),

      woocommerceNewAccount: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_new_account_content').html()
      ),
      woocommerceProcessingOrder: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_processing_order_content').html()
      ),
      woocommerceCompletedOrder: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_completed_order_content').html()
      ),
      woocommerceCustomerNote: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_customer_note_content').html()
      ),
      woocommerceContentInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_content_widget').html()
      ),

      woocommerceNewAccountImproved: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_new_account_content_improved').html()
      ),
      woocommerceProcessingOrderImproved: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_processing_order_content_improved').html()
      ),
      woocommerceCompletedOrderImproved: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_completed_order_content_improved').html()
      ),
      woocommerceCustomerNoteImproved: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_customer_note_content_improved').html()
      ),

      woocommerceHeadingBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_heading_block').html()
      ),
      woocommerceHeadingInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_woocommerce_heading_widget').html()
      ),

      unknownBlockFallbackBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_unknown_block_fallback_block').html()
      ),
      unknownBlockFallbackInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_unknown_block_fallback_widget').html()
      ),
      couponBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_coupon_block').html()
      ),
      couponInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_coupon_widget').html()
      ),
      couponBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_coupon_settings').html()
      ),
    };

    var currentUserEmail = '";
        // line 702
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["current_wp_user"] ?? null), "user_email", [], "any", false, false, false, 702), "html", null, true);
        yield "';
    var mailpoet_product_categories = ";
        // line 703
        yield json_encode(($context["product_categories"] ?? null));
        yield ";
    var mailpoet_products = ";
        // line 704
        yield json_encode(($context["products"] ?? null));
        yield ";
    var mailpoet_original_template_body = ";
        // line 705
        yield json_encode(($context["original_template_body"] ?? null));
        yield ";

    var config = {
      availableStyles: {
        textSizes: [
          '9px', '10px', '11px', '12px', '13px', '14px', '15px', '16px',
          '17px', '18px', '19px', '20px', '21px', '22px', '23px', '24px'
        ],
        headingSizes: [
          '10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px',
          '26px', '30px', '36px', '40px'
        ],
        lineHeights: [
          '1.0',
          '1.2',
          '1.4',
          '1.6',
          '1.8',
          '2.0',
        ],
        fonts: {
          standard: [
            'Arial',
            'Comic Sans MS',
            'Courier New',
            'Georgia',
            'Lucida',
            'Tahoma',
            'Times New Roman',
            'Trebuchet MS',
            'Verdana'
            ";
        // line 736
        if (($context["customFontsEnabled"] ?? null)) {
            // line 737
            yield "          ],
          custom: [
            'Arvo',
            'Lato',
            'Lora',
            'Merriweather',
            'Merriweather Sans',
            'Noticia Text',
            'Open Sans',
            'Playfair Display',
            'Roboto',
            'Source Sans Pro',
            'Oswald',
            'Raleway',
            'Permanent Marker',
            'Pacifico',
            ";
        }
        // line 754
        yield "          ]
        },
        socialIconSets: {
          'default': {
            'custom': '";
        // line 758
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 760
        yield "',
            'facebook': '";
        // line 761
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Facebook.png");
        // line 763
        yield "',
            'twitter': '";
        // line 764
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Twitter.png");
        // line 766
        yield "',
            'youtube': '";
        // line 767
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Youtube.png");
        // line 769
        yield "',
            'website': '";
        // line 770
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Website.png");
        // line 772
        yield "',
            'email': '";
        // line 773
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Email.png");
        // line 775
        yield "',
            'instagram': '";
        // line 776
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Instagram.png");
        // line 778
        yield "',
            'pinterest': '";
        // line 779
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Pinterest.png");
        // line 781
        yield "',
            'linkedin': '";
        // line 782
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/LinkedIn.png");
        // line 784
        yield "'
          },
          'grey': {
            'custom': '";
        // line 787
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 789
        yield "',
            'facebook': '";
        // line 790
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/02-grey/Facebook.png");
        // line 792
        yield "',
            'twitter': '";
        // line 793
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/02-grey/Twitter.png");
        // line 795
        yield "',
            'youtube': '";
        // line 796
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/02-grey/Youtube.png");
        // line 798
        yield "',
            'website': '";
        // line 799
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/02-grey/Website.png");
        // line 801
        yield "',
            'email': '";
        // line 802
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/02-grey/Email.png");
        // line 804
        yield "',
            'instagram': '";
        // line 805
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/02-grey/Instagram.png");
        // line 807
        yield "',
            'pinterest': '";
        // line 808
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/02-grey/Pinterest.png");
        // line 810
        yield "',
            'linkedin': '";
        // line 811
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/02-grey/LinkedIn.png");
        // line 813
        yield "',
          },
          'white': {
              'custom': '";
        // line 816
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 818
        yield "',
              'facebook': '";
        // line 819
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/09-white/Facebook.png");
        // line 821
        yield "',
              'twitter': '";
        // line 822
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/09-white/Twitter.png");
        // line 824
        yield "',
              'youtube': '";
        // line 825
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/09-white/Youtube.png");
        // line 827
        yield "',
              'website': '";
        // line 828
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/09-white/Website.png");
        // line 830
        yield "',
              'email': '";
        // line 831
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/09-white/Email.png");
        // line 833
        yield "',
              'instagram': '";
        // line 834
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/09-white/Instagram.png");
        // line 836
        yield "',
              'pinterest': '";
        // line 837
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/09-white/Pinterest.png");
        // line 839
        yield "',
              'linkedin': '";
        // line 840
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/09-white/LinkedIn.png");
        // line 842
        yield "',
          },
          'black': {
              'custom': '";
        // line 845
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 847
        yield "',
              'facebook': '";
        // line 848
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/10-black/Facebook.png");
        // line 850
        yield "',
              'twitter': '";
        // line 851
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/10-black/Twitter.png");
        // line 853
        yield "',
              'youtube': '";
        // line 854
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/10-black/Youtube.png");
        // line 856
        yield "',
              'website': '";
        // line 857
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/10-black/Website.png");
        // line 859
        yield "',
              'email': '";
        // line 860
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/10-black/Email.png");
        // line 862
        yield "',
              'instagram': '";
        // line 863
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/10-black/Instagram.png");
        // line 865
        yield "',
              'pinterest': '";
        // line 866
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/10-black/Pinterest.png");
        // line 868
        yield "',
              'linkedin': '";
        // line 869
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/10-black/LinkedIn.png");
        // line 871
        yield "',
          },
          'circles': {
            'custom': '";
        // line 874
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 876
        yield "',
            'facebook': '";
        // line 877
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/03-circles/Facebook.png");
        // line 879
        yield "',
            'twitter': '";
        // line 880
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/03-circles/Twitter.png");
        // line 882
        yield "',
            'youtube': '";
        // line 883
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/03-circles/Youtube.png");
        // line 885
        yield "',
            'website': '";
        // line 886
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/03-circles/Website.png");
        // line 888
        yield "',
            'email': '";
        // line 889
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/03-circles/Email.png");
        // line 891
        yield "',
            'instagram': '";
        // line 892
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/03-circles/Instagram.png");
        // line 894
        yield "',
            'pinterest': '";
        // line 895
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/03-circles/Pinterest.png");
        // line 897
        yield "',
            'linkedin': '";
        // line 898
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/03-circles/LinkedIn.png");
        // line 900
        yield "',
          },
          'full-flat-roundrect': {
            'custom': '";
        // line 903
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 905
        yield "',
            'facebook': '";
        // line 906
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Facebook.png");
        // line 908
        yield "',
            'twitter': '";
        // line 909
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Twitter.png");
        // line 911
        yield "',
            'youtube': '";
        // line 912
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Youtube.png");
        // line 914
        yield "',
            'website': '";
        // line 915
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Website.png");
        // line 917
        yield "',
            'email': '";
        // line 918
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Email.png");
        // line 920
        yield "',
            'instagram': '";
        // line 921
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Instagram.png");
        // line 923
        yield "',
            'pinterest': '";
        // line 924
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Pinterest.png");
        // line 926
        yield "',
            'linkedin': '";
        // line 927
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/LinkedIn.png");
        // line 929
        yield "',
          },
          'full-gradient-square': {
            'custom': '";
        // line 932
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 934
        yield "',
            'facebook': '";
        // line 935
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Facebook.png");
        // line 937
        yield "',
            'twitter': '";
        // line 938
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Twitter.png");
        // line 940
        yield "',
            'youtube': '";
        // line 941
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Youtube.png");
        // line 943
        yield "',
            'website': '";
        // line 944
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Website.png");
        // line 946
        yield "',
            'email': '";
        // line 947
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Email.png");
        // line 949
        yield "',
            'instagram': '";
        // line 950
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Instagram.png");
        // line 952
        yield "',
            'pinterest': '";
        // line 953
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Pinterest.png");
        // line 955
        yield "',
            'linkedin': '";
        // line 956
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/LinkedIn.png");
        // line 958
        yield "',
          },
          'full-symbol-color': {
            'custom': '";
        // line 961
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 963
        yield "',
            'facebook': '";
        // line 964
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Facebook.png");
        // line 966
        yield "',
            'twitter': '";
        // line 967
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Twitter.png");
        // line 969
        yield "',
            'youtube': '";
        // line 970
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Youtube.png");
        // line 972
        yield "',
            'website': '";
        // line 973
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Website.png");
        // line 975
        yield "',
            'email': '";
        // line 976
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Email.png");
        // line 978
        yield "',
            'instagram': '";
        // line 979
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Instagram.png");
        // line 981
        yield "',
            'pinterest': '";
        // line 982
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Pinterest.png");
        // line 984
        yield "',
            'linkedin': '";
        // line 985
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/LinkedIn.png");
        // line 987
        yield "',
          },
          'full-symbol-black': {
            'custom': '";
        // line 990
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 992
        yield "',
            'facebook': '";
        // line 993
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Facebook.png");
        // line 995
        yield "',
            'twitter': '";
        // line 996
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Twitter.png");
        // line 998
        yield "',
            'youtube': '";
        // line 999
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Youtube.png");
        // line 1001
        yield "',
            'website': '";
        // line 1002
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Website.png");
        // line 1004
        yield "',
            'email': '";
        // line 1005
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Email.png");
        // line 1007
        yield "',
            'instagram': '";
        // line 1008
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Instagram.png");
        // line 1010
        yield "',
            'pinterest': '";
        // line 1011
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Pinterest.png");
        // line 1013
        yield "',
            'linkedin': '";
        // line 1014
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/LinkedIn.png");
        // line 1016
        yield "',
          },
          'full-symbol-grey': {
            'custom': '";
        // line 1019
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 1021
        yield "',
            'facebook': '";
        // line 1022
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Facebook.png");
        // line 1024
        yield "',
            'twitter': '";
        // line 1025
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Twitter.png");
        // line 1027
        yield "',
            'youtube': '";
        // line 1028
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Youtube.png");
        // line 1030
        yield "',
            'website': '";
        // line 1031
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Website.png");
        // line 1033
        yield "',
            'email': '";
        // line 1034
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Email.png");
        // line 1036
        yield "',
            'instagram': '";
        // line 1037
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Instagram.png");
        // line 1039
        yield "',
            'pinterest': '";
        // line 1040
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Pinterest.png");
        // line 1042
        yield "',
            'linkedin': '";
        // line 1043
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/LinkedIn.png");
        // line 1045
        yield "',
          },
        },
        dividers: [
          'hidden',
          'dotted',
          'dashed',
          'solid',
          'double',
          'groove',
          'ridge'
        ]
      },
      socialIcons: {
        'facebook': {
          title: 'Facebook',
          linkFieldName: '";
        // line 1061
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Link"), "js"), "html", null, true);
        yield "',
          defaultLink: 'https://www.facebook.com/',
        },
        'twitter': {
          title: 'Twitter / X',
          linkFieldName: '";
        // line 1066
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Link"), "js"), "html", null, true);
        yield "',
          defaultLink: 'https://x.com/',
        },
        'youtube': {
          title: 'YouTube',
          linkFieldName: '";
        // line 1071
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Link"), "js"), "html", null, true);
        yield "',
          defaultLink: 'https://www.youtube.com/',
        },
        'website': {
          title: '";
        // line 1075
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Website"), "js"), "html", null, true);
        yield "',
          linkFieldName: '";
        // line 1076
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Link"), "js"), "html", null, true);
        yield "',
          defaultLink: '',
        },
        'email': {
          title: '";
        // line 1080
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Email"), "js"), "html", null, true);
        yield "',
          linkFieldName: '";
        // line 1081
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Email"), "js"), "html", null, true);
        yield "',
          defaultLink: '',
        },
        'instagram': {
          title: 'Instagram',
          linkFieldName: '";
        // line 1086
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Link"), "js"), "html", null, true);
        yield "',
          defaultLink: 'https://www.instagram.com/',
        },
        'pinterest': {
          title: 'Pinterest',
          linkFieldName: '";
        // line 1091
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Link"), "js"), "html", null, true);
        yield "',
          defaultLink: 'https://www.pinterest.com/',
        },
        'linkedin': {
          title: 'LinkedIn',
          linkFieldName: '";
        // line 1096
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Link"), "js"), "html", null, true);
        yield "',
          defaultLink: 'https://www.linkedin.com/',
        },
        'custom': {
          title: '";
        // line 1100
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Custom"), "js"), "html", null, true);
        yield "',
          linkFieldName: '";
        // line 1101
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Link"), "js"), "html", null, true);
        yield "',
          defaultLink: '',
        },
      },
      blockDefaults: {
        abandonedCartContent: {
          amount: '2',
          withLayout: true,
          contentType: 'product',
          postStatus: 'publish', // 'draft'|'pending'|'publish'
          inclusionType: 'include', // 'include'|'exclude'
          displayType: 'excerpt', // 'excerpt'|'full'|'titleOnly'
          titleFormat: 'h1', // 'h1'|'h2'|'h3'
          titleAlignment: 'left', // 'left'|'center'|'right'
          titleIsLink: false, // false|true
          imageFullWidth: false, // true|false
          featuredImagePosition: 'alternate', // 'centered'|'left'|'right'|'alternate'|'none',
          pricePosition: 'below', // 'hidden'|'above'|'below'
          readMoreType: 'none', // 'link'|'button'|'none'
          readMoreText: '',
          readMoreButton: {},
          sortBy: 'newest', // 'newest'|'oldest',
          showDivider: true, // true|false
          divider: {
            context: 'abandonedCartContent.divider',
            styles: {
              block: {
                backgroundColor: 'transparent',
                padding: '13px',
                borderStyle: 'solid',
                borderWidth: '3px',
                borderColor: '#aaaaaa',
              },
            },
          },
          backgroundColor: '#ffffff',
          backgroundColorAlternate: '#eeeeee',
        },
        automatedLatestContent: {
          amount: '5',
          withLayout: false,
          contentType: 'post', // 'post'|'page'|'mailpoet_page'
          inclusionType: 'include', // 'include'|'exclude'
          displayType: 'excerpt', // 'excerpt'|'full'|'titleOnly'
          titleFormat: 'h1', // 'h1'|'h2'|'h3'|'ul'
          titleAlignment: 'left', // 'left'|'center'|'right'
          titleIsLink: false, // false|true
          imageFullWidth: false, // true|false
          featuredImagePosition: 'belowTitle', // 'belowTitle'|'aboveTitle'|'none',
          showAuthor: 'no', // 'no'|'aboveText'|'belowText'
          authorPrecededBy: '";
        // line 1151
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Author:"), "js"), "html", null, true);
        yield "',
          showCategories: 'no', // 'no'|'aboveText'|'belowText'
          categoriesPrecededBy: '";
        // line 1153
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Categories:"), "js"), "html", null, true);
        yield "',
          readMoreType: 'button', // 'link'|'button'
          readMoreText: '";
        // line 1155
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Read more"), "js"), "html", null, true);
        yield "',
          readMoreButton: {
            text: '";
        // line 1157
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Read more"), "js"), "html", null, true);
        yield "',
            url: '[postLink]',
            context: 'automatedLatestContent.readMoreButton',
            styles: {
              block: {
                backgroundColor: '#2ea1cd',
                borderColor: '#0074a2',
                borderWidth: '1px',
                borderRadius: '5px',
                borderStyle: 'solid',
                width: '180px',
                lineHeight: '40px',
                fontColor: '#ffffff',
                fontFamily: 'Verdana',
                fontSize: '18px',
                fontWeight: 'normal',
                textAlign: 'center',
              }
            }
          },
          sortBy: 'newest', // 'newest'|'oldest',
          showDivider: true, // true|false
          divider: {
            context: 'automatedLatestContent.divider',
            styles: {
              block: {
                backgroundColor: 'transparent',
                padding: '13px',
                borderStyle: 'solid',
                borderWidth: '3px',
                borderColor: '#aaaaaa',
              },
            },
          },
          backgroundColor: '#ffffff',
          backgroundColorAlternate: '#eeeeee',
        },
        automatedLatestContentLayout: {
          amount: '5',
          withLayout: true,
          contentType: 'post', // 'post'|'page'|'mailpoet_page'
          inclusionType: 'include', // 'include'|'exclude'
          displayType: 'excerpt', // 'excerpt'|'full'|'titleOnly'
          titleFormat: 'h1', // 'h1'|'h2'|'h3'|'ul'
          titleAlignment: 'left', // 'left'|'center'|'right'
          titleIsLink: false, // false|true
          imageFullWidth: false, // true|false
          featuredImagePosition: 'alternate', // 'centered'|'left'|'right'|'alternate'|'none',
          showAuthor: 'no', // 'no'|'aboveText'|'belowText'
          authorPrecededBy: '";
        // line 1206
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Author:"), "js"), "html", null, true);
        yield "',
          showCategories: 'no', // 'no'|'aboveText'|'belowText'
          categoriesPrecededBy: '";
        // line 1208
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Categories:"), "js"), "html", null, true);
        yield "',
          readMoreType: 'button', // 'link'|'button'
          readMoreText: '";
        // line 1210
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Read more"), "js"), "html", null, true);
        yield "',
          readMoreButton: {
            text: '";
        // line 1212
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Read more"), "js"), "html", null, true);
        yield "',
            url: '[postLink]',
            context: 'automatedLatestContentLayout.readMoreButton',
            styles: {
              block: {
                backgroundColor: '#2ea1cd',
                borderColor: '#0074a2',
                borderWidth: '1px',
                borderRadius: '5px',
                borderStyle: 'solid',
                width: '180px',
                lineHeight: '40px',
                fontColor: '#ffffff',
                fontFamily: 'Verdana',
                fontSize: '18px',
                fontWeight: 'normal',
                textAlign: 'center',
              }
            }
          },
          sortBy: 'newest', // 'newest'|'oldest',
          showDivider: true, // true|false
          divider: {
            context: 'automatedLatestContentLayout.divider',
            styles: {
              block: {
                backgroundColor: 'transparent',
                padding: '13px',
                borderStyle: 'solid',
                borderWidth: '3px',
                borderColor: '#aaaaaa',
              },
            },
          },
          backgroundColor: '#ffffff',
          backgroundColorAlternate: '#eeeeee',
        },
        button: {
          text: '";
        // line 1250
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Button"), "js"), "html", null, true);
        yield "',
          url: '',
          styles: {
            block: {
              backgroundColor: '#2ea1cd',
              borderColor: '#0074a2',
              borderWidth: '1px',
              borderRadius: '5px',
              borderStyle: 'solid',
              width: '180px',
              lineHeight: '40px',
              fontColor: '#ffffff',
              fontFamily: 'Verdana',
              fontSize: '18px',
              fontWeight: 'normal',
              textAlign: 'center',
            },
          },
        },
        container: {
          image: {
            src: null,
            display: 'scale',
          },
          styles: {
            block: {
              backgroundColor: 'transparent',
            },
          },
        },
        divider: {
          styles: {
            block: {
              backgroundColor: 'transparent',
              padding: '13px',
              borderStyle: 'solid',
              borderWidth: '3px',
              borderColor: '#aaaaaa',
            },
          },
        },
        footer: {
          text: '<p><a href=\"[link:subscription_unsubscribe_url]\">";
        // line 1292
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Unsubscribe");
        yield "</a> | <a href=\"[link:subscription_manage_url]\">";
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Manage subscription");
        yield "</a><br />";
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Add your postal address here!");
        yield "</p>',
          styles: {
            block: {
              backgroundColor: 'transparent',
            },
            text: {
              fontColor: '#222222',
              fontFamily: 'Arial',
              fontSize: '12px',
              textAlign: 'center',
            },
            link: {
              fontColor: '#6cb7d4',
              textDecoration: 'none',
            },
          },
        },
        image: {
          link: '',
          src: '',
          alt: '";
        // line 1312
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("An image of..."), "js"), "html", null, true);
        yield "',
          fullWidth: false,
          width: '281px',
          height: '190px',
          styles: {
            block: {
              textAlign: 'center',
            },
          },
        },
        posts: {
          amount: '10',
          withLayout: true,
          contentType: 'post', // 'post'|'page'|'mailpoet_page'
          postStatus: 'publish', // 'draft'|'pending'|'private'|'publish'|'future'
          inclusionType: 'include', // 'include'|'exclude'
          displayType: 'excerpt', // 'excerpt'|'full'|'titleOnly'
          titleFormat: 'h1', // 'h1'|'h2'|'h3'|'ul'
          titleAlignment: 'left', // 'left'|'center'|'right'
          titleIsLink: false, // false|true
          imageFullWidth: false, // true|false
          featuredImagePosition: 'alternate', // 'centered'|'left'|'right'|'alternate'|'none',
          showAuthor: 'no', // 'no'|'aboveText'|'belowText'
          authorPrecededBy: '";
        // line 1335
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Author:"), "js"), "html", null, true);
        yield "',
          showCategories: 'no', // 'no'|'aboveText'|'belowText'
          categoriesPrecededBy: '";
        // line 1337
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Categories:"), "js"), "html", null, true);
        yield "',
          readMoreType: 'link', // 'link'|'button'
          readMoreText: '";
        // line 1339
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Read more"), "js"), "html", null, true);
        yield "',
          readMoreButton: {
            text: '";
        // line 1341
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Read more"), "js"), "html", null, true);
        yield "',
            url: '[postLink]',
            context: 'posts.readMoreButton',
            styles: {
              block: {
                backgroundColor: '#2ea1cd',
                borderColor: '#0074a2',
                borderWidth: '1px',
                borderRadius: '5px',
                borderStyle: 'solid',
                width: '180px',
                lineHeight: '40px',
                fontColor: '#ffffff',
                fontFamily: 'Verdana',
                fontSize: '18px',
                fontWeight: 'normal',
                textAlign: 'center',
              },
            },
          },
          sortBy: 'newest', // 'newest'|'oldest',
          showDivider: true, // true|false
          divider: {
            context: 'posts.divider',
            styles: {
              block: {
                backgroundColor: 'transparent',
                padding: '13px',
                borderStyle: 'solid',
                borderWidth: '3px',
                borderColor: '#aaaaaa',
              },
            },
          },
          backgroundColor: '#ffffff',
          backgroundColorAlternate: '#eeeeee',
        },
        products: {
          amount: '10',
          withLayout: true,
          contentType: 'product',
          postStatus: 'publish', // 'draft'|'pending'|'publish'
          inclusionType: 'include', // 'include'|'exclude'
          displayType: 'excerpt', // 'excerpt'|'full'|'titleOnly'
          titleFormat: 'h1', // 'h1'|'h2'|'h3'
          titleAlignment: 'left', // 'left'|'center'|'right'
          titleIsLink: false, // false|true
          imageFullWidth: false, // true|false
          featuredImagePosition: 'alternate', // 'centered'|'left'|'right'|'alternate'|'none',
          pricePosition: 'below', // 'hidden'|'above'|'below'
          readMoreType: 'link', // 'link'|'button'
          readMoreText: '";
        // line 1392
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translateWithContext("Buy now", "Text of a button which links to an ecommerce product page"), "js"), "html", null, true);
        yield "',
          readMoreButton: {
            text: '";
        // line 1394
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translateWithContext("Buy now", "Text of a button which links to an ecommerce product page"), "js"), "html", null, true);
        yield "',
            url: '[postLink]',
            context: 'posts.readMoreButton',
            styles: {
              block: {
                backgroundColor: '#2ea1cd',
                borderColor: '#0074a2',
                borderWidth: '1px',
                borderRadius: '5px',
                borderStyle: 'solid',
                width: '180px',
                lineHeight: '40px',
                fontColor: '#ffffff',
                fontFamily: 'Verdana',
                fontSize: '18px',
                fontWeight: 'normal',
                textAlign: 'center',
              },
            },
          },
          sortBy: 'newest', // 'newest'|'oldest',
          showDivider: true, // true|false
          divider: {
            context: 'posts.divider',
            styles: {
              block: {
                backgroundColor: 'transparent',
                padding: '13px',
                borderStyle: 'solid',
                borderWidth: '3px',
                borderColor: '#aaaaaa',
              },
            },
          },
          backgroundColor: '#ffffff',
          backgroundColorAlternate: '#eeeeee',
        },
        social: {
          iconSet: 'default',
          styles: {
            block: {
              textAlign: 'center'
            }
          },
          icons: [
          {
            type: 'socialIcon',
            iconType: 'facebook',
            link: 'http://www.facebook.com',
            image: '";
        // line 1443
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Facebook.png");
        // line 1445
        yield "',
            height: '32px',
            width: '32px',
            text: '";
        // line 1448
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Facebook"), "js"), "html", null, true);
        yield "',
          },
          {
            type: 'socialIcon',
            iconType: 'twitter',
            link: 'http://www.twitter.com',
            image: '";
        // line 1454
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/social-icons/01-social/Twitter.png");
        // line 1456
        yield "',
            height: '32px',
            width: '32px',
            text: '";
        // line 1459
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Twitter"), "js"), "html", null, true);
        yield "',
          },
          ],
        },
        spacer: {
          styles: {
            block: {
              backgroundColor: 'transparent',
              height: '40px',
            },
          },
        },
        text: {
          text: '";
        // line 1472
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape($this->extensions['MailPoet\Twig\I18n']->translate("Edit this to insert text."), "js"), "html", null, true);
        yield "',
        },
        header: {
          text: '<a href=\"[link:newsletter_view_in_browser_url]\">";
        // line 1475
        yield $this->extensions['MailPoet\Twig\I18n']->translate("View this in your browser.");
        yield "</a>',
          styles: {
            block: {
              backgroundColor: 'transparent',
            },
            text: {
              fontColor: '#222222',
              fontFamily: 'Arial',
              fontSize: '12px',
              textAlign: 'center',
            },
            link: {
              fontColor: '#6cb7d4',
              textDecoration: 'underline',
            },
          },
        },
        woocommerceHeading: {
          contents: ";
        // line 1493
        yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "email_headings", [], "any", false, false, false, 1493));
        yield ",
        },
        coupon: {
            type: 'coupon',
            discountType: ";
        // line 1497
        yield json_encode(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "coupon", [], "any", false, false, false, 1497), "defaults", [], "any", false, false, false, 1497), "discountType", [], "any", false, false, false, 1497));
        yield ",
            code: ";
        // line 1498
        yield json_encode(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "coupon", [], "any", false, false, false, 1498), "defaults", [], "any", false, false, false, 1498), "code", [], "any", false, false, false, 1498));
        yield ",
            amountMax: ";
        // line 1499
        yield json_encode(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "coupon", [], "any", false, false, false, 1499), "defaults", [], "any", false, false, false, 1499), "amountMax", [], "any", false, false, false, 1499));
        yield ",
            amount: 10,
            expiryDay: 10,
            styles: {
              block: {
                backgroundColor: '#ffffff',
                borderColor: '#000000',
                borderWidth: '1px',
                borderRadius: '5px',
                borderStyle: 'solid',
                width: '200px',
                lineHeight: '40px',
                fontColor: '#000000',
                fontFamily: 'Verdana',
                fontSize: '18px',
                fontWeight: 'normal',
                textAlign: 'center',
              },
          },
        },
      },
      shortcodes: ";
        // line 1520
        yield json_encode(($context["shortcodes"] ?? null));
        yield ",
      sidepanelWidth: '331px',
      newsletterPreview: {
        width: '1024px',
        height: '768px',
        previewTypeLocalStorageKey: 'newsletter_editor.preview_type'
      },
      validation: {
        validateUnsubscribeLinkPresent: ";
        // line 1528
        yield ((((($context["mss_active"] ?? null) && (($context["is_wc_transactional_email"] ?? null) != true)) && (($context["is_confirmation_email_template"] ?? null) != true))) ? ("true") : ("false"));
        yield ",
        validateReEngageLinkPresent: ";
        // line 1529
        yield ((((($context["mss_active"] ?? null) && (($context["is_wc_transactional_email"] ?? null) != true)) && (($context["is_confirmation_email_template"] ?? null) != true))) ? ("true") : ("false"));
        yield ",
        validateActivationLinkIsPresent: ";
        // line 1530
        yield ((($context["is_confirmation_email_template"] ?? null)) ? ("true") : ("false"));
        yield ",
      },
      urls: {
        send: '";
        // line 1533
        yield admin_url(("admin.php?page=mailpoet-newsletters#/send/" . intval($this->extensions['MailPoet\Twig\Functions']->params("id"))));
        yield "',
        imageMissing: '";
        // line 1534
        yield $this->extensions['MailPoet\Twig\Assets']->generateImageUrl("newsletter_editor/image-missing.svg");
        // line 1536
        yield "',
      },
      currentUserId: '";
        // line 1538
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["current_wp_user"] ?? null), "wp_user_id", [], "any", false, false, false, 1538), "html", null, true);
        yield "',
      mtaMethod: '";
        // line 1539
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_0 = (($__internal_compile_1 = ($context["settings"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["mta"] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["method"] ?? null) : null), "html", null, true);
        yield "',
      woocommerceCustomizerEnabled: ";
        // line 1540
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "customizer_enabled", [], "any", false, false, false, 1540)) ? ("true") : ("false"));
        yield ",
      confirmationEmailCustomizerEnabled: ";
        // line 1541
        yield ((($context["is_confirmation_email_customizer_enabled"] ?? null)) ? ("true") : ("false"));
        yield ",
      ";
        // line 1542
        if (($context["is_wc_transactional_email"] ?? null)) {
            // line 1543
            yield "      overrideGlobalStyles: {
        text: {
          fontColor: ";
            // line 1545
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "text_color", [], "any", false, false, false, 1545));
            yield ",
        },
        h1: {
          fontColor: ";
            // line 1548
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "base_color", [], "any", false, false, false, 1548));
            yield ",
        },
        h2: {
          fontColor: ";
            // line 1551
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "base_color", [], "any", false, false, false, 1551));
            yield ",
        },
        h3: {
          fontColor: ";
            // line 1554
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "base_color", [], "any", false, false, false, 1554));
            yield ",
        },
        link: {
          fontColor: ";
            // line 1557
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "link_color", [], "any", false, false, false, 1557));
            yield ",
        },
        wrapper: {
          backgroundColor: ";
            // line 1560
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "body_background_color", [], "any", false, false, false, 1560));
            yield ",
        },
        body: {
          backgroundColor: ";
            // line 1563
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "background_color", [], "any", false, false, false, 1563));
            yield ",
        },
        woocommerce: {
          brandingColor: ";
            // line 1566
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "base_color", [], "any", false, false, false, 1566));
            yield ",
          headingFontColor: ";
            // line 1567
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "base_text_color", [], "any", false, false, false, 1567));
            yield ",
          isSavedWithUpdatedStyles: true,
        },
      },
      hiddenWidgets: ['automatedLatestContentLayout', 'header', 'footer', 'posts', 'products'],
      ";
        }
        // line 1573
        yield "      ";
        if (($context["is_confirmation_email_template"] ?? null)) {
            // line 1574
            yield "      hiddenWidgets: ['automatedLatestContentLayout', 'coupon', 'header', 'footer', 'posts', 'products'],
      ";
        }
        // line 1576
        yield "      coupon: ";
        yield json_encode(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["woocommerce"] ?? null), "coupon", [], "any", false, false, false, 1576), "config", [], "any", false, false, false, 1576));
        yield ",
    };

    wp.hooks.doAction('mailpoet_newsletters_editor_initialize', config);

  </script>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "newsletter/editor.html";
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
        return array (  2124 => 1576,  2120 => 1574,  2117 => 1573,  2108 => 1567,  2104 => 1566,  2098 => 1563,  2092 => 1560,  2086 => 1557,  2080 => 1554,  2074 => 1551,  2068 => 1548,  2062 => 1545,  2058 => 1543,  2056 => 1542,  2052 => 1541,  2048 => 1540,  2044 => 1539,  2040 => 1538,  2036 => 1536,  2034 => 1534,  2030 => 1533,  2024 => 1530,  2020 => 1529,  2016 => 1528,  2005 => 1520,  1981 => 1499,  1977 => 1498,  1973 => 1497,  1966 => 1493,  1945 => 1475,  1939 => 1472,  1923 => 1459,  1918 => 1456,  1916 => 1454,  1907 => 1448,  1902 => 1445,  1900 => 1443,  1848 => 1394,  1843 => 1392,  1789 => 1341,  1784 => 1339,  1779 => 1337,  1774 => 1335,  1748 => 1312,  1721 => 1292,  1676 => 1250,  1635 => 1212,  1630 => 1210,  1625 => 1208,  1620 => 1206,  1568 => 1157,  1563 => 1155,  1558 => 1153,  1553 => 1151,  1500 => 1101,  1496 => 1100,  1489 => 1096,  1481 => 1091,  1473 => 1086,  1465 => 1081,  1461 => 1080,  1454 => 1076,  1450 => 1075,  1443 => 1071,  1435 => 1066,  1427 => 1061,  1409 => 1045,  1407 => 1043,  1404 => 1042,  1402 => 1040,  1399 => 1039,  1397 => 1037,  1394 => 1036,  1392 => 1034,  1389 => 1033,  1387 => 1031,  1384 => 1030,  1382 => 1028,  1379 => 1027,  1377 => 1025,  1374 => 1024,  1372 => 1022,  1369 => 1021,  1367 => 1019,  1362 => 1016,  1360 => 1014,  1357 => 1013,  1355 => 1011,  1352 => 1010,  1350 => 1008,  1347 => 1007,  1345 => 1005,  1342 => 1004,  1340 => 1002,  1337 => 1001,  1335 => 999,  1332 => 998,  1330 => 996,  1327 => 995,  1325 => 993,  1322 => 992,  1320 => 990,  1315 => 987,  1313 => 985,  1310 => 984,  1308 => 982,  1305 => 981,  1303 => 979,  1300 => 978,  1298 => 976,  1295 => 975,  1293 => 973,  1290 => 972,  1288 => 970,  1285 => 969,  1283 => 967,  1280 => 966,  1278 => 964,  1275 => 963,  1273 => 961,  1268 => 958,  1266 => 956,  1263 => 955,  1261 => 953,  1258 => 952,  1256 => 950,  1253 => 949,  1251 => 947,  1248 => 946,  1246 => 944,  1243 => 943,  1241 => 941,  1238 => 940,  1236 => 938,  1233 => 937,  1231 => 935,  1228 => 934,  1226 => 932,  1221 => 929,  1219 => 927,  1216 => 926,  1214 => 924,  1211 => 923,  1209 => 921,  1206 => 920,  1204 => 918,  1201 => 917,  1199 => 915,  1196 => 914,  1194 => 912,  1191 => 911,  1189 => 909,  1186 => 908,  1184 => 906,  1181 => 905,  1179 => 903,  1174 => 900,  1172 => 898,  1169 => 897,  1167 => 895,  1164 => 894,  1162 => 892,  1159 => 891,  1157 => 889,  1154 => 888,  1152 => 886,  1149 => 885,  1147 => 883,  1144 => 882,  1142 => 880,  1139 => 879,  1137 => 877,  1134 => 876,  1132 => 874,  1127 => 871,  1125 => 869,  1122 => 868,  1120 => 866,  1117 => 865,  1115 => 863,  1112 => 862,  1110 => 860,  1107 => 859,  1105 => 857,  1102 => 856,  1100 => 854,  1097 => 853,  1095 => 851,  1092 => 850,  1090 => 848,  1087 => 847,  1085 => 845,  1080 => 842,  1078 => 840,  1075 => 839,  1073 => 837,  1070 => 836,  1068 => 834,  1065 => 833,  1063 => 831,  1060 => 830,  1058 => 828,  1055 => 827,  1053 => 825,  1050 => 824,  1048 => 822,  1045 => 821,  1043 => 819,  1040 => 818,  1038 => 816,  1033 => 813,  1031 => 811,  1028 => 810,  1026 => 808,  1023 => 807,  1021 => 805,  1018 => 804,  1016 => 802,  1013 => 801,  1011 => 799,  1008 => 798,  1006 => 796,  1003 => 795,  1001 => 793,  998 => 792,  996 => 790,  993 => 789,  991 => 787,  986 => 784,  984 => 782,  981 => 781,  979 => 779,  976 => 778,  974 => 776,  971 => 775,  969 => 773,  966 => 772,  964 => 770,  961 => 769,  959 => 767,  956 => 766,  954 => 764,  951 => 763,  949 => 761,  946 => 760,  944 => 758,  938 => 754,  919 => 737,  917 => 736,  883 => 705,  879 => 704,  875 => 703,  871 => 702,  566 => 400,  563 => 399,  559 => 398,  553 => 395,  545 => 389,  543 => 388,  537 => 385,  533 => 384,  529 => 383,  499 => 356,  496 => 355,  492 => 354,  486 => 351,  484 => 348,  481 => 347,  479 => 344,  476 => 343,  474 => 340,  471 => 339,  469 => 336,  466 => 335,  464 => 332,  461 => 331,  459 => 328,  456 => 327,  454 => 324,  451 => 323,  449 => 320,  446 => 319,  444 => 316,  441 => 315,  439 => 312,  436 => 311,  434 => 308,  431 => 307,  429 => 304,  426 => 303,  424 => 300,  421 => 299,  419 => 296,  416 => 295,  414 => 292,  411 => 291,  409 => 288,  406 => 287,  404 => 284,  401 => 283,  399 => 280,  396 => 279,  394 => 276,  391 => 275,  389 => 272,  386 => 271,  384 => 268,  381 => 267,  379 => 264,  376 => 263,  374 => 260,  371 => 259,  369 => 256,  366 => 255,  364 => 252,  361 => 251,  359 => 248,  356 => 247,  354 => 244,  351 => 243,  349 => 240,  346 => 239,  344 => 236,  341 => 235,  339 => 232,  336 => 231,  334 => 228,  331 => 227,  329 => 224,  326 => 223,  324 => 220,  321 => 219,  319 => 216,  316 => 215,  314 => 212,  311 => 211,  309 => 208,  306 => 207,  304 => 204,  301 => 203,  299 => 200,  296 => 199,  294 => 196,  291 => 195,  289 => 192,  286 => 191,  284 => 188,  281 => 187,  279 => 184,  276 => 183,  274 => 180,  271 => 179,  269 => 176,  266 => 175,  264 => 172,  261 => 171,  259 => 168,  256 => 167,  254 => 164,  251 => 163,  249 => 160,  246 => 159,  244 => 156,  241 => 155,  239 => 152,  236 => 151,  234 => 148,  231 => 147,  229 => 144,  226 => 143,  224 => 140,  221 => 139,  219 => 136,  216 => 135,  214 => 132,  211 => 131,  209 => 128,  206 => 127,  204 => 124,  201 => 123,  199 => 120,  196 => 119,  194 => 116,  191 => 115,  189 => 112,  186 => 111,  184 => 108,  181 => 107,  179 => 104,  176 => 103,  174 => 100,  171 => 99,  169 => 96,  166 => 95,  164 => 92,  161 => 91,  159 => 88,  156 => 87,  154 => 84,  151 => 83,  149 => 80,  146 => 79,  144 => 76,  141 => 75,  139 => 72,  136 => 71,  134 => 68,  131 => 67,  129 => 64,  126 => 63,  124 => 60,  121 => 59,  119 => 56,  116 => 55,  114 => 52,  111 => 51,  109 => 48,  106 => 47,  104 => 44,  101 => 43,  99 => 40,  96 => 39,  94 => 36,  91 => 35,  89 => 32,  86 => 31,  84 => 28,  81 => 27,  79 => 24,  76 => 23,  74 => 20,  71 => 19,  69 => 16,  66 => 15,  64 => 12,  61 => 11,  59 => 8,  56 => 7,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/editor.html", "/home/circleci/mailpoet/mailpoet/views/newsletter/editor.html");
    }
}
