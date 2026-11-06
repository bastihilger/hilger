# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Sebastian Hilger's personal homepage (hilger.io): a single-page "link in bio" site built on a near-stock Laravel 13 skeleton (PHP 8.3+). Almost all real content lives in `resources/views/welcome.blade.php`; there are no custom controllers, models or migrations beyond the Laravel defaults.

## Commands

```bash
composer dev            # server + queue + pail logs + Vite, all via concurrently
npm run dev             # Vite only
npm run build           # production asset build (into public/build)
./vendor/bin/pest       # run tests (Pest 4)
./vendor/bin/pest --filter "returns a successful response"   # single test
./vendor/bin/pint       # format PHP (Laravel Pint)
```

## Architecture notes

- **Routing:** `routes/web.php` has one route, `/`, that returns the `welcome` view.
- **Page content:** the links shown on the page (KraenkVisuell, GitHub, Bluesky) are a `$links` array in a `@php` block at the top of `welcome.blade.php`. To add, remove or reorder a link, edit that array; the markup below loops over it. `intro` and `icon` are rendered unescaped (`{!! !!}`), so they may contain HTML.
- **Analytics:** Fathom is loaded only inside `@production`, so it does not run locally.
- **Styling:** Tailwind CSS 3 (config in `tailwind.config.js`, `@tailwind` directives in `resources/css/app.css`), with Nunito loaded from Google Fonts as the `sans` font. Dark mode uses Tailwind's default `media` strategy (`dark:` classes follow the OS setting). Assets are built by Vite through `laravel-vite-plugin`.
- **Database:** `.env.example` points at Postgres (`DB_DATABASE=hilger`), but the site doesn't read from the database. Tests don't use `RefreshDatabase`, and the sqlite override in `phpunit.xml` is commented out.
- **Tests:** Pest; `tests/Pest.php` binds `Tests\TestCase` to `tests/Feature`. The only meaningful test checks that `/` returns 200.
