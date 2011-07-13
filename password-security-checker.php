<?php 
/*
 * Plugin Name: Password Security Checker
 * Description: Enforces minimum password length and usage of capital letters as well as numbers. Based on "Minimum Password Length" (http://www.itsananderson.com/plugins/minimum-password-length) by Will Anderson.
 * Plugin URI: http://www.eco.de/
 * Plugin Author: Tobias Baldauf
 * Author URI: http://www.tobias-baldauf.de/
 * Version: 0.1
 */
function minimum_password_limit( & $errors ) {
	$min_length = 12;
	if ( !empty( $_POST['pass1'] ) && $_POST['pass1'] === $_POST['pass2'] && !preg_match('/^.*(?=.{12,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', $_POST['pass1']) ) {
		$errors->add( 'min_pass_length', sprintf( __( '<strong>Security advice</strong>: Your password must be at least %d characters long and have at least one capital letter and one number in it.' ), $min_length ), array( 'form-field' => 'pass1' ) );
	}
}
add_action( 'user_profile_update_errors', 'minimum_password_limit' );
?>