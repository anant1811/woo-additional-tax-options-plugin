<?php
/*
Plugin Name: Woo Additional Tax Options
Plugin URI: https://github.com/anant1811
Description: Additional Tax Options for WooCommerce
Version: 1.0.0
Contributors: wpnomad
Author: wpnomad
Author URI: https://github.com/anant1811
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpplugin
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

// Define plugin paths and URLs
define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPPLUGIN_DIR', plugin_dir_path( __FILE__ ) );


// Create Settings Fields
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-settings-fields.php');

// Run the filters based on settings values

// Run filter for same inclusive cost irrespective of tax rates
$additional_tax = get_option( 'additional_tax_options' );
if(( $additional_tax) == 'yes' ) {
    add_filter( 'woocommerce_adjust_non_base_location_prices', '__return_false' );
  } 

// Run filter for diaabling local tax calculation for local pickups
$additional_tax_local = get_option( 'additional_tax_options_local' );

if(( $additional_tax_local) == 'yes' ) {
    add_filter( 'woocommerce_apply_base_tax_for_local_pickup', '__return_false' );
  } 
?>