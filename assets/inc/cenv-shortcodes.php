<?php 
/*
*
*	***** CalEnvios *****
*
*	Shortcodes
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
/*
*
*  Build The Custom Plugin Form
*
*  Display Anywhere Using Shortcode: [cenv_custom_plugin_form]
*
*/
function cenv_custom_plugin_form_display($atts, $content = NULL){
		extract(shortcode_atts(array(
      	'el_class' => '',
      	'el_id' => '',	
		),$atts));    
        
        $out ='';
        $out .= '<div id="cenv_custom_plugin_form_wrap" class="cenv-form-wrap">';
        $out .= 'Hey! Im a cool new plugin named <strong>CalEnvios!</strong>';
        $out .= '<form id="cenv_custom_plugin_form">';
        $out .= '<p><input type="text" name="myInputField" id="myInputField" placeholder="Test Field: Test Ajax Responses"></p>';
        
        // Final Submit Button
        $out .= '<p><input type="submit" id="submit_btn" value="Submit My Form"></p>';        
        $out .= '</form>';
         // Form Ends
        $out .='</div><!-- cenv_custom_plugin_form_wrap -->';       
        return $out;
}
/*
Register All Shorcodes At Once
*/
add_action( 'init', 'cenv_register_shortcodes');
function cenv_register_shortcodes(){
	// Registered Shortcodes
	add_shortcode ('cenv_custom_plugin_form', 'cenv_custom_plugin_form_display' );
};