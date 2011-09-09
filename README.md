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

## Running PHPUnit tests

You, reader, are expected to be a professional developer. Professionals make sure their code works. To be sure, you need to test it. Automated unit tests make it easier to test, enhance your design and help you make deadlines.

Writing these tests is up to you, but once you have any, we've got the bare minimum laid out for you to run them. You will get a  barebones unit test bootstrap with ´/tests/bootstrap.php´. It sets up an autoloader, the include path and notches error reporting up to maximum. ´/tests/phpunit.xml´ will serve to configure your PHPUnit runs if you wish to do so (code coverage reports? Yes we can!). To run PHPUnit tests:

    cd tests
    phpunit

Wow, that was difficult. In case you don't have a `phpunit` executable in your path but _do_ have a Zend Server installation, you can instead use:

    sh run.sh <arguments>

Extra arguments will be passed on to phpunit, but you won't usually need any.

Also, see https://bas.fi/how-to-test/ .

## Setting up acceptance tests

Acceptance tests run with APPLICATION_ENV=testing. They need a separate vhost and a separate database. The database can be configured in `application.ini`, but the vhost must be configured manually.

    <VirtualHost *:80>
        ServerName NAME-OF-PROJECT.localhost
        DocumentRoot /PATH/TO/PROJECT/public
        SetEnv APPLICATION_ENV testing
    </VirtualHost>

Also, add `NAME-OF-PROJECT.localhost` to your hosts file to redirect to localhost
and set `acceptanceTestingBaseUrl=http://NAME-OF-PROJECT.localhost` in `application.ini`
(under testing).

## Starting a new project

    git init my-project
    cd my-project
    git remote add template git@github.com:sopranobrainalliance/zend-project-template.git
    git fetch template
    git merge template/master
    git submodule update --init --recursive

    cp application/configs/application.example.ini application/configs/application.ini
    # (you get sqlite by default)

    scripts/doctrine.php orm:schema-tool:create

    tests/selenium-server.sh  # put this in a separate console
    tests/run.sh

    git remote add origin $GITHUB_URL_OF_YOUR_PROJECT
    git push -u origin master

