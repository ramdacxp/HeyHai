// @ts-check
import { defineConfig } from 'astro/config';

import tailwindcss from '@tailwindcss/vite';

import alpinejs from '@astrojs/alpinejs';

// https://astro.build/config
export default defineConfig({
  outDir: 'dist/www',
  site: 'https://schademarmelade.de',
  // base: 'root/',

  vite: {
    plugins: [tailwindcss()]
  },

  integrations: [alpinejs({ entrypoint: '/src/alpine-entrypoint' })],

});