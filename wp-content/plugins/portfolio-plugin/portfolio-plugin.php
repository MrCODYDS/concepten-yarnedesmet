<?php
/**
 * @package Test
 * @version 1.0
 */
/*
Plugin Name: portfolio-plugin
Description: This plugin will provide a "current state of employement" widget 
Author: Yarne De Smet
Version: 1.0
*/

// Register Current_State widget

add_action("widgets_init", function() {
	register_widget("Current_State");
});

class Current_State extends WP_Widget {
	// Class constructor
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'current_state',
			'description' => 'This plugin will provide a current state of employement option',
		);
		parent::__construct( 'current_state', 'Current State', $widget_ops );
	}
	
	// Output the widget content on the front-end
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>
		<p>State of employement: <?php echo $instance['employement'] ?></p>
		<?php
		echo $args['after_widget'];
	}

	// Output the option form field in admin Widgets screen
	public function form( $instance ) {
		$employement = ! empty( $instance['employement'] ) ? $instance['employement'] : array();
		?>
		<p>
			<select name="<?php echo $this->get_field_name('employement'); ?>">
			  <option <?php selected($instance["employement"], "employed"); ?> value="employed">Employed</option>
			  <option <?php selected($instance["employement"], "unemployed"); ?> value="unemployed">Unemployed</option>
			</select>
		</p>
		<?php
	}

	// Save options
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['employement'] = strip_tags($new_instance['employement']);

		return $instance;
	}
}