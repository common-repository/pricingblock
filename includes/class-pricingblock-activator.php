<?php
/**
 * Fired during plugin activation.
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    PricingBlock
 * @subpackage pricingblock/includes
 * @author     zintaThemes @
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class PricingBlockActivator {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since       1.0.0
     * @access      protected
     * @var         Plugin_Name_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    public $loader;

    /**
     * Define the core functionality of the activation.
     *
     * @access      public
     * @since       1.0.0
     * @var         unown
     */
	public function __construct() {}

	/**
	 * PricingBlock activation function
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        ! get_option('pricingblock_version') && add_option( 'pricingblock_version', PRICINGBLOCK_VERSION );
        return true;
	}
}
