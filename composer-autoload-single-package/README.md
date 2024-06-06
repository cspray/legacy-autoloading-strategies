# Composer Autoload Single Package

This strategy has the shared code and new app living in the same `src/` directory instead of being split into separate packages. Because of this, we will not be able to `"require"` our shared package in the legacy app and must provide our own entrypoint for ensuring the appropriate shared code is loaded.

Inside the `legacy-app` we define a file to autoload in the `composer.json` configuration. There we setup our autoloader to include a file, `autoload-shared-code.php`, that itself requires the appropriate code to share from `new-app`. When Composer creates the autoload script, carried out as part of running `composer install`, `composer update`, or `composer dump-autoload` it will require the given file. Read more about the [Composer autoload files configuration](https://getcomposer.org/doc/04-schema.md#files).

## Pros

- Less structure requires less overheard.

## Cons

- Easier to allow coupling of the shared module with new code, that might not be autoloaded properly in the legacy app among other concerns.
- Installs what amounts to a separate package outside typical Composer idioms, i.e. not using `"require"` to install a separate package.
- Requires any new shared code to be properly referenced in the `autoload-shared-code.php` file