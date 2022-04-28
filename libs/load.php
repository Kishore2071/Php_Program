<?php
include_once 'includes/Session.class.php';
include_once 'includes/Mic.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/UserSession.class.php';

global $__site_config;
// global $__base_path;
//Note: Change this path if you run this code outside lab.
/*
Note: Location of configuration
in lab : /home/user/phtogramconfig.json
in server: /var/www/photogramconfig.json
*/
$__site_config_path = dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? readlink($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT']).'/photogramconfig.json';
$__site_config = file_get_contents($__site_config_path);
// $__base_path = get_config('base_path');
Session::start();

function get_config($key, $default=null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT'] . get_config('base_path'). "_templates/$name.php"; //not consistant.
}

function validate_credentials($username, $password)
{
    if ($username == "sibi@selfmade.ninja" and $password == "password") {
        return true;
    } else {
        return false;
    }
}
