<?php

/**
 * Remove actions from Media Upload
 * This will just remove the strings for the buttons, not disable their functionality completelly.

 * @link https://developer.wordpress.org/reference/hooks/media_view_strings/
 */

add_filter(
    'media_view_strings', function ( $strings ) {
        $strings['createGalleryTitle'] = null; // Remove "Create gallery"-button.
        $strings['createPlaylistTitle'] = null; // Remove "Create Audio Playlist"-button.
        $strings['createVideoPlaylistTitle'] = null; // Remove "Create Video Playlist"-button.
        $strings['insertFromUrlTitle'] = null; // Remove "Inset from URL"-button.
        $strings['setFeaturedImageTitle'] = null; // Remove "Featured Image"

        return $strings;
    }
);
