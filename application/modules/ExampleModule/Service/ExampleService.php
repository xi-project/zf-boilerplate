<?php
namespace ExampleModule\Service;

class ExampleService extends AbstractService
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
    
    public function getGreetingForUser(\UserAccount $user)
    {
        return $this->greeting . ' ' . $user->getUsername() . '!';
    }
    
    public function getGreetingForUserById($userId)
    {
        $user = $this->em->getRepository('UserAccount')->find($userId);
        return $this->getGreetingForUser($user);
    }
}