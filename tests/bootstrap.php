<?php
error_reporting(E_ALL | E_STRICT);

define('APPLICATION_PATH', realpath(__DIR__ . '/../application'));
define('DATA_PATH', realpath(__DIR__ . '/../data'));
define('APPLICATION_ENV', 'testing');
define('APPLICATION_CONFIG_CACHE', 'none');

set_include_path(
    dirname(__DIR__) . '/library' . PATH_SEPARATOR .
    __DIR__ . '/library' . PATH_SEPARATOR .
    get_include_path()
);

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

$application->getAutoloader()->pushAutoloader(array(new \Doctrine\Common\ClassLoader(null, __DIR__ . '/library'), 'loadClass'));
