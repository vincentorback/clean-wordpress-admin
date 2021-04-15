<?php

/**
 * Remove actions from Media Upload
 * This will just remove the strings for the buttons, not disable their functionality completelly.

 * @link https://developer.wordpress.org/reference/hooks/media_view_strings/
 */

add_filter(
	'media_view_strings',
	function ( $strings ) {
		$strings['createGalleryTitle']       = null; // Remove "Create gallery"-button.
		$strings['createPlaylistTitle']      = null; // Remove "Create Audio Playlist"-button.
		$strings['createVideoPlaylistTitle'] = null; // Remove "Create Video Playlist"-button.
		$strings['insertFromUrlTitle']       = null; // Remove "Insert from URL"-button.
		$strings['setFeaturedImageTitle']    = null; // Remove "Featured Image"

		return $strings;
	}
);


/**
 * Hide input fields when uploading or editing media
 */
add_action(
	'admin_print_scripts',
	function () {
		?><style>
	.attachment-details .setting[data-setting="alt"], /* Alt attribute */
	.attachment-details #alt-text-description, /* and the description under it */

	.attachment-details .setting[data-setting="caption"], /* Media caption */
	.attachment-details .setting[data-setting="description"], /* Media description */
	.attachment-details .setting[data-setting="title"], /* Media title */
	.attachment-details .setting[data-setting="url"], /* Media url */
	.attachment-details .setting[data-setting="artist"], /* Audio artist */
	.attachment-details .setting[data-setting="album"] /* Audio album */
	{
		display: none;
	}
	</style>
		<?php
	}
);
