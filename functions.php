<?php

/**
 * Botiga child functions
 *
 */

use Includes\Init;

/**
 * Enqueues the parent stylesheet. Do not remove this function.
 *
 */
add_action('wp_enqueue_scripts', 'botiga_child_enqueue');
function botiga_child_enqueue()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

/* ADD YOUR CUSTOM FUNCTIONS BELOW */
define('THEME_VERSION', '1.0.1');


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}


if (class_exists('Includes\Init')) {
	Init::register_services();
}

require  dirname(__FILE__) . '/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/guillermoscript/botiga-child-theme',
	__FILE__, //Full path to the main plugin file or functions.php.
	'botiga-child-theme'
);


//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('staging');

function translate_reply($translated)
{
	$translated = str_replace('Unused Refer a Friend Coupons', 'Cupones para recomendar a un amigo no utilizados', $translated);
	$translated = str_replace('Coupon code', 'Código del cupón', $translated);
	$translated = str_replace('Coupon discount', 'Cupón de descuento', $translated);
	$translated = str_replace('Your Referral URL', 'Tu Link de referidos', $translated);

	return $translated;
}
add_filter('gettext', 'translate_reply');
add_filter('ngettext', 'translate_reply');

/**
 * Notify admin when a new customer account is created
 */
add_action('woocommerce_created_customer', 'woocommerce_created_customer_admin_notification_custom');
function woocommerce_created_customer_admin_notification_custom($customer_id)
{
	wp_send_new_user_notifications($customer_id, 'admin');
}

function show_coupon_in_my_account()
{
	$coupon_code = 'pana-20';
	$coupon_data = new WC_Coupon($coupon_code);
	$limit = $coupon_data->get_usage_limit_per_user();


?>
	<table class="shop_table shop_table_responsive">
		<tr>
			<th>Cupon</th>
			<th> Limite </th>
		</tr>

		<tr>
			<td> Pana-20 </td>
			<td> <?php echo $limit ?> </td>
		</tr>
	</table>
<?php
	// 5D6271AE4ABDB8CFE12CC4B1B406A45780F1F6456E8DF132580E51B0CF3578E514928E77F82111A0E8776F75B42B6518
}

add_action('woocommerce_before_my_account', 'show_coupon_in_my_account');