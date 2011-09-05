<?php

/**
 * Base test case for all tests.
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestDb
     */
    protected $testDb;
    
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->testDb = TestDb::get();
        $this->testDb->clearAllTables();
        $this->em = $this->testDb->recreateEntityManager();
    }
}
