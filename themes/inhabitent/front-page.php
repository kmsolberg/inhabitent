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

		<div class="journal">
			<h1>inhabitent journal</h1>		
			<ul>
				<?php
					$args = array( 'numberposts' => '3' );
					$recent_posts = wp_get_recent_posts( $args );

					foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
					}
				?>
			</ul>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
