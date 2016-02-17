<?php do_action( 'leaky_paywall_bbpress_content_topic_is_restricted_before_wrap' ); ?>
<div id="it-exchange-content-restricted" class="it-exchange-wrap">
    <?php do_action( 'leaky_paywall_bbpress_content_topic_is_restricted_begin_wrap' ); ?>
    <?php
	global $leaky_paywall;
	$lp_settings = get_leaky_paywall_settings();
	
	$message  = '<div id="leaky_paywall_message">';
	if ( !leaky_paywall_has_user_paid() ) {
		$message .= $leaky_paywall->replace_variables( stripslashes( $lp_settings['subscribe_login_message'] ) );
	} else {
		$message .= $leaky_paywall->replace_variables( stripslashes( $lp_settings['subscribe_upgrade_message'] ) );
	}
	$message .= '</div>';

	echo apply_filters( 'issuem_leaky_paywall_bbpress_content_topic_subscribe_or_login_message', $message );
	?>
    <?php do_action( 'leaky_paywall_bbpress_content_topic_is_restricted_end_wrap' ); ?>
</div>
<?php do_action( 'leaky_paywall_bbpress_content_topic_is_restricted_before_wrap' ); ?>
