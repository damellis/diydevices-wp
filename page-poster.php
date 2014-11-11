<?php
/*
Template Name: Poster Page
*/
?>

<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>

<div id="poster">
<?php echo get_the_post_thumbnail( $post->ID, 'full-width' ) ?>
<?php the_title('<h1>', '</h1>'); ?>
</div>

<div id="menu">

<?php
$pages = get_pages( array('parent' => $post->ID, 'post_type' => 'page', 'sort_column' => 'menu_order') );
foreach ($pages as $page) {
	echo '<h2><a href="' . get_page_link( $page->ID ) . '">';
	echo $page->post_title;
	echo '</a></h2>';
}
wp_reset_query();
?>
</div>

<div class="main">

<?php
get_template_part( 'content', 'page' ); 
endwhile;
?>

</div>

<?php
get_sidebar();
get_footer();

