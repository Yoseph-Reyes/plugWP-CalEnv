<?php
//funciones para añadir y eliminar a las tablas del calculo de envios.
include(cenvRuta.'includes/functions.php');

add_action( 'woocommerce_after_order_notes',cenvtextsender());

function cenvtextsender( $checkout ) { //FUNCION PARA AÑADIR EL FORMULARIO
 
    echo '<div id="additional_checkout_field"><h2>' . __('Información para envios') . '</h2>';
    
    //INPUT DIRECCION
    woocommerce_form_field( 'dirr', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Street Adress'),
        'placeholder'   => __('Example'),
        ), $checkout->get_value( 'dirr' ));
    
    //INPUT ESTADO
    woocommerce_form_field( 'state', array(
        'type'          => 'state',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('State'),        
        ), $checkout->get_value( 'state' ));

    //INPUT PAIS
    woocommerce_form_field( 'country', array(
        'type'          => 'contry',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('State'),        
        ), $checkout->get_value( 'country' ));
    
        //INPUT CODIGO POSTAL
    woocommerce_form_field( 'zip', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Postal Code'),
        'placeholder'   => __('20202'),
        ), $checkout->get_value( 'zip' ));    
 
    echo '</div>';
}


?>