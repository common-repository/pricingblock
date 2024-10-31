<?php
/**
 *
 * PricingBlock Shortcode class.
 *
 * @since       1.0.0
 * @package     pricingblock
 * @subpackage  pricingblock/includes
 * @author      zintaThemes <>
 *
 */

if (! defined( 'ABSPATH' ) || class_exists( 'PricingBlockShortcode' )) return;

class PricingBlockShortcode {


    /**
     * The single instance of PricingBlock.
     * @var     object
     * @access  private
     * @since     1.0.0
     */
    private static $_instance = false;


    /**
     *
     * Initialize the class and set its properties.
     * @since   1.3.0
     */
    public function __construct() {
    }

} // end of class PricingBlockShortcode
