# Clean WordPress Admin
A collection of functions to clean up WordPress front-end and back-end
to make it easier for editors to work and for you to look at the source code.
Hiding content is also a good thing to do to limit the possibilities for your clients to destroy your beautiful site.

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
- [ ] Hide specific items in post/page edit page.
- [ ] Hide/add items to the WYSIWYG
- [ ] Add custom contextual tabs

## How to collaborate
Just send a pull request or open an issue!
