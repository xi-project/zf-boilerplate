<?php

define('APPLICATION_ENV', 'testing');
require dirname(__DIR__) . '/scripts/bootstrap.php';

$application->getAutoloader()->pushAutoloader(array(new \Xi\Zend\Application\ClassLoader(null, __DIR__ . '/library'), 'loadClass'));

\Zend_Registry::set('testApplication', $application);
