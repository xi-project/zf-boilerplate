<?php
namespace Application\Mvc;

// Contains default implementations of some convenience methods such as action
// helper getters. If you don't want them, you can always delete them.
class ActionController extends \Xi\Zend\Mvc\ActionController
{
    protected $serviceLocatorClass = 'Application\Mvc\DependencyInjection\BaseActionControllerLocator';
    
    /**
     * @return Zend_Controller_Action_Helper_Redirector
     */
    public function getRedirector()
    {
        return $this->_helper->getHelper('Redirector');
    }
    
    /**
     * @return Zend_Controller_Action_Helper_FlashMessenger
     */
    public function getFlashMessenger()
    {
        return $this->_helper->getHelper('FlashMessenger');
    }
    
    /**
     * @return Zend_Controller_Action_Helper_ContextSwitch
     */
    public function getContextSwitch()
    {
        return $this->_helper->getHelper('ContextSwitch');
    }
}