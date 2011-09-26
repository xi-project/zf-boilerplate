<?php
namespace ExampleModule\Controller;

use Application\Mvc\ActionController;

class ErrorController extends ActionController
{
    public function errorAction()
    {
        if ($this->getFrontController()->getParam('displayExceptions')) {
            $this->view->exception = $this->_getParam('error_handler')->exception;
        }
    }
}