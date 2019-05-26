<?php
/**
 * @package Test
 * @version 1.0
 */
/*
Plugin Name: greetings-plugin
Description: This plugin will provide a greetings message on top of the page 
Author: Yarne De Smet
Version: 1.0
*/

if (!isset($_COOKIE['count']))
{
    $cookie = 1;
    setcookie("count", $cookie);
}
else
{
    $cookie = ++$_COOKIE['count'];
    setcookie("count", $cookie);
}

function greetings() {
	$current_user = wp_get_current_user();
    if ( is_user_logged_in() ) { 
    	$name = $current_user->display_name;
    } else { 
    	$name = "";
    }

	if (date('H') < 12 && date('H') > 0 ) {
		$timeofday = "Goodmorning ";
	} else if (date('H') < 18 && date('H') >= 12) {
		$timeofday = "Good afternoon ";
	} else if (date('H') < 24 && date('H') >= 18) {
		$timeofday = "Good evening ";
	} ?>

	<?php

	if (is_user_logged_in()) {
		if ($_COOKIE['count'] <= 1) { 
			return $timeofday . $name . ", welcome!";
		} else {
			return $timeofday . $name . ", welcome back";
		}
	} else {
		if ($_COOKIE['count'] <= 1) { 
			return $timeofday . ", welcome";
		} else {
			return $timeofday . ", welcome back";
		}
		return $timeofday . ", welcome";
	}
}

add_shortcode("greetings_shortcode", "greetings");