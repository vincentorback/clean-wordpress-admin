const ThemeNamespace = 'yournamespace'

/**
 * Remove styles from blocks
 */
wp.hooks.addFilter(
  'blocks.registerBlockType',
  `${ThemeNamespace}/editor`,
  function (settings, name) {
    switch (name) {
      // Image bock
      case 'core/file': {
        settings.attributes.showDownloadButton.default = false // Hide download button from file links
        break
      }
      case 'core/video': {
        settings.attributes.loop.default = true
        settings.attributes.playsInline.default = true
        settings.attributes.muted.default = true
        settings.attributes.autoplay.default = true
        settings.attributes.controls.default = false
      }

      case 'core/image': {
        settings.styles = []
      }
    }

    return settings
  }
)

wp.domReady(function () {
  /**
   * Remove editor panels
   */
  wp.data.dispatch('core/editor').removeEditorPanel('taxonomy-panel-post_tag')
  wp.data.dispatch('core/editor').removeEditorPanel('page-attributes')
  wp.data.dispatch('core/edit-post').removeEditorPanel('post-excerpt')
  wp.data.dispatch('core/edit-post').removeEditorPanel('advanced')

  /**
   * Remove rich text formats from rich text blocks.
   */
  wp.richText.unregisterFormatType('core/bold')
  wp.richText.unregisterFormatType('core/code')
  wp.richText.unregisterFormatType('core/image')
  wp.richText.unregisterFormatType('core/italic')
  wp.richText.unregisterFormatType('core/keyboard')
  wp.richText.unregisterFormatType('core/link')
  wp.richText.unregisterFormatType('core/strikethrough')
  wp.richText.unregisterFormatType('core/subscript')
  wp.richText.unregisterFormatType('core/superscript')
  wp.richText.unregisterFormatType('core/text-color')
  wp.richText.unregisterFormatType('core/underline')
})

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

/**
 * Disable fullscreen mode
 */
wp.domReady(function () {
  const isFullscreenMode = wp.data
    .select('core/edit-post')
    .isFeatureActive('fullscreenMode')

  if (isFullscreenMode) {
    wp.data.dispatch('core/edit-post').toggleFeature('fullscreenMode')
  }
})
