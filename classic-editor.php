<?php

/**
 * Disable rich/visual editor
 *
 * @link https://developer.wordpress.org/reference/hooks/user_can_richedit/
 */
add_filter('user_can_richedit', '__return_false', 50);


/**
 * Set default editor mode to 'html' or 'tinymce'
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_default_editor/
 */
add_filter(
    'wp_default_editor', function () {
        return 'html';
    }
);


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
        $settings['keep_styles'] = false;
        $settings['accessibility_focus'] = true;
        $settings['paste_remove_styles'] = true;
        $settings['paste_remove_spans'] = true;
        $settings['paste_strip_class_attributes'] = 'all';
        $settings['block_formats'] = "Paragraph=p; Heading 1=h1; Heading 2=h2";
        $settings['toolbar1'] = 'bold,italic,link,unlink';
        $settings['toolbar2'] = 'formatselect,removeformat';
        $settings['toolbar3'] = '';
        $settings['toolbar4'] = '';

        return $settings;
    }
);
