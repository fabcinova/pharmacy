<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Load Nette Framework or autoloader generated by Composer
require __DIR__ . '/../libs/autoload.php';
require __DIR__. '/../libs/dibi/dibi.php';

dibi::connect(array(
    'driver'   => 'mysql',
    'host'     => 'localhost',
    'username' => 'xfabci00',
    'password' => 'befoco4m',
    'database' => 'xfabci00',
    'charset'  => 'utf8',
));

$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');

// Specify folder for cache
$configurator->setTempDirectory(__DIR__ . '/../temp');

// Enable RobotLoader - this will load all classes automatically
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory(__DIR__ . '/../libs')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon', $configurator::NONE); // none section


$container = $configurator->createContainer();

// výchozí akcí bude presenter Homepage a pohled default
$container->router = new Nette\Application\Routers\SimpleRouter('Homepage:default');

return $container;
