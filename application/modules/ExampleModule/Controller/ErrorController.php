<?php
namespace ExampleModule\Controller;

class ErrorController extends \Zend_Controller_Action
{
    public function errorAction()
    {
        if ($this->getFrontController()->getParam('displayExceptions')) {
            $this->view->exception = $this->_getParam('error_handler')->exception;
        }
    }
}