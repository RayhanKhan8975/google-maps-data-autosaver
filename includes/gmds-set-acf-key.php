<?php
/**
 * Sets the Google Maps API key through ACF Filter.
 *
 * @param [type] $api
 * @return void
 */
function my_acf_google_map_api( $api ) {
	$api['key'] = 'YOUR-API-KEY-HERE';
	return $api;
}
