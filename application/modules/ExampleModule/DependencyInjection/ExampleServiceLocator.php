<?php
namespace ExampleModule\DependencyInjection;

class ExampleServiceLocator extends \Xi\Zend\Mvc\DependencyInjection\DoctrineServiceLocator
{
    // Add Service-specific accessors here.
    
    /**
     * @return string
     */
    public function getDefaultGreeting()
    {
        // This could come from a dependency, eg. from any configurable source
        // retrieved through the container.
        return 'Greetings';
    }
}