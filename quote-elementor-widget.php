<?php

/**
 * @package QuoteElementorWidgetPlugin
 * @version 1.0.0
 */
/*
Plugin Name: Quote of the Day Widget by CAA
Description: This is a sample quote of the day plugin
Author: CAA
Author URI: https://github.com/achrstphr
Version: 1.0.0
License: GPLv2 or later
Text Domain: quote-elementor-widget
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Quote Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_quote_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/quote-widget.php' );

	$widgets_manager->register( new \Elementor_quote_Widget() );

}
add_action( 'elementor/widgets/register', 'register_quote_widget' );