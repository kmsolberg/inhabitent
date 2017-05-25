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
        <?php
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<div class="category-links">
				<?php $product_types = get_terms(array (
					'taxonomy' => 'product-type',
					'hide_empty' => false
				)); 
				if (!empty($product_types)&& !is_wp_error($product_types)) : ?>
				<?php foreach ($product_types as $product_type) : ?>
				<a class="capitalize" href = "<?php echo get_term_link($product_type); ?>">
				<?php echo $product_type->name; ?></a>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
			
			<ul>
				<?php while ( have_posts() ) : the_post(); ?>
				<li>
				<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'medium' ); ?>
				<?php endif; ?>
				<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
				$<?php echo get_post_meta($post->ID, 'price', true);
				?>
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
