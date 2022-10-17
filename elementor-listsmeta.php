<?php
/**
 * Elementor ListsMeta WordPress Plugin
 *
 * @package ListsMeta
 *
 * Plugin Name: Elementor ListsMeta
 * Description: Simple showing meta data to lists type
 * Plugin URI:  https://github.com/habibimroncn/elementor-listsmeta
 * Version:     1.0.0
 * Author:      Habib Nugroho
 * Author URI:  https://habibimroncn.github.io
 * Text Domain: elementor-listsmeta
 */
define( 'ELEMENTOR_LISTSMETA_FILE', __FILE__ );
define( 'ELEMENTOR_LISTSMETA_DIR', __DIR__ );

function register_new_widgets( $widgets_manager ) {

    require_once( plugin_dir_path( ELEMENTOR_LISTSMETA_FILE ) . '/widgets/listsmeta-widget.php' );

    $widgets_manager->register( new \Elementor_Widget_Listmeta() );

}
add_action( 'elementor/widgets/register', 'register_new_widgets' );