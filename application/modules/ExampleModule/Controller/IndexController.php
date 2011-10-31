<?php
namespace ExampleModule\Controller;

use Application\Mvc\ActionController;

// Extending an application-specific ActionController class means our module
// will not be self-contained.
class IndexController extends ActionController
{
    // Service autodiscovery would inject this class with 
    // 'ExampleModule\Service\IndexService', but we want to declare our own.
    // Just for sake of example - this is optional.
    protected $serviceClass = 'ExampleModule\Service\ExampleService';
    
    // Now that our service is properly declared and functional, we will recieve
    // an instance of it as an argument to any actions called during dispatch.
    public function indexActionGet(\ExampleModule\Service\ExampleService $exampleService)
    {
        // This action is very simple, with exactly one possible outcome and
        // only two view variables. For more complex actions, you should use
        // a Presenter, but setting things to the view directly is alright if
        // you can't stand the overhead.
        $this->view->greeting = $exampleService->getGreeting();
        $this->view->userCount = $exampleService->getUserCount();
    }
}