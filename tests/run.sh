#!/bin/bash

# default binary location (from Zend Server)
phpunit=/usr/local/zend/bin/phpunit

# possible to use a custom location using an environment variable
if [ -n "$PHPUNIT" ]; then
    phpunit="$PHPUNIT"
fi

# run the tests, passing all given arguments to phpunit
cd `dirname "$0"`

exec "$phpunit" \
        --configuration phpunit.xml \
        "$@"
