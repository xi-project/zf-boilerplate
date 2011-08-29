<?php

class AcceptanceTestSuite
{
    protected static $srcDir;
    protected static $destDir;
    
    public static function suite()
    {
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
}