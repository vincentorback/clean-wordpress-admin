<?php

/**
 * Remove theme features
 *
 * @link https://developer.wordpress.org/reference/functions/remove_theme_support/
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/ (list of features)
 */
add_action(
	'after_setup_theme',
	function () {
		remove_theme_support( 'admin-bar' );
		remove_theme_support( 'align-wide' );
		remove_theme_support( 'automatic-feed-links' );
		remove_theme_support( 'core-block-patterns' );
		remove_theme_support( 'custom-background' );
		remove_theme_support( 'custom-header' );
		remove_theme_support( 'custom-line-height' );
		remove_theme_support( 'custom-logo' );
		remove_theme_support( 'customize-selective-refresh-widgets' );
		remove_theme_support( 'custom-spacing' );
		remove_theme_support( 'custom-units' );
		remove_theme_support( 'dark-editor-style' );
		remove_theme_support( 'disable-custom-colors' );
		remove_theme_support( 'disable-custom-font-sizes' );
		remove_theme_support( 'editor-color-palette' );
		remove_theme_support( 'editor-gradient-presets' );
		remove_theme_support( 'editor-font-sizes' );
		remove_theme_support( 'editor-styles' );
		remove_theme_support( 'featured-content' );
		remove_theme_support( 'html5' );
		remove_theme_support( 'menus' );
		remove_theme_support( 'post-formats' );
		remove_theme_support( 'post-thumbnails' );
		remove_theme_support( 'responsive-embeds' );
		remove_theme_support( 'starter-content' );
		remove_theme_support( 'title-tag' );
		remove_theme_support( 'wp-block-styles' );
		remove_theme_support( 'widgets' );
		remove_theme_support( 'widgets-block-editor' );
	},
	11
);


