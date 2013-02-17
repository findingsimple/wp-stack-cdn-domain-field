<?php
/*
Plugin Name: WP Stack CDN Domain Field
Plugin URI: http://plugins.findingsimple.com
Description: Drop in that works with  Mark Jaquith's WP Stack CDN by adding a CDN Domain 
field to the General settings admin page. 
Version: 1.0
Author: Finding Simple
Author URI: http://findingsimple.com
License: GPL2
*/
/*
Copyright 2013  Finding Simple  (email : plugins@findingsimple.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'WP_Stack_CDN_Domain_Field' ) ) :

/**
 * Plugin Main Class.
 *
 * @package WP Stack CDN Domain Field
 * @author Jason Conroy <jason@findingsimple.com>
 * @since 1.0
 */
class WP_Stack_CDN_Domain_Field {
	
	/**
	 * Initialise
	 */
	function WP_Stack_CDN_Domain_Field() {

		add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
		
	}

	function register_fields() {
		
		register_setting( 'general', 'wp_stack_cdn_domain', 'esc_attr' );
	
		add_settings_field('wp_stack_cdn_domain', '<label for="wp_stack_cdn_domain">'.__('CDN Domain' , 'wp_stack_cdn_domain' ).'</label>' , array(&$this, 'fields_html') , 'general' );
	
	}

	function fields_html() {
	
		$value = get_option( 'wp_stack_cdn_domain', '' );
	
		echo '<input type="text" id="wp_stack_cdn_domain" name="wp_stack_cdn_domain" value="' . $value . '" />';
	
	}		

}

$WP_Stack_CDN_Domain_Field = new WP_Stack_CDN_Domain_Field();

endif;
