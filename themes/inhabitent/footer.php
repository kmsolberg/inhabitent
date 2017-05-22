<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info container">
					<div class="footer-lists">
						<ul class="contact-info"><span class="capitalize category">Contact Info</span>
							<li>
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<a href= "mailto:info@inhabitent.com">info@inhabitent.com</a>
							</li>
							<li>
								<i class="fa fa-phone" aria-hidden="true"></i>
								778-456-7891
							</li>
							<li>
								<i class="fa fa-facebook-square" aria-hidden="true"></i>
								<i class="fa fa-twitter-square" aria-hidden="true"></i>
								<i class="fa fa-google-plus-square" aria-hidden="true"></i>
							</li>
						</ul>
						<ul class="business-hours"><span class="capitalize category">Business Hours</span>
							<li>
								<span class="bold">Monday-Friday:</span>
								9am to 5pm
							</li>
							<li>
								<span class="bold">Saturday:</span>
								10am to 2pm
							</li>						
							<li>
								<span class="bold">Sunday:</span>
								Closed
							</li>
						</ul>
					</div>
        	<img class="footer-logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/inhabitent-logo-text.svg" alt="inhabitent logo">
				</div><!-- .site-info -->
				<div class="copyright">
					<span class="capitalize">copyright &copy;2016 inhabitent </span>
				</div>
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
