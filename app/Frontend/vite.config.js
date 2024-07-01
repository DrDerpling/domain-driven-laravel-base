import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['app/Frontend/js/app.js', 'app/Frontend/css/app.css'],
            refresh: true,
        }),
    ],
});
