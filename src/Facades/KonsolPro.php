<?php

namespace Timurrodya\KonsolPro\Facades;

use Illuminate\Support\Facades\Facade;
use Timurrodya\KonsolPro\KonsolPro as BaseKonsolPro;

/**
 * Class KonsolPro
 *
 * @package Timurrodya\KonsolPro\Facades
 * @method bool health()
 *
 * @see BaseKonsolPro
 */
class KonsolPro extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'konsolpro';
    }
}
