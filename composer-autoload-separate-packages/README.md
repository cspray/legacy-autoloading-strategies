# Composer Autoload Separate Packages

This strategy has the shared code between legacy and new apps split into its own module within the `new-app/shared-utils` directory. The business/domain logic is stored in `new-app/api`. These directory names are meant to be examples and could be named whatever is appropriate for your use case.

Inside the `legacy-app` and `new-app` we define a `"repositories"` key in the `composer.json` configuration. There we setup our shared code to be loaded as a `path` type. When Composer creates the autoload script, carried out as part of running `composer install`, `composer update`, or `composer dump-autoload` it will install the code from the defined path instead of from Packagist.

## Pros

- Ensures separation of the shared module, legacy app, and new app. This will help reduce coupling of the shared code and the new app.
- The shared modules code can be tagged independently of the new app.
- Inclusion in the legacy app and new app use Composer conventions and are listed as packages in composer.json `"require"`.

## Cons

- More structure and code is inherently more complex and requires a higher learning curve to get started.
- Shared code may not be well suited to be split apart from the new app. Depending on your use case, this may be an indication of a design flaw in the shared code and not necessarily a con of this approach.