<?php

/**
 * Disable editor for all post types
 */

add_filter('use_block_editor_for_post', '__return_false');


/**
 * Disable editor for a specific posts, post types, templates, etc.
 */
add_filter(
    'use_block_editor_for_post', function ($use_block_editor, $post) {
        // Disable for specific post ID
        if ($post->ID === 123) {
            return false;
        }

        // Disable for post type
        if ($post->post_type == 'event') {
            return false;
        }

        // Disable for page template
        if (basename(get_page_template($post->ID)) == 'template-events.php') {
            return false;
        }

        // Return default value
        return $use_block_editor;
    }, 10, 2
);


/**
 * Enable certain blocks
 */
add_filter(
    'allowed_block_types', function ($allowed_blocks, $post) {
        $allowed_blocks = array(

        // Common
        'core/paragraph',
        'core/image',
        'core/heading',
        'core/gallery',
        'core/list',
        'core/quote',
        'core/audio',
        'core/cover', // previously core/cover-image
        'core/file',
        'core/video',

        // Formatting
        'core/table',
        'core/verse',
        'core/code',
        'core/freeform',
        'core/html',
        'core/preformatted',
        'core/pullquote',

        // Layout Elements
        'core/button',
        'core/text-columns',
        'core/media-text',
        'core/more',
        'core/nextpage',
        'core/separator',
        'core/spacer',

        // Widgets
        'core/shortcode',
        'core/archives',
        'core/categories',
        'core/latest-comments',
        'core/latest-posts',
        'core/calendar',
        'core/rss',
        'core/search',
        'core/tag-cloud',

        // Embeds
        'core/embed',
        'core-embed/twitter',
        'core-embed/youtube',
        'core-embed/facebook',
        'core-embed/instagram',
        'core-embed/wordpress',
        'core-embed/soundcloud',
        'core-embed/spotify',
        'core-embed/flickr',
        'core-embed/vimeo',
        'core-embed/animoto',
        'core-embed/cloudup',
        'core-embed/collegehumor',
        'core-embed/dailymotion',
        'core-embed/funnyordie',
        'core-embed/hulu',
        'core-embed/imgur',
        'core-embed/issuu',
        'core-embed/kickstarter',
        'core-embed/meetup-com',
        'core-embed/mixcloud',
        'core-embed/photobucket',
        'core-embed/polldaddy',
        'core-embed/reddit',
        'core-embed/reverbnation',
        'core-embed/screencast',
        'core-embed/scribd',
        'core-embed/slideshare',
        'core-embed/smugmug',
        'core-embed/speaker',
        'core-embed/ted',
        'core-embed/tumblr',
        'core-embed/videopress',
        'core-embed/wordpress-tv'
        );

        // Can also be specified by posts
        if ($post->post_type === 'post') {
            $allowed_blocks = array(
            'core/paragraph',
            'core/heading'
            );
        }

        return $allowed_blocks;
    }, 10, 2
);


/**
 * Hide taxonomy metaboxes
 */
add_filter(
    'rest_prepare_taxonomy', function ($response, $taxonomy) {
        if ('post-tag' == $taxonomy->name) {
            $response->data['visibility']['show_ui'] = false;
        }

        if ('category' == $taxonomy->name) {
            $response->data['visibility']['show_ui'] = false;
        }

        return $response;
    }, 10, 2
);
