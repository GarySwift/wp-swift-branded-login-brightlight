<?php
/*
Plugin Name:       WP Swift: Branded Login BrightLight
Description:       A plugin that restyles the default WordPress login page
Version:           1.0.0
Author:            Gary Swift
Author URI:        https://github.com/GarySwift
License:           MIT License
License URI:       http://www.opensource.org/licenses/mit-license.php
Text Domain:       wp-swift-branded-login-brightlight
*/
class WP_Swift_Branded_Login_Plugin {
    /*
     * Initializes the plugin.
     */
    public function __construct() {
        add_action('login_enqueue_scripts', array( $this, 'branded_login_css_file') );
        add_filter('login_headerurl', array( $this, 'login_logo_url'));
        add_filter('login_headertitle', array( $this, 'login_logo_url_title'));
        add_action('login_footer', array( $this, 'login_footer_link'));
    }
    /*
     * Add the css file
     */
    function branded_login_css_file() {
        wp_enqueue_style('login-styles', plugins_url( 'assets/css/login-styles.css', __FILE__ ) );
    }
    /*
     * Change the Logo Image URL
     */
    function login_logo_url() {
        return home_url();
    }
    /*
     * Change the title tag of the Logo Image URL
     */
    function login_logo_url_title() {
        return get_bloginfo( 'name' );
    }
    /*
     * Add a Custom Link Under the Form
     */
    function login_footer_link() {
        $url = 'http://www.brightlight.ie/';
        echo '<p style="text-align: center; margin-top: 1em;"><a id="loginfooter" href="'.$url.'" target="_blank">If you have any questions, visit our site</a></p>';
    }
}
// Initialize the plugin
$branded_login_pages_plugin = new WP_Swift_Branded_Login_Plugin();