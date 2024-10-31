<?php
/**
 *
 * PricingBlock Admin Help page functionality of the plugin.
 *
 * @since        1.0.0
 * @package      pricingblock
 * @subpackage   pricingblock
 * @author       zintaThemes <>
 */

if (! defined( 'ABSPATH' ) || class_exists( 'PricingBlockAdminHooks' )) return;

class PricingBlockAdminHelp extends PricingBlockAdminHooks
{

    /**
    * Initialize the class and set its properties.
    *
    * @since    1.0.0
    */
    public function __construct() {
        return;
    } // End __construct()


    /**
    *
    * @since    1.0.0
    */
    public static function view() {
        if ( ! function_exists( 'register_block_type' ) ) :?>
            <div class="notice notice-error">
                <p><?php esc_html_e( 'you don`t have Gutenberg editor running on your site.', 'pricingblock' ); ?></p>
                <p><?php esc_html_e( 'You`ll need WordPress version 5.0 or higher for PricingBlock to work.', 'pricingblock' ); ?></p>
            </div><?php
        endif;
        ?>
        <div id="pricingblock-help" class="wrap">
            <div class="view_title">
                <h1><?php esc_html_e( 'PricingBlock', 'pricingblock' );?> - <?php esc_html_e( 'Version', 'pricingblock' );?> - <?php esc_html_e( PRICINGBLOCK_VERSION );?></h1>
            </div>

            <div class="help card contact-us welcome-panel">
                <div>
                    <h2><i class="fa fa-send"></i><?php esc_html_e( 'Contact Us', 'pricingblock');?></h2>
                </div>

                <p class="about-description">
                    <?php esc_html_e( 'First of all, thank you for using PricingBlock.', 'pricingblock' );?><br/>
                    <?php esc_html_e( 'If you like it, Please don\'t forget to write a good review.', 'pricingblock');?></br>
                </p>
                <a target="_blank" class="stars-yellow" href="https://wordpress.org/plugins/pricingblock/#reviews">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span>
                      <?php esc_html_e( 'Click here to write your reivew.', 'pricingblock');?>
                    </span>
                </a>.
                <p class="logo">
                    <img src="<?php echo esc_url( site_url().'/wp-content/plugins/pricingblock/assets/images/logo-180x180.png?v='.HAYYAB_VERSION ); ?>" />
                </p>
            </div>

            <div class="help card">
                <p class="about-description">
                    <?php esc_html_e( 'Need help ? You want to report a bug ?', 'pricingblock' );?><br />
                    <?php esc_html_e( 'You can find us on:', 'pricingblock' );?><br>
                </p>
                <div>
                    <a target="_blank" class="button button-primary button-hero " href="https://pricingblock.zintathemes.com"><?php esc_html_e( 'Plugin Website', 'pricingblock');?></a>
                    <a target="_blank" class="button button-primary button-hero " href="https://zintathemes.com"><?php esc_html_e( 'Our Website', 'pricingblock');?></a>
                </div>
            </div>
        </div><?php
    } // End view()
}
