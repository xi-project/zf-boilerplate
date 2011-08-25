<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH',
              realpath(__DIR__ . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', getenv('APPLICATION_ENV') ?: 'production');

// Define application config cache (possible values: 'array', 'apc', 'none')
defined('APPLICATION_CONFIG_CACHE')
    || define('APPLICATION_CONFIG_CACHE', getenv('APPLICATION_CONFIG_CACHE') ?: 'none');

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(__DIR__ . '/../library'),
)));

require_once 'Xi/Zend/Application/Application.php';

try {
    $application = new Xi\Zend\Application\Application(
        APPLICATION_ENV,
        APPLICATION_PATH . '/configs/application.ini',
        array(
            'type' => APPLICATION_CONFIG_CACHE,
            'key'  => __FILE__ . '/' . APPLICATION_ENV . '/config'
        )
    );
    $application->bootstrap()
                ->run();
} catch (Zend_Config_Exception $e) {
    echo "<h1>An error occurred</h1>";

    if (APPLICATION_ENV != 'production') {
        echo '<p>You are most likely missing application.ini. ' .
             'Make it from application.example.ini</p>' .
             '<p>(There might also be a parse error.)</p>';
        echo '<pre>' . $e . '</pre>';
    }
} catch (Exception $e) {
    echo "<h1>An error occurred</h1>";

    if (APPLICATION_ENV != 'production') {
        echo '<pre>' . $e . '</pre>';
    }
}
