<?php
/*
Plugin Name:  Environment plugin disabler
Description:  Disables plugins based on environment settings.
Version:      1.0.0
Author:       Copia Digital
Author URI:   https://www.copiadigital.com/
*/
    
if ( defined( 'DEV_DISABLED_PLUGINS' ) ) {
    $plugins_to_disable = unserialize( DEV_DISABLED_PLUGINS );
    
    if ( ! empty( $plugins_to_disable ) && is_array( $plugins_to_disable ) ) {

        require_once( dirname( __FILE__ ) . '/DisablePlugins.php' );
        $utility = new DisablePlugins( $plugins_to_disable );
        
        //part below is optional but for me it is crucial
        error_log( 'Locally disabled plugins: ' . var_export( $plugins_to_disable, true ) );
	}
}