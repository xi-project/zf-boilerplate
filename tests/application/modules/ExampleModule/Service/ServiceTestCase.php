<?php
namespace ExampleModule\Service;

/**
 * Convenience base class for ExampleModule service tests.
 */
abstract class ServiceTestCase extends \TestCase
{
    /**
     * A Sham stub of a service locator.
     * 
     * `getEntityManager()` is stubbed to return `$this->em`.
     * 
     * @var ExampleServiceLocator
     */
    protected $serviceLocator;
    
    public function setUp()
    {
        parent::setUp();
        $this->serviceLocator = \Sham::create(\ExampleModule\Service\ExampleService::LOCATOR);
        $this->serviceLocator->getEntityManager->returns($this->em);
    }
}