import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        https: false,
        host: true,
        port: 5173,
        hmr: {host: 'localhost', protocol: 'ws'},
    },
});
