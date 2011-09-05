#!/bin/bash

ZEND_SERVER_PHPUNIT=/usr/local/zend/bin/phpunit

if [ -n "$PHPUNIT" ]; then
    phpunit="$PHPUNIT"
elif [ -n "`which phpunit`" ]; then
    phpunit=phpunit
elif [ -x "$ZEND_SERVER_PHPUNIT" ]; then
    phpunit="$ZEND_SERVER_PHPUNIT"
else
    echo "PHPUnit not found. Please install it and make sure it's on your PATH."
    exit 1
fi

# run the tests, passing all given arguments to phpunit
cd `dirname "$0"`

exec "$phpunit" \
        --configuration phpunit.xml \
        "$@"
