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
	$id = $parents[count($parents)-1];
	$image_id = get_post_thumbnail_id($id);
	$image_url = wp_get_attachment_image_src($image_id, array(814,814), true);
?>

<a id="poster" href="<?php echo get_permalink($id); ?>" style="display: block; height: 190px; background-image: url(<?php echo $image_url[0]; ?>); background-size: 818px Auto; background-position: 0px -120px;">
<?php echo '<h1>' . get_the_title( $id ) . '</h1></a>'; ?>

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
	echo '</div>';
	wp_reset_query();
}
?>

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

