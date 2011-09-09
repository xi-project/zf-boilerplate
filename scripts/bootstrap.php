<?php
// Bootstrap script for scripts and tests

error_reporting(E_ALL | E_STRICT);

define('APPLICATION_PATH', realpath(__DIR__ . '/../application'));
define('DATA_PATH', realpath(__DIR__ . '/../data'));
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', getenv('APPLICATION_ENV') ?: 'development');
define('APPLICATION_CONFIG_CACHE', 'none');

set_include_path(
    dirname(__DIR__) . '/library' . PATH_SEPARATOR .
    __DIR__ . '/library' . PATH_SEPARATOR .
    get_include_path()
);

set_error_handler(function($type, $message, $file, $line) {
    if ($type & error_reporting()) {
        throw new RuntimeException($message, $type);
    }
});

require_once 'Xi/Zend/Application/Application.php';

$application = new Xi\Zend\Application\Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini',
    array(
        'type' => APPLICATION_CONFIG_CACHE,
        'key'  => __FILE__ . '/' . APPLICATION_ENV . '/config'
    )
);
$application->bootstrap();

$application->getAutoloader()->pushAutoloader(array(new \Xi\Zend\Application\ClassLoader(null, dirname(__DIR__) . '/library'), 'loadClass'));
$application->getAutoloader()->pushAutoloader(array(new \Xi\Zend\Application\ClassLoader(null, APPLICATION_PATH . '/library'), 'loadClass'));
