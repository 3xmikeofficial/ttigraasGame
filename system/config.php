<?php 

    // session start
    session_start();

    // Database settings
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ttigraas";

    // Password hash
    $hash = "ttigraasultimatehashbycielsenpai";

    // Defines

    define('ROOT', dirname(dirname(__FILE__)));
    define('URL', "http://".$_SERVER["SERVER_NAME"]."/");
    define('ACTUAL_URL', "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
    define('GAME_URL', "http://".$_SERVER["SERVER_NAME"]."/game/game.php");
    define('SYSTEM', ROOT.DIRECTORY_SEPARATOR."system");
    define('CLASSES', SYSTEM.DIRECTORY_SEPARATOR."classes");
    define('LOCALE', SYSTEM.DIRECTORY_SEPARATOR."locale");
    define('GAME', ROOT.DIRECTORY_SEPARATOR."game");
    define('PAGES', GAME.DIRECTORY_SEPARATOR."pages");

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 'On');
    ini_set('log_errors', 'On');
    ini_set('error_log', SYSTEM.'/errors.log');

    spl_autoload_register(
        function ($class)
        {
            $path = CLASSES."/".$class.".class.php";
            if(file_exists($path) AND filesize($path) > 0)
            {
                require_once($path);
            } else {
                trigger_error("Class was not found : ".$path, E_USER_ERROR);
            }
        }
    );

    try {
        Database::connect($host, $username, $password, $dbname);
    } catch(PDOException $e)
    {
        Core::redirect("offline.php");
        die();
    }

?>