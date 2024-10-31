<?php
/**
 * The Exception class.
 *
 *
 *
 * @since      1.0.0
 * @package    pricingblock
 * @subpackage pricingblock/includes
 * @author     zintaThemes <>
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'PricingBlockException' ) ) {

    class PricingBlockException extends Exception {

    	/**
    	 * The unique identifier of this plugin.
    	 *
    	 * @since		1.0.0
    	 * @access		protected
    	 * @var			string		$plugin_name    The string used to uniquely identify this plugin.
    	 */
    	protected $plugin_name;

    	/**
    	 * The current version of the plugin.
    	 *
    	 * @since   	1.0.0
    	 * @access  	protected
    	 * @var     	string		$version		The current version of the plugin.
    	 */
    	protected $version;


    	/**
    	 * @access		public
    	 * @since		1.0.0
    	 * @var			unown
    	 */
    	public function __construct( $type ) {
    	    return '';
    	}

    	/**
         * @access      public
         * @since       1.0.0
         * @var         unown
         */
    	public function getMessage($value='') {}

    }
}
