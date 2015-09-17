# Clean WordPress Admin
A collection of functions to clean up WordPress front-end and back-end
to make it easier for clients to work and me to view the code.

## Content

### User capabilites
Remove and add capabilites to roles and users.

### Admin menu
Hide items in the admin menu.

### Profile fields
Remove and add fields to the user profile page.

### Clean head
Clears out generated unwanted stuff from the wp_head hook.

#### Extras
A pretty personal collection of good, fun and just necessary functions
to make WordPress development easier.

## Using
Hiding content is often something you want to do for you clients so that they don’t destroy your beautiful site. I usually use these back-end cleaning after checking that the user is not the admin.
```php
if (!current_user_can('administrator')) {
  // Clean it up!
}
```

## How to Collaborate
Just send a pull request or open an issue!
