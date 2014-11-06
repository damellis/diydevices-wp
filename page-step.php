<?php
/*
Template Name: Step Page
*/
?>

<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>

<div id="menu">
<?php
$parents = get_post_ancestors( $post->ID );
if ($parents) {
	$id = $parents[count($parents)-1];
	echo '<a href="' . get_permalink($id) . '">';
	echo get_the_post_thumbnail( $id, array(190,190) );
	echo '<h1>' . get_the_title( $id ) . '</h1>';
	echo '</a>';
	$pages = get_pages( array('parent' => $id, 'post_type' => 'page', 'sort_column' => 'menu_order') );
	foreach ($pages as $page) {
		echo '<h2>';
		if ($page->ID != $post->ID) echo '<a href="' . get_page_link( $page->ID ) . '">';
		echo $page->post_title;
		if ($page->ID == $post->ID) echo ' &raquo;';
		else echo '</a>';
		echo '</h2>';
	}
	wp_reset_query();
}
?>
</div>

<div class="main">

<?php
	the_title('<h1>', '</h1>');
	get_template_part( 'content', 'page' ); 
endwhile;
?>

</div>

<?php
get_sidebar();
get_footer();

