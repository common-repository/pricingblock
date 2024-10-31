<?php
/**
 * The core plugin class.
*
* @since      1.0.0
* @package    pricingblock
* @subpackage pricingblock/includes
* @author     zintaThemes <>
*/

if (! defined( 'ABSPATH' ) || class_exists( 'PricingBlock' )) return;

class PricingBlock
{

    /**
     * The single instance of PricingBlock.
     * @var     object
     * @access  private
     * @since     1.0.0
     */
    private static $_instance = false;

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since        1.0.0
     * @access        protected
     * @var            Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected static $loader;

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
        PricingBlock::load_dependencies();
        is_admin() ? $this->define_admin_hooks() : $this->define_public_hooks();
        return self::$_instance = true;
    } // End __construct()

    /**
     * Load the required dependencies for this plugin.
     * 
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since        1.0.0
     * @access        private
     *
     */
    private static function load_dependencies() {
        require_once PRICINGBLOCK_PATH. 'includes' . DIRECTORY_SEPARATOR . 'class-pricingblock-loader.php';
        return self::$loader = new PricingBlockLoader();
    } // End load_dependencies()

    /**
     * Load PricingBlock updater class
     * @since        1.0.0
     * @return         unknown
     */
    public static function update() {
        return PricingBlockUpdate::update();
    } // End update()

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since        1.0.0
     * @access        private
     */
    private static function set_locale() {
        PricingBlock::get_loader()->add_action( 'init', 'PricingBlocki18n', 'load_plugin_textdomain' );
    } // End set_locale()

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since        1.0.0
     * @access        private
     */
    private function define_admin_hooks() {
        return class_exists('PricingBlockAdminHooks') && new PricingBlockAdminHooks() && $this->set_locale();
    } // End define_admin_hooks()

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since        1.0.0
     * @access        private
     */
    private function define_public_hooks() {
        return function_exists( 'register_block_type' ) && class_exists('PricingBlockHooks') &&  new PricingBlockHooks();
    } // End define_public_hooks()

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since        1.0.0
     */
    public static function run() {
        ! self::$_instance && new self();
        return PricingBlock::get_loader()->run();
    } // End run()

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Plugin_Name_Loader    Orchestrates the hooks of the plugin.
     */
    public static function get_loader() {
        return self::$loader;
    } // End get_loader()

    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-pricingblock-activator.php
     *
     * @since     1.0.0
     */
    public static function pricingblock_activate() {
        require_once PRICINGBLOCK_PATH . 'includes' . DIRECTORY_SEPARATOR . 'class-pricingblock-activator.php';
        return PricingBlockActivator::activate();
    } // End pricingblock_activate()

    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-pricingblock-deactivator.php
     *
     * @since     1.0.0
     */
    public static function pricingblock_deactivate() {
        require_once PRICINGBLOCK_PATH . 'includes' . DIRECTORY_SEPARATOR . 'class-pricingblock-deactivator.php';
        return PricingBlockDeactivator::deactivate();
    } // End pricingblock_deactivate()
} // End PricingBlock {} class
