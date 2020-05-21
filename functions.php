<?php
/**
 * Corporate Pro
 *
 * This file sets up the Corporate Pro Theme.
 *
 * @package   SEOThemes\CorporatePro
 * @link      https://seothemes.com/themes/corporate-pro
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Load Genesis Framework (do not remove).
require_once get_template_directory() . '/lib/init.php';

// Load setup functions.
require_once __DIR__ . '/includes/setup.php';

// Load helper functions.
require_once __DIR__ . '/includes/helpers.php';

// Load scripts and styles.
require_once __DIR__ . '/includes/enqueue.php';

// Load general functions.
require_once __DIR__ . '/includes/general.php';

// Load widget areas.
require_once __DIR__ . '/includes/widgets.php';

// Load hero section.
require_once __DIR__ . '/includes/hero.php';

// Load Customizer settings.
require_once __DIR__ . '/includes/customize.php';

// Load default settings.
require_once __DIR__ . '/includes/defaults.php';

// Load recommended plugins.
require_once __DIR__ . '/includes/plugins.php';

genesis_register_sidebar( array(
    'id' => 'home-top',
    'name' => __( 'Home Top', 'genesis' ),
) );

add_action( 'genesis_before_content_sidebar_wrap', 'home_page_widget' );
function home_page_widget() {

    if ( is_front_page() ) {
    
    genesis_widget_area( 'home-top', array(
        'before' => '<div class="home-top widget-area">',
        'after'  => '</div>',
    ) );
    }
}

function register_additional_genesis_menus() {

register_nav_menu( 'footer-menu' ,
__( 'Footer Menu' ));
}
add_action( 'init', 'register_additional_genesis_menus' );

add_action( 'genesis_footer', 'add_footer_menu' ); 

function add_footer_menu() {

wp_nav_menu( array( 
'theme_location' => 'footer-menu', 
'container_class' => 'genesis-nav-menu' ) );
}

add_image_size( 'vertical-thumbnail',   680, 900, true );
