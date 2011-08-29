<?php

class AcceptanceTestCase extends TestCase
{
    protected $srcFile;
    protected $destFile;
    protected $layoutFile;
    
    public function __construct($srcFile, $destFile, $layoutFile) {
        $this->srcFile = $srcFile;
        $this->destFile = $destFile;
        $this->layoutFile = $layoutFile;
        parent::__construct(basename($srcFile, '.php'));
    }
    
    public function count() {
        return 1;
    }
    
    public function run(PHPUnit_Framework_TestResult $result = null) {
        if ($result === null) {
            $result = new PHPUnit_Framework_TestResult;
        }
 
        $result->startTest($this);
        PHP_Timer::start();

        try {
            $output = $this->runFileGetOutput($this->srcFile);
            $output = $this->wrapInLayout($output);
            file_put_contents($this->destFile, $output);
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $result->addFailure($this, $e, PHP_Timer::stop());
        } catch (Exception $e) {
            $result->addError($this, $e, PHP_Timer::stop());
        }

        $result->endTest($this, PHP_Timer::stop());
 
        return $result;
    }
    
    protected function runFileGetOutput($file, $vars = array())
    {
        extract($vars);
        ob_start();
        try {
            require $file;
        } catch (Exception $e) {
            ob_clean();
            throw $e;
        }
        return ob_get_clean();
    }
    
    protected function wrapInLayout($content)
    {
        return $this->runFileGetOutput($this->layoutFile, array(
            'content' => $content,
            'testCaseName' => $this->getName()
        ));
    }
    
}
