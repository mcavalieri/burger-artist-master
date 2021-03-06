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
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("menuPics");?> 
				</a>
				
			</div>
			
			<?php elseif($counter == $grids): ?>
			<div class="column-two">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("menuPics");?> 
				</a>
				
			</div>
			
			
			<div class="clearfix"> 
			
			</div>
			
			
			<?php $counter = 0;
			endif; ?> 
			<?php $counter++; ?> 
			<?php endwhile; ?> 
			<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>
			
			<?php endif; 
				wp_reset_postdata();
			?>
			
			
			
		
		</div>

		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>