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
		<div class ="container">
				<!--footer widgets -->
				<div id="footer-widgets">
					<php if(is_active_sidebar('footer')):?>
						<aside id="widget-foot" class="widget-foot">
					<?php dynamic_sidebar( 'footer' ); ?>
						</aside>
					<?php endif; ?>
				</div>


				<div class="site-info">
					<a href="<?php echo 
					esc_url( __( 'https://wordpress.org/', 'burger-artist-master' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'burger-artist-master' ), 'WordPress' ); ?>
					</a>
				<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'burger-artist-master' ), 'burger-artist-master', '<a href="http://google.com" rel="designer">Maurizio & ZiXin</a>' ); ?>
				</div><!-- .site-info -->
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
