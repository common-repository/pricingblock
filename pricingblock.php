<?php
/**
 * Plugin Name:     PricingBlock
 * Plugin URI:      https://pricingblock.zintathemes.com
 * Author:          ZintaThemes
 * Author URI:      https://zintathemes.com/
 * Version:         1.0
 * Description:     With PricingBlock you can create modren pricing table with Gutenberg in just few clicks
 *
 * Text Domain:     pricingblock
 * Domain Path:     /languages/
 *
 *
 * @link
 * @since           1.0.0
 * @package         PricingBlock
 * @category        *
 * @author          ZintaThemes
 */

if (! defined( 'ABSPATH' )) return;

// Define PricingBlock constants
defined('PRICINGBLOCK_VERSION')     or define('PRICINGBLOCK_VERSION'  , '1.0');
defined('PRICINGBLOCK_PATH')        or define('PRICINGBLOCK_PATH'     , plugin_dir_path(__FILE__));
defined('PRICINGBLOCK_URL')         or define('PRICINGBLOCK_URL'      , plugin_dir_url (__FILE__));

final class PricingBlockStart {

    /**
     * The single instance of PricingBlock.
     * @var         object
     * @access      private
     * @since         1.0.0
     */
    private static $_instance = false;

    /**
     * Constructor function.
     * @access      public
     * @since       1.0.0
     */
    public function __construct() {
        require_once PRICINGBLOCK_PATH . 'includes' . DIRECTORY_SEPARATOR . 'class-pricingblock.php';
        register_activation_hook( __FILE__, array('PricingBlock', 'pricingblock_activate') );
        register_deactivation_hook( __FILE__, array('PricingBlock', 'pricingblock_deactivate') );
        return true;
    } // End __construct()

    /**
     * Begins execution of the plugin.
     *
     * @access      public
     * @since       1.0.0
     * @param       $type       string
     */
    public static function pricingblock_starter() {
        if ( ! self::$_instance ) self::$_instance = new self();
        return PricingBlock::run();
    } // End pricingblock_starter()
} // End PricingBlockStart {} Class


/**
 * Begins execution of the plugin.
 *
 * @since       1.0.0
 * @param       $type       string
 */
PricingBlockStart::pricingblock_starter();
