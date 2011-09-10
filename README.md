# Zend Framework project template

## Directory outline

- **/**: README and LICENSE files
- **/application**: project-specific application implementation
- **/data**: project-specific generic filesystem datastorage
- **/docs**: project documentation; design documents, class schematics etc.
- **/external**: external dependencies that cannot be included directly in /library, eg. git submodules
- **/library**: generic class libraries which the application relies on (eg. Zend, Doctrine, Xi components), possibly symlinked from within /external
- **/public**: files visible to the outside; index.php, CSS and JS files, images
- **/scripts**: build and deployment scripts, database migrations, cron jobs
- **/tests**: unit tests, acceptance tests, test fixtures and bootstraps along with possible test output (eg. code coverage reports)

### Application directory structure

- **/application/configs**: configuration files
- **/application/library**: domain classes (ie. models), any project-specific libraries, non-reusable content in general
- **/application/modules**: Zend MVC modules (controllers, services, presenters, view scripts, view helpers)
- **/application/layouts**: Zend Layout view scripts

### Module directory structure

The contents of **/application/modules** are organized as such:

- **<ExampleModule>**: the module root namespace. Contains an optional module-specific ´Bootstrap´.
- **<ExampleModule>/Controller**: controller classes.
- **<ExampleModule>/Service**: service classes.
- **<ExampleModule>/Presenter**: presenter classes.
- **<ExampleModule>/Model**: module-specific model implementations.
- **<ExampleModule>/Resources**: module-specific 'static' resources such as view scripts, possibly CSS/JS files intended to be linked to /public.
    
Adding more is easy; these are just the directories with some built-in purpose.

## Starting a new project

    # Create the project
    git init my-project
    cd my-project

    # Fetch the template
    git remote add template git@github.com:sopranobrainalliance/zend-project-template.git
    git fetch template
    git merge template/master

    # Download submodules
    git submodule update --init --recursive

    # Initialize your application.ini (you'll get sqlite by default)
    cp application/configs/application.example.ini application/configs/application.ini

    # Create development and test databases
    scripts/doctrine.php orm:schema-tool:create
    APPLICATION_ENV=testing scripts/doctrine.php orm:schema-tool:create

    # Make the databases writable by apache
    # (assuming apache is in group 'www-data')
    sudo chmod -R ug+rwX data
    sudo chgrp -R www-data data
    # Also make sure apache can read everything in your project dir

    # Start Selenium server (in a separate console)
    tests/selenium-server.sh

    # Run the test suite
    tests/run.sh

    # Set up 'origin' to point to your project repo.
    # You'll be pushing your things to 'origin', never 'template'.
    git remote add origin $GITHUB_URL_OF_YOUR_PROJECT
    git push -u origin master

## Running the test suite

You really should test your code, and we've tried to make it as easy for you as possible.

First, make sure you've got a recent (3.5.x+) version of [PHPUnit](http://phpunit.de/) installed and that the `phpunit` is on your PATH.

Try running the unit-test suite

    cd tests
    phpunit application

The testing strategy encouraged by the template has application logic unit-tested as usual in `tests/application` and views, controllers and other glue code covered by integration-level tests under `tests/acceptance`. Take a look at the examples that ship with the template to see how to write both.

### Setting up acceptance tests

Acceptance tests run with APPLICATION_ENV=testing. They need a separate vhost and a separate database. The database can be configured in `application.ini`, but the vhost must be configured manually.

Add a configuration like the following to apache.

    <VirtualHost *:80>
        ServerName NAME-OF-PROJECT.localhost
        DocumentRoot /PATH/TO/PROJECT/public
        SetEnv APPLICATION_ENV testing
    </VirtualHost>

Also, add `NAME-OF-PROJECT.localhost` to your hosts file to redirect to localhost and set `acceptanceTestingBaseUrl=http://NAME-OF-PROJECT.localhost` in `application.ini` (under the `[testing]` section).

Now start the selenium server (in a separate terminal window)

    tests/selenium-server.sh

Then run the whole test suite

    tests/run.sh


## Miscellaneous

To merge changes in the project template with your project, do

    git fetch template
    git merge master template/master

Resolve conflicts if any and mind any possible changes to `application.example.ini`.


