<?php

/**
 * Enable thumbnails
 */
 add_theme_support( 'post-thumbnails' );


/**
 * Custom excerpt ending, instead of [...]
 */
 add_filter('excerpt_more', function () {
   return '...';
 });


/**
 * Change excerpt length
 */
 add_filter('excerpt_length', function () {
   return 100;
 });
