import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

// noinspection JSUnusedGlobalSymbols
export default defineConfig({
    envDir: '../../',
    plugins: [
        laravel({
            publicDirectory: '../../public',
            buildDirectory: 'build/common',
            hotFile: '../../public/hot-common',
            input: ['src/app.js'],
            refresh: true,
        }),
        vue(),
    ],
})
