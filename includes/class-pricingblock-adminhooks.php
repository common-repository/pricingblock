<?php
/**
 *
 * PricingBlock Admin Scripts functionality of the plugin.
 *
 * @since        1.0.0
 * @package      pricingblock
 * @subpackage   pricingblock/admin
 * @author       zintaThemes <>
 */

if (! defined( 'ABSPATH' ) || class_exists( 'PricingBlockAdminHooks' )) return;

class PricingBlockAdminHooks extends PricingBlock
{

    /**
    * Initialize the class and set its properties.
    *
    * @since    1.0.0
    * @param    string    $plugin_name       The name of the plugin.
    * @param    string    $version    The version of this plugin.
    */
    public function __construct() {
        PricingBlock::get_loader()->add_action('admin_menu', $this, 'admin_menus');
        if ( ! function_exists( 'register_block_type' ) ) return false;
        PricingBlock::get_loader()->add_action('init', $this, 'scripts_start');
        PricingBlock::get_loader()->add_action('enqueue_block_editor_assets', $this, 'blocks_enqueue_scripts');
        return true;
    } // End __construct()

    /**
     *
     * @since    1.0.0
     */
    public function scripts_start() {
        $this->enqueue_scripts();
        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
    } // End scripts_start()

    /**
     * Register the stylesheets for the admin area.
     *
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Plugin_Name_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Plugin_Name_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     *
     * @since   1.0.0
     */
    public static function enqueue_styles() {
        self::register_style();
        wp_enqueue_style('pricingblock');
        if ( is_rtl() ) wp_enqueue_style('pricingblock-rtl');
    } // End enqueue_styles()

    /**
     * Register the JavaScript for the admin area.
     *
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Plugin_Name_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Plugin_Name_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     *
     * @access   public
     * @since   1.0.0
     */
    public static function enqueue_scripts() {
        if ( ! function_exists( 'register_block_type' ) ) return;
        wp_register_script(
            'pricingblock-blocks',
            PRICINGBLOCK_URL . 'assets/js/pricingblock.bundle.min.js',
            [ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ],
            PRICINGBLOCK_VERSION
        );
    } // End enqueue_scripts()

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Plugin_Name_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Plugin_Name_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     *
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since  1.0.0
     */
    public function blocks_enqueue_scripts() {
        if ( ! function_exists( 'register_block_type' ) ) return;
        wp_enqueue_code_editor(array('type' => 'text/html'));
        wp_enqueue_script( 'pricingblock-blocks' );
    } // End enqueue_scripts()

    /**
     *
     *
     * @access   public
     * @since   1.0.0
     */
    public static function register_style() {

        global $wp_styles;

        $srcs = array_map('basename', (array) wp_list_pluck($wp_styles->registered, 'src'));

        if ( ! in_array('fontawesome.min.css', $srcs) && ! in_array('font-awesome.css', $srcs) && ! in_array('font-awesome.min.css', $srcs) ) {
            wp_register_style(
                'fontawesome',
                PRICINGBLOCK_URL . 'assets/vendor/fontawesome/css/all.min.css',
                array(),
                PRICINGBLOCK_VERSION
            );
        }

        wp_register_style(
            'pricingblock',
            PRICINGBLOCK_URL . 'assets/css/editor.min.css',
            [ 'fontawesome' ],
            PRICINGBLOCK_VERSION,
            'all'
        );

        if (is_rtl()) {
            wp_register_style(
                'pricingblock-rtl',
                PRICINGBLOCK_URL . 'assets/css/editor-rtl.min.css',
                [ 'pricingblock' ],
                PRICINGBLOCK_VERSION,
                'all'
            );
        }
    } // End register_style()

    /**
     *
     * Create admin menus and pages.
     *
     * @access   public
     * @since   1.0.0
     */
    public static function admin_menus() {
        add_submenu_page(
            'options-general.php',
            __('PricingBlock Help', 'pricingblock'),
            __('PricingBlock Help', 'pricingblock'),
            'manage_options',
            'pricingblock_help',
            array( 'PricingBlockAdminHooks', 'pricingblock_admin' )
        );
    } // End admin_menus()

    /**
     *
     * Create admin help and page.
     *
     * @access   public
     * @since   1.0.0
     */
    public static function pricingblock_admin($args) {
        require_once 'class-pricingblock-help.php';
        PricingBlockAdminHelp::view();
    }
} // End Class
