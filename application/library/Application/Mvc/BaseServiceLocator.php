<?php
namespace Application\Mvc;

class BaseServiceLocator extends \Xi\Zend\Mvc\DependencyInjection\DefaultServiceLocator
{
    protected $defaultPresenterClass = 'Application\Mvc\BasePresenter';
    protected $defaultServiceClass = 'Application\Mvc\BaseService';
}