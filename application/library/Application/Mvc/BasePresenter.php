<?php
namespace Application\Mvc;

// Contains default implementations of some convenience methods such as request/
// response getters. If you don't want them, you can always delete them.
class BasePresenter extends \Xi\Zend\Mvc\Presenter\ZendViewPresenter
{
    /**
     * The script action name to pass to the view renderer when the action has a
     * status. First parameter is the action name, the second one is the status.
     * 
     * @var string
     */
    protected $scriptActionFormat = "%s"; // Default: "%s/%s"
    
    /**
     * @return \Zend_Controller_Response_Abstract
     */
    public function getResponse()
    {
        return $this->getActionController()->getResponse();
    }
    
    /**
     * @return \Zend_Controller_Request_Abstract
     */
    public function getRequest()
    {
        return $this->getController()->getRequest();
    }
    
    /**
     * @param int
     * @return self
     */
    public function setHttpResponseCode($code)
    {
        $this->getResponse()->setHttpResponseCode($code);
        return $this;
    }

    /**
     * @return Zend_Layout|null
     */
    public function getLayout()
    {
        return Zend_Layout::getMvcInstance();
    }
    
    /**
     * @return self
     */
    public function disableLayout()
    {
        $layout = $this->getLayout();
        if (null !== $layout) {
            $layout->disableLayout();
        }
        return $this;
    }

    /**
     * Immediately render a view using the view renderer
     *
     * @param string $action
     * @param null|boolean|string $status
     * @return void
     */
    protected function render($action, $status = null)
    {
        $this->setScriptAction($action, $status);
        $this->getViewRenderer()->render();
    }
}