<?php


namespace App;

/**
 * This is Custom Service Container
 *
 * Class Container
 */
class Container {

    /**
     * @var array
     */
    protected $bindings = [];

    /**
     * @param $key
     * @param $value
     */
    public function bind($key, $value)
    {
        //  $value is a function
        //  Example: app()->bind('example', function() {
        //  return new Example()
        //  });
        $this->bindings[$key] = $value;
    }

    /**
     * @param $key
     * @return false|mixed
     */
    public function resolve($key)
    {
        if(isset($this->bindings[$key]))
        {
            // TODO This function invokes any function passed, as a second arguments accepts arguments of the function
            return call_user_func($this->bindings[$key]);
        }
    }
}
