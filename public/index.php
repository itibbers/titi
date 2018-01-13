<?php

/**
 * titi - a simple security PHP framework.
 *
 * @package titi
 * @author itibbers <jxn2014@gmail.com>
 * @link https://github.com/itibbers/titi/
 * @license http://opensource.org/licenses/MIT MIT License
 */


// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/app".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

// Debug
define('DEBUG', true);

// This is the auto-loader for Composer-dependencies (to load tools into your project).
require ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require APP . 'config/config.php';

// load application class
use titi\core\Application;

// start the application
$app = new Application();
