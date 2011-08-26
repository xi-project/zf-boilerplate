<?php
return array(
    'default' => new Zend_Controller_Router_Route(
        ':module/:controller/:action/*',
        array(
            'module'     => 'example',
            'controller' => 'index',
            'action'     => 'index',
        )
    ),
);
