<?php namespace Bantenprov\RKSekolahSDMI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The RKSekolahSDMI facade.
 *
 * @package Bantenprov\RKSekolahSDMI
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RKSekolahSDMI extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rk-sekolah-sd-mi';
    }
}
