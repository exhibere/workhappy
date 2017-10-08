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
		'before_widget' => '<section id="%1$s" class="header-center1">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_widget( 'gethappy_widget' );
}
add_action( 'widgets_init', 'wkhappy_widgets_init' );

 
// Creating the widget 
class gethappy_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'gethappy_widget', 
 
// Widget name will appear in UI
__('Get Happiness Widget', 'gethappy_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Happiness Widget', 'gethappy_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output
echo __( get_template_part( 'template-parts/widget/gethappy', 'div' ), 'gethappy_widget_domain' );
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'gethappy_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here