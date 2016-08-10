# Clean WordPress Admin
A collection of functions to clean up WordPress front and back-end to make it easier for editors to work and for you to look at the source code. Hiding content is also a good thing to do to limit the possibilities for your clients to destroy your beautiful site :)


## Content

### [Admin menu](admin-bar.php)
Hide items and sub-items in the admin menu. Also known as the Toolbar.

### [Head](head.php)
Clears out generated unwanted stuff from the wp_head hook. Such as feeds and WordPress version.

### [Comments](comments.php)
Remove default comment parsing

### [Contextual tabs](contextual-tabs.php)
Remove all or specific contextual tabs with help and information about how to use the WordPress interface.

### [Dashboard](dashboard.php)
Remove dashboard metaboxes or even the whole dashboard itself.

### [Emojis](emojis.php)
Disable the built in emojis (since 4.2 WordPress) that loads large JavaScript, CSS and image files.

### [JavaScript](javascript.php)
De-registers the WordPress stock jQuery script.

### [Notifications](notifications.php)
Remove notifications about core/plugin updates.

### [Posts](posts.php)
Remove specific metaboxes from post-types.

### [Profile](profile.php)
Remove fields from the user profile page, like contact information or the Biographical Info section.

### [Roles](roles.php)
Remove default roles. Remove capabilities to specific roles or users.

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
