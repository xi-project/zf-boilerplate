<?php

class TestDb
{
    private static $instance;
    
    /**
     * @return TestDb
     */
    public static function get()
    {
        if (!self::$instance) {
            self::$instance = new TestDb();
        }
        return self::$instance;
    }
    
    private function __construct()
    {
        $this->loadSchema();
    }
    
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function recreateEntityManager()
    {
        return $this->getBootstrap()->getResource('doctrine')->recreateEntityManager();
    }
    
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getBootstrap()->getResource('doctrine')->getEntityManager();
    }
    
    public function clearAllTables()
    {
        $conn = $this->getEntityManager()->getConnection();
        foreach ($this->getEntityManager()->getMetadataFactory()->getAllMetadata() as $metadata) {
            $conn->exec("DELETE FROM " . $metadata->getQuotedTableName($metadata->getTableName()));
        }
    }
    
    protected function loadSchema()
    {
        $em = $this->getEntityManager();
        $schemaTool = new Doctrine\ORM\Tools\SchemaTool($em);
        
        $schemaTool->dropDatabase();
        $schemaTool->createSchema($em->getMetadataFactory()->getAllMetadata());
    }
    
    protected function getBootstrap()
    {
        return \Zend_Registry::get('testApplication')->getBootstrap();
    }
}
