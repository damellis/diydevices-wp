<html <?php language_attributes(); ?>>
<head>
<style>

</style>
<title><?php wp_title( '|', true, 'right' ); ?></title>
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
<span id="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
<?php
$pages = get_pages( array( 'post_type' => 'page', 'parent' => 0, 'sort_column' => 'menu_order' ) );
foreach ($pages as $page) {
	echo '<a href="' . get_page_link($page->ID) . '"><h2>';
	echo $page->post_title;
	echo '</h2></a>';
}
$links = get_bookmarks();
foreach ($links as $link) {
	echo '<a href="' . $link->link_url . '"><h2>';
	echo $link->link_name;
	echo ' &raquo;</h2></a>';
}
?>
</div>