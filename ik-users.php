<?php

/*
 * Plugin Name: Ihor Khaletskyi REST Json Ajax Plugin
 * Plugin URI: https://github.com/ik-code/ik-users
 * Description: Provides data about users via REST
 * Version: 1.0.0
 * Author: Ihor Khaletskyi
 * Author URI: http://wp.medi-com.info
 * License: GPL2
 */

$options    = array();
$plugin_url = WP_PLUGIN_URL . '/ik-users';

/**
 * Ik_Users_menu() adds submenu page to the Settings main menu.
 *
 * @return null
 */
function Ik_Users_menu()
{
	add_options_page(
		'Ihor Khaletskyi REST Json Ajax Plugin',
		'User List',
		'manage_options',
		'ik-users',
		'Ik_Users_Options_page'
	);
}
add_action('admin_menu', 'Ik_Users_menu');

/**
 * Ik_Users_Options_page() Updates and gets
 * the value of an option that was already added from page
 * wp-admin/options-general.php?page=ik-users.
 *
 * @return null
 */
function Ik_Users_Options_page()
{
	if ( !current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have enough permission to view this page' );
	}

	global $options;

	if ( isset( $_POST['ik_users_form_submitted'] ) ) {

		$hidden_field = esc_html( $_POST['ik_users_form_submitted'] );
		if ( $hidden_field == 'Y' ) {
			$ik_users_endpoint_to_call = esc_html( $_POST['ik_users_endpoint_to_call'] );

			$ik_users_result = Ik_Users_Get_result( $ik_users_endpoint_to_call );

			$options['ik_users_endpoint_to_call'] = $ik_users_endpoint_to_call;
			$options['ik_users_last_updated']     = time();
			$options['ik_users_result']           = $ik_users_result;

			update_option( 'ik_users', $options );
		}
	}

	$options = get_option( 'ik_users' );
	if ( $options != '' ) {
		$ik_users_endpoint_to_call = $options['ik_users_endpoint_to_call'];
	}

	require 'inc/users-page-wrapper.php';
}


/**
 * Ik_Users_Backend_styles() enqueues a CSS stylesheet.
 *
 * @return null
 */
function Ik_Users_Backend_styles()
{
	wp_enqueue_style( 'ik_users_backend_css', plugins_url( 'ik-users/css/ik_users.css' ) );
}
add_action('admin_head', 'Ik_Users_Backend_styles');


/**
 * Ik_Users_Backend_scripts() enqueues a JS file.
 *
 * @return null
 */
function Ik_Users_Backend_scripts()
{
	wp_enqueue_script( 'ik_users_backend_js', plugins_url( 'ik-users/js/ik_users.js' ), array( 'jquery' ), '1.0.0', true );
}
add_action('admin_footer', 'Ik_Users_Backend_scripts');


/**
 * Ik_Users_Get_result() Sets a json feed url
 *
 * @param string $ik_users_endpoint_to_call endpoint to call
 *
 * @return object|array json
 */
function Ik_Users_Get_result( $ik_users_endpoint_to_call )
{
	$json_feed_url  = 'https://jsonplaceholder.typicode.com' . $ik_users_endpoint_to_call;
	$json_feed      = wp_remote_get( $json_feed_url );
	$json_feed_body = wp_remote_retrieve_body( $json_feed );

	return json_decode( $json_feed_body );
}

