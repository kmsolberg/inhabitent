<?php
/**
 * Template Name: About
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-full-width">
	<div class="about-hero">
		<h1> About </h1>
	</div>
	<main id="main-about" class="site-main scroll-stop" role="main">

		
		<h2>Our Story</h2>
		<?php echo CFS()->get( 'editor' );?>
		<h2>Our Team</h2>
		<?php echo CFS()->get( 'our_team' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
		

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>