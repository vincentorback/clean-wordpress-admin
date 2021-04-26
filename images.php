<?php

/**
 * Set default image attachment options
 *
 * @link https://developer.wordpress.org/apis/handbook/options/
 */
add_action(
	'after_setup_theme',
	function () {
		// Remove default link
		if ( get_option( 'image_default_link_type' ) !== 'none' ) {
			update_option( 'image_default_link_type', 'none' );
		}

		// Remove default alignment
		if ( get_option( 'image_default_align' ) !== 'none' ) {
			update_option( 'image_default_align', 'none' );
		}

		// Set default size
		if ( get_option( 'image_default_size' ) !== 'large' ) {
			update_option( 'image_default_size', 'large' );
		}
	}
);


/**
 * Remove srcset on images
 *
 * @link https://developer.wordpress.org/reference/functions/wp_calculate_image_srcset/
 */
add_filter( 'wp_calculate_image_srcset', '__return_false' );


/**
 * Remove lazy loading
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_lazy_loading_enabled/
 */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );
add_filter( 'wp_lazy_loading_enabled', '__return_false', 'img' ); // disable only on img elements
add_filter( 'wp_lazy_loading_enabled', '__return_false', 'iframe' ); // disable only on iframe elements


/**
 * Remove size attributes from images
 *
 * @param String $html
 */
if ( ! function_exists( 'remove_size_attributes' ) ) {
	function remove_size_attributes( $html ) {
		return preg_replace( '/(width|height)="\d*"/', '', $html );
	}

	// Remove size attributes from thumbnail images
	add_filter( 'post_thumbnail_html', 'remove_size_attributes' );

	// Remove size attributes in the editor
	add_filter( 'image_send_to_editor', 'remove_size_attributes' );

	// Remove size attributes from the_content
	add_filter( 'the_content', 'remove_size_attributes' );
}
