<?php
/**
 * @package Test
 * @version 1.0
 */
/*
Plugin Name: twitter-widget
Description: This plugin will provide a twitter widget 
Author: Yarne De Smet
Version: 1.0
*/

// Register Twitter_Widget widget

add_action("widgets_init", function() {
	register_widget("Twitter_Widget");
});

class Twitter_Widget extends WP_Widget {
	// Class constructor
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'twitter-plugin',
			'description' => 'This plugin will provide twitter widget',
		);
		parent::__construct( 'twitter', 'Twitter Widget', $widget_ops );
	}

	// Output the widget content on the front-end
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		/*if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		echo $instance['link'];*/
		?>
		<blockquote class="twitter-tweet"><p lang="en" dir="ltr">Tomorrow is mystery! <a href="https://twitter.com/hashtag/Tomorrowland?src=hash&amp;ref_src=twsrc%5Etfw">#Tomorrowland</a> <a href="https://twitter.com/hashtag/AmicorumSpectaculum?src=hash&amp;ref_src=twsrc%5Etfw">#AmicorumSpectaculum</a> <a href="https://twitter.com/hashtag/goldenticket?src=hash&amp;ref_src=twsrc%5Etfw">#goldenticket</a> <a href="https://twitter.com/hashtag/artwork?src=hash&amp;ref_src=twsrc%5Etfw">#artwork</a> <a href="https://t.co/3pvg4728EH">pic.twitter.com/3pvg4728EH</a></p>&mdash; Yarne De Smet (@MrCODYDS) <a href="https://twitter.com/MrCODYDS/status/880899516370743298?ref_src=twsrc%5Etfw">June 30, 2017</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		<?php
		
		echo $args['after_widget'];
	}

	// Output the option form field in admin Widgets screen
	public function form( $instance ) {
		/*?>
			<label >Enter Link:</label>
			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo $instance["link"] ?>">

		<?php*/
	}

	// Save options
	public function update( $new_instance, $old_instance ) {
		/*$instance = array();
		$instance['link'] = strip_tags($new_instance['link']);

		return $instance;*/
	}

}
