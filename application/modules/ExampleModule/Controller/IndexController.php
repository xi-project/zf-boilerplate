<?php
namespace ExampleModule\Controller;

use Xi\Zend\Mvc\ActionController\StatefulActionController;

class IndexController extends StatefulActionController
{
    public function indexActionGet()
    {
        $exampleService = new \ExampleModule\Service\ExampleService($this->getServiceLocator());
        $this->view->greeting = $exampleService->getGreeting();
        $this->view->userCount = $exampleService->getUserCount();
    }
}