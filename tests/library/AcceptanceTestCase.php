<?php

class AcceptanceTestCase extends TestCase
{
    ///////////////////////////////////////
    ///// $this-> interface for tests /////
    ///////////////////////////////////////
    
    private $nextScreenshotNum = 1;
    
    /**
     * The baseUrl of the acceptance test installation.
     */
    public function baseUrl()
    {
        return \Zend_Registry::get('testApplication')->getOption('acceptanceTestingBaseUrl');
    }
    
    /**
     * Use this function to take screenshots, automatically save them to the
     * correct place and get an <img> tag as a return value.
     */
    public function screenshot()
    {
        $basePath = APPLICATION_PATH . '/../doc/features/screenshots';
        if (!file_exists($basePath)) {
            mkdir($basePath);
        }
        $filename = $this->getName() . '-' . $this->nextScreenshotNum . '.png';
        $path = $basePath . '/' . $filename;
        $this->nextScreenshotNum += 1;
        $this->webdriver->getScreenshotAndSaveToFile($path);
        return '<img src="screenshots/' . $filename . '" alt="(screenshot)" class="screenshot" />';
    }
    
    public function highlight($jquerySelector)
    {
        $this->webdriver->executeScript("$('$jquerySelector').addClass('acceptance-test-highlighted')", array());
    }
    
    //TODO: list more. Can has traits?
    
    
    ////////////////////
    ///// Plumbing /////
    ////////////////////
    
    
    protected $srcFile;
    protected $destFile;
    protected $layoutFile;
    
    /**
     * @var ExtendedWebDriver
     */
    protected $webdriver;
    
    public function __construct($srcFile, $destFile, $layoutFile, ExtendedWebDriver $webdriver)
                {
        $this->srcFile = $srcFile;
        $this->destFile = $destFile;
        $this->layoutFile = $layoutFile;
        $this->webdriver = $webdriver;
        parent::__construct(basename($srcFile, '.phtml'));
    }
    
    public function count()
    {
        return 1;
    }
    
    public function run(PHPUnit_Framework_TestResult $result = null)
    {
        if ($result === null) {
            $result = new PHPUnit_Framework_TestResult;
        }
        
        $result->startTest($this);
        PHP_Timer::start();
        $this->setUp();

        try {
            $this->webdriver->execute('window.resizeTo(800, 600)', array());
            
            $output = $this->runFileGetOutput($this->srcFile);
            $output = $this->wrapInLayout($output);
            file_put_contents($this->destFile, $output);
            
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $result->addFailure($this, $e, PHP_Timer::stop());
        } catch (Exception $e) {
            $result->addError($this, $e, PHP_Timer::stop());
        }

        $this->tearDown();
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
