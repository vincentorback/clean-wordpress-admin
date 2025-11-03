# Clean WordPress Admin
A collection of functions to clean up WordPress front-end and back-end to make it easier for editors to work and for you to look at the source code. Hiding certain functionality also helps prevent clients from accidentally breaking site functionality.

**Tested with PHP 8.1 and WordPress 6.8**

## Using
Do not just include these files in your project. Look at the content, update the options and see what works for you! The code is not optimized for speed. It is optimized for readability. Some functions may have performance implications, so evaluate each one for your specific needs.

You should probably keep some things visible to you or a super admin. Check the user role like this:
```php
if ( ! current_user_can( 'administrator' ) ) {
  // Clean it up!
}
```

## Content

### [Admin bar](admin-bar.php)
Hide items and sub-items in the admin bar. Also known as the Toolbar.

### [Admin footer](admin-footer.php)
Hide 'Thank you' text and version number in the admin footer.

### [Admin menu](admin-menu.php)
Hide items and sub-items in the admin menu.

### [Assets](assets.php)
Remove some default loaded CSS and JavaScript.

### [Block settings and styles (theme.json)](theme.json)
Control editor settings, and settings for individual blocks.  
[Read more here](https://developer.wordpress.org/themes/global-settings-and-styles/)

### [Classic editor](classic-editor.php)
Change settings and clean up the classic editor (the one before Gutenberg).

### [Comments](comments.php)
Remove default fields in the comment form.

### [Content tables](content-tables.php)
Hide functions from tables with posts, users, plugins and more.

### [Contextual tabs](contextual-tabs.php)
Remove all or specific contextual tabs with help and information about how to use the WordPress interface.

### [Customizer](customizer.php)
Remove and disable the theme customizer.

### [Dashboard](dashboard.php)
Remove dashboard meta boxes or even the whole dashboard itself.

### [Editor](editor.php)
Change editor settings, hide meta boxes or disable the editor completely.

### [Editor (JavaScript)](editor.js)
Change editor settings, hide meta boxes, disable block functions, unregister plugins and more.

### [Email](email.php)
Disable email functions.

### [Emojis](emojis.php)
Disable built-in emojis that load large JavaScript, CSS and image files.

### [Feed](feed.php)
Disable RSS and other feeds.

### [Head](head.php)
Clears out generated unwanted stuff from the wp_head hook, such as feeds and the WordPress version.

### [Images](images.php)
Remove functions related to images like the default link, alignment, and sizes.

### [Login](login.php)
Remove functions from the login page.

### [Media](media.php)
Remove fields and actions from the media editor and set allowed file types.

### [Posts](posts.php)
Remove specific meta boxes from post-types.

### [REST API](rest-api.php)
Hide the URL with a custom prefix or disable it completely.

### [Roles](roles.php)
Remove default roles. Remove capabilities to specific roles or users.

### [Search](search.php)
Disable search query and search form.

### [Settings](settings.php)
Hide fields from settings pages.

### [TinyMCE editor](tinymce-editor.php)
Change settings in the old TinyMCE WYSIWYG editor.

### [Updates](updates.php)
Disable updates and remove notifications.

### [Users](users.php)
Remove things from user pages.

### [Widgets](widgets.php)
Remove default widgets.

## Plugins
Functions to clean up common plugins.

### [Advanced Custom Fields](plugins/acf.php)

### [Jetpack](plugins/jetpack.php)

### [Simple History](plugins/simple-history.php)

### [Yoast SEO](plugins/yoast-seo.php)

## Contribution
Feel free to [suggest anything](https://github.com/vincentorback/clean-wordpress-admin/issues) you see missing or want to be fixed!
