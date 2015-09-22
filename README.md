# Clean WordPress Admin
A collection of functions to clean up WordPress front-end and back-end
to make it easier for clients to work and me to view the code.

## Content

### User capabilities
Remove and add administrating capabilities to specific roles or users. Like preventing user to switch themes or delete others posts.

### Admin menu
Hide items in the admin menu. Because who uses Media anyway?

### Profile fields
Remove and add fields to the user profile page.

### Clean head
Clears out generated unwanted stuff from the wp_head hook. Such as feeds and WordPress version

#### Extras
A pretty personal collection of good, fun and just necessary functions
to make WordPress development easier.

## Using
Hiding content is often something you want to do for you clients so that they don’t destroy your beautiful site. I usually use these back-end cleaning after checking that the user is not the admin.
```php
if ( ! current_user_can( 'administrator' ) ) {
  // Clean it up!
}
```

## TODO
- [ ] Hide/add items in the Admin bar
- [ ] Hide links to WordPress documentation, forum etc.
- [ ] Hide specific items in post/page edit page.
- [ ] Hide/add items to the WYSIWYG

## How to collaborate
Just send a pull request or open an issue!
