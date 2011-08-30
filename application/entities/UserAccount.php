<?php

/**
 * @Entity
 */
class UserAccount
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    protected $id;
    
    /** @Column */
    protected $username;
    
    public function __construct($username)
    {
        $this->username = $username;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
