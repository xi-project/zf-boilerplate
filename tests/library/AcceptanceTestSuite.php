<?php

use \Xi\Test\Selenium\SeleniumServer,
    \Xi\Test\Selenium\WebDriver,
    \Xi\Test\Selenium\PHPUnit\WebDriverInjectingTestDecorator;

class AcceptanceTestSuite
{
    protected static $srcDir;
    protected static $destDir;

    // Selenium server address
    const SELENIUM_SERVER_ADDRESS = 'http://localhost:4444/wd/hub';

    // In relation to this directory
    const SOURCE_DIRECTORY = '/../acceptance/';

    // In relation to the application path
    const DESTINATION_DIRECTORY = '/../docs/features';

    // In relation to the source directory
    const LAYOUT_FILE = '/layout.phtml';

    public static function getSourceDirectory()
    {
        if (null === static::$srcDir) {
            static::$srcDir = __DIR__ . self::SOURCE_DIRECTORY;
        }
        return static::$srcDir;
    }

    public static function getDestinationDirectory()
    {
        if (null === static::$destDir) {
            static::$destDir = APPLICATION_PATH . self::DESTINATION_DIRECTORY;
        }
        return static::$destDir;
    }
    
    /**
     * @var ExtendedWebDriver
     */
    protected static $webdriver;
    
    public static function suite()
    {
        $source = static::getSourceDirectory();
        $destination = static::getDestinationDirectory();
        
        static::nukeDestDir($destination);
        static::initDestDir($destination, $source);
        
        $layoutFile = $source . self::LAYOUT_FILE;
        
        $suite = new \PHPUnit_Framework_TestSuite();
        $testFiles = glob($source . '/*.phtml');
        foreach ($testFiles as $file) {
            if (basename($file) !== basename(self::LAYOUT_FILE)) {
                $destFile = $destination . '/' . basename($file, '.phtml') . '.html';
                $case = new AcceptanceTestCase($file, $destFile, $layoutFile);
                $suite->addTest($case);
            }
        }
        
        $server = static::createSeleniumServer();
        return new WebDriverInjectingTestDecorator($suite, $server);
    }
    
    /**
     * @return ExtendedWebDriver
     */
    protected static function createSeleniumServer()
    {
        return new SeleniumServer(self::SELENIUM_SERVER_ADDRESS);
    }
    
    protected static function nukeDestDir()
    {
        system("rm -Rf " . escapeshellarg(static::$destDir));
    }
    
    protected static function initDestDir()
    {
        @mkdir(static::$destDir, 0777, true);
        static::copyOver('css');
    }
    
    protected static function copyOver($what)
    {
        system("cp -R " . escapeshellarg(static::$srcDir . '/' . $what) . ' ' . escapeshellarg(static::$destDir . '/' . $what));
    }
}