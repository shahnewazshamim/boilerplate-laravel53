<?php

use App\Model\Option;

if (!function_exists('get_option')) {
    /**
     * Get the value of an option.
     *
     * @param $key
     *
     * @return mixed
     */
    function get_option($key)
    {
        $option = Option::where('key', $key)->firstOrFail();

        return $option;
    }
}