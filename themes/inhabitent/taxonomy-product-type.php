<?php
/**
 * The template for displaying product pages.
 *
 * @package RED_Starter_Theme
 */

 get_header(); ?>
 	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
      <?php the_archive_description( '<div class="taxonomy-description">', '</div>' );?>
		</header>
		
		<ul>
			<?php while ( have_posts() ) : the_post(); ?>
			<li>
			<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'medium' ); ?>
			<?php endif; ?>
			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
			$<?php echo get_post_meta($post->ID, 'price', true); ?>
			</li>
		</ul>
		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

 <?php get_footer(); ?>

