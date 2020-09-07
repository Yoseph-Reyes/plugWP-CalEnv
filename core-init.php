<?php 
/*
*
*	***** CalEnvios *****
*
*	This file initializes all CENV Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('CENV_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('CENV_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('CENV_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('CENV_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function cenv_register_core_css(){
wp_enqueue_style('cenv-core', CENV_CORE_CSS . 'cenv-core.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'cenv_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function cenv_register_core_js(){
// Register Core Plugin JS	
wp_enqueue_script('cenv-core', CENV_CORE_JS . 'cenv-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'cenv_register_core_js' );    
/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( CENV_CORE_INC . 'cenv-core-functions.php' ) ) {
	require_once CENV_CORE_INC . 'cenv-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( CENV_CORE_INC . 'cenv-ajax-request.php' ) ) {
	require_once CENV_CORE_INC . 'cenv-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( CENV_CORE_INC . 'cenv-shortcodes.php' ) ) {
	require_once CENV_CORE_INC . 'cenv-shortcodes.php';
}