<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package burger-artist-master
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else { ?> 
				<br/><div id="burger-menu"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('menuPics'); ?></a></div>
		<?php }

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php burger_artist_master_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	

	<footer class="entry-footer">
		<?php burger_artist_master_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->