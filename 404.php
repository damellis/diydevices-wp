<?php get_header(); ?>

<div id="menu">
</div>

<div class="main">
<h1>Page Not Found</h1>
<p>
Sorry, we couldn't find the page you were looking for.
</p>
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
