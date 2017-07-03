<?php

namespace WP_RESAS;

class Util
{
	public static function get_api_key()
	{
		$options = get_option( 'wp_resas_settings' );
		if ( empty( $options['api_key'] ) ) {
			return '';
		} else {
			return $options['api_key'];
		}
	}
}
