<?php
/**
 * Template Name: The Burger Artist Home
 *
 *
 * @package burger-artist-master
 */

get_header(); ?>
		
			
			
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
			$paged = (get_query_var('page'));
			$args = array (
				'posts_per_page' => 4,
				'category_name' => 'uncategorized',
				'paged' => $paged
				);
			
			$counter = 1;
			$grids = 2;
			$wp_query = new WP_Query ( $args );
			
			if($wp_query->have_posts() ) : 
				while($wp_query->have_posts() ) : $wp_query->the_post();
		?>
		
		<div class="homepage-columns">
		
			<?php
				if($counter == 1):
			
			?>
		
			<div class="column-one">
				<?php the_post_thumbnail("menuPics");?> 
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<?php the_excerpt(); ?>
			</div>
			
			<?php elseif($counter == $grids): ?>
			<div class="column-two">
				<?php the_post_thumbnail("menuPics");?> 
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<?php the_excerpt(); ?>
			</div>
			
			
			<div class="clearfix"> 
			
			</div>
			
			
			<?php $counter = 0;
			endif; ?> 
			<?php $counter++; ?> 
			<?php endwhile; ?> 
			<?php else : ?>

			
			
			<?php endif; 
				wp_reset_postdata();
			?>
			
			
		
		</div>

		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>