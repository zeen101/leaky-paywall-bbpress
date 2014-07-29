<?php
/**
 * Registers IssueM's Leaky Paywall class
 *
 * @package IssueM's Leaky Paywall
 * @since 1.0.0
 */

/**
 * This class registers the main issuem functionality
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'IssueM_Leaky_Paywall_bbPress' ) ) {
	
	class IssueM_Leaky_Paywall_bbPress {
		
		/**
		 * Class constructor, puts things in motion
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			
			add_action( 'issuem_leaky_paywall_is_restricted_content', array( $this, 'issuem_leaky_paywall_is_restricted_content' ) );
			add_filter( 'bbp_get_template_stack', array( $this, 'bbp_get_template_stack' ), 10 );

		}
		
		function issuem_leaky_paywall_is_restricted_content() {
		
			if ( is_bbpress() ) {
				add_filter( 'bbp_get_template_part', array( $this, 'bbp_get_template_part' ), 15, 3 );
			}

		}
		
		function bbp_get_template_part( $templates, $slug, $name ) {
			array_unshift( $templates, $name . '-content-paywall.php' );
			return $templates;
		}
				
		function bbp_get_template_stack( $stack ) {
		    array_unshift( $stack, dirname( __FILE__ ) . '/templates' );
		    return $stack;
		}
		
	}
	
}