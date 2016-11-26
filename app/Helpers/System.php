<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('get_database_server')) {
    /**
     * Get Database server information.
     *
     * @return object
     */
    function get_database_server()
    {
        $database_server = array();

        $variables_array = DB::select('SHOW VARIABLES LIKE "%version%";');

        foreach ($variables_array as $key => $value) {
            $database_server[$value->Variable_name] = $value->Value;
        }

        return (object)$database_server;
    }
}

if (!function_exists('get_server_info')) {
    /**
     * Get Server information.
     *
     * @return array
     */
    function get_server_info()
    {
        $server_software = $_SERVER['SERVER_SOFTWARE'];

        $server = explode(' ', $server_software);

        return $server;
    }
}

if (!function_exists('get_os_info')) {
    /**
     * Get Operating System information
     *
     * @return string
     */
    function get_os_info()
    {
        $os_list = array(
            '/win16/i'              => 'Windows 3.11',
            '/win95/i'              => 'Windows 95',
            '/win98/i'              => 'Windows 98',
            '/windows me/i'         => 'Windows ME',
            '/windows xp/i'         => 'Windows XP',
            '/windows nt 5.0/i'     => 'Windows 2000',
            '/windows nt 5.1/i'     => 'Windows XP',
            '/windows nt 5.2/i'     => 'Windows Server 2003/XP x64',
            '/windows nt 6.0/i'     => 'Windows Vista',
            '/windows nt 6.1/i'     => 'Windows 7',
            '/windows nt 6.2/i'     => 'Windows 8',
            '/windows nt 6.3/i'     => 'Windows 8.1',
            '/windows nt 10/i'      => 'Windows 10',
            '/linux/i'              => 'Linux',
            '/ubuntu/i'             => 'Ubuntu',
            '/mac_powerpc/i'        => 'Mac OS 9',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/ipod/i'               => 'iPod',
            '/ipad/i'               => 'iPad',
            '/iphone/i'             => 'iPhone',
            '/android/i'            => 'Android',
            '/webos/i'              => 'Mobile',
            '/blackberry/i'         => 'BlackBerry',
        );

        $user_agent  = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown OS Platform";

        foreach ($os_list as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }

        return $os_platform;
    }
}

if (!function_exists('get_browser_info')) {
    /**
     * Get Browser information
     *
     * @return string
     */
    function get_browser_info()
    {
        $browser_array = array(
            '/opera/i'     => 'Opera',
            '/safari/i'    => 'Safari',
            '/maxthon/i'   => 'Maxthon',
            '/firefox/i'   => 'Firefox',
            '/netscape/i'  => 'Netscape',
            '/konqueror/i' => 'Konqueror',
            '/chrome/i'    => 'Google Chrome',
            '/edge/i'      => 'Microsoft Edge',
            '/mobile/i'    => 'Handheld Browser',
            '/msie/i'      => 'Internet Explorer',
        );

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser    = "Unknown Browser";


        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }

        return $browser;
    }
}

if (!function_exists('get_disk_size_unit')) {
    /**
     * Get disk space size unit.
     *
     * @param $bytes
     *
     * @return string
     */
    function get_disk_size_unit($bytes)
    {
        $symbols = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $exp     = floor(log($bytes) / log(1024));

        return sprintf('%.2f ' . $symbols[$exp], ($bytes / pow(1024, floor($exp))));
    }
}

