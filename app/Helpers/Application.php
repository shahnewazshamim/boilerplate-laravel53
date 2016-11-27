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
        $option = Option::where('key', $key)->first();

        return ($option != NULL) ? $option->value : '';
    }
}

if (!function_exists('update_option')) {
    /**
     * Update the value of an option.
     *
     * @param $key
     *
     * @return mixed
     */
    function update_option($key, $value)
    {
        $option = Option::where('key', $key)->first();

        if ($option != NULL) {
            $option->value = $value;

            return $option->save();
        } else {
            $option = new Option();

            $option->key   = $key;
            $option->value = $value;

            return $option->save();
        }
    }
}

if (!function_exists('set_flash_message')) {
    /**
     * Return flash message array.
     *
     * @param $message
     * @param $status
     *
     * @return mixed
     */
    function set_flash_message($message, $status)
    {
        $flash['alert']   = 'alert-' . $status;
        $flash['status']  = $status;
        $flash['message'] = $message;

        return $flash;
    }
}

if (!function_exists('session_set_flash')) {
    /**
     * Set flash message array into session flash method.
     *
     * @param $flash
     */
    function session_set_flash($flash)
    {
        foreach ($flash as $key => $value) {
            session()->flash($key, $value);
        }
    }
}

if (!function_exists('checked')) {
    /**
     * Return checked status for selected items.
     *
     * @param $current
     * @param $checked
     *
     * @return string
     */
    function checked($current, $checked)
    {
        $status = '';
        if ($current == $checked) {
            $status = 'checked';
        }

        return $status;
    }
}

if (!function_exists('selected')) {
    /**
     * Return selected status for selected items.
     *
     * @param $current
     * @param $selected
     *
     * @return string
     */
    function selected($current, $selected)
    {
        $status = '';
        if ($current == $selected) {
            $status = 'selected';
        }

        return $status;
    }
}