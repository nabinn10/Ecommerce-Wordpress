<?php
if (!defined('ABSPATH')) exit;
// get the rendered post HTML content.
$template_html = apply_filters( 'mailpoet_email_editor_preview_post_template_html', get_post() );
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo $template_html;
