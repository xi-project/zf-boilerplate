<?php
namespace ExampleModule\Controller;

use Xi\Zend\Mvc\ActionController;

class IndexController extends ActionController
{
    protected $serviceLocatorClass = 'ExampleModule\Service\ExampleServiceLocator';
    protected $serviceClass = 'ExampleModule\Service\ExampleService';
    
    public function indexActionGet(\ExampleModule\Service\ExampleService $exampleService)
    {
        $this->view->greeting = $exampleService->getGreeting();
        $this->view->userCount = $exampleService->getUserCount();
    }
}