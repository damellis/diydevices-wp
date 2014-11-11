<?php get_header(); ?>

<div id="menu">
</div>

<div class="main">
<?php
while ( have_posts() ) : the_post();
	get_template_part( 'content', 'page' );
endwhile;
?>
</div>

<?php
get_sidebar();
get_footer();

