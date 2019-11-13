<?php

/**
 * Remove theme features
 *
 * @link https://codex.wordpress.org/Function_Reference/remove_theme_support
 */
add_action(
    'after_setup_theme', function () {
        remove_theme_support('post-formats');
        remove_theme_support('post-thumbnails');
        remove_theme_support('custom-background');
        remove_theme_support('custom-header');
        remove_theme_support('automatic-feed-links');
        remove_theme_support('html5');
        remove_theme_support('title-tag');
        remove_theme_support('menus');
    }, 11 
);
