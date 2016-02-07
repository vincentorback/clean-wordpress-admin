<?php

/**
 * Add extra or remove buttons from the WYSIWYG
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/mce_buttons,_mce_buttons_2,_mce_buttons_3,_mce_buttons_4
 *
 * mce_buttons - The primary toolbar (always visible)
 * mce_buttons_2 - The advanced toolbar (can be toggled on/off by user)
 * mce_buttons_3 - By default, WordPress does not use/display this toolbar
 * mce_buttons_4 - By default, WordPress does not use/display this toolbar
*/

// Add buttons
add_filter( 'mce_buttons_3', function ( $buttons ) {
  $buttons[] = 'fontselect';
  $buttons[] = 'fontsizeselect';
  $buttons[] = 'backcolor';
  $buttons[] = 'hr';

  return $buttons;
});


/**
 * Change default TinyMCE WYSIWYG settings.
 * @link https://codex.wordpress.org/TinyMCE
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

  $settings['toolbar1'] = 'formatselect,bold,italic,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,underline';
  $settings['toolbar2'] = '';

  $settings['block_formats'] = "Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3;";

  // Create your own JavaScript preprocessor that triggers before pasting
  $settings['paste_preprocess'] = "function (plugin, args) {
    // Strip all HTML tags except those we have whitelisted
    var whitelist = 'p,span,b,strong,i,em,h3,h4,h5,h6,ul,li,ol';
    var stripped = $('<div>' + args.content + '</div>');
    var els = stripped.find('*').not(whitelist);
    for (var i = els.length - 1; i >= 0; i--) {
      var e = els[i];
      $(e).replaceWith(e.innerHTML);
    }
    // Strip all class and id attributes
    stripped.find('*').removeAttr('id').removeAttr('class');
    // Return the clean HTML
    args.content = stripped.html();
  }";

  return $settings;
});
