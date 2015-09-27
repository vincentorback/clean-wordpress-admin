<?php

/**
 * Add some extra buttons to the WYSIWYG
 *
 * mce_buttons - The primary toolbar (always visible)
 * mce_buttons_2 - The advanced toolbar (can be toggled on/off by user)
 * mce_buttons_3 - By default, WordPress does not use/display this toolbar
 * mce_buttons_4 - By default, WordPress does not use/display this toolbar
 */
add_filter( 'mce_buttons_3', function ( $buttons ) {
  $buttons[] = 'fontselect';
  $buttons[] = 'fontsizeselect';
  $buttons[] = 'backcolor';
  $buttons[] = 'hr';

  return $buttons;
});


/**
 * Change default TinyMCE WYSIWYG settings.
 * https://codex.wordpress.org/TinyMCE
 *
 * @param $settings Object Array of TinyMCE settings
 */
add_filter( 'tiny_mce_before_init', function ( $settings ) {
  $settings['remove_linebreaks'] = true;
  $settings['gecko_spellcheck'] = true;
  $settings['keep_styles'] = false;
  $settings['accessibility_focus'] = true;
  $settings['content_css'] = get_template_directory_uri() . '/custom-editor-style.css';
  $settings['paste_remove_styles'] = true;
  $settings['paste_remove_spans'] = true;
  $settings['paste_strip_class_attributes'] = 'all';

  return $settings;
});
