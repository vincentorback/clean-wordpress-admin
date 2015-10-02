# Clean WordPress Admin
A collection of functions to clean up WordPress front-end and back-end
to make it easier for editors to work and for you to look at the source code.
Hiding content is also a good thing to do to limit the possibilities for your clients to destroy your beautiful site.


## Content

### Admin menu
Hide items and sub-items in the admin menu. Also known as the Toolbar.

### Clean head
Clears out generated unwanted stuff from the wp_head hook. Such as feeds and WordPress version.

### Contextual tabs
Remove all, remove specific or add new contextual tabs with information about how to use the interface on the current page in the WordPress admin.

### Dashboard
Remove dashboard metaboxes or even the whole dashboard itself.

### Notifications
Remove notifications about core/plugin updates.

### Posts
Remove specific metaboxes from post-types.

### Profile fields
Remove and add fields on the user profile page. Like contact information or the Biographical Info section.

### User capabilities
Remove and add administrating capabilities to specific roles or users. Like preventing user to switch themes or delete others posts.

### WYSIWYG
Remove and add buttons and change the settings of the TinyMCE WYSIWYG.

#### Extras
A pretty personal collection of good, fun and just necessary functions to make WordPress development easier.


## Using
Don’t just include these files in your project. Look at the content, update the options and see what works for you!

 I usually use the back-end cleaning functions after checking that the user isn’t the admin like this:
```php
if ( ! current_user_can( 'administrator' ) ) {
  // Clean it up!
}
```


## TODO
- [x] Hide/add items in the Admin bar
- [x] Hide links to WordPress help, documentation, forum etc.
- [x] Hide/add items to the WYSIWYG
- [x] Add custom contextual tabs
- [x] Hide WYSIWYG on specific post types
- [x] Completely remove the dashboard
- [x] Remove update notifications regarding core, plugins and themes updates
- [x] Hide specific meta boxes on different post type pages
- [ ] [Suggest something!?](https://github.com/vincentorback/clean-wordpress-admin/issues)
