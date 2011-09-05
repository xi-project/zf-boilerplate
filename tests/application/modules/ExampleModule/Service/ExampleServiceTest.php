<?php
namespace ExampleModule\Service;

class ExampleServiceTest extends \TestCase
{
    public function setUp()
    {
        parent::setUp();
        $sl = \Sham::create('\ExampleModule\Service\ExampleServiceLocator');
        $sl->getEntityManager->returns($this->em);
        $this->service = new ExampleService($sl);
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
        $user = new \UserAccount('john');
        $this->assertEquals("Hello john!", $this->service->getGreetingForUser($user));
    }
    
    /**
     * @test
     */
    public function canGreetUsersById()
    {
        // Testing that Doctrine works
        $user = new \UserAccount('john');
        $this->em->persist($user);
        $this->em->flush();
        $this->assertEquals("Hello john!", $this->service->getGreetingForUserById($user->getId()));
    }
    
    /**
     * @test
     */
    public function canCountUsersInDatabase()
    {
        $this->em->persist(new \UserAccount('john'));
        $this->em->persist(new \UserAccount('jill'));
        $this->em->persist(new \UserAccount('jack'));
        $this->em->flush();
        $this->assertEquals(3, $this->service->getUserCount());
    }
}
