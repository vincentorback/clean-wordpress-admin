# Clean WordPress Admin
A collection of functions to clean up WordPress front and back-end to make it easier for editors to work and for you to look at the source code. Hiding content is also a good thing to do to limit the possibilities for your clients to destroy your beautiful site :)


## Content

### [Admin bar](admin-bar.php)
Hide items and sub-items in the admin bar. Also known as the Toolbar.

### [Admin footer](admin-footer.php)
Hide 'Thank you' text and version number in the admin footer

### [Admin menu](admin-menu.php)
Hide items and sub-items in the admin menu.

### [Comments](comments.php)
Remove default fields in comment form.

### [Contextual tabs](contextual-tabs.php)
Remove all or specific contextual tabs with help and information about how to use the WordPress interface.

### [Dashboard](dashboard.php)
Remove dashboard meta boxes or even the whole dashboard itself.

### [Emojis](emojis.php)
Disable built in emojis (since 4.2 WordPress) that loads large JavaScript, CSS and image files :-1:

### [Head](head.php)
Clears out generated unwanted stuff from the wp_head hook. Such as feeds and WordPress version.

### [Images](images.php)
Remove functions related to images like the gallery, default link, alignment and sizes.

### [JavaScript](javascript.php)
De-registers the WordPress default jQuery script.

### [Media Uploader](media-uploader.php)
Remove actions from the media uploader

### [Notifications](notifications.php)
Remove notifications about core/plugin updates.

### [Post columns](post-columns.php)
Remove columns shown on the manage posts screen.

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

### [Theme](theme.php)
Remove theme features.

### [Widgets](widgets.php)
Remove default widgets.

### [WYSIWYG](wysiwyg.php)
Change settings and clean up the TinyMCE WYSIWYG.

#### [Extras](extras.php)
A pretty personal collection of good, fun and just necessary functions to make WordPress development easier.


## Using
Don’t just include these files in your project. Look at the content, update the options and see what works for you!

 You should probably keep some things visible for you or a super admin. Check the user role like this:
```php
if ( ! current_user_can( 'administrator' ) ) {
  // Clean it up!
}
```


## Contribution
Feel free to [suggest anything](https://github.com/vincentorback/clean-wordpress-admin/issues) you see missing or want fixed!
