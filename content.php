<?php
if ( is_single() ) :
	the_title( '<h1>', '</h1>' );
else :
	the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
endif;

if ( is_search() ) :
	the_excerpt();
else :
	the_content('Read more...');
endif;
?>