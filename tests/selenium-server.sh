#!/bin/sh
cd `dirname "$0"`

version="2.5.0"
filename="selenium-server-standalone-$version.jar"
path="../external/$filename"
url="http://selenium.googlecode.com/files/$filename"

if [ ! -f "$path" ]; then
    echo "Selenium server not found at $path."
    echo "Attempting to download from $url."
    curl -# -o "$path" "$url"
fi

java -jar "$path"

