<?php get_header(); ?>

<div id="menu">
<?php get_sidebar('index'); ?>
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
get_footer();
