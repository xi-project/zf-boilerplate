<?php
namespace Application\Mvc\DependencyInjection;

class BaseZendViewPresenterLocator extends \Xi\Zend\Mvc\DependencyInjection\ZendViewPresenterLocator
{
    public function init($c)
    {
        parent::init($c);
        
        $c['response'] = $c->share(function($c) {
            return $c['actionController']->getResponse();
        });
        $c['request'] = $c->share(function($c) {
            return $c['actionController']->getRequest();
        });
        $c['layout'] = $c->share(function($c) {
            return Zend_Layout::getMvcInstance();
        });
    }
    
    /**
     * @return \Zend_Controller_Response_Abstract
     */
    public function getResponse()
    {
        return $this->container['response'];
    }
    
    /**
     * @return \Zend_Controller_Request_Abstract
     */
    public function getRequest()
    {
        return $this->container['request'];
    }
    
    /**
     * @return \Zend_Layout
     */
    public function getLayout()
    {
        return $this->container['layout'];
    }
}