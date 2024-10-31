<?php
/**
 * Public scripts output class
 *
 *
 * @package    pricingblock
 * @subpackage pricingblock/public
 * @author     zintaThemes
 *
 *
 */

if (! defined( 'ABSPATH' ) || class_exists( 'PricingBlockHooks' )) return;

/**
 * 
 */
class PricingBlockHooks extends PricingBlock
{

    /**
    * Initialize the class and set its properties.
    *
    * @since    1.0.0
    * @param    string    $plugin_name       The name of the plugin.
    * @param    string    $version    The version of this plugin.
    */
    public function __construct() {
        PricingBlock::get_loader()->add_action('wp_enqueue_scripts', $this, 'enqueue_styles');
        PricingBlock::get_loader()->add_action('wp_enqueue_scripts', $this, 'enqueue_scripts');
        PricingBlock::get_loader()->add_action('wp_head', $this, 'js_head_code');
    } // End __construct()

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
    * @since    1.0.0
    */
    public function enqueue_styles() {

        $wp_styles = wp_styles();
        $dep = array();

        if ( $wp_styles ) {
            $srcs = array_map(
                'basename',
                wp_list_pluck($wp_styles->registered, 'src')
            );

            if ( is_array($srcs) && ! in_array('fontawesome.css', $srcs) && ! in_array('fontawesome.min.css', $srcs) && ! in_array('font-awesome.css', $srcs) && ! in_array('font-awesome.min.css', $srcs) ) {
                wp_register_style( 'fontawesome', PRICINGBLOCK_URL.'assets/vendor/fontawesome/css/all.min.css', array(), PRICINGBLOCK_VERSION, 'all' );
                $dep[] = 'fontawesome';
            }
        }

        wp_register_style( 'pricingblock', PRICINGBLOCK_URL.'assets/css/style.min.css', $dep, PRICINGBLOCK_VERSION, 'all' );

        wp_enqueue_style('pricingblock');
    } // End enqueue_styles()

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
    * @since    1.0.0
    */
    public function enqueue_scripts() {
    } // End enqueue_scripts()

    public function js_head_code($value='') {
        ?>
        <script>
            !function(){function n(){var i,n=document.querySelectorAll(".pricingblock__plan"),e=-1;0<n.length&&"function"==typeof n.forEach&&n.forEach(function(n){newOF=Math.ceil(n.getBoundingClientRect().top+window.scrollY+n.offsetHeight/2),n.classList.remove("pricingblock__plan--first-in-line"),n.classList.remove("pricingblock__plan--last-in-line"),newOF-20>e&&(n.classList.add("pricingblock__plan--first-in-line"),void 0!==i&&void 0!==i.classList&&i.classList.add("pricingblock__plan--last-in-line"),e=newOF),i=n})}document.addEventListener("DOMContentLoaded",n),window.addEventListener("resize",n)}();
        </script>
        <?php
    }

} // End PricingBlockHooks class
