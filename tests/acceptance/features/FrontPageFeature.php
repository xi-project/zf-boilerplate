<h1>Front page</h1>

<p>
    This is an example of a <em>feature</em> document generated from an acceptance test.
</p>

<p>
    An acceptance test is a combination of documentation and test code describing a single feature of the system.
    The test is often a Selenium browser-based test, which gives the possiblity of screenshots such as the one below.
</p>

<div>TODO: screenshot</div>

<p>
    These tests can work as simple version-controller HTML TODO lists as well.
    Just specify a feature here as text (and perhaps some mockups) and
    gradually change it to a test as things get implemented.
</p>

<h2>TODO</h2>

<ul>
    <li>
        Get Doctrine to work in acceptance tests. Needs a persistent database because Selenium invokes a server.
    </li>
    <li>
        Make the test setup as painless as possible. Since we'll depend on Node.js anyway, maybe use <a href="https://github.com/davidcoallier/node-php">node-php</a> or something.
    </li>
    <li>
        Properly evaluate and maybe fork
        <a href="https://github.com/chibimagic/WebDriver-PHP/">this</a>
        (or maybe <a href="http://code.google.com/p/php-webdriver-bindings/downloads/detail?name=php-webdriver-bindings-0.7.0.zip&can=2&q=">this</a>).
    </li>
</ul>
