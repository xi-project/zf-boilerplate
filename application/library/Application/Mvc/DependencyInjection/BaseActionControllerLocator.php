<?php
namespace Application\Mvc\DependencyInjection;

// Implements an ActionControllerLocator that declares application-specific
// default Presenter and Service classes to use.
class BaseActionControllerLocator extends \Xi\Zend\Mvc\DependencyInjection\ActionControllerLocator
{
    protected $defaultPresenterClass = 'Application\Mvc\BaseZendViewPresenter';
    protected $defaultServiceClass = 'Application\Mvc\BaseDoctrineRepositoryService';
}