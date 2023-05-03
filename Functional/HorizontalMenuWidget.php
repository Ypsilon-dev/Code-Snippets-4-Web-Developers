<?php
/*Add it to your child theme function.php*/
class Horizontal_Menu_Widget extends WP_Widget {
 
    // Widget setup
    public function __construct() {
        parent::__construct(
            'horizontal_menu_widget',
            'Horizontal Menu Widget',
            array( 'description' => 'Display a horizontal menu' )
        );
    }
 
    // Display widget
    public function widget( $args, $instance ) {
        $menu = ! empty( $instance['menu'] ) ? $instance['menu'] : '';
        $menu_items = wp_get_nav_menu_items( $menu );
        if ( $menu_items ) {
            echo $args['before_widget'];
            echo '<div class="horizontal-menu-wrapper">';
            echo '<ul class="horizontal-menu">';
            foreach ( $menu_items as $menu_item ) {
                echo '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
            }
            echo '</ul>';
            echo '</div>';
            echo $args['after_widget'];
        }
    }
 
    // Widget settings form
    public function form( $instance ) {
        $menu = ! empty( $instance['menu'] ) ? $instance['menu'] : '';
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'menu' ); ?>">Select a menu:</label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'menu' ); ?>" name="<?php echo $this->get_field_name( 'menu' ); ?>">
                <option value="">Select a menu</option>
                <?php foreach ( $menus as $menu ) { ?>
                    <option value="<?php echo $menu->term_id; ?>" <?php selected( $menu->term_id, $instance['menu'] ); ?>><?php echo $menu->name; ?></option>
                <?php } ?>
            </select>
        </p>
        <?php
    }
 
    // Update widget settings
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['menu'] = ! empty( $new_instance['menu'] ) ? $new_instance['menu'] : '';
        return $instance;
    }
 
}
 
// Register the widget
function register_horizontal_menu_widget() {
    register_widget( 'Horizontal_Menu_Widget' );
}
add_action( 'widgets_init', 'register_horizontal_menu_widget' );

