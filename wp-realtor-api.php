<?php
/**
 * WP-Realtor-API
 *
 * @package WP-Realtor-API
 */

/*
* Plugin Name: WP Realtor API
* Plugin URI: https://github.com/wp-api-libraries/wp-realtor-api
* Description: Perform API requests to Realtor in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-realtor-api
* GitHub Branch: master
*/

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Check if class exists. */
if ( ! class_exists( 'RealtorAPI' ) ) {

	/**
	 * Realtor API Class.
	 */
	class RealtorAPI {

		/**
		 * Construct.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {

		}

		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {

			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );

			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'text-domain' ), $code ) );
			}

			$body = wp_remote_retrieve_body( $response );

			return json_decode( $body );

		}


		/**
		 * Get Realtor Property Info from URL.
		 *
		 * @access public
		 * @param mixed $url URL.
		 * @return Request.
		 */
		function get_property_info( $url ) {

			if ( empty( $url ) ) {
				return new WP_Error( 'required-fields', __( 'Please provide a URL.', 'text-domain' ) );
			}

			$explode = explode('/', $url);

			var_dump($explode);

			/*
			TODO: This funtion should return the following as JSON array:
			* Realtor Property ID
			* Street Address
			* City
			* State
			* Zip Code
			* Example urls:
			* http://www.realtor.com/realestateandhomes-detail/6046-Lockhurst-Dr_Woodland-Hills_CA_91367_M18930-68994
			* http://www.realtor.com/realestateandhomes-detail/24702-Via-Pradera_Calabasas_CA_91302_M26782-05082
			*/
		}

		/**
		 * Get Agent/Team Info
		 *
		 * @access public
		 * @param mixed $profile_url URL.
		 * @return void
		 */
		function get_agent_info( $url ) {

			if ( empty( $url ) ) {
				return new WP_Error( 'required-fields', __( 'Please provide a URL.', 'text-domain' ) );
			}

			$explode = explode('/', $url);

			var_dump($explode);

			/*
			TODO: This function should return an array with the following as JSON array:
			* Agent Name
			* Realtor Agent Unique String
			* Agent City
			* Agent State
			* Example URLS:
			* http://www.realtor.com/realestateagents/Jeremy-Gray_Santa-Clarita_CA_322226_435509297
			* http://www.realtor.com/realestateagents/Jesse-Perez_Northridge_CA_1818484_440289297
			*/

		}
	}
}
