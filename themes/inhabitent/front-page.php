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
		
		<h1>Shop Stuff</h1>		
		<div class="shop container">
			<?php $product_types = get_terms(array (
				'taxonomy' => 'product-type',
				'hide_empty' => false
			)); 
			if (!empty($product_types)&& !is_wp_error($product_types)) : ?>
			<!--Put Markup here-->
			
			<?php foreach ($product_types as $product_type) : ?>
				<ul class="shop-item">
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/<?php echo $product_type-> name; ?>.svg">
					<li><?php echo $product_type->description; ?></li>
					<li class="capitalize button-green">
						<a href = "<?php echo get_term_link($product_type); ?>">
						<?php echo $product_type->name; ?> stuff</a>
					</li>
				</ul>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<h1>inhabitent journal</h1>	
		
		<div class="journal container">	
				<?php
				$args = array( 'posts_per_page' => 3);

				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<ul class="home-posts">
						<?php the_post_thumbnail(); ?>
						<div class = "post-text">
							<li class="date"><?php the_time('F jS, Y'); ?> / <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></li>
							<li><h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3></li>	
							<li><a class="read-more capitalize black-button" href="<?php the_permalink() ?>">Read Entry</a></li>	
						</div>			
					</ul>
				<?php endforeach; 
				wp_reset_postdata();?>
		</div>

		<section class="container">	
			<h1>latest adventures</h1>	
			<div class="adventure">			
				<div class="main-adventure">
					<h2>Getting Back to Nature in a Canoe</h2>
					<p class="white-button"><a href="#">read more</a></p>
				</div>
				
				<ul class="secondary-adventure">
					<li class="adventure-b">
						<h2>A Night with Friends at the Beach</h2>
						<p class="white-button"><a href="#">read more</a></p>			
					</li>
					<li class="adventure-c">
						<h2>Taking in the View at Big Mountain</h2>
						<p class="white-button"><a href="#">read more</a></p>			
					</li>
					<li class="adventure-d">
						<h2>Star-Gazing at the Night Sky</h2>
						<p class="white-button"><a href="#">read more</a></p>			
					</li>
				</ul>
			</div>
			<div class="adventure-button">
				<p><a href="#">more adventures</a></p>
			</div>
		</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
