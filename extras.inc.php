<?php

// https://codex.wordpress.org/Plugin_API/Filter_Reference/login_redirect

function store_referer_in_login_form() {

    //Get and set any values already sent
    $user_extra = ( isset( $_SERVER['HTTP_REFERER'] ) ) ? $_SERVER['HTTP_REFERER'] : '';
    
    ?>
    <input type="hidden" name="redirect_to2" id="redirect_to2" value="<?php echo esc_attr(stripslashes($user_extra)); ?>" />
    <?php
}	

/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */

function redirect_after_login( $redirect_to, $request, $user ) {
	if (false && isset($_POST['redirect_to2']) ) {
		wp_safe_redirect( esc_url_raw( $_POST['redirect_to2'] ) );
		die();
	}
    return $redirect_to;
}
add_action( 'login_form', 'store_referer_in_login_form' );
add_filter( 'login_redirect', 'redirect_after_login', 10, 3 );



// src: https://stackoverflow.com/questions/18944027/how-do-i-defer-or-async-this-wordpress-javascript-snippet-to-load-lastly-for-fas
// async, defer script load filter
// Async load
function add_asyncdefer_attribute($tag, $handle)
{
    $param = '';
    if ( strpos($handle, 'async') !== false ) $param = 'async ';
    if ( strpos($handle, 'defer') !== false ) $param .= 'defer ';
    if ( $param )
        return str_replace('<script ', '<script ' . $param, $tag);
    else
        return $tag;
}
add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);



