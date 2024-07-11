import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/site/app.scss', 'resources/sass/admin/app.scss', 'resources/js/site/app.js'],
            refresh: true,
        }),
    ],
});
