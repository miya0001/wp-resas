<?php

namespace WP_RESAS;

class Admin
{
	public function __construct()
	{
		// nothing to do
	}

	public function register()
	{
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}

	public function plugins_loaded()
	{
		$plugin_rel_path = basename( dirname( dirname( __FILE__ ) ) ) . '/languages';
		load_plugin_textdomain( 'wp-resas', null, $plugin_rel_path );

		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
			add_action( 'admin_init', array( $this, 'admin_init' ) );
		}
	}

	public function admin_menu()
	{
		add_options_page(
			'RESAS API',
			'RESAS API',
			'manage_options',
			'wp-resas',
			array( $this, 'options_page' )
		);
	}

	public function admin_init()
	{
		register_setting( 'wp-resas', 'wp_resas_settings' );

		add_settings_section(
			'wp_resas_wp-resas_section',
			__( 'RESAS API Key', 'wp-resas' ),
			function() {
				_e( 'Please sign up and get the API Key from the <a href="https://opendata.resas-portal.go.jp/">RESAS API</a>.', 'wp_resas' );
			},
			'wp-resas'
		);

		add_settings_field(
			'api_key',
			__( 'API Key', 'wp-resas' ),
			function() {
				$options = get_option( 'wp_resas_settings' );
				if ( empty( $options['api_key'] ) ) {
					$options['api_key'] = '';
				}
				?>
				<input type='text' name='wp_resas_settings[api_key]'
						value='<?php echo esc_attr( $options['api_key'] ); ?>'>
				<?php
			},
			'wp-resas',
			'wp_resas_wp-resas_section'
		);
	}

	public function options_page()
	{
		?>
		<div class="wrap">
		<h1>RESAS API Settings</h1>
		<form method="POST" action="options.php">
		<?php
			settings_fields( 'wp-resas' );
			do_settings_sections( 'wp-resas' );
			submit_button();
		?>
		</form>
		</div>
		<?php
	}
}
