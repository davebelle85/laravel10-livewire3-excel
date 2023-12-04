import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
            ],
            refresh: true,
        }),
    ],
});
