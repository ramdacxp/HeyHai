# HeyHai

Vote for the best joke... ;)

![Screenshot](images/screenshot.png)

## Development

Requires [Node.Js](https://nodejs.org/en/download).
[VS Code](https://code.visualstudio.com) recommended.

This repo is using PHP and Composer from <https://github.com/ramdacxp/php-devenv>, which needs to be cloned into a _parallel_ folder `php-devenv`.

Main tools:

* `devenv` - Prepare current shell for `php-devenv` tooling (e.g. `php` and `composer`)
* `npm install` - Install Node/Astro prerequisites
* `composer install` - Install PHP prerequisites

* `npm start` - Run Astro dev preview server
* `composer start` - Run PHP dev webserver
* `database.cmd` - Run MariaDB and PhpMyAdmin from `php-devenv`

Additional tooling:

* `npm run build` & `npm run preview` - Build and preview Astro UI
* `cleanup.cmd` - Delete all temp. files
* `cleanup.cmd /all` - Delete all temp. files incl. `node_modules`

## Folder Structure

* `.astro`, `node_modules`, `vendor` - temp. files required for development; remove via `cleanup.cmd`
* `.github` - Github pipeline to publish app
* `.vscode` - VS Code settings
* `/app` - PHP WebAPI App classes
* `/config` - Configuration for development setup and template for production
* `/dist` - build output folder; create via `publish.cmd`
* `/images` - images for MD documentation
* `/public` - files served by webserver (will be included "as is" in `/dist` during build)
  * `/api` - PHP WebAPI route definitions
* `/src` - Astro static website; holding the UI

## Publishing

Rebuild the Astro app via `publish.cmd` and upload the following folders to your provider:

* `dist` (your (sub-)domains needs to point to this folder)
* `app`
* `vendor`
* `config`

See GitHub pipeline `.github\workflows\publish.yml` for details.

## How this project was created

* `npm create astro@latest`
* `npx astro add tailwind`
* `npx astro add alpinejs`
* AlpineJS `persist` plugin:
  * `npm install @alpinejs/persist`
  * `npm install --save-dev @types/alpinejs__persist`
  * create `src/alpine-entrypoint.ts` and adapt `astro.config.mjs`

## Links

* Icons from <https://freesvgicons.com/packs/lsicon>
* [Astro](https://docs.astro.build/)
* [AlpineJS](https://alpinejs.dev/start-here) with [Astro Sample](https://github.com/withastro/astro/tree/main/examples/framework-alpine)
