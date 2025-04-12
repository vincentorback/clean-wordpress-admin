<?php

namespace Komm;

function my_disable_feed() {
	wp_die( 'No feed available' );
}

add_action( 'do_feed_rdf', 'my_disable_feed', 1 );
add_action( 'do_feed_rss', 'my_disable_feed', 1 );
add_action( 'do_feed_rss2', 'my_disable_feed', 1 );
add_action( 'do_feed_atom', 'my_disable_feed', 1 );
add_action( 'do_feed_rss2_comments', 'my_disable_feed', 1 );
add_action( 'do_feed_atom_comments', 'my_disable_feed', 1 );
