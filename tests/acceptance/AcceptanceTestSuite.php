<?php

use \Xi\Test\Selenium\SeleniumServer,
    \Xi\Test\Selenium\WebDriver,
    \Xi\Test\Selenium\PHPUnit\WebDriverInjectingTestDecorator;

class AcceptanceTestSuite
{
    protected static $srcDir;
    protected static $destDir;
    
    /**
     * @var ExtendedWebDriver
     */
    protected static $webdriver;
    
    public static function suite()
    {
        static::$srcDir = __DIR__ . '/features';
        static::$destDir = APPLICATION_PATH . '/../doc/features';
        static::nukeDestDir(static::$destDir);
        static::initDestDir(static::$destDir, static::$srcDir);
        
        $layoutFile = static::$srcDir . '/layout.phtml';
        
        $suite = new \PHPUnit_Framework_TestSuite();
        $testFiles = glob(static::$srcDir . '/*.phtml');
        foreach ($testFiles as $file) {
            if (basename($file) !== 'layout.phtml') {
                $destFile = static::$destDir . '/' . basename($file, '.phtml') . '.html';
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
        return new SeleniumServer('http://localhost:4444/wd/hub');
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