<?php

namespace Admin\Controller;

class BillingController
{

    public function register()
    {

        add_filter('woocommerce_checkout_fields', [$this, 'custom_override_checkout_fields_xd']);
        add_filter('woocommerce_checkout_fields', [$this, 'remove_email'], PHP_INT_MAX);
    }


    public function remove_email($address_fields)
    {
        if (is_user_logged_in()) {
            unset($address_fields['billing']['billing_email']);
        }
        return $address_fields;
    }

    public function custom_override_checkout_fields_xd($fields)
    {
        unset($fields['billing']['billing_company']);
        unset($fields['billing']['billing_cid']);

        return $fields;
    }
}
