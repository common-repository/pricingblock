<?php
/**
 * Update database class
 *
 * @since      1.0.0
 * @package    pricingblock
 * @subpackage pricingblock/includes
 * @author     zintaThemes <>
 */
if (! defined ( 'ABSPATH' )) {exit ();}

class PricingBlockUpdate {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected static $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @access public
	 * @since 1.0.0
	 * @var unown
	 */
	public function __construct($type) {
		return true;
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - PricingBlockLoader. Orchestrates the hooks of the plugin.
	 * - PricingBlocki18n. Defines internationalization functionality.
	 * - PricingBlockAdmin. Defines all hooks for the admin area.
	 * - PricingBlockPublic. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 */
	public static function update() {
		$DBversion 	= get_option('pricingblock_version');
		if ( ! $DBversion || version_compare( $DBversion, PRICINGBLOCK_VERSION, '<' ) ) {
			update_option( 'pricingblock_version', PRICINGBLOCK_VERSION );
			return true;
		}
		return false;
	}

	/**
	 * Check for any updates
	 *
	 * @since 1.0.0
	 */
	private static function checkForUpdate() {
		return true;
	}
}
