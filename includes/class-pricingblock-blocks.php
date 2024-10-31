<?php
/**
 * The core plugin class.
*
* @since      1.0.0
* @package    pricingblock
* @subpackage pricingblock/includes
* @author     zintaThemes <>
*/

if (! defined( 'ABSPATH' ) || class_exists( 'PricingBlockBlocks' )) return;

class PricingBlockBlocks
{

    /**
     * The single instance of PricingBlock.
     * @var     object
     * @access  private
     * @since     1.0.0
     */
    private static $_instance = false;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @access        public
     * @since        1.0.0
     * @var          unown
     */
    public function __construct() {
        if ( self::$_instance ) return self::$_instance;
        add_filter('block_categories', array($this, 'register_block_category'), 10, 2);
        return self::$_instance = true;
    } // End __construct()

    /**
     * register pricingblock block category
     */
    public function register_block_category($categories, $post) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'pricingblock',
                    'title' => __('PricingBlock', 'pricingblock')
                )
            )
        );
    } // End register_block_category()

} // End PricingBlock {} class
