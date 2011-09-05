<?php

class AcceptanceTestSuite
{
    protected static $srcDir;
    protected static $destDir;
    
    public static function suite()
    {
        static::verifySeleniumServerJar();
        
        static::$srcDir = __DIR__ . '/features';
        static::$destDir = APPLICATION_PATH . '/../doc/features';
        static::nukeDestDir(static::$destDir);
        static::initDestDir(static::$destDir, static::$srcDir);
        
        $layoutFile = static::$srcDir . '/layout.phtml';
        
        $suite = new \PHPUnit_Framework_TestSuite();
        foreach (glob(static::$srcDir . '/*.php') as $file) {
            $destFile = static::$destDir . '/' . basename($file, '.php') . '.html';
            $suite->addTest(new AcceptanceTestCase($file, $destFile, $layoutFile));
        }
        return $suite;
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
    
    protected static function verifySeleniumServerJar()
    {
        $version = "2.5.0";
        $filename = "selenium-server-standalone-$version.jar";
        $expectedPath = APPLICATION_PATH . "/../external/$filename";
        $downloadUrl = "http://selenium.googlecode.com/files/$filename";
        
        if (!file_exists($expectedPath)) {
            echo "Selenium server JAR not present. Trying to download it.\n";
            echo "From: $downloadUrl\n";
            echo "To:   $expectedPath\n";
            $command =
                    "curl -# -o " .
                    escapeshellarg($expectedPath) . ' ' .
                    escapeshellarg($downloadUrl);
            echo "$command\n";
            system($command);
        }
    }
}