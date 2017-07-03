<?php
/**
 * Class SampleTest
 *
 * @package Wp_Resas
 */

/**
 * Sample test case.
 */
class WP_RESAS_Test extends WP_UnitTestCase
{

	/**
	 * Test for the WP_RESAS\Util::get_api_key()
	 */
	function test_get_api_key()
	{
		$expected = '1111';
		$options = array( 'api_key' => $expected );
		update_option( 'wp_resas_settings', $options );
		$api_key = WP_RESAS\Util::get_api_key();
		$this->assertSame( $expected, $api_key );
	}
}
