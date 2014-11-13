<?php
$page = get_post(get_option('page_on_front'));
if ($page) {
	echo '<h1>' . $page->post_title . '</h1>';
	echo $page->post_content;
}
	
//	while ( have_posts() ) : the_post();
//		the_title( '<h1>', '</h1>' );
//		the_content();
//	endwhile;

if (is_front_page()) {
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
}
?>
