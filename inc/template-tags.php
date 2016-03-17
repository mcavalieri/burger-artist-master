<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package burger-artist-master
 */

if ( ! function_exists( 'burger_artist_master_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function burger_artist_master_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

}
endif;

if ( ! function_exists( 'burger_artist_master_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function burger_artist_master_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'burger-artist-master' ) );
		if ( $categories_list && burger_artist_master_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'burger-artist-master' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'burger-artist-master' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'burger-artist-master' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	

	
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function burger_artist_master_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'burger_artist_master_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'burger_artist_master_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so burger_artist_master_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so burger_artist_master_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in burger_artist_master_categorized_blog.
 */
function burger_artist_master_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'burger_artist_master_categories' );
}
add_action( 'edit_category', 'burger_artist_master_category_transient_flusher' );
add_action( 'save_post',     'burger_artist_master_category_transient_flusher' );
