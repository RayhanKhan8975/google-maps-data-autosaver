<?php
/**
 * Gets Fired when the custom post type is saved.
 *
 * @return void
 */
function save_google_data( $post_id, $post, $update ) {

	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}

	if ( 'wohnprojekte' !== $post->post_type ) {
		return;
	}

	$lat = $post->wp_lat;
	$lng = $post->wp_lng;

	if ( $lat && $lng ) {

		$latlng      = $lat . ',' . $lng;
		$geocode_arr = geocode( $latlng );

		if ( false !== $geocode_arr ) {
			update_post_meta( $post_id, 'wp_mapp', $geocode_arr );
		}
	}

}
