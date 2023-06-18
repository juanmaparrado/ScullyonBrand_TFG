import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/landing.css',
                'resources/css/photos.css',
                'resources/css/team.css',
                'resources/css/newdrop.css',
                'resources/css/details.css',
                'resources/css/cart.css',
                'resources/css/checkout.css',
                'resources/css/reviews.css',
                'resources/js/app.js',
                'resources/js/landing.js',
                'resources/js/photos.js',
                'resources/js/details.js',
            ],
            refresh: true,
        }),
    ],
});
