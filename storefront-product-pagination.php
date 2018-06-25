<?php
/**
 * Plugin Name:			Storefront Product Pagination
 * Plugin URI:			http://woothemes.com/storefront/
 * Description:			Add unobstrusive links to next/previous products on your WooCommerce single product pages.
 * Version:				1.2.3
 * Author:				WooThemes
 * Author URI:			http://woothemes.com/
 * Requires at least:	4.0.0
 * Tested up to:		4.8.2
 *
 * Text Domain: storefront-product-pagination
 * Domain Path: /languages/
 *
 * @package Storefront_Product_Pagination
 * @category Core
 * @author James Koster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Returns the main instance of Storefront_Product_Pagination to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Storefront_Product_Pagination
 */
function storefront_product_pagination() {
	return Storefront_Product_Pagination::instance();
} // End storefront_product_pagination()

/**
 * Only load plugin if Storefront version is under 2.3.0.
 *
 * @since 1.2.4
 * @return void
 */
function storefront_product_pagination_init() {
	global $storefront_version;

	if ( class_exists( 'Storefront' ) && version_compare( $storefront_version, '2.3.0', '<' ) ) {
		require 'classes/class-storefront-product-pagination.php';

		storefront_product_pagination();
	}
} // end storefront_product_pagination_init()

add_action( 'init', 'storefront_product_pagination_init' );