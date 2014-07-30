<?php
/**
 * Main PHP file used to for initial calls to zeen101's Leak Paywall classes and functions.
 *
 * @package zeen101's Leak Paywall - bbPress
 * @since 1.0.0
 */
 
/*
Plugin Name: zeen101's Leaky Paywall - bbPress
Plugin URI: http://zeen101.com/
Description: A premium leaky paywall add-on for the Leaky Paywall for WordPress plugin.
Author: zeen101 Development Team
Version: 1.0.0
Author URI: http://issuem.com/
Tags:
*/

//Define global variables...
if ( !defined( 'ZEEN101_STORE_URL' ) )
	define( 'ZEEN101_STORE_URL',	'http://zeen101.com' );
	
define( 'ISSUEM_LP_BBP_NAME', 		'Leaky Paywall - bbPress' );
define( 'ISSUEM_LP_BBP_SLUG', 		'leaky-paywall-bbpress' );
define( 'ISSUEM_LP_BBP_VERSION', 	'1.0.0' );
define( 'ISSUEM_LP_BBP_DB_VERSION', '1.0.0' );
define( 'ISSUEM_LP_BBP_URL', 		plugin_dir_url( __FILE__ ) );
define( 'ISSUEM_LP_BBP_PATH', 		plugin_dir_path( __FILE__ ) );
define( 'ISSUEM_LP_BBP_BASENAME', 	plugin_basename( __FILE__ ) );
define( 'ISSUEM_LP_BBP_REL_DIR', 	dirname( ISSUEM_LP_BBP_BASENAME ) );

/**
 * Instantiate Pigeon Pack class, require helper files
 *
 * @since 1.0.0
 */
function issuem_leaky_paywall_bbpress_plugins_loaded() {
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	if ( is_plugin_active( 'issuem-leaky-paywall/issuem-leaky-paywall.php' ) ) {

		require_once( 'class.php' );
	
		// Instantiate the Pigeon Pack class
		if ( class_exists( 'Leaky_Paywall_bbPress' ) ) {
			
			global $dl_pluginissuem_leaky_paywall_bbpress;
			
			$dl_pluginissuem_leaky_paywall_bbpress = new Leaky_Paywall_bbPress();
			
			require_once( 'functions.php' );
				
			//Internationalization
			load_plugin_textdomain( 'issuem-lp-bbp', false, ISSUEM_LP_BBP_REL_DIR . '/i18n/' );
				
		}
	
	} else {
	
		add_action( 'admin_notices', 'issuem_leaky_paywall_bbpress_requirement_nag' );
		
	}

}
add_action( 'plugins_loaded', 'issuem_leaky_paywall_bbpress_plugins_loaded', 4815162342 ); //wait for the plugins to be loaded before init

function issuem_leaky_paywall_bbpress_requirement_nag() {
	?>
	<div id="leaky-paywall-requirement-nag" class="update-nag">
		<?php _e( 'You must have the Leaky Paywall plugin activated to use the Leaky Paywall bbPress plugin.' ); ?>
	</div>
	<?php
}