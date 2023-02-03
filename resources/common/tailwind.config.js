/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './src/**/*.js',
        './src/**/*.vue',
        '../views/layouts/common.blade.php',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('daisyui'),
    ],
    daisyui: {
        styled: true,
        themes: ['emerald'],
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: '',
        darkTheme: 'aqua',
    },
}
