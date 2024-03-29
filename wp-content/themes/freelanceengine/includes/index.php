<?php

require_once dirname(__FILE__) . '/aecore/index.php';

if(!class_exists('AE_Base')) return;

require_once dirname(__FILE__) . '/escrow/index.php';

require_once dirname(__FILE__) . '/tgm-activation.php';
require_once dirname(__FILE__) . '/admin.php';
require_once dirname(__FILE__) . '/mailing.php';
require_once dirname(__FILE__) . '/projects.php';
require_once dirname(__FILE__) . '/bids.php';
require_once dirname(__FILE__) . '/profiles.php';
require_once dirname(__FILE__) . '/review.php';
require_once dirname(__FILE__) . '/report.php';
require_once dirname(__FILE__) . '/invites.php';
require_once dirname(__FILE__) . '/messages.php';
require_once dirname(__FILE__) . '/notification.php';
require_once dirname(__FILE__) . '/testimonials.php';
require_once dirname(__FILE__) . '/user_actions.php';
require_once dirname(__FILE__) . '/theme.php';
require_once dirname(__FILE__) . '/template.php';
require_once dirname(__FILE__) . '/packages.php';
require_once dirname(__FILE__) . '/bid-plans.php';
require_once dirname(__FILE__) . '/post-meta-box.php';
require_once dirname(__FILE__) . '/widgets.php';
/**
 * Check plugin is active or not
 */
function et_is_plugin_active($plugin) {
    include_once (ABSPATH . 'wp-admin/includes/plugin.php');
    return is_plugin_active($plugin);
}

// vc block

if ( et_is_plugin_active( 'js_composer/js_composer.php' ) ) {

	if(!class_exists('WPBakeryShortCode')) return;

	$de_block_dir = get_template_directory().'/includes/vc_blocks/';
	require_once( $de_block_dir . 'status.php' );
	require_once( $de_block_dir . 'testimonial.php' );
	require_once( $de_block_dir . 'pricing.php' );
	require_once( $de_block_dir . 'pricing_block.php' );
	require_once( $de_block_dir . 'projects.php' );
	require_once( $de_block_dir . 'profiles.php' );

	$attributes = array(
		'type'        => 'dropdown',
		'heading'     => "Tab Style",
		'param_name'  => 'tab_style',
		'value'       => array("none", "project", "profile"),
		'description' => __("Set button style for tab", ET_DOMAIN)
	);
	vc_add_param('vc_tabs', $attributes);
	// Up Visual Composer version 4.6
	vc_add_param('vc_tta_tabs', $attributes);

}