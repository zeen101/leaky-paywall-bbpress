<?php do_action( 'leaky_paywall_bbpress_content_reply_is_restricted_before_wrap' ); ?>
<div id="it-exchange-content-restricted" class="it-exchange-wrap">
    <?php do_action( 'leaky_paywall_bbpress_content_reply_is_restricted_begin_wrap' ); ?>
    <?php
	global $dl_pluginissuem_leaky_paywall;
	$lp_settings = get_issuem_leaky_paywall_settings();
	
	$message  = '<div id="leaky_paywall_message">';
	if ( !is_issuem_leaky_subscriber_logged_in() ) {
		$message .= $dl_pluginissuem_leaky_paywall->replace_variables( stripslashes( $lp_settings['subscribe_login_message'] ) );
	} else {
		$message .= $dl_pluginissuem_leaky_paywall->replace_variables( stripslashes( $lp_settings['subscribe_upgrade_message'] ) );
	}
	$message .= '</div>';

	echo apply_filters( 'issuem_leaky_paywall_bbpress_content_reply_subscribe_or_login_message', $message );
	?>
    <?php do_action( 'leaky_paywall_bbpress_content_reply_is_restricted_end_wrap' ); ?>
</div>
<?php do_action( 'leaky_paywall_bbpress_content_reply_is_restricted_before_wrap' ); ?>