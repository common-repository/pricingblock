<?php
/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    PricingBlock
 * @subpackage pricingblock/includes
 * @author     zintaThemes @
 *
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'PricingBlockDeactivator' ) ) {

    class PricingBlockDeactivator {


    	/**
    	 * Define the core functionality of the activation.
    	 *
    	 * @access      public
    	 * @since       1.0.0
    	 * @var         unown
    	 */
    	public function __construct($param) {}

    	/**
    	 * Short Description. (use period)
    	 *
    	 * Long Description.
    	 *
    	 * @since    1.0.0
    	 */
    	public static function deactivate() {
            delete_option( 'pricingblock_version' );
    	    return true;
        }

    }
}
