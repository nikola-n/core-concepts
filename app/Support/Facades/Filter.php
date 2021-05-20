<?php


namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * /**
 * @method static get($key, $value)
 *
 * @see \App\Utilities\Filter
 *
 * Custom Facade
 *
 * Class Filter
 */
class Filter extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'filter';
    }
}
