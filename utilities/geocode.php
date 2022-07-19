<?php
/**
 * Returns GeoCode Data.
 *
 * @param [type] $address
 * @return array
 */
function geocode( $latlng ) {

	// url encode the address.
	$address = rawurlencode( $latlng );

	// google map geocode api url.
	$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $latlng . '&key=AIzaSyBHV1uAlXcl-KNx-CBlyRgLxILVlWq5XBU';

	// get the json response.
	$resp_json = wp_remote_get( $url );

	$resp_json_body = wp_remote_retrieve_body( $resp_json );
	// decode the json.
	$resp = json_decode( $resp_json_body, true );
	// response status will be 'OK', if able to geocode given address.
	if ( $resp['status'] == 'OK' ) {

		// get the important data.
		$lat               = isset( $resp['results'][0]['geometry']['location']['lat'] ) ? $resp['results'][0]['geometry']['location']['lat'] : '';
		$lng               = isset( $resp['results'][0]['geometry']['location']['lng'] ) ? $resp['results'][0]['geometry']['location']['lng'] : '';
		$formatted_address = isset( $resp['results'][0]['formatted_address'] ) ? $resp['results'][0]['formatted_address'] : '';

		// verify if data is complete.
		if ( $lat && $lng && $formatted_address ) {

			// put the data in the array.

			$data_arr = array(
				'address' => $formatted_address,
				'lat'     => $lat,
				'lng'     => $lng,
			);
			return $data_arr;

		} else {
			return false;
		}
	} else {
		return false;
	}
}
