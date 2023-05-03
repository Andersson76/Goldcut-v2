<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function get_cacsp_options( $option, $new_line_to_space = false, $fallback = '', $esc = false ) {

	$cacsp_option_use = false;
	if ( is_multisite() ) {
		$cacsp_site_id = get_main_site_id();
		$cacsp_option_use = get_blog_option( $cacsp_site_id, 'cacsp_option_use' );
		if ( $cacsp_option_use == 'some' && ( strpos( $option, 'cacsp_option_text_' ) > -1 || strpos( $option, '_button' ) > -1 || strpos( $option, '_description' ) > -1 ) ) {
			$cacsp_site_id = get_current_blog_id();
		}
	}
	if ( !$cacsp_option_use ) {
		$cacsp_option_use = 'default';
	}
	
	if ( is_multisite() && $cacsp_option_use != 'default' ) {
		$option = get_blog_option( $cacsp_site_id, $option );
	} else {
		$option = get_option( $option );
	}

	if ( !$option && $fallback ) {
		$option = $fallback;
	}
	if ( $new_line_to_space ) {
		$remove = array( "\n", "\r\n", "\r" );
		$option = str_replace( $remove, ' ', $option );
	}
	if ( $esc ) {
		$option = esc_attr( $option );
	}
	return stripslashes( $option );
}

function cacsp_sanitize_text_field_with_html( $str ) {
	$allowed_html = array(
	    'i' => array(
	        'class' => array(),
	        'aria-hidden' => array()
	    ),
	    'br' => array(),
	    'em' => array(),
	    'strong' => array(),
	    'p' => array(),
	);
	$str_with_html = wp_kses( $str, $allowed_html );
	return $str_with_html;
}

function cacsp_sanitize_domains( $domains, $new_row = true ) {
	$domains_arr = explode( "\n", $domains );
	$clean_domains = '';
	foreach ( $domains_arr as &$domain ) {
		$clean_domain = esc_url_raw( $domain );
		if ( !empty( $clean_domain ) ) {
	    	$clean_domains .= esc_url_raw( $clean_domain );
	    }
	    if ( $new_row && $clean_domain ) {
	    	$clean_domains .= "\n";
	    }
	}
	return $clean_domains;
}

function cacsp_option_actived() {
	$cacsp_option_actived = false;
	$cacsp_main_site_id = null;
	$cacsp_option_use = 'default';
	if ( is_multisite() ) {
		$cacsp_main_site_id = get_main_site_id();
		$cacsp_option_use = get_blog_option( $cacsp_main_site_id, 'cacsp_option_use' );
	}
	if ( current_user_can( 'manage_options' ) && get_cacsp_options( 'cacsp_option_actived' ) == 'admin' || get_cacsp_options( 'cacsp_option_actived' ) == 'true' || is_multisite() && $cacsp_option_use == 'some' && get_cacsp_options( 'cacsp_option_actived' ) ) {
		$cacsp_option_actived = true;
	}
	return $cacsp_option_actived;
}

function cacsp_get_plugin_version() {
	$plugin_version = get_file_data( __FILE__, array( 'Version' => 'Version' ), false )['Version'];
	return esc_attr( $plugin_version );
}

function cacsp_get_protocol() {
	$protocol = ( !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) ? "https://" : "http://";
	return $protocol;
}

function cacsp_option_use() {
	return get_cacsp_options( 'cacsp_option_use' );
}

function cacsp_hide_admin_for_sub_sites() {
	if ( is_multisite() ) {
		$cacsp_main_site_id = get_main_site_id();
		$cacsp_current_site_id = get_current_blog_id();
		$cacsp_option_use = get_blog_option( $cacsp_main_site_id, 'cacsp_option_use' );
		if ( $cacsp_option_use == 'everything' && $cacsp_main_site_id !== $cacsp_current_site_id ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
