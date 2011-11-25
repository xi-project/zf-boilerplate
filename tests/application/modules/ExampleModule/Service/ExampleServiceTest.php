<?php

namespace ExampleModule\Service;

use ExampleModule\Entity\UserAccount;

class ExampleServiceTest extends ServiceTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->service = new ExampleService($this->serviceLocator);
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
    
    /**
     * @test
     */
    public function canGreetUsers()
    {
        $user = new UserAccount('john');
        $this->assertTrue(false !== strpos($this->service->getGreetingForUser($user), 'john'));
    }
    
    /**
     * @test
     */
    public function canGreetUsersById()
    {
        // Testing that Doctrine works
        $user = new UserAccount('john');
        $this->em->persist($user);
        $this->em->flush();
        $this->assertTrue(false !== strpos($this->service->getGreetingForUserById($user->getId()), 'john'));
    }
    
    /**
     * @test
     */
    public function canCountUsersInDatabase()
    {
        $this->em->persist(new UserAccount('john'));
        $this->em->persist(new UserAccount('jill'));
        $this->em->persist(new UserAccount('jack'));
        $this->em->flush();
        $this->assertEquals(3, $this->service->getUserCount());
    }
}
