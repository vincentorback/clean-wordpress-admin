# Clean WordPress Admin
A collection of functions to clean up WordPress front-end and back-end
to make it easier for editors to work and for you to look at the source code.
Hiding content is also a good thing to do to limit the possibilities for your clients to destroy your beautiful site.


## Content

### Admin menu
Hide items and sub-items in the admin menu. Also known as the Toolbar.

### Clean head
Clears out generated unwanted stuff from the wp_head hook. Such as feeds and WordPress version.

### Comments
Remove default comment parsing

### Contextual tabs
Remove all or specific contextual tabs with help and information about how to use the WordPress interface.

### Dashboard
Remove dashboard metaboxes or even the whole dashboard itself.

### Emojis
Disable the built in emojis (since 4.2 WordPress) that loads large JavaScript, CSS and image files.

### JavaScript
De-registers the WordPress stock jQuery script.

### Notifications
Remove notifications about core/plugin updates.

### Posts
Remove specific metaboxes from post-types.

### Profile fields
Remove fields from the user profile page, like contact information or the Biographical Info section.

### Roles
Remove default roles. Remove capabilities to specific roles or users.

### Widgets
Remove default widgets.

### WYSIWYG
Change settings and clean up the TinyMCE WYSIWYG.

#### Extras
A pretty personal collection of good, fun and just necessary functions to make WordPress development easier.


## Using
Don’t just include the files in your project and be done. Look at the content, update the options and see what works for you!

 You should probably keep some things visible for you or a super admin. Check the user role like this:
```php
if ( ! current_user_can( 'administrator' ) ) {
  // Clean it up!
}
```


## Contribution
Feel free to [suggest anything](https://github.com/vincentorback/clean-wordpress-admin/issues) you see missing or want fixed!
