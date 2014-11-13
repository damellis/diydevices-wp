<?php the_content(); ?>

<?php
$pagelist = get_pages( array('sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent' => $post->ID) );

if (!empty($pagelist)) {
	// if the page has children, the next page is the first child
	$nextID = $pagelist[0]->ID;
} else {
	// otherwise link to previous and next children of the page's parent
	$parents = get_post_ancestors( $post->ID );
	if ($parents) {
		$id = $parents[0];
		$pagelist = get_pages( array('sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent' => $id) );
	}
	$pages = array();
	foreach ($pagelist as $page) {
	   $pages[] += $page->ID;
	}

	$current = array_search(get_the_ID(), $pages);
	$prevID = $pages[$current-1];
	$nextID = $pages[$current+1];
}
?>

<div class="navigation">
<?php if (!empty($prevID)) { ?>
<div class="previous">
<b>&laquo; Previous:</b> <a href="<?php echo get_permalink($prevID); ?>"><?php echo get_the_title($prevID); ?></a>
</div>
<?php }
if (!empty($nextID)) { ?>
<div class="next">
<b>Next:</b> <a href="<?php echo get_permalink($nextID); ?>"><?php echo get_the_title($nextID); ?></a><b> &raquo;</b>
</div>
<?php } ?>

</div>

<?php
if ( comments_open() || get_comments_number() ) {
	comments_template();
}
?>