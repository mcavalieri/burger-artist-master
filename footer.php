<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package burger-artist-master
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">	
			<!--footer widgets starts-->
			<div class="footer-widgets">
				<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
	                	
	                    	<?php dynamic_sidebar( 'footer-widget-area' ); ?>
	                
	            <?php endif; ?>
			</div><!--footer widget ends-->
		
		
				<!--site info starts-->
				<div class="site-info">
					<a href="<?php echo 
					esc_url( __( 'https://wordpress.org/', 'burger-artist-master' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'burger-artist-master' ), 'WordPress' ); ?>
					</a>
				<span class="sep"> | </span>
					<?php printf( 
					esc_html__( 'Theme: %1$s by %2$s.', 'burger-artist-master' ), 'burger-artist-master', '<a href="http://google.com" rel="designer">Maurizio & ZiXin</a>' ); 
					$facebook_url = get_option('facebook_url');
					?>
						<a href="<?php echo $facebook_url; ?>"> - Facebook</a>
					<?php
					$twitter_url = get_option('twitter_url');
					?>
						<a href="<?php echo $twitter_url; ?>"> - Twitter</a>
					<?php									
					$yelp_url = get_option('yelp_url'); 
					?>
					<a href="<?php echo $yelp_url; ?>"> - Yelp</a>
			
				</div><!-- .site-info -->
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
