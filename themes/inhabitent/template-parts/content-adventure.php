<?php
/**
 * Template part for displaying single products.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'full' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content container">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <div class="entry-meta">
			<?php red_starter_posted_by(); ?>
		</div><!-- .entry-meta -->
	
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
		<div class="social-media">
			<p><i class="fa fa-facebook" aria-hidden="true"></i>	like</p>
			<p><i class="fa fa-twitter" aria-hidden="true"></i>	tweet</p>
			<p><i class="fa fa-pinterest" aria-hidden="true"></i> pin</p>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php red_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
