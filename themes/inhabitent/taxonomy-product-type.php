<?php
$args = array(
	 'posts_per_page' => 8,
	 'orderby' => 'title',
	 'post_type' => 'product',
	 'product' => 'do',
	 'post_status' => 'publish'
);
$show_albums = get_posts( $args );
?>