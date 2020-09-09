<?php 
/*
Plugin Name: CalEnvios
Plugin URI: https://github.com/Yoseph-Reyes/plugWP-CalEnv
Description: Plugin de WordPress para calcular el costo de un envio en Woocommerce a cualquier direccion
Version: 0.1
Author: Yoseph Reyes
Author URI: https://github.com/Yoseph-Reyes
Text Domain: cenv
Generated By: http://ensuredomains.com
License: Pendiente puede ser MIT
*/



define('cenvRuta',plugin_dir_path(__FILE__));

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {    

    function initcheck() { //FUNCION PARA inicializar todo
        
        if(! class_exists('opSend')){
            class opSend extends WC_Shipping_Method{

                public function __construct() {
                    $this->id                    = 'cenv';
                    $this->method_title          = __( 'Shipping Calculator','cenv' );
		            $this->method_description    = __( 'A shipping method to calculate send cost','cenv' );
                    //PAISES
                    $this->countries = array(
                        'US',//estados unidos
                        'CA'//canada
                    );
                    $this->enabled		        = $this->get_option( 'enabled' );
                    $this->title                = $this->get_option( 'title','cenv' );
                    $this-> init();

                    function init(){
                        $this-> formFields();
                        $this->init_settings(); 
                        add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
                    }
		
                   function formsFields(){
                        $this->instance_form_fields = array(
                            'enabled' => array(
                                'title' 		=> __( 'Enable/Disable','cenv' ),
                                'type' 			=> 'checkbox',
                                'label' 		=> __( 'Enable this Shipping Method' ),
                                'default' 		=> 'yes',
                            ),
                            'title' => array(
                                'title' 		=> __( 'Title','cenv' ),
                                'type' 			=> 'text',
                                'description' 	=> __( 'Title to be display on site', 'cenv' ),
                                'default'		=> __( 'Shipping Calculator','cenv' ),
                            ),
                            'weight' => array(
                                'title' => __( 'Weight (kg)', 'cenv' ),
                                  'type' => 'number',
                                  'description' => __( 'Maximum allowed weight', 'cenv' ),
                                  'default' => 100
                                  ),
                        );
                   }
                                        
                }
                
            }               
                 
        }
        
    }
        add_action( 'woocommerce_shipping_init', 'opSend' );

        //ANADIR METODO DE ENVIO
        function addCenvMeth( $methods ) {
            $methods[] = 'opSend';
            return $methods;
        }
        add_filter('woocommerce_shipping_methods','addCenvMeth');

        // Let's Initialize Everything
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'core-init.php' ) ) {
            require_once( plugin_dir_path( __FILE__ ) . 'core-init.php' );
        }
    }    

        





