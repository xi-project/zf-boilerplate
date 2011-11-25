<?php
namespace ExampleModule\Service;

use ExampleModule\DependencyInjection\ExampleServiceLocator,
    ExampleModule\Entity\UserAccount;

class ExampleService extends \Application\Mvc\BaseDoctrineRepositoryService
{
    // Declare that we want to use a service locator other than the default.
    // This will be picked up by the ActionControllerLocator.
    const LOCATOR = 'ExampleModule\DependencyInjection\ExampleServiceLocator';
    
    protected $entityName = 'ExampleModule\Entity\UserAccount';
    protected $greeting;
    
    /**
     * @return ExampleModule\DependencyInjection\ExampleServiceLocator
     */
    protected function getServiceLocator()
    {
        return parent::getServiceLocator();
    }
    
    protected function init()
    {
        $this->setGreeting($this->getServiceLocator()->getDefaultGreeting());
    }
    
    public function setGreeting($greeting)
    {
        $this->greeting = $greeting;
        return $this;
    }
    
    public function getGreeting()
    {
        return $this->greeting . '!';
    }
    
    public function getGreetingForUser(UserAccount $user)
    {
        return $this->greeting . ' ' . $user->getUsername() . '!';
    }
    
    public function getGreetingForUserById($userId)
    {
        $user = $this->getEntityRepository()->find($userId);
        return $this->getGreetingForUser($user);
    }
    
    public function getUserCount()
    {
        return count($this->getEntityRepository()->findAll());
    }
}