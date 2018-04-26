<?php

/**
 * Hide Personal Options settings
 *
 * Visual Editor - .user-rich-editing-wrap
 * Syntax Highlighting - .user-syntax-highlighting-wrap
 * Admin Color Scheme - .user-admin-color-wrap
 * Keyboard Short - .user-comment-shortcuts-wrap
 * Show Toolbar - .show-admin-bar
 * Language - .user-language-wrap
 * Biographical Info - .user-description-wrap
 */

add_action( 'admin_init', function () {
  // Profile page
  add_action( 'admin_print_scripts-profile.php', function () {
    ?><style>
    .user-rich-editing-wrap,
    .user-syntax-highlighting-wrap,
    .user-admin-color-wrap,
    .user-comment-shortcuts-wrap,
    .show-admin-bar,
    .user-language-wrap,
    .user-description-wrap {
      display: none;
    }</style><?php
  });

  // Edit user page
  add_action( 'admin_print_scripts-user-edit.php', function () {
    ?><style>
    .user-rich-editing-wrap,
    .user-syntax-highlighting-wrap,
    .user-admin-color-wrap,
    .user-comment-shortcuts-wrap,
    .show-admin-bar,
    .user-language-wrap,
    .user-description-wrap {
      display: none;
    }</style><?php
  });
});
