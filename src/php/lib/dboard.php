<?php
/*=============================================*/
/* Prevent TinyMCE format dropdown
/* from including unnecessary headings
/*=============================================*/
function custom_format_TinyMCE( $in ) {
  $in['block_formats'] = "Heading=h3; Sub-Heading=h4; Paragraph=p;";
	return $in;
}
add_filter( 'tiny_mce_before_init', 'custom_format_TinyMCE' );

/*=============================================*/
/* Activate TinyMCE style dropdown
/* and add text styles to it
/*=============================================*/
function custom_style_TinyMCE($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'custom_style_TinyMCE');

function custom_style_def_TinyMCE( $init_array ) {
	$style_formats = array(
		array(
			'title' => 'Lead Text',
			'block' => 'p',
			'classes' => 'Lead',
		),
	);
	$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'custom_style_def_TinyMCE' );

/*=============================================*/
/* Hide admin bar on the front-end for all users
/*=============================================*/
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  show_admin_bar(false);
}

/*=============================================*/
/* Change the login logo URL.
/* Default is wordpress.org.
/*=============================================*/
// Href attribute
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url() {
  return get_bloginfo( 'url' );
}
// Alt attribute
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
function my_login_logo_url_title() {
  return 'Seminari Alkitab Asia Tenggara';
}

/*=============================================*/
/* Change the default error message
/* to something vague.
/*=============================================*/
add_filter('login_errors', 'login_error_override');
function login_error_override() {
  return 'Incorrect username/password combination';
}

/*=============================================*/
/* Check "Remember Me" by default
/*=============================================*/
add_action( 'init', 'login_checked_remember_me' );
function login_checked_remember_me() {
  add_filter( 'login_footer', 'rememberme_checked' );
}
function rememberme_checked() {
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
}

/*=============================================*/
/* Disable Wordpress Update Notification
/*=============================================*/
add_action('after_setup_theme','remove_core_updates');
function remove_core_updates() {
  if(! current_user_can('update_core')){return;}
  add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
  add_filter('pre_option_update_core','__return_null');
  add_filter('pre_site_transient_update_core','__return_null');
}

/*=============================================*/
/* Disable Plugin Update Notifications
/*=============================================*/
remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');

/*=============================================*/
/* Disable Other Misc Notifications
/*=============================================*/
function remove_other_updates(){
  global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_other_updates');
add_filter('pre_site_transient_update_plugins','remove_other_updates');
add_filter('pre_site_transient_update_themes','remove_other_updates');
