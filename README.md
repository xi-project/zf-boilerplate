# Zend Framework boilerplate

## Introduction

Setting up a Zend Framework installation is hard. Well, the base installation
probably isn't, but we're not satisfied with that. Going beyond the trivial
quickstart can be a challenge and is always a chore. This is our solution.

The Zend Framework boilerplate comes prepackaged with everything you need to get
started on your project right away, using best practices. Here's a checklist on
what the boilerplate offers:

- *PHP 5.3 namespaces.* Goes for application code as well as modules.
- *A self-contained module structure.* Your modules can be self-contained and as
such they have the potential to be reused. With a little help from 
[Assetic](https://github.com/kriswallsmith/assetic), this goes for static
resources as well. ZF modules can now resemble Symfony bundles!
- *[Doctrine2](http://www.doctrine-project.org) support.* Nothing fancy like
CRUD generators for now, but enough to get you going.
- *Unit and acceptance testability.* PHPUnit and Selenium web driver setups
included.
- *A Controller-Service-Presenter setup.* When you dish out heavy duty code, you
can separate your concerns better by governing access to model and view layers
using Services and Presenters.

In short, we've got you covered.

## Getting started

The boilerplate is intended for programmers, and as such you're expected to know
how to read code. The boilerplate comes with an example module that should
showcase at least the most important points. The examples are annotated to
clarify what is going on, and they should be sufficient to get going with all
the major features.

Read on for setup instructions.

## Starting a new project

First the standard fare initialization. You can also do a `git clone` if you
already have a Github repository or similar.

    # Create the project
    git init my-project
    cd my-project

This is important, pay attention: we're adding a non-standard remote, fetching
it and merging the version you want to base your development on. This example
uses the master branch, but you'll most likely want to use the most recent tag
version.

    # Add the template as a remote
    git remote add template git@github.com:sopranobrainalliance/zend-project-template.git
    # Get most recent updates
    git fetch template
    # Determine which tag to use: pick one from the list
    git tag -l
    # Assuming the tag you want is template-x.y.z, merge the version to the project
    git merge template-x.y.z

You'll need all the submodules that the repository depends on. You should keep
the dependencies up-to-date, so running this after every version update can be
a smart move.

    # Download submodules
    git submodule update --init --recursive

You should have all content in place. Next, we're setting up the example
application.

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

We'll also make sure the tests pass before doing anything much.

    # Start Selenium server (in a separate console)
    tests/selenium-server.sh

    # Run the test suite
    tests/run.sh

All green? Good, let's push it. If you did the first step with `git clone`, you
don't need to add the remote - it should already be there for you.

    # Set up 'origin' to point to your project repo.
    # You'll be pushing your things to 'origin', never 'template'.
    git remote add origin $GITHUB_URL_OF_YOUR_PROJECT

    # The -u flag sets up upstream tracking, associating this branch with the remote one.
    git push -u origin master

Tracking essentially means you don't need to specify arguments to git pull or
git push when working with your local branch. You can check out more tricks
[here](http://mislav.uniqpath.com/2010/07/git-tips/).

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

If everything goes well, then the `tests/acceptance/FrontPageFeature.phtml` test case has generated use case documentation into `doc/features/FrontPageFeature.html`. Go look at it, it's quite nice. Write your own acceptance tests similarly and you'll have a pretty good integration test suite as well as use-case documentation that one can use to follow the project's status and occasionally check for broken layouts etc.

## Versioning notes

### Tagging

Tags should represent a [semantically versioned](http://semver.org/) list of known-good repository states. A `git fetch template` in a project repository will pollute the project's tags with those from the template. Due to this reason, template tags should be prefixed with `template-`, eg. `template-0.1.0`.

### Upgrading the template version

To merge changes in the project template with your project, pick a tagged
revision you wish to use (`template-x.y.z` here) and do:

    git fetch template
    git merge template-x.y.z

Resolve conflicts if any and mind any possible changes to `application.example.ini`.


