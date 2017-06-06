<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			<div class="social-media">
				<p><i class="fa fa-facebook" aria-hidden="true"></i>	like</p>
				<p><i class="fa fa-twitter" aria-hidden="true"></i>	tweet</p>
				<p><i class="fa fa-pinterest" aria-hidden="true"></i> pin</p>
			</div>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
