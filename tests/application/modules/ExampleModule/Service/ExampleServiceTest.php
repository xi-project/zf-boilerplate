<?php
namespace ExampleModule\Service;

class ExampleServiceTest extends \TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->service = new ExampleService();
    }
    
    /**
     * @test
     */
    public function theDefaultGreetingEndsInAnExclamationMark()
    {
        $msg = $this->service->getGreeting();
        $this->assertEquals('!', $msg[strlen($msg) - 1]);
    }
    
    /**
     * @test
     */
    public function anAlteredGreetingGetsAnExclamationMark()
    {
        $this->service->setGreeting('Hi');
        $msg = $this->service->getGreeting();
        $this->assertEquals('!', $msg[strlen($msg) - 1]);
    }
}