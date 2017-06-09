<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section>
				<div class = "hero">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/inhabitent-logo-full.svg" alt="inhabitent logo">
				</div>
			</section>
			
			<section class="container scroll-stop">
				<h1>Shop Stuff</h1>		
				<div class="shop">
					<?php $product_types = get_terms(array (
						'taxonomy' => 'product-type',
						'hide_empty' => false
					)); 
					if (!empty($product_types)&& !is_wp_error($product_types)) : ?>
					
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
			</section>

			<section class="container">
				<h1>inhabitent journal</h1>	
				
				<div class="journal">	
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
			</section>

			<section class="container">
				<h1>latest adventures</h1>	
				<div class="adventure-section">	
					
					<ul class="adventure-posts">
						<?php
						$args = array( 
							'post_type' => 'adventure', 
							'posts_per_page' => 4);
						
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<li>
								<div class="wrapper">
									<?php the_post_thumbnail(); ?>
									<div class="adventure-title">
										<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>	
										<a href="<?php the_permalink() ?>" ><p class="read-more capitalize white-button">Read More</p></a>
									</div>
								</div>
							</li>
						<?php endforeach; 
						wp_reset_postdata();?>
					</ul>
					<div class="adventure-button">
						<a href="<?php echo get_post_type_archive_link( 'adventure' ); ?>"><p>more adventures</p></a>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
