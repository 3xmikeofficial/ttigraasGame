<?php 

    // session start
    session_start();

    // Database settings
    include_once("db_config.php");

    // Password hash
    $hash = "ttigraasultimatehashbycielsenpai";

    // Defines

    define('ROOT', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."game");
    define('URL', "http://game.ageoflegends.cz");
    define('ACTUAL_URL', URL.$_SERVER["REQUEST_URI"]);
    define('GAME_URL', URL."/game/game.php");
    define('SYSTEM', ROOT.DIRECTORY_SEPARATOR."system");
    define('CLASSES', SYSTEM.DIRECTORY_SEPARATOR."classes");
    define('LOCALE', SYSTEM.DIRECTORY_SEPARATOR."locale");
    define('GAME', ROOT.DIRECTORY_SEPARATOR."game");
    define('PAGES', GAME.DIRECTORY_SEPARATOR."pages");
    define('ADMIN', PAGES.DIRECTORY_SEPARATOR."admin");
    define('IMAGES', URL."game/images");
    define('IMAGESDIR', "../game/images");

    define("MAX_PLAYER_LEVEL", 255);
    define("MAX_BUILDING_LEVEL", 30);
    define("STACK_LIMIT", 255);
    define("MAX_RARITY", 8);

    define("LOOT_CHANCE_MULTIPLIER", 100);

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 'On');
    ini_set('log_errors', 'On');

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