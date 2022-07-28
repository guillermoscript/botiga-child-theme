<?php

namespace Front;

defined('ABSPATH') || exit;

class Enqueue
{
    public function register()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'), 20);
        // add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 20);
    }
    public function enqueue_styles()
    {
        $version = THEME_VERSION;
        // if(is_front_page()){
        // }
        if (is_archive()) {
            wp_enqueue_style('child-checkout', get_stylesheet_directory_uri() . '/Front/css/shop.css', array(), $version);
        }
        // if(is_product()){
        // }
        // $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // if(is_cart() || $actual_link === home_url(  ) . '/wishlist/'){
        // 	wp_enqueue_style( 'child-cart', get_stylesheet_directory_uri() . '/assets/css/cart.css', , $version );
        // }
        // if(is_account_page()){
        // }
        if (is_checkout()) {
            wp_enqueue_style('child-checkout', get_stylesheet_directory_uri() . '/Front/css/checkout.css', array(), $version);
        }
    }
    public function enqueue_scripts()
    {
        // if(is_front_page()){
        // 	wp_enqueue_script( 'child-script_landing', get_stylesheet_directory_uri() . '/assets/js/landing.js', array( 'jquery' ), $version, true );	
        // }
        // if(is_product()){
        // 	wp_enqueue_script( 'child-script_swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array( 'jquery' ), $version, true );	
        // 	wp_enqueue_script( 'child-product', get_stylesheet_directory_uri() . '/assets/js/product.js', array( 'jquery' ), $version, true );
        // }
        // if(is_cart()){
        // }
        // if ( is_checkout() && ! ( is_wc_endpoint_url( 'order-pay' ) || is_wc_endpoint_url( 'order-received' ) ) ) {
        // }
        // if(is_account_page()){
        // }
        // if( is_shop() || preg_match('/category/', $_SERVER['REQUEST_URI']) ) {
        // }
    }
}
