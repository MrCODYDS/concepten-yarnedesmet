<?php
/**
 * @package Test
 * @version 1.0
 */
/*
Plugin Name: visit-widget
Description: This plugin will provide the total visits per user 
Author: Yarne De Smet
Version: 1.0
*/

if (!isset($_COOKIE['visits']))
{
    $cookie = 1;
    setcookie("visits", $cookie);
    // Without the following line, the widget doesnt show the number (in this case 1)
    $_COOKIE['visits'] = 1;
}
else
{
    $cookie = ++$_COOKIE['visits'];
    setcookie("visits", $cookie);
}

add_action("widgets_init", function() {
	register_widget("Visits_Count");
});

class Visits_Count extends WP_Widget {
	// Class constructor
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'visits_count',
			'description' => 'This plugin will provide the total visits per user ',
		);
		parent::__construct( 'visits_count', 'Visits Count', $widget_ops );
	}
	
	// Output the widget content on the front-end
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>
		<p>Total amount of visits: <?php echo $_COOKIE['visits'] ?></p>
		<?php
		echo $args['after_widget'];
	}

	// Output the option form field in admin Widgets screen
	public function form( $instance ) {
		
	}

	// Save options
	public function update( $new_instance, $old_instance ) {
		
	}
}