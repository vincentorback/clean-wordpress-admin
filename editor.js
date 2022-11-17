wp.domReady(function () {
  /**
   * Remove editor panels
   */
  wp.data
    .dispatch('core/edit-post')
    .removeEditorPanel('taxonomy-panel-post_tag')

  wp.data.dispatch('core/edit-post').removeEditorPanel('page-attributes')

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
  function (settings, name) {
    switch (name) {
      // Image bock
      case 'core/file': {
        settings.attributes.showDownloadButton.default = false // Hide download button from file links
        break
      }
    }

    return settings
  }
)

/**
 * Unregister plugins
 */
wp.domReady(function () {
  // You can log the IDs registered plugins to see which you can remove
  console.log(wp.plugins.getPlugins())

  // Unregister jetpack plugins
  wp.plugins.unregisterPlugin('jetpack-sidebar')
  wp.plugins.unregisterPlugin('jetpack-social-previews')
  wp.plugins.unregisterPlugin('jetpack-likes-and-sharing-panel')

  // Unregister all embed blocks
  wp.blocks.getBlockVariations('core/embed').forEach(function (blockVariation) {
    wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name)
  })

  // Unregister all embeds but the ones you want
  const allowedEmbedBlocks = ['vimeo', 'youtube']

  wp.blocks.getBlockVariations('core/embed').forEach(function (blockVariation) {
    if (!allowedEmbedBlocks.includes(blockVariation.name)) {
      wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name)
    }
  })
})
