<?php
namespace ExampleModule\View;

class HelloWorldHelper extends \Zend_View_Helper_Abstract
{
    public function helloWorld()
    {
        return 'Hello World!';
    }
}