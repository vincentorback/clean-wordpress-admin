<?php

/**
 * Set default editor mode to 'html' or 'tinymce'
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_default_editor/
 */
add_filter('wp_default_editor', create_function('', 'return "html";'));


/**
 * Disable rich/visual editor
 *
 * @link https://developer.wordpress.org/reference/hooks/user_can_richedit/
 */
add_filter('user_can_richedit', '__return_false', 50);


/**
 * Change default TinyMCE WYSIWYG settings.
 *
 * @link https://codex.wordpress.org/TinyMCE
 *
 * @param $settings Object Array of TinyMCE settings
 */
add_filter(
    'tiny_mce_before_init', function ( $settings ) {
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
    }
);
