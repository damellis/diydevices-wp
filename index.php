<?php get_header(); ?>

<div id="menu">
<?php
$page = get_post( get_option('page_on_front') );
if ($page) {
	echo '<h1>' . $page->post_title . '</h1>';
	echo $page->post_content;
}
?>
</div>

<div class="main">
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'content', get_post_format() );
	endwhile;

else :
	get_template_part( 'content', 'none' );
endif;
?>
</div>

<?php
get_sidebar();
get_footer();
