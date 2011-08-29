<?php
namespace ExampleModule\Service;

class ExampleService
{
    protected $greeting = 'Hello';
    
    public function setGreeting($greeting)
    {
        $this->greeting = $greeting;
    }
    
    public function getGreeting()
    {
        return $this->greeting . '!';
    }
}