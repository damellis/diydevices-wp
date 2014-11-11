<?php
add_theme_support( 'post-thumbnails' );
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
add_image_size( 'quarter-width', 198, 9999 );
add_image_size( 'third-width', 270, 9999 );
add_image_size( 'half-width', 414, 9999 );
add_image_size( 'full-width', 846, 9999 );

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'quarter-width' => __('Quarter Width'),
        'third-width' => __('Third Width'),
        'half-width' => __('Half Width'),
        'full-width' => __('Full Width'),
    ) );
}
?>