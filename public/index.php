<?php
// Maximum level error reporting by default
error_reporting(E_ALL | E_STRICT);

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

// Convert errors to RuntimeExceptions
set_error_handler(function($type, $message, $file, $line) {
    if ($type & error_reporting()) {
        throw new RuntimeException($message, $type);
    }
});

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
             'Copy it over from application.example.ini to get started.</p>' .
             '<p>(There might also be a parse error.)</p>';
        echo '<pre>' . $e . '</pre>';
    }
} catch (Exception $e) {
    echo "<h1>An error occurred</h1>";

    if (APPLICATION_ENV != 'production') {
        echo '<pre>' . $e . '</pre>';
    }
}
