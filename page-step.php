<?php
/*
Template Name: Step Page
*/
?>

<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>

<?php
$parents = get_post_ancestors( $post->ID );
if ($parents) {
	$id = $parents[count($parents)-2];
	$image_id = get_post_thumbnail_id($id);
	$image_url = wp_get_attachment_image_src($image_id, 'full-width', true);
?>

<a id="poster" href="<?php echo get_permalink($id); ?>" style="background-image: url(<?php echo $image_url[0]; ?>);"><h1><?php echo get_the_title( $id ); ?></h1></a>

<div id="menu">

<?php
	$pages = get_pages( array('parent' => $id, 'post_type' => 'page', 'sort_column' => 'menu_order') );
	foreach ($pages as $page) {
		echo '<h2>';
		if ($page->ID == $post->ID) echo '<b>';
		else echo '<a href="' . get_page_link( $page->ID ) . '">';
		echo $page->post_title;
		if ($page->ID == $post->ID) echo '&nbsp;&raquo;</b>';
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
get_footer();

