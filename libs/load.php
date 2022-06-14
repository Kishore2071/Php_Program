<?php
 include_once 'includes/Session.class.php';
 include_once 'includes/User.class.php';
 include_once 'includes/Database.class.php';
 include_once 'includes/UserSession.class.php';

    function load_template($template) {
        $templatePath = __DIR__."/../_templates/$template.php";
        if (file_exists($templatePath)) {
            include "$templatePath";
        } else {
            die("Template not found: $templatePath");
        }
    };

    function get_config($key){
        $configPath = __DIR__."/../photogramconfig.json";
        $json = file_get_contents($configPath);
        if (file_exists($configPath)){
            $array = json_decode($json, true);
            if (isset($array[$key])) {
                return $array[$key];
            } else {
                return false;
            }
        }else{
            die("File Not Found: $configPath");
        }
        


    }
    
    function validate_credentials($username, $password){
    if ($username == "sibi@selfmade.ninja" and $password == "password") {
        return true;
    } else {
        return false;
    }
    }
   

    
?>