import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

// noinspection JSUnusedGlobalSymbols
export default defineConfig({
    envDir: '../../',
    plugins: [
        laravel({
            publicDirectory: '../../public',
            buildDirectory: 'build/app',
            hotFile: '../../public/hot-app',
            input: ['src/js/app.js', 'src/css/app.css'],
            refresh: true,
        }),
    ],
})
