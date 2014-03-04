<?php
/*  @package: 		DPWP
 *  @author:        Brad Sollar <brad.sollar@arcwaveusa.com>
 *
 *	Plugin Name: 	Design Patterns
 *	Description:    Tuts+ Design Pattern Plugin
 *	Author:         Brad Sollar
 *	Author URI:     http://arcwaveusa.com
 *	Version: 		1.0.0
 *  License:        GPL-2.0+
 *	Text Domain: 	starter_kit
 *	Domain Path: 	languages/
 */
if ( ! defined('WPINC')) {
	die;
}

include_once('class-design-patterns-wordpress.php');
add_action('plugins_loaded', array('Design_Patterns_Wordpress', 'get_instance'));
#Design_Patterns_Wordpress::get_instance();