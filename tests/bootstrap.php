<?php

define('APPLICATION_ENV', 'testing');
require dirname(__DIR__) . '/scripts/bootstrap.php';

// Autoloader for tests/library
$application->getAutoloader()->pushAutoloader(array(new \Xi\Zend\Application\ClassLoader(null, __DIR__ . '/library'), 'loadClass'));

// Namespace autoloaders for tests/application/modules/*
foreach (glob(__DIR__ . '/application/modules/*', GLOB_ONLYDIR) as $dir) {
    $application->getAutoloader()->pushAutoloader(array(new \Xi\Zend\Application\ClassLoader(basename($dir), dirname($dir)), 'loadClass'));
}
unset($dir);


\Zend_Registry::set('testApplication', $application);
