# HeyHai

Vote for the best joke

## Tools

* `npm install` - Install prerequisites
* `npm start` - Run dev preview server
* `publish.cmd` - Publish production website
* `cleanup.cmd` - Delete all temp. files
* `cleanup.cmd /all` - Delete all temp. files incl. `node_modules`

## Structure

* `/dist` - output dir of project build, create with `publish.cmd`

## How this project was created

* `npm create astro@latest`
* `npx astro add tailwind`
* `npx astro add alpinejs`
* AlpineJS `persist` plugin:
  * `npm install @alpinejs/persist`
  * `npm install --save-dev @types/alpinejs__persist`
  * create `src/alpine-entrypoint.ts` and adapt `astro.config.mjs`
