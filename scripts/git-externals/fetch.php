#!/usr/bin/env php
<?php
define('EXTERNALS_PATH', realpath(__DIR__ . '/../../external'));

$externals = require __DIR__ . '/definitions.php';

foreach ($externals as $external) {
    list($path, $url, $rev) = $external;

    echo "> Installing/Updating $path\n";

    $installDir = EXTERNALS_PATH . '/' . $path;

    if (!is_dir($installDir)) {
        system(sprintf('git clone %s %s', escapeshellarg($url), escapeshellarg($installDir)));
    }

    system(sprintf(
        implode(' && ', array(
            // TODO: Document why each of these is needed
            'cd %s',
            'git checkout master',
            'git reset --hard HEAD',
            'git submodule update --init --recursive',
            'git pull',
            'git checkout %s',
            'git submodule update --init --recursive'
        )),
        escapeshellarg($installDir),
        escapeshellarg($rev)
    ));
}
