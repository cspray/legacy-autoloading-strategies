# Composer Autoload Single Package

This strategy has the shared code and new app living in the same `src/` directory instead of being split into separate packages. Because of this, we will not be able to `"require"` our shared package in the legacy app and must provide our own entrypoint for ensuring the appropriate shared code is loaded.

