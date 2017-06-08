<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

 get_header(); ?>

 <!-- REST OF PAGE MARKUP AND PHP HERE -->
 	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</header><!-- .page-header -->
			
			<ul class="adventure-archive">
				<?php while ( have_posts() ) : the_post(); ?>
          <li>
            <div class="wrapper">
              <?php the_post_thumbnail(); ?>
              <div class="adventure-title">
                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>	
                <a href="<?php the_permalink() ?>"><p class="read-more capitalize white-button">Read More</p></a>
              </div>
            </div>
          </li>
				<?php endwhile; ?>
			</ul>	

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

 <?php get_footer(); ?>
