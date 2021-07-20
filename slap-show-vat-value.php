<?php
/**
 * @link              https://slap.pt/
 * @since             1.0.1
 * @package           Vat_Value
 *
 * Plugin Name: SLAP - Mostrar IVA para WooCommerce
 * Plugin URI: https://slap.pt/
 * Description: SLAP - Mostrar IVA para WooCommerce
 * Author: SLAP
 * Author URI: https://slap.pt/
 * Version: 1.0.2
 */

require_once (dirname(__FILE__) . '/includes/class-slap-show-vat-value.php');

$slap_vat_value = new SLAP_VAT_Value;
$slap_vat_value->run();