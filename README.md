# Clean WordPress Admin
A collection of functions to clean up WordPress front and back-end to make it easier for editors to work and for you to look at the source code. Hiding content is also a good thing to do to limit the possibilities for your clients to destroy your beautiful site :)

**Tested with version: 5.2.3**

## Using
Don’t just include these files in your project. Look at the content, update the options and see what works for you! The code is not optimized for speed, it’s optimized for readability. Sometimes the impact on performance makes these functions not eligible.

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
Hide 'Thank you' text and version number in the admin footer

### [Admin menu](admin-menu.php)
Hide items and sub-items in the admin menu.

### [Classic editor](classic-editor.php)
Change settings and clean up the classic editor (the one before Gutenberg).

### [Comments](comments.php)
Remove default fields in the comment form.

### [Contextual tabs](contextual-tabs.php)
Remove all or specific contextual tabs with help and information about how to use the WordPress interface.

### [Dashboard](dashboard.php)
Remove dashboard meta boxes or even the whole dashboard itself.

### [Editor](editor.php)
Change editors settings or disable it completly.

### [Emojis](emojis.php)
Disable built-in emojis that loads large JavaScript, CSS and image files :-1:

### [Head](head.php)
Clears out generated unwanted stuff from the wp_head hook. Such as feeds and WordPress version.

### [Images](images.php)
Remove functions related to images like the gallery, default link, alignment, and sizes.

### [JavaScript](javascript.php)
De-registers the WordPress default jQuery script.

### [Media Upload](media-upload.php)
Remove actions from the media uploader

### [Post columns](post-columns.php)
Remove columns shown in the manage posts screen.

### [Posts](posts.php)
Remove specific meta boxes from post-types.

### [Profile](profile.php)
Remove fields from the user profile page, like contact information or the Biographical Info section.

### [REST API](rest-api.php)
Disable the REST API

### [Roles](roles.php)
Remove default roles. Remove capabilities to specific roles or users.

### [Search](search.php)
Disable search query and search form.

### [Taxonomies](taxonomies.php)
Remove default taxonomies.

### [Theme](theme.php)
Remove theme features.

### [TinyMCE editor](tinymce-editor.php)
Change settings in the old TinyMCE WYSIWYG editor.

### [Updates](updates.php)
Disable updates and remove notifications.

### [Widgets](widgets.php)
Remove default widgets.

## Plugins
Functions to clean up common plugins.

### [Advanced Custom Fields](plugins/acf.php)

### [Yoast SEO](plugins/yoast-seo.php)

## Contribution
Feel free to [suggest anything](https://github.com/vincentorback/clean-wordpress-admin/issues) you see missing or want to be fixed!
