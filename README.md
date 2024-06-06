# Legacy Autoloading Strategies

This repo holds a series of strategies one might use when refactoring a legacy app into a new architecture. These strategies make the following assumptions:

- Legacy and new code are stored in a single monorepo
- New code is stored outside legacy source directories and is not autoloaded into the legacy app
- There is no access to public Packagist
- There is no capacity to provide a private Packagist
- A limited subset of new code is desired to be shared inside the legacy app

If the following assumptions do not apply to your use case it is likely these strategies might not apply to you. Please be sure to diligently review the strategies proposed before implementing them in your application.

## Understanding this Repo

Each directory in this repo is a different strategy one might use to share code between two apps in the same monorepo. The strategy includes:

- A `README.md` file detailing how to use this strategy, benefits, and drawbacks
- A `new-test.php` in a location detailed in that strategy's README that will demonstrate using our new code in the new app.
- A `legacy-test.php` in the `legacy-app/src` directory that will demonstrate using our shared code with the legacy app.

Each test will use the same shared code, an example of looks like:

```php
<?php

namespace Acme\NewApp\SharedCode;

class Utils {

    public function __construct(
        public readonly string $output
    ) {}

}

?>
```

The `$output` passed in `new-test.php` will be `$strategyName . ' shared utils from new app'`. The `$output` passed in `legacy-test.php` will be `$strategyName . ' shared utils from legacy app'`. This output is displayed when running the corresponding test files. There are GitHub Actions that will run these test files for each strategy, showing the appropriate output for each strategy. Please review these Actions to see the different strategies being used.

## Feedback

Have your own strategy you'd like to document? See a problem or improvement with one of the existing strategies? Submit a pull request!

## Installation

Generally speaking, this library is not meant to be installed directly, in production or dev. If you're wanting to see a strategy used please review the available GitHub Actions. However, if you wish to run the various test files locally the only supported means is to clone the repo.

```shell
git clone git@github.com:cspray/legacy-autoloading-strategies.git
```