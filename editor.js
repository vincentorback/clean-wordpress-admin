wp.domReady( function () {
  /**
   * Remove editor panels
   */
  wp.data
    .dispatch( 'core/edit-post' )
    .removeEditorPanel( 'taxonomy-panel-post_tag' )

  wp.data
    .dispatch( 'core/edit-post' )
    .removeEditorPanel( 'page-attributes' )

  /**
   * Remove rich text formats from rich text blocks.
   */
  wp.richText.unregisterFormatType( 'core/bold' )
  wp.richText.unregisterFormatType( 'core/code' )
  wp.richText.unregisterFormatType( 'core/image' )
  wp.richText.unregisterFormatType( 'core/italic' )
  wp.richText.unregisterFormatType( 'core/strikethrough' )
  wp.richText.unregisterFormatType( 'core/underline' )
})

/**
 * Remove styles from blocks
 */
wp.hooks.addFilter(
  'blocks.registerBlockType',
  'your_namespace/editor',
  function ( settings, name ) {
    switch ( name ) {

      // Paragraph block
      case 'core/paragraph': {
        // Disable color settings
        settings.supports.color = false

        // Disable typography settings
        settings.supports.typography = {
          ...settings.supports.typography,
          __experimentalDefaultControls: {
            fontSize: false
          },
          __experimentalFontStyle: false,
          __experimentalFontWeight: false,
          __experimentalLetterSpacing: false,
          __experimentalTextTransform: false,
          fontSize: false,
          lineHeight: false,
        }
        break
      }

      // List block
      case 'core/list': {
        settings.supports.color = false // Disable color settings
        break
      }

      // Separator block
      case 'core/separator': {
        if ( settings.styles ) {
          settings.styles = settings.styles.filter( function (
            style
          ) {
            return [ 'wide', 'dots' ].indexOf( style.name ) === -1 // Removing styles 'wide' and 'dots'
          } )
        }
        break
      }

      // Image bock
      case 'core/image': {
        if ( settings.styles && Array.isArray( settings.styles ) ) {
          settings.styles = settings.styles.filter( function ( style ) {
            return [ 'rounded' ].indexOf( style.name ) === -1 // Removing styles 'rounded'
          } )
        }
        break
      }

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
wp.domReady( function () {
  // You can log the IDs registered plugins to see which you can remove
  console.log(wp.plugins.getPlugins())

  // Unregister jetpack plugins
  wp.plugins.unregisterPlugin('jetpack-sidebar')
  wp.plugins.unregisterPlugin('jetpack-social-previews')
  wp.plugins.unregisterPlugin('jetpack-likes-and-sharing-panel')
})
