<?php

/**
 * @package     Vecular Elementor Add-On
 * @author      vecular.co
 * @copyright   vecular.co
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Vecular Elementor Add-On
 * Plugin URI:  http://vecular.co
 * Description: Elementor Add-On
 * Version:     1.2
 * Author:      vecular.co
 * Author URI:  http://vecular.co
 * Text Domain: vc-core
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

// Block direct access to file
defined('ABSPATH') or die('Not Authorized!');

// Plugin Defines
define("VC_FILE", __FILE__);
define("VC_DIRECTORY", dirname(__FILE__));
define("VC_TEXT_DOMAIN", dirname(__FILE__));
define("VC_DIRECTORY_BASENAME", plugin_basename(VC_FILE));
define("VC_DIRECTORY_PATH", plugin_dir_path(VC_FILE));
define("VC_DIRECTORY_URL", plugins_url(null, VC_FILE));

require_once(VC_DIRECTORY . '/include/elementer-widget/widget.php');

function vc_core_script()
{
  wp_enqueue_script('swiper-script-vc', VC_DIRECTORY_URL . '/include/js/swiper-bundle.min.js', array(), '1.0');
  wp_enqueue_style('swiper-vc', VC_DIRECTORY_URL . '/include/css/swiper-bundle.min.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'vc_core_script');
