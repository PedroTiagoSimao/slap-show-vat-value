<?php
/**
 * @link              https://slap.pt/
 * @since             1.0.1
 * @package           SLAP_Vat_Value
 *
 * Plugin Name: SLAP - Show VAT Value
 * Plugin URI: https://slap.pt/wp-plugins/vat-value
 * Description: SLAP - Show VAT Value
 * Author: SLAP
 * Author URI: https://slap.pt/
 * Version: 1.0.4
 */

require_once (dirname(__FILE__) . '/includes/class-slap-show-vat-value.php');

$slap_vat_value = new SLAP_VAT_Value;
$slap_vat_value->run();