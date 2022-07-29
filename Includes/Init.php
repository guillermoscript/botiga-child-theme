<?php

namespace Includes;

use Admin\Controller\BillingController;
use Front\Enqueue as FrontEnqueue;

final class Init
{
    
    public static function get_services()
    {
        return [
            FrontEnqueue::class,
            BillingController::class,
        ];
    }


    /**
     * inicializa la clase y retorna una nueva instancia de ela clase
     */

    private static function instantiate( $class ) 
    {   
        $service = new $class();
        return $service;
    }

    public static function register_services() 
    {
        foreach (self::get_services() as $class ) {
            $services = self::instantiate( $class );
            if ( method_exists( $services, 'register' ) ) {
                $services->register();
            }
        }
    }
}
