# Zend Framework boilerplate

## Introduction

Setting up a Zend Framework installation is hard. Well, the base installation probably isn't, but we're not satisfied with that. Going beyond the trivial quickstart can be a challenge and is always a chore. This is our solution.

The Zend Framework boilerplate comes prepackaged with everything you need to get started on your project right away, using best practices. Here's a checklist on what the boilerplate offers:

- *PHP 5.3 namespaces.* Goes for application code as well as modules.
- *A self-contained module structure.* Your modules can be self-contained and as such they have the potential to be reused. With a little help from [Assetic](https://github.com/kriswallsmith/assetic), this goes for static resources as well. ZF modules can now resemble Symfony bundles!
- *[Doctrine2](http://www.doctrine-project.org) support.* Nothing fancy like CRUD generators for now, but enough to get you going.
- *Unit and acceptance testability.* PHPUnit and Selenium web driver setups included.
- *A Controller-Service-Presenter setup.* When you dish out heavy duty code, you can separate your concerns better and keep your controllers skinny using Services and Presenters.

In short, we've got you covered.

## On this document

The boilerplate is intended for programmers, and as such you're expected to know how to read code. The boilerplate comes with an **example module that should showcase at least the most important points** in code. The examples are annotated to clarify what is going on, and they should be sufficient to get going with all the major features. This document is intended to detail **architectural choices and conventions** that are not most aptly described on the code level.

## Getting started

### Repository and application setup

First the standard fare initialization. You can also do a `git clone` if you already have a Github repository or similar.

    # Create the project
    git init my-project
    cd my-project

This is important, pay attention: we're adding a non-standard remote, fetching it and merging the version you want to base your development on. You'll most likely want to use the most recent tag version.

    # Add the boilerplate as a remote
    git remote add boilerplate git@github.com:xi-project/zf-boilerplate.git
    # Get most recent updates
    git fetch boilerplate
    # Determine which tag to use: pick one from the list
    git tag -l
    # Assuming the tag you want is boilerplate-x.y.z, merge the version to the project
    git merge boilerplate-x.y.z

You'll need all the submodules that the repository depends on. You should keep the dependencies up-to-date, so running this after every version update can be a smart move.

    # Download submodules
    git submodule update --init --recursive

You should have all content in place. Next, we're setting up the example application.

    # Initialize your application.ini (you'll get sqlite by default)
    cp application/configs/application.example.ini application/configs/application.ini

    # Create development and test databases
    scripts/doctrine.php orm:schema-tool:create
    env APPLICATION_ENV=testing scripts/doctrine.php orm:schema-tool:create

    # Make the databases writable by apache
    # (Assuming apache is in group 'www-data'. In Zend Server Mac OS X this is 'daemon'.)
    sudo chmod -R ug+rwX data
    sudo chgrp -R www-data data
    
    # Make public/img writable by apache
    # (Again assuming apache is in group 'www-data')
    sudo chmod -R ug+rwX public/img
    sudo chgrp -R www-data public/img
    
    # Also make sure apache can read everything in your project dir

The application should now be up and running on your local server. Next up, tests and the test environment.

### Unit and acceptance test setup

Because we feel testability and tests are fundamental aspects of solid code, we've tried to make it as easy as possible for you to get started with testing your ZF application. There are two layers of tests supported: unit testing via PHPUnit and acceptance testing via Selenium on top.

#### PHPUnit

First, make sure you've got a recent (3.5.x+) version of [PHPUnit](http://phpunit.de/) installed and that the `phpunit` is on your PATH.

Try running the unit-test suite

    cd tests
    phpunit application

The testing strategy encouraged by the boilerplate has application logic unit-tested as usual in `tests/application` and views, controllers and other glue code covered by integration-level tests under `tests/acceptance`. Take a look at the examples that ship with the boilerplate to see how to write both.

#### Selenium

Acceptance tests run with `APPLICATION_ENV=testing`. They need a separate vhost and a separate database. The database can be configured in `application.ini`, but the vhost must be configured manually.

Add a configuration like the following to Apache. (Eg. `/usr/local/zend/apache2/conf/extra/httpd-vhosts.conf` on Zend Server. Note that the default port on Zend Server is 10088.)

    <VirtualHost *:80>
        ServerName NAME-OF-PROJECT.localhost
        DocumentRoot /PATH/TO/PROJECT/public
        SetEnv APPLICATION_ENV testing
    </VirtualHost>

Also, add `NAME-OF-PROJECT.localhost` to your hosts file to redirect to localhost and set `acceptanceTestingBaseUrl=http://NAME-OF-PROJECT.localhost` in `application.ini` (under the `[testing]` section). Remember to also specify the port, if you're not using the default (80).

Now start the selenium server (in a separate terminal window)

    tests/selenium-server.sh

Then run the whole test suite

    tests/run.sh

If everything goes well, then the `tests/acceptance/FrontPageFeature.phtml` test case has generated use case documentation into `docs/features/FrontPageFeature.html`. Take a look at it, it's quite nice. Write your own acceptance tests similarly and you'll have a pretty good integration test suite as well as use-case documentation that one can use to follow the project's status and occasionally check for broken layouts etc.

### Pushing it

Tests show all green? Good, let's push it. If you did the first step with `git clone`, you don't need to add the remote - it should already be there for you.

    # Set up 'origin' to point to your project repo.
    # You'll be pushing your things to 'origin', never 'boilerplate'.
    git remote add origin $GITHUB_URL_OF_YOUR_PROJECT

    # The -u flag sets up upstream tracking, associating this branch with the remote one.
    git push -u origin master

Tracking essentially means you don't need to specify arguments to git pull or git push when working with your local branch. You can check out more tricks [here](http://mislav.uniqpath.com/2010/07/git-tips/).

# Useful concepts, aka. putting your controller on a diet

The boilerplate is, at heart, the same Zend Framework MVC you've perhaps come to love and hate. The same concepts, therefore, mostly apply to the boilerplate as well. But the fact remains that the MVC structure we're building on stems architecturally from days of yore - which means there are a few important architectural decisions to be made. **Services and Presenters** are the result, and both are here for your convenience. You can choose to ignore them if you wish; they are add-ons to the core, not integral to the MVC's functioning. If you do ignore them, keep in mind that they are intended to represent our current best bets in fighting spaghetti.

At the practical core of these additions is the [skinny controller paradigm](http://weblog.jamisbuck.org/2006/10/18/skinny-controller-fat-model). In short, it means extracting *data handling* and *content presentation* from the controller layer, leaving only decision-making behind. This discourages copy-paste and encourages [simple, succinct controllers with little dependencies](http://codebetter.com/iancooper/2008/12/03/the-fat-controller/). There's even a decent [introduction to the concept](http://survivethedeepend.com/zendframeworkbook/en/1.0/the.model) from ZF's point of view. More philosophically taken, the additions are attempts to allow programmers to more accurately reflect the SOLID and DRY design principles.

Now, let's walk through what we've got in store. Before that, I'd like to note that this readme is reserved for characterization; if you're looking for code examples, they can be found in the example application.

## Services: your explicit application

As applications grow, controllers tend to get unwieldy. Specifically, their tentacles start reaching where they shouldn't: to the domain logic. This leads to a situation where [there is no explicit application](http://blog.firsthand.ca/2011/10/rails-is-not-your-application.html), and the Controller-Model interaction resembles a big ball of mud. Having observed this effect in many different projects, we present a simple cure: **the Controller does not directly access domain entities**, but instead talks with a Service on the Model layer.

**The Service layer explicitly defines the interface to your application.** There is no domain manipulation, validation, queries or anything of the like going on in the Controller - they're all extracted to the Service. What's more, a Controller will only have access to *one* Service, meaning there is only one interface to the Model layer. This is a pre-emptive action against any sort of tentacle manifestations.

Extracting things into the Service layer has additional benefits as well. As structures unencumbered by years of legacy, Services are much more easily integrated with Dependency Injection facilities and crafted to the creator's liking, allowing for Test Driven Development with significantly less friction than with plain controllers. Controllers are difficult to make fully injectable and testable; Services provide for a useful compromise, a flex point in the application within which everything can be built to modern standards.

## Presenters: the other half

With domain logic out of the way, what's left in our controller? Accepting input from the request, performing commands and queries on the Service based on the data, then displaying a view based on the result. The former are the result of our previous refactoring, so let's focus on the latter.

Displaying a view consists of **a) making a decision on what kind of view to produce** - success, failure, something else? - and **b) providing necessary data to the view layer**. You don't need to be psychic to guess we find there's a problem with this. Suppose you find, within a view, that you need to show a different set of data. *Display five instead of ten most recent articles? Right.* Where do you go to make that change? If you answer "the controller", you're in violation of the single responsibility principle.

Changes in the view layer shouldn't necessitate changes in the controller layer. The model layer, sure - that's where the data is supposed to come from. But the controller layer has no stake in this interaction. It's an unnecessary middleman we can do away with. *Entrant Presenters.*

**The controller doesn't pass anything into the view layer.** Instead, as its return value it reports a state that the Presenter is free to respond to. The Presenter, given access to the Service layer, will dig up all the data necessary for displaying the chosen view and, if necessary, pass it on to a template. It's mostly exactly as you would do within a controller, but in the right place.

Some examples of useful status codes, in addition to `true` for success and `false` for failure, could include:

- A specific error state, such as `empty` for an empty result set
- A process state, such as `init`/`done` for intermediate steps when eg. filling a form
- An access level indicator, such as `partial`/`full` for whether the user can be shown complete details
- If there is no decision to make, the state can correspondingly be `null`.

The Presenter should, obviously, not order the Service to manipulate the domain in any way, but just query it. Code-level mechanisms to enforce the point of the [command-query segregation principle](http://martinfowler.com/bliki/CommandQuerySeparation.html) do not come built-in, but it's possible to facilitate in client code eg. by extracting read-only interfaces from the actual services and referring only to those in the view layer.

## Service locators: the necessary infrastructure

But wait, there's more. As said, the Service layer is a way to separate a dependency injectable structure from the Controller layer that isn't as well structured. To get at Services that have their necessary dependencies provided, a dependency management mechanism is required.

**Service locators represent cohesive bundles of explicit resources** - there can be different kinds for different purposes. They're backed by [Pimple, a very simple dependency injection container](http://pimple.sensiolabs.org/) that takes care of the wiring part for populating potentially complex object graphs. Service locators take care of the *explicitness* part, providing a fully type hinted way to access resources within the container.

Feel free to subclass the existing concrete service locators or create new ones to match your needs. When you do, please remember to try and partition the amount of resources provided by a single locator. You don't want god classes creeping up in your code.

Some example heuristics for focusing and compartmentalizing service locators:

- Different kinds of basic services. Services that handle Doctrine entities vs. services that access the file system? Different kinds of dependencies, different kinds of service locators.
- Different service audiences. A service in an admin module may have dependencies very different from a service in a payment module.
- Keep in mind the Single Responsibility Principle and keep the resources provided by a single locator as closely related to each other as possible.

That said, as long as the resulting code is *testable*, it's probably fine.

## Outcomes

Great. We've factored slices of the view and model from the controller and to their respective layers. As a result, our code should be **more cohesive, less coupled and more easily testable**. Have a go at it!

Next up, some conventions it will likely be useful to familiarize yourself with.

# Conventions: working with the boilerplate

The boilerplate imposes some conventions, not all of which are present in ZF. The following reference should be enough to get you going.

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

## Versioning notes

### Tagging

Tags should represent a [semantically versioned](http://semver.org/) list of known-good repository states. A `git fetch boilerplate` in a project repository will pollute the project's tags with those from the boilerplate. Due to this reason, boilerplate tags should be prefixed with `boilerplate-`, eg. `boilerplate-0.1.0`.

### Upgrading the boilerplate version

To merge changes in the boilerplate with your project, pick a tagged revision you wish to use (`boilerplate-x.y.z` here) and do:

    git fetch boilerplate --tags
    git merge boilerplate-x.y.z

Resolve conflicts if any and mind any possible changes to `application.example.ini`.


