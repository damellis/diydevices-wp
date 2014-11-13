<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

<div id="menu">
<?php get_sidebar('page'); ?>
</div>

<div class="mainplus">
<?php
function show_thumbnails($page) {
	if ($page->ID == get_the_ID()) echo '<h1>'. $page->post_title . '</h1>';
	else echo '<h1><a href="' . get_permalink( $page->ID ) . '">'. $page->post_title . '</a></h1>';
	echo $page->post_excerpt;
	$subpages = get_pages( array('parent' => $page->ID, 'post_type' => 'page', 'sort_column' => 'menu_order') );
	foreach ($subpages as $subpage) {
		echo '<a class="card" href="' . get_permalink( $subpage->ID ) . '">';
		echo get_the_post_thumbnail( $subpage->ID, 'quarter-width' );
		echo '<h1>' . $subpage->post_title . '</h1>';
		echo '</a>';
	}
}

if (is_front_page()) {
	$pages = get_pages( array('parent' => 0, 'post_type' => 'page', 'sort_column' => 'menu_order') );
	foreach ($pages as $page) {
		if ($page->ID != get_option('page_on_front')) {
			echo '<div style="overflow: hidden;">';
			show_thumbnails($page);
			echo '</div>';
		}
	}
} else {
	show_thumbnails($post);
}
?>
</div>

<?php get_footer(); ?>