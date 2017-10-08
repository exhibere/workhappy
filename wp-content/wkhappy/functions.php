<?php
//* Code goes here

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wkhappy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer LeftBar', 'wkhappy' ),
		'id'            => 'leftbar-1',
		'description'   => __( 'Add widgets here to appear in the lefthand side of your footer.', 'wkhappy' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Center', 'wkhappy' ),
		'id'            => 'headercenter-1',
		'description'   => __( 'Add widgets here to appear in the center of the page.', 'wkhappy' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'wkhappy_widgets_init' );