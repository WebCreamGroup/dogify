// noinspection SpellCheckingInspection
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
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
