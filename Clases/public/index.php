<?php

require_once ('autoload.php');

define('APPLICATION_ENV', getenv('APPLICATION_ENV'));
if (!defined('APPLICATION_ENV'))
	define ('APPLICATION_ENV', 'production');


define ('NO_ACTION', 'no_action');
define ('NO_CONTROLLER', 'no_controller');


$config="../application/configs/config.ini";		

$application = new Application ($config, APPLICATION_ENV);
$application->Bootstrap()
			->frontController();

