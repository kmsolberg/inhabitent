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
				<ul>
					<?php $product_types = get_terms(array (
						'taxonomy' => 'product-type',
						'hide_empty' => false
					)); 
					if (!empty($product_types)&& !is_wp_error($product_types)) : ?>
					<?php foreach ($product_types as $product_type) : ?>
						<li>
							<a class="capitalize" href = "<?php echo get_term_link($product_type); ?>">
							<?php echo $product_type->name; ?></a>
						</li>
					<?php endforeach; ?>
					<?php endif; ?>
				</ul>
			</div>
			
			<ul class="product-grid">
				<?php while ( have_posts() ) : the_post(); ?>
				<li>
					<div class="product-image">
						<a href="<?php the_permalink()?>">
						<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'medium' ); ?>
						<?php endif; ?>
						</a>
					</div>
					<div class = "title-price">
						<?php the_title( '<p class="product-name">', '</p>' ); ?>
						<span class="price">$<?php echo get_post_meta($post->ID, 'price', true); ?></span>
						<div class="elipses">
							<p>.............................</p>
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
