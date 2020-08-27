wp.domReady(function() {
	/**
	 * Remove editor panels
	 */
	wp.data
		.dispatch('core/edit-post')
		.removeEditorPanel('taxonomy-panel-post_tag')

	wp.data
		.dispatch('core/edit-post')
		.removeEditorPanel('page-attributes')

	/**
	 * Remove rich text formats from rich text blocks.
	 */
	wp.richText.unregisterFormatType('core/bold')
	wp.richText.unregisterFormatType('core/code')
	wp.richText.unregisterFormatType('core/image')
	wp.richText.unregisterFormatType('core/italic')
	wp.richText.unregisterFormatType('core/strikethrough')
	wp.richText.unregisterFormatType('core/underline')
})

/**
 * Remove styles from blocks
 */
wp.hooks.addFilter(
	'blocks.registerBlockType',
	'your_namespace/editor',
	function(settings, name) {
		switch (name) {
			// Separator block
			case 'core/separator':
				if (settings.styles) {
					settings.styles = settings.styles.filter(function (style) {
						return ['wide', 'dots'].indexOf(style.name) === -1 // Removing styles 'wide' and 'dots'
					})
				}
			case 'core/image':
				if (settings.styles && Array.isArray(settings.styles)) {
					settings.styles = settings.styles.filter(style => {
						return ['rounded'].indexOf(style.name) === -1 // Removing styles 'rounded'
					})
				}
				break
		}

		return settings
	}
)
