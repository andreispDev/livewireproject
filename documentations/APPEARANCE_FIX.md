# Appearance Fix

## Problem

The Flux UI light/dark appearance controls were visible, but changing the
selection did not update Tailwind styles consistently.

## Root causes

1. Flux adds a `.dark` class to the `<html>` element, but Tailwind CSS was
   still using its default dark-mode behavior instead of the selector strategy.
2. The dashboard Livewire view had its `@layout('layouts.app')` directive
   commented out, so it did not load the shared layout containing the
   appearance controls and Flux scripts.
3. The post creation Livewire view also needed to use the shared application
   layout for consistent appearance behavior.

## Changes made

### `resources/css/app.css`

- Imported Flux's stylesheet:

    ```css
    @import "../../vendor/livewire/flux/dist/flux.css";
    ```

- Configured Tailwind's dark variant to follow Flux's `.dark` class:

    ```css
    @custom-variant dark (&:where(.dark, .dark *));
    ```

- Preserved the existing Flux accent color customization for light and dark
  modes.

### `resources/views/components/dashboard/⚡index.blade.php`

- Enabled the shared layout by changing the commented layout directive to:

    ```blade
    @layout('layouts.app')
    ```

### `resources/views/pages/post/⚡create.blade.php`

- Added:

    ```blade
    @layout('layouts.app')
    ```

    so the page uses the same Flux appearance handling as the dashboard.

## Existing layout behavior

`resources/views/layouts/app.blade.php` already includes:

- `@fluxAppearance`, which initializes appearance handling.
- The light, dark, and system appearance selector.
- `@fluxScripts`, which provides Flux's appearance utilities.

## Validation

The following checks passed after the changes:

- `npm run build`
- `php artisan view:cache`
