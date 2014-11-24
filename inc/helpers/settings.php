<?php

function incsub_support_get_settings() {
	return incsub_support()->settings->get_all();
}

function incsub_support_get_setting( $name ) {
	return incsub_support()->settings->get( $name );
}

function incsub_support_get_default_settings() {
	return incsub_support()->settings->get_default_settings();
}

function incsub_support_get_support_page_url() {
	$page = incsub_support()->settings->get( 'incsub_support_support_page' );
	if ( 'page' === get_post_type( $settings['incsub_support_support_page'] ) )
		return get_permalink( $settings['incsub_support_support_page'], $leavename );

	return false;
}