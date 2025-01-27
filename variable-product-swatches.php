<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/zqelab
 * @since             1.0.0
 * @package           Variable_Product_Swatches
 *
 * @wordpress-plugin
 * Plugin Name:       Variable Product Swatches for WooCommerce
 * Plugin URI:        https://github.com/zqelab/variable-product-swatches
 * Description:       Variable Product Swatches is altimate solution for Color, Image, Button and Radio Swatches For WooCommerce Variable Product Attributes.
 * Version:           1.0.4
 * Author:            ZQE
 * Author URI:        https://github.com/zqelab
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       variable-product-swatches
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during agendapress activation.
 * This action is documented in vendor/autoload.php
 */
include dirname(__FILE__) . '/vendor/autoload.php';

if ( ! function_exists( 'variable_product_swatches_fs' ) ) {
    // Create a helper function for easy SDK access.
    function variable_product_swatches_fs() {
        global $variable_product_swatches_fs;

        if ( ! isset( $variable_product_swatches_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/includes/freemius/start.php';

            $variable_product_swatches_fs = fs_dynamic_init( array(
                'id'                  => '9729',
                'slug'                => 'variable-product-swatches',
                'type'                => 'plugin',
                'public_key'          => 'pk_c9403e7faf41a5dfd7e987a93afcd',
                'is_premium'          => false,
                'has_addons'          => true,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'variable-product-swatches',
                ),
            ) );
        }

        return $variable_product_swatches_fs;
    }

    // Init Freemius.
    variable_product_swatches_fs();
    // Signal that SDK was initiated.
    do_action( 'variable_product_swatches_fs_loaded' );
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VARIABLE_PRODUCT_SWATCHES_VERSION', '1.0.4' );
define( 'VARIABLE_PRODUCT_SWATCHES_BASENAME', plugin_basename( __FILE__ ) );
define( 'VARIABLE_PRODUCT_SWATCHES_URI', plugin_dir_url( __FILE__ ) );
define( 'VARIABLE_PRODUCT_SWATCHES_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-variable-product-swatches-activator.php
 */
function activate_variable_product_swatches() {
	\Zqe\Variable_Product_Swatches_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-variable-product-swatches-deactivator.php
 */
function deactivate_variable_product_swatches() {
	\Zqe\Variable_Product_Swatches_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_variable_product_swatches' );
register_deactivation_hook( __FILE__, 'deactivate_variable_product_swatches' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_variable_product_swatches() {

	$plugin = new \Zqe\Variable_Product_Swatches();
	$plugin->run();

}
add_action( 'plugins_loaded', 'run_variable_product_swatches', 25 );








