<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

<div id="menu">
<?php
while ( have_posts() ) : the_post();
	the_title( '<h1>', '</h1>' );
	the_content();
endwhile;
?>

<?php
$the_query = new WP_Query(array('posts_per_page' => 5));

if ( $the_query->have_posts() ) {
	echo '<h1>Updates</h1>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<i>' . get_the_date() . '</i>';
		echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2><br />';
	}
} else {
	// no posts found
}

wp_reset_postdata();
?>
</div>

<div class="mainplus">
<h1>Projects</h1>

<?php
$pages = get_pages( array('parent' => 0, 'post_type' => 'page', 'sort_column' => 'menu_order') );
foreach ($pages as $page) {
	if ($page->ID != get_option('page_on_front')) {
		echo '<a class="card" href="' . get_permalink( $page->ID ) . '">';
		echo get_the_post_thumbnail( $page->ID, 'quarter-width' );
		echo '<h1>' . $page->post_title . '</h1>';
		echo '</a>';
	}
}
?>
</div>

<?php get_footer(); ?>