<html <?php language_attributes(); ?>>
<head>
<style>

</style>
<title><?php wp_title( '|', true, 'right' ); echo get_bloginfo( 'name' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />

<?php if ( is_page_template('page-poster.php')) : ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mainpage.css" />
<?php else : ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/subpage.css" />
<?php endif; ?>
</head>

<body>
<div id="all">

<div id="header">
<span id="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span><?php
echo '<ul>';
$pages = get_pages( array( 'post_type' => 'page', 'parent' => 0, 'sort_column' => 'menu_order' ) );
foreach ($pages as $page) {
	if ($page->ID != get_option('page_on_front')) {
		echo '<li><a href="' . get_page_link($page->ID) . '"><h2>';
		echo $page->post_title;
		echo '</h2></a>';

		$subpages = get_pages( array( 'post_type' => 'page', 'parent' => $page->ID, 'sort_column' => 'menu_order' ) );
		if ($subpages) {
			echo '<ul>';
			foreach ($subpages as $subpage) {
				echo '<li><a href="' . get_page_link($subpage->ID) . '">';
				echo $subpage->post_title;
				echo '</a></li>';
			}
			echo '</ul>';
		}

		echo '</li>';
	}
}
$links = get_bookmarks();
foreach ($links as $link) {
	echo '<li><a href="' . $link->link_url . '"><h2>';
	echo $link->link_name;
	echo ' &raquo;</h2></a></li>';
}
echo '</ul>';
?>
</div>