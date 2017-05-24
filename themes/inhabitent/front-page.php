<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content' ); ?>

			<?php endwhile; ?>
    <div class = "hero">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/inhabitent-logo-full.svg" alt="inhabitent logo">
  
			<?php the_posts_navigation(); ?>
    </div>
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
		
		<div class="shop">
			<h1>Shop Stuff</h1>
		</div>
		<h1>inhabitent journal</h1>	
		<div class="journal container">	
			<?php
			$args = array(
			'posts_per_page' => 3,
			); ?>

			<?php $posts = new WP_Query( $args ); ?>
			<?php if ( $posts->have_posts() ) : ?>
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<ul class="home-posts">
						<?php the_post_thumbnail(); ?>
						<div class = "post-text">
							<li class="date"><?php the_time('F jS, Y'); ?> / <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></li>
							<li><h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3></li>	
							<li><a class="read-more capitalize black-button" href="<?php the_permalink() ?>">Read Entry</a></li>	
						</div>			
					</ul>
				<?php endwhile; ?>
				<?php the_posts_navigation(); ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
						<h2>Nothing found!</h2>
			<?php endif; ?>
			</ul>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
