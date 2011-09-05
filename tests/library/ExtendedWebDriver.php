<?php
class ExtendedWebDriver extends WebDriver
{
    protected static $openInstances = array();
    
    public function __construct($host, $port)
    {
        parent::__construct($host, $port);
        self::$openInstances[] = $this;
    }
    
    public function close()
    {
        parent::close();
        foreach (self::$openInstances as $k => $v) {
            if ($this === $v) {
                unset(self::$openInstances[$k]);
                break;
            }
        }
    }
    
    public static function getOpenInstances()
    {
        return self::$openInstances;
    }
    
    
    /**
     * @return ExtendedWebDriver
     */
    public static function typehint(ExtendedWebDriver $webdriver)
    {
        return $webdriver;
    }
}

register_shutdown_function(function() {
    foreach (ExtendedWebDriver::getOpenInstances() as $inst) {
        try {
            $inst->close();
        } catch (Exception $e) {
            echo "Warning: Failed to shut down WebDriver connection.\n";
            echo "You may be left with an open browser window.\n";
        }
    }
});
