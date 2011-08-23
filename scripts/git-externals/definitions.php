<?php
return array(
    /**
     * Each externality is described with an array as follows:
     * - where to clone repository to (directory relative to the externals root)
     * - a git repository url to clone from
     * - a valid branch / tag to use (prefer tags to branches!)
     */
    array('Doctrine/ORM',                'git://github.com/doctrine/doctrine2.git',          '2.1.0'),
    array('Xi/Doctrine',                 'git://github.com/xi-project/xi-doctrine.git',      'master'),
    array('Xi/Collections',              'git://github.com/xi-project/xi-collections.git',   '0.1.1')
);